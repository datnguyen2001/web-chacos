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
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
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

        return view('admin.settings.sale-along')->with(compact('page_menu', 'page_sub'));
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
