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

        $isActive = $banner->isActive;

        $banner = json_decode($banner->value);

        return view('admin.settings.banner')->with(compact('page_menu', 'page_sub', 'banner', 'isActive'));
    }

    public function bannerUpdate(Request $request)
    {
        try {
            $validated = Validator::make($request->all(), [
                'banner'        => 'nullable|mimes:mp4|max:5120',
                'image'         => 'nullable|mimes:png|max:5120',
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
        return view('');
    }

    public function saleAlong()
    {
        return view('');
    }

    public function favorites()
    {
        return view('');
    }

    public function adventurous()
    {
        return view('');
    }
}
