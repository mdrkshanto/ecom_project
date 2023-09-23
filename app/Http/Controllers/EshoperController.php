<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class EshoperController extends Controller
{
    public function index()
    {
        $latestProducts = Product::where('status','1')->where('stock_amount','>=','1')
            ->latest()->take(8)->get();
        $featuredProducts = Product::where('status','1')
            ->where('stock_amount','>=','1')
            ->where('featured_status','1')
            ->take(8)->get();
        $carouselProducts = Product::where('status','1')
            ->where('stock_amount','>=','1')
            ->where('carousel_status','1')
            ->take(4)->get();
        $mostViewedProducts = Product::where('status','1')
            ->where('stock_amount','>=','1')
            ->latest('hit_count')
            ->take(8)->get();
        $brands = Brand::where('status','1')->get();

        return view('website.home.index',[
            'latestProducts'=>$latestProducts,
            'featuredProducts'=>$featuredProducts,
            'carouselProducts'=>$carouselProducts,
            'mostViewedProducts'=>$mostViewedProducts,
            'brands'=>$brands
        ]);

    }

    public function shopProducts()
    {
        return view('website.shop-products.index',[
            'products'=>Product::latest('created_at')
                ->where('status','1')
                ->where('stock_amount','>','0')
                ->paginate(8)
        ]);
    }

    public function categoryProducts($slug)
    {
        return view('website.category.index',[
            'category'=>Category::where('slug',$slug)
                ->where('status','1')
                ->whereHas('products',function ($query){
                    $query->where('stock_amount','>=','1')->where('status','1');
                })
                ->paginate(8)
        ]);
    }

    public function subcategoryProducts($slug)
    {
        return view('website.category.index',[
            'category'=>Subcategory::where('slug',$slug)
                ->whereHas('products',function ($query){
                    $query->where('stock_amount','>=','1')->where('status','1');
                })
                ->paginate(8)
        ]);
    }

    public function productDetail($slug)
    {
        return view('website.product.index',[
            'product'=>Product::where('slug',$slug)->first()
        ]);
    }

    public function search(Request $request)
    {
        $products = Product::where('status','1')
            ->where('name', 'like', "%{$request->search}%")
            ->orWhere('short_description', 'like', "%{$request->search}%")
            ->orWhere('long_description', 'like', "%{$request->search}%")
            ->paginate(8);
        return view('website.shop-products.index',['products'=>$products]);
    }
}
