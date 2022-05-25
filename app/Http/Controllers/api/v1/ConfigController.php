<?php

namespace App\Http\Controllers\api\v1;

use App\CPU\Helpers;
use App\CPU\ProductManager;
use App\Http\Controllers\Controller;
use App\Model\Currency;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function configuration()
    {
        $currency = Currency::all();
        return response()->json([
            'system_default_currency' => (int)Helpers::get_business_settings('system_default_currency'),
           // 'digital_payment' => (boolean)Helpers::get_business_settings('digital_payment')['status']??0,
            'base_urls' => [
                'product_image_url' => ProductManager::product_image_path('product'),
                'product_thumbnail_url' => ProductManager::product_image_path('thumbnail'),
                'brand_image_url' => asset('brand'),
                'customer_image_url' => asset('profile'),
                'banner_image_url' => asset('banner'),
                'category_image_url' => asset('category'),
                'review_image_url' => asset('storage/app/public'),
                'seller_image_url' => asset('seller'),
                'shop_image_url' => asset('shop'),
                'notification_image_url' => asset('notification'),
            ],
            'static_urls' => [
                'about_us' => route('about-us'),
                'faq' => route('helpTopic'),
                'terms_&_conditions' => route('terms'),
                'contact_us' => route('contacts'),
                'brands' => route('brands'),
                'categories' => route('categories'),
                'customer_account' => route('user-account'),
            ],
            'currency_list' => $currency,
            'currency_symbol_position' => Helpers::get_business_settings('currency_symbol_position') ?? 'right',
            'maintenance_mode' => (boolean)Helpers::get_business_settings('maintenance_mode') ?? 0,
            'language' => [
                'list' => ['bn' => 'বাংলা', 'en' => 'English']
            ]
        ]);
    }
}
