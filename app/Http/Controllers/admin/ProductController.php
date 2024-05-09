<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductColorModel;
use App\Models\ProductImageModel;
use App\Models\ProductModel;
use App\Models\ProductSizeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if (isset($request->key_search)) {
            $data_product = ProductModel::where('name', 'like', '%' . $request->get('key_search') . '%')->paginate(10);
        } else {
            $data_product = ProductModel::orderBy('created_at', 'desc')->paginate(10);
        }
        if ($data_product) {
            foreach ($data_product as $value) {
                $value->name_category = Category::find($value->category_id)->name;
            }
        }

        $titlePage = 'Admin | Sản Phẩm';
        $page_menu = 'product';
        $page_sub = null;
        $listData = $data_product;
        return view('admin.products.index', compact('titlePage', 'page_menu', 'page_sub', 'listData'));
    }

    public function create()
    {
        $titlePage = 'Thêm sản phẩm';
        $page_menu = 'products';
        $page_sub = null;
        $category = Category::where('parent_id', 0)->get();
        return view('admin.products.create', compact('category','titlePage','page_menu','page_sub'));
    }

    /**
     * create product
     **/

    public function store(Request $request)
    {
        try {
            $attribute = $request->variant;
            $category = Category::find($request->get('category_children'));
            if (empty($category)) {
                return back()->with(['error' => 'Vui lòng chọn danh mục để tiếp tục']);
            }
            if (!$request->hasFile('file_product')) {
                return back()->with(['error' => 'Vui lòng thêm hình ảnh sản phẩm']);
            }
            $display = 0;
            if ($request->get('display') == 'on') {
                $display = 1;
            }
            $is_hot = 0;
            if ($request->get('is_hot') == 'on') {
                $is_hot = 1;
            }
            $imgPath = Storage::url($request->file('file_product')->store('product', 'public'));
            $product = new ProductModel([
                'image' => $imgPath,
                'category_id' => isset($category) ? $category->id : null,
                'name' => $request->get('name'),
                'slug' => Str::slug($request->get('name')),
                'description' => $request->get('description'),
                'style' => $request->get('style'),
                'type' => $request->get('type'),
                'display' => $display,
                'is_hot' => $is_hot,
            ]);
            $product->save();
            $this->add_img_product($request, $product->id);
            $this->add_and_update_attribute_product($attribute, $product);
            return \redirect()->route('admin.products.index')->with(['success' => 'Thêm sản phẩm thành công']);
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function delete($id)
    {
        $product = ProductModel::find($id);
        if (isset($product->image) && Storage::exists(str_replace('/storage', 'public', $product->image))) {
            Storage::delete(str_replace('/storage', 'public', $product->image));
        }
        $data_image = ProductImageModel::where('product_id', $id)->get();
        if ($data_image) {
            foreach ($data_image as $value) {
                if (isset($value->image) && Storage::exists(str_replace('/storage', 'public', $value->image))) {
                    Storage::delete(str_replace('/storage', 'public', $value->image));
                }
                $value->delete();
            }
        }
        $product_color = ProductColorModel::where('product_id', $id)->get();
        foreach ($product_color as $item) {
            ProductSizeModel::where('color_id', $item->id)->delete();
            if (isset($item->image) && Storage::exists(str_replace('/storage', 'public', $item->image))) {
                Storage::delete(str_replace('/storage', 'public', $item->image));
            }
            $item->delete();
        }
        $product->delete();

        return back()->with(['success' => 'Xóa sản phẩm thành công']);

    }

    public function edit($id)
    {
        $product = ProductModel::find($id);
        $category_id = Category::find($product->category_id);
        $category = Category::where('parent_id',0)->get();
        $category_2 = Category::where('parent_id', $category_id->parent_id)->get();
        $parent_id = $category_id->parent_id;
        $product_color = ProductColorModel::where('product_id',$product->id)->get();

        $data['product'] = $product;
        $data['image_variant'] = ProductImageModel::where('product_id', $id)->get();
        $data['category'] = $category;
        $data['category_2'] = $category_2;
        $data['parent_id'] = $parent_id;
        $data['product_color'] = $product_color;
        $data['titlePage'] = 'Admin | Sản Phẩm';
        $data['page_menu'] = 'product';
        $data['page_sub'] = null;
        return view('admin.products.edit', $data);
    }

    public function update($id, Request $request)
    {
        try {
            $attribute = $request->variant;
            $product = ProductModel::find($id);
            $category = Category::find($request->get('category_children'));
            if (empty($product)) {
                return back()->with(['error' => 'Sản phẩm không tồn tại']);
            }
            if (empty($category)) {
                return back()->with(['error' => 'Vui lòng chọn danh mục để tiếp tục']);
            }
            $display = 0;
            if ($request->display == 'on') {
                $display = 1;
            }
            $is_hot = 0;
            if ($request->get('is_hot') == 'on') {
                $is_hot = 1;
            }
            if (isset($request->file_product)) {
                if (isset($product->image) && Storage::exists(str_replace('/storage', 'public', $product->image))) {
                    Storage::delete(str_replace('/storage', 'public', $product->image));
                }
                $imgPath = Storage::url($request->file('file_product')->store('product', 'public'));
                $product->image = $imgPath;
            }
            $product->category_id = isset($category) ? $category->id : null;
            $product->name = $request->get('name');
            $product->slug = Str::slug($request->get('name'));
            $product->description = $request->get('description');
            $product->style = $request->get('style');
            $product->type = $request->get('type');
            $product->display = $display;
            $product->is_hot = $is_hot;
            $product->save();

            $this->add_img_product($request, $product->id);
            $this->add_and_update_attribute_product($attribute, $product);
            return \redirect()->route('admin.products.index')->with(['success' => 'Sửa sản phẩm thành công']);
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    /**
     * delete img variant
     **/
    public function deleteImg(Request $request)
    {
        try {
            $img = ProductImageModel::find($request->get('id'));
            if (isset($img->image) && Storage::exists(str_replace('/storage', 'public', $img->image))) {
                Storage::delete(str_replace('/storage', 'public', $img->image));
            }
            $img->delete();
            $data['status'] = true;
            return $data;
        } catch (\Exception $exception) {
            $data['status'] = false;
            $data['msg'] = $exception->getMessage();
            return $data;
        }
    }

    /**
     * Delete Product Attribute
     **/
    public function deleteColor($id)
    {
        try {
            $product_color = ProductColorModel::find($id);
            if (isset($product_color->image) && Storage::exists(str_replace('/storage', 'public', $product_color->image))) {
                Storage::delete(str_replace('/storage', 'public', $product_color->image));
            }
            $product_size = ProductSizeModel::where('color_id',$product_color->id)->delete();
            $product_color->delete();
            return back()->with(['success' => 'Xóa màu sản phẩm thành công']);
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    /**
     * Delete Product Value
     **/
    public function deleteSize($id)
    {
        try {
            $product_size = ProductSizeModel::find($id);
            $product_size->delete();
            return back()->with(['success' => 'Xóa size số thành công']);
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }

    public function add_img_product($request, $product_id)
    {
        try {
            if ($request->hasFile('images')) {
                $file = $request->file('images');
                foreach ($file as $value) {
                    $imagePath = Storage::url($value->store('product', 'public'));
                    $image_invest = new ProductImageModel([
                        'product_id' => $product_id,
                        'image' => $imagePath,
                    ]);
                    $image_invest->save();
                }
                return true;
            }
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function add_and_update_attribute_product($data_attribute, $product)
    {
        foreach ($data_attribute as $value) {
            $file_name = null;
            if (isset($value['image'])) {
                $file_name = Storage::url($value['image']->store('product', 'public'));
            }
            if (isset($value['color_id'])) {
                $product_color = ProductColorModel::find($value['color_id']);
                $product_color->name = $value['name'];
                $product_color->price = isset($value['price']) ? str_replace(",", "", $value['price']) : 0;
                $product_color->promotional_price = isset($value['promotional_price']) ? str_replace(",", "", $value['promotional_price']) : 0;
                $product_color->image = $file_name??$product_color->image;
                $product_color->save();
            } else {
                $product_color = new ProductColorModel([
                    'product_id' => $product->id,
                    'name' => $value['name'],
                    'image' => $file_name,
                    'price' => isset($value['price']) ? str_replace(",", "", $value['price']) : 0,
                    'promotional_price' => isset($value['promotional_price']) ? str_replace(",", "", $value['promotional_price']) : 0,
                ]);
                $product_color->save();
            }
            if (isset($value['data']) && count($value['data']) >0) {
                foreach ($value['data'] as $item) {
                    if (isset($item['size_id'])) {
                        $product_size = ProductSizeModel::find($item['size_id']);
                        $product_size->name = $item['size'];
                        $product_size->quantity = $item['quantity'];
                        $product_size->save();
                    } else {
                        $product_size = new ProductSizeModel([
                            'color_id' => $product_color->id,
                            'name' => $item['size'],
                            'quantity' => $item['quantity'],
                        ]);
                        $product_size->save();
                    }
                }
            }
        }
        return true;
    }

    /**
     * Product create
     * add size product
     **/
    public function variantSize(Request $request)
    {
        $count = $request->get('count');
        $index = $request->get('index');
        $view = view('admin.products.variant-size', compact('count', 'index'))->render();
        return \response()->json(['html' => $view]);
    }

    /**
     * Product create
     * add color product
     **/
    public function variantColor(Request $request)
    {
        $count = $request->get('count');
        $view = view('admin.products.variant-color', compact('count'))->render();
        return \response()->json(['html' => $view, 'count' => $count]);
    }


}
