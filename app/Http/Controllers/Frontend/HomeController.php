<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Home;
use App\Models\Category;
use App\Models\User;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categories = Category::with('products')->get();
      $products = Product::get();
      $data = compact('products','categories');
      return view('frontend.inc.welcome',$data);
    }
}
