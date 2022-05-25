<?php

namespace App\Http\Controllers\api\v1;

use App\CPU\BrandManager;
use App\CPU\Helpers;
use App\Model\Shop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ShopController extends Controller
{



    public function index_shop_products()
    {
        
        $BIENS="biens";

        $shop = Shop::where("type_of_shop",$BIENS)->get();

        return response()->json($shop,200);
    }

    public function index_shop_services()
    {
        
        $SERVICES="services";

        $shop = Shop::where("type_of_shop",$SERVICES)->get();

        return response()->json($shop,200);
    }



    public function get_products($brand_id)
    {
        try {
            $products = BrandManager::get_products($brand_id);
        } catch (\Exception $e) {
            return response()->json(['errors' => $e], 403);
        }

        return response()->json($products,200);
    }
}
