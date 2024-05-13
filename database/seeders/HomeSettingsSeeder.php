<?php

namespace Database\Seeders;

use App\Models\HomepageSettings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bannerValue = [
            "banner"        =>  "/assets/video/home-hero.mp4",
            "image"         =>   "/assets/image/hero-product.png",
            "title"         =>   "THE All-NEW",
            "content"       =>   "RAPID PRO",
            "button_title"  =>   "Mua ngay",
            "button_href"   =>   "https://chacos.com"
        ];

        $sbsValue = [
            "title1" => "How you want to live",
            "title2" => "begins with what you put on your feet.",
            "list"   => [
                "1"  => [
                    "title" => "Extra 35% Off Sale",
                    "description" => "Ending our birthday month with a bang! Take an extra 35% off sale items. Now through 4/27. Use code 35YEARS at checkout",
                    "image" => "/assets/image/35-years-35-and-under.gif"
                ],
                "2"  => [
                    "title" => "Come Hang Out",
                    "description" => "We're hitting the road again in 2024 and can't wait to get together and celebrate our 35th birthday at the Chaco For Life Tour!",
                    "image" => "/assets/image/come-hang-out.png"
                ],
                "3"  => [
                    "title" => "Go To Townes",
                    "description" => "Comfy enough to go, go, go from day one, the Townes is an instant classic and your next go-to sandal for the everyday.",
                    "image" => "/assets/image/go-to-townes_1.png"
                ]
            ]
        ];

        $saleAlongValue = [
            "title" => "What's YOUR STYLE?",
            "list"  => [
                "/assets/image/shoes.png",
                "/assets/image/shoes.png",
                "/assets/image/shoes.png",
                "/assets/image/shoes.png",
                "/assets/image/shoes.png",
                "/assets/image/shoes.png",
                "/assets/image/shoes.png"
            ]
        ];

        $favoritesValue = [
            "hashtag"             => "CHACONATION FAVORITES",
            "banner"              => "/assets/image/banner1.png",
            "banner_mobile"       => "/assets/image/banner-mobile.png",
            "left_image"          => "/assets/image/home-favorites-20240218.gif",
            "right_image"         => "/assets/image/pick.png",
            "right_image_mobile"  => "/assets/image/pick-you.png"
        ];

        $boxAroundValue = [
            "title"     => "Around the Chacosphere",
            "content"   => "Join the #ChacoNation on Instagram",
            "row1"      => [
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
            ],
            "row2"      => [
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
            ],
            "row3"      => [
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
                "https://kenh14cdn.com/thumb_w/620/203336854389633024/2024/3/22/photo-1-17110846772691715316409.jpg",
            ],
        ];

        //BANNER
        HomepageSettings::create([
            'type' => 'banner',
            'value' => json_encode($bannerValue),
            'isActive' => 1,
        ]);

        //SHOP BY STYLE
        HomepageSettings::create([
            'type' => 'shop_by_style',
            'value' => json_encode($sbsValue),
            'isActive' => 1,
        ]);

        //SALE ALONG
        HomepageSettings::create([
            'type' => 'sale_along',
            'value' => json_encode($saleAlongValue),
            'isActive' => 1,
        ]);

        //FAVORITES
        HomepageSettings::create([
            'type' => 'favorites',
            'value' => json_encode($favoritesValue),
            'isActive' => 1,
        ]);

        //FAVORITES
        HomepageSettings::create([
            'type' => 'box_around',
            'value' => json_encode($boxAroundValue),
            'isActive' => 1,
        ]);
    }
}
