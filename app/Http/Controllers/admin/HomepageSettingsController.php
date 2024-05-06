<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class HomepageSettingsController extends Controller
{
    public function banner()
    {
        $page_menu = 'homepage';
        $page_sub = 'banner';

        $banner = HomepageSettings::where('type', 'banner')->first();

        $isActive = $banner->isActive ?? 0;

        $banner = json_decode($banner->value);

        return view('admin.settings.banner')->with(compact('page_menu', 'page_sub', 'banner', 'isActive'));
    }

    public function bannerUpdate(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'banner'        => 'nullable|mimes:mp4|max:10240',
                'image'         => 'nullable|mimes:png|max:10240',
                'title'         => 'nullable|string|max:10',
                'content'       => 'nullable|string|max:10',
                'button_title'  => 'nullable|string|max:10',
                'button_href'   => 'nullable|url',
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $banner = HomepageSettings::where('type', 'banner')->first();

            $bannerValue = json_decode($banner->value);

            // BANNER
            if ($request->hasFile('banner')) {
                $bannerPath = Storage::url($request->file('banner')->store('banner', 'public'));

                //Delete existed
                if (isset($bannerValue->banner) && Storage::exists(str_replace('/storage', 'public', $bannerValue->banner))) {
                    Storage::delete(str_replace('/storage', 'public', $bannerValue->banner));
                }

                $validatedData['banner'] = $bannerPath;
            } else {
                // Use the existing image if no new file is uploaded
                $validatedData['banner'] = $bannerValue->banner ?? null;
            }

            // IMAGES
            if ($request->hasFile('image')) {
                $imagePath = Storage::url($request->file('image')->store('banner', 'public'));

                //Delete existed
                if (isset($bannerValue->image) && Storage::exists(str_replace('/storage', 'public', $bannerValue->image))) {
                    Storage::delete(str_replace('/storage', 'public', $bannerValue->image));
                }

                $validatedData['image'] = $imagePath;
            } else {
                // Use the existing image if no new file is uploaded
                $validatedData['image'] = $bannerValue->image ?? null;
            }

            HomepageSettings::updateOrCreate([
                'type' => 'banner',
            ], [
                'value' => json_encode($validatedData),
                'isActive' => $request->input('isActive') ? 1 : 0,
            ]);

            toastr()->success("Thay đổi cấu hình banner thành công");
            return back();
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back()->withInput();
        }
    }

    public function shopByStyle()
    {
        $page_menu = 'homepage';
        $page_sub = 'style';

        $sbs = HomepageSettings::where('type', 'shop_by_style')->first();

        $isActive = $sbs->isActive ?? 0;

        $sbs = json_decode($sbs->value);

        return view('admin.settings.shop-by-style')->with(compact('page_menu', 'page_sub', 'isActive', 'sbs'));
    }

    public function shopByStyleUpdate(Request $request)
    {
        try {
            // Update SBS info and add to list
            $validated = Validator::make($request->all(), [
                'title1'        => 'nullable|string|max:30',
                'title2'        => 'nullable|string|max:30',
                //Here's data of new store list
                'image'         => 'nullable|mimes:jpeg,png,gif|max:5120',
                'title'         => 'nullable|string|max:20',
                'description'   => 'nullable|string',
                'button_title'  => 'nullable|string|max:10',
                'button_href'   => 'nullable|url',
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                session()->flash('open_store_modal', true);
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $sbs = HomepageSettings::where('type', 'shop_by_style')->first();

            $sbsValue = json_decode($sbs->value, true);

            $list = $sbsValue['list'] ?? [];

            $newKey = count($list) + 1;

            // IMAGES
            if ($request->hasFile('image')) {
                if ($newKey > 3) {
                    toastr()->error("Bạn chỉ thêm được tối đa 3 biểu ngữ");
                    session()->flash('open_store_modal', true);
                    return back()->withInput();
                }

                $imagePath = Storage::url($request->file('image')->store('sbs', 'public'));

                $newItem = [
                    'image' => $imagePath,
                    'title' => $request->input('title') ?? '',
                    'description'   => $request->input('description') ?? '',
                    'button_title'  => $request->input('button_title') ?? '',
                    'button_href'   => $request->input('button_href') ?? '#',
                ];

                $list[$newKey] = $newItem;

                $sbsValue['list'] = $list;

                $updatedJsonData = json_encode($sbsValue);

                $sbs->value = $updatedJsonData;
                $sbs->save();
                toastr()->success("Thêm biểu ngữ thành công");
                return back();
            }

            HomepageSettings::updateOrCreate([
                'type' => 'shop_by_style',
            ], [
                'value' => json_encode($validatedData),
                'isActive' => $request->input('isActive') ? 1 : 0,
            ]);

            toastr()->success("Thay đổi cấu hình shop by style thành công");
            return back();
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            session()->flash('open_store_modal', true);
            return back()->withInput();
        }
    }

    public function shopByStyleListUpdate(Request $request, $key)
    {
        try {
            // Update SBS list
            $validated = Validator::make($request->all(), [
                'image'         => 'nullable|mimes:jpeg,png,gif|max:5120',
                'title'         => 'required|string|max:20',
                'description'   => 'nullable|string',
                'button_title'  => 'required|string|max:10',
                'button_href'   => 'required|url',
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                session()->put('show_update_modal_ids', [$key]);
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $sbs = HomepageSettings::where('type', 'shop_by_style')->first();

            $sbsValue = json_decode($sbs->value, true);

            $list = $sbsValue['list'][$key] ?? [];

            $changedItem = [];
            // IMAGES
            if ($request->hasFile('image')) {

                $imagePath = Storage::url($request->file('image')->store('sbs', 'public'));

                //Delete existed
                if (isset($list['image']) && Storage::exists(str_replace('/storage', 'public', $list['image']))) {
                    Storage::delete(str_replace('/storage', 'public', $list['image']));
                }
                $changedItem['image'] = $imagePath;
            } else {
                $changedItem['image'] = $list['image'];
            }

            $changedItem['title'] = $request->input('title') ?? '';
            $changedItem['description'] = $request->input('description') ?? '';
            $changedItem['button_title'] = $request->input('button_title') ?? '';
            $changedItem['button_href'] = $request->input('button_href') ?? '';

            $sbsValue['list'][$key] = $changedItem;

            $updatedJsonData = json_encode($sbsValue);

            $sbs->value = $updatedJsonData;
            $sbs->save();

            toastr()->success("Chỉnh sửa biểu ngữ thành công");
            return back();
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            session()->put('show_update_modal_ids', [$key]);
            return back()->withInput();
        }
    }

    public function shopByStyleListReorder(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'newOrder' => 'required|array|size:3|distinct',
                'newOrder.*' => 'integer',
            ]);

            if ($validated->fails()) {
                return response()->json(['error' => -1, 'message' => $validated->errors()->first()], 400);
            }

            $validatedData = $validated->validated();

            $newOrder = $validatedData['newOrder'];

            $sbs = HomepageSettings::where('type', 'shop_by_style')->first();

            $sbsValue = json_decode($sbs->value, true);

            $list = $sbsValue['list'];

            // Reorder the $list array based on the $newOrder keys
            $reorderedList = [];
            foreach ($newOrder as $key => $index) {
                $reorderedList[$key + 1] = $list[$index];
            }

            // Update the value in $sbsValue
            $sbsValue['list'] = $reorderedList;

            // Update the value in the database
            $sbs->value = json_encode($sbsValue);
            $sbs->save();

            return response()->json(['error' => 0, 'message' => "Thay đổi thứ tự thành công"]);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }

    public function shopByStyleDestroy($key)
    {
        try {
            if (!$key) {
                return response()->json(['error' => -1, 'message' => "Key không được trống"], 400);
            }

            $sbs = HomepageSettings::where('type', 'shop_by_style')->first();

            if (!$sbs) {
                return response()->json(['error' => -1, 'message' => "Không tìm thấy"], 400);
            }

            $sbsValue = json_decode($sbs->value, true);

            if (isset($sbsValue['list'][$key])) {
                unset($sbsValue['list'][$key]);
                $sbsValue['list'] = array_values($sbsValue['list']);
                $sbsValue['list'] = array_combine(range(1, count($sbsValue['list'])), $sbsValue['list']);
            }

            $sbs->value = json_encode($sbsValue);
            $sbs->save();

            return response()->json(['error' => 0, 'message' => "Xóa biểu ngữ thành công"]);
        } catch (\Exception $e) {
            return response()->json(['error' => -1, 'message' => $e->getMessage()], 400);
        }
    }

    public function saleAlong()
    {
        $page_menu = 'homepage';
        $page_sub = 'sale_along';

        $sale = HomepageSettings::where('type', 'sale_along')->first();

        $isActive = $sale->isActive ?? 0;

        $sale = json_decode($sale->value, true);

        return view('admin.settings.sale-along')->with(compact('page_menu', 'page_sub', 'isActive', 'sale'));
    }

    public function saleAlongUpdate(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'title'        => 'required|string|max:30',
                'file.*'       => 'required|file|mimes:jpeg,jpg,png,gif|max:5120',
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $oldFiles = $request->input('old_file');

            $sbs = HomepageSettings::where('type', 'sale_along')->first();

            $currentFiles = json_decode($sbs->value, true)['list'] ?? [];

            $newFiles = $request->file('file');

            // Find the missing index
            $missingIndex = [];
            if ($currentFiles != null && $oldFiles != null) {
                $missingIndex = array_diff(array_keys($currentFiles), array_keys($oldFiles));
            }

            // Remove the missing index from $currentFiles and delete the URL file
            if (!empty($missingIndex)) {
                $index = array_keys($missingIndex);

                foreach ($index as $value) {
                    if (isset($currentFiles[$value]) && Storage::exists(str_replace('/storage', 'public', parse_url($currentFiles[$value], PHP_URL_PATH)))) {
                        //Convert to `/storage/...`
                        Storage::delete(str_replace('/storage', 'public', parse_url($currentFiles[$value], PHP_URL_PATH)));
                    }

                    unset($currentFiles[$value]);
                }
            }

            // Process and store the uploaded new files
            if (isset($newFiles)) {
                foreach ($newFiles as $index => $newFile) {
                    // Remove the old file if it exists
                    if (isset($currentFiles[$index]) && Storage::exists(str_replace('/storage', 'public', parse_url($currentFiles[$index], PHP_URL_PATH)))) {
                        Storage::delete(str_replace('/storage', 'public', parse_url($currentFiles[$index], PHP_URL_PATH)));
                    }

                    $itemPath = $newFile->store('sale_along', 'public');
                    $fileUrl = asset('storage/' . $itemPath);

                    // Add the URL to the list
                    $currentFiles[$index] = $fileUrl;
                }
            }

            $data = [
                'title' => $validatedData['title'],
                'list' => array_values($currentFiles)
            ];

            HomepageSettings::updateOrCreate([
                'type' => 'sale_along',
            ], [
                'value' => json_encode($data),
                'isActive' => $request->input('isActive') ? 1 : 0,
            ]);

            toastr()->success("Thay đổi cấu hình sale along thành công");
            return back();
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back()->withInput();
        }
    }

    public function favorites()
    {
        $page_menu = 'homepage';
        $page_sub = 'favorites';

        return view('admin.settings.favorites')->with(compact('page_menu', 'page_sub'));
    }

    public function adventurous()
    {
        $page_menu = 'homepage';
        $page_sub = 'adventurous';

        return view('admin.settings.adventurous')->with(compact('page_menu', 'page_sub'));
    }
}
