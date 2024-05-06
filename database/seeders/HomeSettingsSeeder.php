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
            "list" => [
                "1" => [
                    "title" => "Extra 35% Off Sale",
                    "description" => "Ending our birthday month with a bang! Take an extra 35% off sale items. Now through 4/27. Use code 35YEARS at checkout",
                    "image" => "/assets/image/35-years-35-and-under.gif"
                ],
                "2" => [
                    "title" => "Come Hang Out",
                    "description" => "We're hitting the road again in 2024 and can't wait to get together and celebrate our 35th birthday at the Chaco For Life Tour!",
                    "image" => "/assets/image/come-hang-out.png"
                ],
                "3" => [
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
    }
}
