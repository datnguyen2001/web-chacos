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

        $favorites = HomepageSettings::where('type', 'favorites')->first();

        $isActive = $favorites->isActive ?? 0;

        $favorites = json_decode($favorites->value);

        return view('admin.settings.favorites')->with(compact(
            'page_menu',
            'page_sub',
            'favorites',
            'isActive'
        ));
    }

    public function favoritesUpdate(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'hashtag'              => 'required|string|max:50',
                'banner'               => 'nullable|mimes:jpeg,png,gif|max:5120',
                'banner_mobile'        => 'nullable|mimes:jpeg,png,gif|max:5120',
                'left_image'           => 'nullable|mimes:jpeg,png,gif|max:5120',
                'right_image'          => 'nullable|mimes:jpeg,png,gif|max:5120',
                'right_image_mobile'   => 'nullable|mimes:jpeg,png,gif|max:5120',
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $favorites = HomepageSettings::where('type', 'favorites')->first();

            $favoritesValue = json_decode($favorites->value);

            // BANNER
            if ($request->hasFile('banner')) {
                $bannerPath = Storage::url($request->file('banner')->store('favorites', 'public'));

                //Delete existed
                if (isset($favoritesValue->banner) && Storage::exists(str_replace('/storage', 'public', $favoritesValue->banner))) {
                    Storage::delete(str_replace('/storage', 'public', $favoritesValue->banner));
                }

                $validatedData['banner'] = $bannerPath;
            } else {
                // Use the existing image if no new file is uploaded
                $validatedData['banner'] = $favoritesValue->banner ?? null;
            }

            // BANNER MOBILE
            if ($request->hasFile('banner_mobile')) {
                $bannerPath = Storage::url($request->file('banner_mobile')->store('favorites', 'public'));

                //Delete existed
                if (isset($favoritesValue->banner_mobile) && Storage::exists(str_replace('/storage', 'public', $favoritesValue->banner_mobile))) {
                    Storage::delete(str_replace('/storage', 'public', $favoritesValue->banner_mobile));
                }

                $validatedData['banner_mobile'] = $bannerPath;
            } else {
                // Use the existing image if no new file is uploaded
                $validatedData['banner_mobile'] = $favoritesValue->banner_mobile ?? null;
            }

            // LEFT IMAGES
            if ($request->hasFile('left_image')) {
                $imagePath = Storage::url($request->file('left_image')->store('favorites', 'public'));

                //Delete existed
                if (isset($favoritesValue->left_image) && Storage::exists(str_replace('/storage', 'public', $favoritesValue->left_image))) {
                    Storage::delete(str_replace('/storage', 'public', $favoritesValue->left_image));
                }

                $validatedData['left_image'] = $imagePath;
            } else {
                // Use the existing image if no new file is uploaded
                $validatedData['left_image'] = $favoritesValue->left_image ?? null;
            }

            // RIGHT IMAGES
            if ($request->hasFile('right_image')) {
                $imagePath = Storage::url($request->file('right_image')->store('favorites', 'public'));

                //Delete existed
                if (isset($favoritesValue->right_image) && Storage::exists(str_replace('/storage', 'public', $favoritesValue->right_image))) {
                    Storage::delete(str_replace('/storage', 'public', $favoritesValue->right_image));
                }

                $validatedData['right_image'] = $imagePath;
            } else {
                // Use the existing image if no new file is uploaded
                $validatedData['right_image'] = $favoritesValue->right_image ?? null;
            }

            // RIGHT IMAGES MOBILE
            if ($request->hasFile('right_image_mobile')) {
                $imagePath = Storage::url($request->file('right_image_mobile')->store('favorites', 'public'));

                //Delete existed
                if (isset($favoritesValue->right_image_mobile) && Storage::exists(str_replace('/storage', 'public', $favoritesValue->right_image_mobile))) {
                    Storage::delete(str_replace('/storage', 'public', $favoritesValue->right_image_mobile));
                }

                $validatedData['right_image_mobile'] = $imagePath;
            } else {
                // Use the existing image if no new file is uploaded
                $validatedData['right_image_mobile'] = $favoritesValue->right_image_mobile ?? null;
            }

            HomepageSettings::updateOrCreate([
                'type' => 'favorites',
            ], [
                'value' => json_encode($validatedData),
                'isActive' => $request->input('isActive') ? 1 : 0,
            ]);

            toastr()->success("Thay đổi cấu hình favorites thành công");
            return back();
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            return back()->withInput();
        }
    }

    public function boxAround()
    {
        $page_menu = 'homepage';
        $page_sub = 'box-around';

        $box = HomepageSettings::where('type', 'box_around')->first();

        $isActive = $box->isActive ?? 0;

        $box = json_decode($box->value, true);

        return view('admin.settings.box-around')->with(compact('page_menu', 'page_sub', 'box', 'isActive'));
    }

    public function boxAroundUpdate(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'title'     => 'nullable|string|max:50',
                'content'   => 'nullable|string|max:50',
                'file1.*'   => 'required|file|mimes:jpeg,jpg,png,gif|max:5120',
                'file2.*'   => 'required|file|mimes:jpeg,jpg,png,gif|max:5120',
                'file3.*'   => 'required|file|mimes:jpeg,jpg,png,gif|max:5120',
            ]);

            if ($validated->fails()) {
                toastr()->error($validated->errors()->first());
                return back()->withInput();
            }

            $validatedData = $validated->validated();

            $oldFiles1 = $request->input('old_file1');

            $oldFiles2 = $request->input('old_file2');

            $oldFiles3 = $request->input('old_file3');

            $newFiles1 = $request->file('file1');

            $newFiles2 = $request->file('file2');

            $newFiles3 = $request->file('file3');

            $box = HomepageSettings::where('type', 'box_around')->first();

            // HANDLE ROW 1
            $currentRow1 = json_decode($box->value, true)['row1'] ?? [];

            // Find the missing index
            $missingIndex1 = [];
            if ($currentRow1 != null && $oldFiles1 != null) {
                $missingIndex1 = array_diff(array_keys($currentRow1), array_keys($oldFiles1));
            }

            // Remove the missing index from $currentFiles1 and delete the URL file
            if (!empty($missingIndex1)) {
                $index = array_keys($missingIndex1);

                foreach ($index as $value) {
                    if (isset($currentRow1[$value]) && Storage::exists(str_replace('/storage', 'public', $currentRow1[$value]))) {
                        Storage::delete(str_replace('/storage', 'public', $currentRow1[$value]));
                    }

                    unset($currentRow1[$value]);
                }
            }

            // Process and store the uploaded new files
            if (isset($newFiles1)) {
                foreach ($newFiles1 as $index => $newFile) {
                    // Remove the old file if it exists
                    if (isset($currentRow1[$index]) && Storage::exists(str_replace('/storage', 'public', $currentRow1[$index]))) {
                        Storage::delete(str_replace('/storage', 'public', $currentRow1[$index]));
                    }

                    $fileUrl = Storage::url($newFile->store('box_around', 'public'));

                    // Add the URL to the list
                    $currentRow1[$index] = $fileUrl;
                }
            }
            // HANDLE ROW 1

            // HANDLE ROW 2
            $currentRow2 = json_decode($box->value, true)['row2'] ?? [];

            // Find the missing index
            $missingIndex2 = [];
            if ($currentRow2 != null && $oldFiles2 != null) {
                $missingIndex2 = array_diff(array_keys($currentRow2), array_keys($oldFiles2));
            }

            // Remove the missing index from $currentFiles2 and delete the URL file
            if (!empty($missingIndex2)) {
                $index = array_keys($missingIndex2);

                foreach ($index as $value) {
                    if (isset($currentRow2[$value]) && Storage::exists(str_replace('/storage', 'public', $currentRow2[$value]))) {
                        Storage::delete(str_replace('/storage', 'public', $currentRow2[$value]));
                    }

                    unset($currentRow2[$value]);
                }
            }

            // Process and store the uploaded new files
            if (isset($newFiles2)) {
                foreach ($newFiles2 as $index => $newFile) {
                    // Remove the old file if it exists
                    if (isset($currentRow2[$index]) && Storage::exists(str_replace('/storage', 'public', $currentRow2[$index]))) {
                        Storage::delete(str_replace('/storage', 'public', $currentRow2[$index]));
                    }

                    $fileUrl = Storage::url($newFile->store('box_around', 'public'));

                    // Add the URL to the list
                    $currentRow2[$index] = $fileUrl;
                }
            }
            // HANDLE ROW 2

            // HANDLE ROW 3
            $currentRow3 = json_decode($box->value, true)['row3'] ?? [];

            // Find the missing index
            $missingIndex3 = [];
            if ($currentRow3 != null && $oldFiles3 != null) {
                $missingIndex3 = array_diff(array_keys($currentRow3), array_keys($oldFiles3));
            }

            // Remove the missing index from $currentFiles3 and delete the URL file
            if (!empty($missingIndex3)) {
                $index = array_keys($missingIndex3);

                foreach ($index as $value) {
                    if (isset($currentRow3[$value]) && Storage::exists(str_replace('/storage', 'public', $currentRow3[$value]))) {
                        Storage::delete(str_replace('/storage', 'public', $currentRow3[$value]));
                    }

                    unset($currentRow3[$value]);
                }
            }

            // Process and store the uploaded new files
            if (isset($newFiles3)) {
                foreach ($newFiles3 as $index => $newFile) {
                    // Remove the old file if it exists
                    if (isset($currentRow3[$index]) && Storage::exists(str_replace('/storage', 'public', $currentRow3[$index]))) {
                        Storage::delete(str_replace('/storage', 'public', $currentRow3[$index]));
                    }

                    $fileUrl = Storage::url($newFile->store('box_around', 'public'));

                    // Add the URL to the list
                    $currentRow3[$index] = $fileUrl;
                }
            }
            // HANDLE ROW 3

            $data = [
                'title'   => $request->input('title'),
                'content' => $request->input('content'),
                'row1'    => array_values($currentRow1),
                'row2'    => array_values($currentRow2),
                'row3'    => array_values($currentRow3)
            ];

            HomepageSettings::updateOrCreate([
                'type' => 'box_around',
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
}
