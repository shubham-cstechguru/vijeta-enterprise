<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Productvariant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::with('category')->get();
      return view('backend.inc.products.indexproduct',compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.inc.products.product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'title' => 'required|unique:products',
        'files' => 'required',
        'files.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'category_id' => 'required',
        'price' => 'required',
        'description' => 'required',
        'seo_title',
        'seo_keyword',
        'seo_description',
      ]);

        $files = $request->file('files');

        foreach($files as $file) {
          $img_name = $file->getClientOriginalName();
          $image = $file->storeAs('products', $img_name);
          $imgData[] = $img_name;
        }



        $fileModal = json_encode($imgData);


      // $image = $request->image->store('products');

      Product::create([
        'title' => $request->title,
        'image' => $fileModal,
        'category_id' => $request->category_id,
        'price' => $request->price,
        'description' => $request->description,
        'slug' => Str::slug($request->title, '-'),
        'seo_title' => $request->seo_title,
        'seo_keyword' => $request->seo_keyword,
        'seo_description' => $request->seo_description,
      ]);


      return redirect(route('admin.product.index'))->with('files', $imgData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $data = compact('product', 'categories');
        return view('backend.inc.products.product', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
      $product->fill([
        'title' => $request->title,
        'category_id' => $request->category_id,
        'price' => $request->price,
        'description' => $request->description,
        'seo_title' => $request->seo_title,
        'seo_keyword' => $request->seo_keyword,
        'seo_description' => $request->seo_description,
      ]);

      if($request->hasFile('files')){
        $files = $request->file('files');

        foreach($files as $file) {
          $img_name = $file->getClientOriginalName();
          $image = $file->storeAs('products', $img_name);
          $imgData[] = $img_name;
        }



        $fileModal = json_encode($imgData);
        $product->image = $fileModal;
      }



      $product->save();


      return redirect(route('admin.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
      $product->delete();
      return redirect(route('admin.product.index'));
    }
}
