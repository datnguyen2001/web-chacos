<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\InforShopModel;
use Illuminate\Http\Request;

class InforShopController extends Controller
{
    public function index($type)
    {
        $page_menu = 'information';
        if ($type == 0){
            $page_sub = 'shipping';
            $page_title = 'Shipping Information';
        }elseif ($type == 1){
            $page_sub = 'return';
            $page_title = 'Returns Exchanges';
        }elseif ($type == 2){
            $page_sub = 'account';
            $page_title = 'Account';
        }else{
            $page_sub = 'faq';
            $page_title = 'FAQ';
        }

        $data = InforShopModel::where('type', $type)->first();

        return view('admin.infor.index')->with(compact(
            'page_menu',
            'page_sub',
            'data',
            'page_title','type'
        ));
    }

    public function save(Request $request,$type){
        $infor = InforShopModel::where('type',$type)->first();
        if ($infor){
            $infor->title = $request->title;
            $infor->content = $request->get('content');
            $infor->type = $type;
            $infor->save();
        }else{
            $shop = new InforShopModel([
                'title'=>$request->title,
                'content'=>$request->get('content'),
                'type'=>$type
            ]);
               $shop->save();
        }

        return redirect()->back()->with(['success'=>"Lưu thông tin thành công"]);
    }
}
