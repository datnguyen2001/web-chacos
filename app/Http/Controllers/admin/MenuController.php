<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page_menu = 'menu';
        $menu = Menu::orderBy('order', 'asc')->get();

        return view('admin.menu.index')->with(compact('menu', 'page_menu'));
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
                'order' => 'required|numeric|min:1',
                'name' => 'required|string|max:30',
                'thumbnail' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                session()->flash('open_store_modal', true);
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = Storage::url($request->file('thumbnail')->store('menu', 'public'));
                $validatedData['thumbnail'] = $thumbnailPath;
            }

            Menu::create($validatedData);

            toastr()->success("Thêm mới menu thành công");
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
                'order' => 'required|numeric|min:1',
                'name' => 'required|string|max:30',
                'thumbnail' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                session()->put('show_update_modal_ids', [$id]);
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $menu = Menu::find($id);

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = Storage::url($request->file('thumbnail')->store('menu', 'public'));
                $validatedData['thumbnail'] = $thumbnailPath;

                //Delete existed
                if (isset($menu->thumbnail) && Storage::exists(str_replace('/storage', 'public', $menu->thumbnail))) {
                    Storage::delete(str_replace('/storage', 'public', $menu->thumbnail));
                }
            }

            $menu->update($validatedData);

            toastr()->success("Chỉnh sửa menu thành công");
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

            $menu = Menu::find($id);

            if (!$menu) {
                return response()->json(['error' => -1, 'message' => "Không tìm thấy menu"], 400);
            }

            // Update categories to remove the menu ID
            Category::whereRaw("FIND_IN_SET(?, menu_belong)", [$id])->update([
                'menu_belong' => DB::raw("TRIM(BOTH ',' FROM REPLACE(CONCAT(',', menu_belong, ','), ',$id,', ','))")
            ]);

            //Delete existed
            if (isset($menu->thumbnail) && Storage::exists(str_replace('/storage', 'public', $menu->thumbnail))) {
                Storage::delete(str_replace('/storage', 'public', $menu->thumbnail));
            }

            $menu->delete();

            return response()->json(['error' => 0, 'message' => "Xóa thành công menu"]);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }
}
