<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page_menu = 'category';
        $categories = Category::orderBy('id', 'desc')->get();

        return view('admin.category.index')->with(compact('categories', 'page_menu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'name'          => 'required|string|max:30',
                'slug'          => 'required|unique:categories,slug',
                'parent_id'     => 'required|integer',
                'menu_belong'   => 'nullable',
                'title'   => 'nullable',
                'describe'   => 'nullable',
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                session()->flash('open_store_modal', true);
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            // MENU BELONG
            if (isset($validatedData['menu_belong'])) {
                $validatedData['menu_belong'] = implode(',', $validatedData['menu_belong']);
            }

            // PARENT ID
            $parent_id = $validatedData['parent_id'];

            $category = Category::find($parent_id);

            if ($parent_id != 0) {
                if (!$category || $category->parent_id != 0) {
                    toastr()->error("Danh mục cha không hợp lệ");
                    return back()->withInput();
                }
            }

            Category::create($validatedData);

            toastr()->success("Thêm mới danh mục thành công");
            return back();
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            session()->flash('open_store_modal', true);
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validated = Validator::make($request->all(), [
                'name'          => 'required|string|max:30',
                'slug'          => 'required|unique:categories,slug,' . $id,
                'parent_id'     => 'required|integer',
                'menu_belong'   => 'nullable',
                'title'   => 'nullable',
                'describe'   => 'nullable',
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                session()->put('show_update_modal_ids', [$id]);
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            // MENU BELONG
            if (isset($validatedData['menu_belong'])) {
                $validatedData['menu_belong'] = implode(',', $validatedData['menu_belong']);
            }

            $parent_id = $validatedData['parent_id'];

            $category = Category::find($parent_id);

            if ($parent_id != 0) {
                if (!$category || $category->parent_id != 0) {
                    toastr()->error("Danh mục cha không hợp lệ");
                    return back()->withInput();
                }
            }

            $category = Category::findOrFail($id);

            $category->update([
                'name'          => $validatedData['name'],
                'slug'          => $validatedData['slug'],
                'parent_id'     => $validatedData['parent_id'],
                'menu_belong'   => $validatedData['menu_belong'],
            ]);

            toastr()->success("Chỉnh sửa danh mục thành công");
            return back();
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            session()->put('show_update_modal_ids', [$id]);
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            if (!$id) {
                return response()->json(['error' => -1, 'message' => "Id không được trống"], 400);
            }

            $category = Category::find($id);

            if (!$category) {
                return response()->json(['error' => -1, 'message' => "Không tìm thấy danh mục"], 400);
            }

            DB::transaction(function () use ($id) {
                // Fetch the IDs of child categories
                $childCategoryIds = Category::where('parent_id', $id)->pluck('id')->toArray();

                // Update child categories
                Category::whereIn('id', $childCategoryIds)->update(['parent_id' => 0]);

                // Delete the parent category
                Category::where('id', $id)->delete();
            });

            return response()->json(['error' => 0, 'message' => "Xóa danh mục thành công"]);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }

    public function getChildrenC2 (Request $request)
    {
        try{
            $listCategory = Category::where('parent_id',$request->cate_id)->get();
            $html = null;
            if (count($listCategory)){
                foreach ($listCategory as $value){
                    $option = '<div class="d-flex align-items-center category list_category_children p-1">
                                                <div class="d-flex align-items-center" style="margin-right: 10px"><input type="radio" id="'.$value->id.'" style="width: 20px; height: 20px" value="'.$value->id.'" name="'.$request->get('name').'"></div>
                                                <label for="'.$value->id.'" class="m-0">'.$value->name.'</label>
                                            </div>';
                    $html .= $option;
                }
            }
            $data['html'] = $html;
            $data['status'] = true;
            $data['name'] = $request->get('name');
            return $data;
        }catch (\Exception $exception){
            return $exception->getMessage();
        }
    }
}
