<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('backend.inc.categories.indexcategory',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('backend.inc.categories.category');
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
          'title' => 'required|unique:categories',
          'image' => 'required|image',
          'description' => 'required',
          'seo_title',
          'seo_keyword',
          'seo_description',
        ]);

        $img_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('categories', $img_name);

        Category::create([
          'title' => $request->title,
          'image' => $img_name,
          'description' => $request->description,
          'slug' => Str::slug($request->title, '-'),
          'seo_title' => $request->seo_title,
          'seo_keyword' => $request->seo_keyword,
          'seo_description' => $request->seo_description,
        ]);

        return redirect(route('admin.category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('backend.inc.categories.category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
      $category->fill([
        'title' => $request->title,
        // 'image' => $request->image,
        'description' => $request->description,
        'seo_title' => $request->seo_title,
        'seo_keyword' => $request->seo_keyword,
        'seo_description' => $request->seo_description,
      ]);

      if($request->hasFile('image')){
        $img_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('categories', $img_name);
        $category->image = $image;
      }
      $category->save();

      return redirect(route('admin.category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('admin.category.index'));
    }
}
