<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\TechnologyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    public function index(Request $request)
    {
        $titlePage = 'List technology';
        $page_menu = 'technology';
        $page_sub = null;
        if (isset($request->key_search)) {
            $listData = TechnologyModel::Where('title', 'like', '%' . $request->get('key_search') . '%')
                ->orderBy('created_at', 'desc')->paginate(10);
        } else {
            $listData = TechnologyModel::orderBy('created_at', 'desc')->paginate(10);
        }

        return view('admin.technology.index', compact('titlePage', 'page_menu', 'listData', 'page_sub'));
    }

    public function create()
    {
        $titlePage = 'Technology';
        $page_menu = 'technology';
        $page_sub = null;
        $category = Category::where('parent_id','!=',0)->get();
        return view('admin.technology.create', compact('titlePage', 'page_menu', 'page_sub','category'));
    }

    public function store(Request $request)
    {
        try {
            $imagePath = null;
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $imagePath = Storage::url($file->store('product', 'public'));
            }

            $technology = new TechnologyModel();
            $technology->title = $request->get('title');
            $technology->slug = Str::slug($request->get('title'));
            $technology->image = $imagePath;
            $technology->describe = $request->get('describe');
            $technology->category_id = $request->get('category_id');
            $technology->content = $request->get('content');
            $technology->save();

            return \redirect()->route('admin.technology.index')->with(['success' => 'Thêm dữ liệu thành công']);

        } catch (\Exception $exception) {
            dd($exception);
        }
    }

    public function delete($id)
    {
        $technology = TechnologyModel::where('id', $id)->first();
        if (isset($technology->image) && Storage::exists(str_replace('/storage', 'public', $technology->image))) {
            Storage::delete(str_replace('/storage', 'public', $technology->image));
        }
        $technology->delete();

        return \redirect()->route('admin.technology.index')->with(['success' => 'Xóa dữ liệu thành công']);
    }

    public function edit($id)
    {
        $technology = TechnologyModel::find($id);
        $titlePage = 'Bài viết';
        $page_menu = 'technology';
        $page_sub = null;
        $category = Category::where('parent_id','!=',0)->get();
        return view('admin.technology.edit', compact('technology', 'titlePage', 'page_menu', 'page_sub','category'));
    }

    public function update($id, Request $request)
    {
        try {
            $technology = TechnologyModel::find($id);
            if (empty($technology)) {
                return back()->with(['error' => 'Dữ liệu không tồn tại']);
            }
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $imagePath = Storage::url($file->store('product', 'public'));
                $technology->image = $imagePath;
            }
            $technology->title = $request->get('title');
            $technology->slug = Str::slug($request->get('title'));
            $technology->category_id = $request->get('category_id');
            $technology->describe = $request->get('describe');
            $technology->content = $request->get('content');
            $technology->save();
            return \redirect()->route('admin.technology.index')->with(['success' => 'Cập nhật dữ liệu thành công']);
        } catch (\Exception $exception) {
            return back()->with(['error' => $exception->getMessage()]);
        }
    }
}
