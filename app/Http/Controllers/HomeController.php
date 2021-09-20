<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryProduct;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        //seo 
        $meta_desc = "Chuyên bán thiết bị giải trí, phụ kiện điện tử, phụ kiện điện thoại, chơi game";
        $meta_keywords = "thiết bị giải trí, phụ kiện, chơi game, game giải trí";
        $url_canonical = $request->url();
        $meta_title = "WhyTech | Thiết bị giải trí, phụ kiện điện tử, phụ kiện điện thoại, chơi game chính hãng";
        //--seo

        $categories = CategoryProduct::where('category_parent', 0)->where('category_status', 1)->orderBy('category_name', 'asc')->get()->take(5);
        $brands = Brand::where('brand_status', 1)->orderBy('brand_name', 'asc')->get();
        $products = Product::where('product_status', 1)->latest()->get()->take(8);
        $top_products = Product::where('product_status', 1)->orderBy('product_sold', 'desc')->latest()->get()->take(4);
        $all_products = Product::where('product_status', 1)->get();
        $sliders = Slider::where('slider_status', 1)->orderBy('slider_id', 'desc')->get()->take(3);

        return view('pages.home', compact('categories', 'brands', 'products', 'top_products', 'all_products', 'sliders', 'meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
    }

    public function show(Request $request)
    {
        //seo 
        $meta_desc = "Chuyên bán thiết bị giải trí, phụ kiện điện tử, phụ kiện điện thoại, chơi game";
        $meta_keywords = "thiết bị giải trí, phụ kiện, chơi game, game giải trí";
        $url_canonical = $request->url();
        $meta_title = "WhyTech | Thiết bị giải trí, phụ kiện điện tử, phụ kiện điện thoại, chơi game chính hãng";
        //--seo

        $categories = CategoryProduct::where('category_parent', 0)->where('category_status', 1)->orderBy('category_order', 'asc')->get();
        $brands = Brand::where('brand_status', 1)->orderBy('brand_name', 'asc')->get();
        $products = Product::where('product_status', 1)->latest()->paginate(12);
        $all_products = Product::where('product_status', 1)->get();

        return view('pages.shop', compact('categories', 'brands', 'products', 'all_products', 'meta_desc', 'meta_keywords', 'url_canonical', 'meta_title'));
    }
}
