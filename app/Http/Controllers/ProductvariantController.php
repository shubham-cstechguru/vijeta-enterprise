<?php

namespace App\Http\Controllers;

use App\Models\Productvariant;
use App\Models\Productmirrors;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Lense;
use App\Models\Mirror;

class ProductvariantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $prod_var = Productvariant::with('product', 'productmirrors')->where('product_id', $product->id)->get();
        $data = compact('product', 'prod_var');
        return view('backend.inc.products.indexproductvariant', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        $categories = Category::all();
        $lenses = Lense::all();
        $mirrors = Mirror::all();
        $data = compact('categories', 'product', 'lenses', 'mirrors');
        return view('backend.inc.products.productvariant', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product, Request $request)
    {
        $this->validate($request, [
            'lense_id' => 'required',
            'addmore.*.mirror_id' => 'required',
            'addmore.*.price' => 'required'
        ]);

        $prod_var = Productvariant::create([
            'product_id' => $product->id,
            'lense_id' => $request->lense_id,
        ]);

        foreach ($request->addmore as $key => $value) {
            Productmirrors::create([
                'prod_var' => $prod_var->id,
                'mirror_id' => $value['mirror_id'],
                'price' => $value['price']
            ]);
        }

        return redirect(route('admin.productvariant.index', $product->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Productvariant $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        $categories = Category::all();
        $prod_var = Productvariant::find($id);
        $prod_mirror = Productmirrors::where('prod_var', $prod_var->id)->get();
        $lenses = Lense::all();
        $mirrors = Mirror::all();
        $data = compact('categories', 'product', 'lenses', 'mirrors', 'prod_var', 'prod_mirror');
        return view('backend.inc.products.productvariant', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        $prod_var = Productvariant::find($id);

        $prod_mirror = Productmirrors::where('prod_var', $prod_var->id)->get();

        $prod_var->fill([
            'product_id' => $product->id,
            'lense_id' => $request->lense_id,
        ]);

        $prod_mirror->fill([
            'prod_var' => $prod_var->id,
            'mirror_id' => $request->mirror_id,
            'price' => $request->price
        ]);

        $prod_var->save();

        $prod_mirror->save();

        return redirect(route('admin.productvariant.index', $product->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        $var_id = Productvariant::find($id);
        $var_id->delete();
        return redirect(route('admin.productvariant.index', $product->id));
    }
}
