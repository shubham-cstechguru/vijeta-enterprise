<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use App\Models\Productvariant;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($slug)
    {
      $category_id = Category::with('products')->where('slug', $slug)->first();
      $categories = Category::with('products')->get();
      $products = Product::where('category_id', $category_id->id)->with('category')->paginate(100);
      $data = compact('products', 'categories', 'category_id');
      return view('frontend.inc.product', $data);
    }

    public function single($slug)
    {
      $product = Product::with('category')->where('slug', $slug)->first();
      $categories = Category::with('products')->get();
      $prod_var = Productvariant::with('product', 'productmirrors')->where('product_id', $product->id)->get();
      $data = compact('product', 'categories', 'prod_var');
      return view('frontend.inc.singleproduct', $data);
    }
}
