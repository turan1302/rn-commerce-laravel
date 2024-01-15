<?php

namespace App\Http\Controllers\api\product;

use App\Http\Controllers\Controller;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function create(Request $request)
    {
        $input = $request->except("_token");
        $result = ProductModel::create($input);

        if ($result){
            return parent::sendResponse("Ürün Eklendi",$result);
        }else{
            return parent::sendError("Ürün Ekleme İşleminde Hata Oluştu");
        }
    }

    public function list()
    {
        $data = ProductModel::orderBy('p_created_at',"desc")->get();
        return parent::sendResponse("",$data);
    }

    public function detail($productId)
    {
        $product = ProductModel::where("p_id",$productId)->first();
        if (!$product){
            return parent::sendError("Ürün Bulunamadı");
        }

        return parent::sendResponse("Ürün Bulundu",$product);
    }

    public function search(Request $request)
    {
        $input = $request->except("_token");

        $search = ProductModel::where([
            ["p_title","like","%".$input['p_title']."%"]
        ])->orderBy("p_created_at","desc")->get();

        return parent::sendResponse("Aranan Kayıt: ".$input['p_title'],$search);
    }
}
