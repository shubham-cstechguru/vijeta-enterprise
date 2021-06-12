<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\lense;
use Illuminate\Http\Request;

class LenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lenses = Lense::get();
        return view('backend.inc.lenses.indexlense',compact('lenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.inc.lenses.lense');
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
            'title' => 'required|unique:lenses',
            'description' => 'required'
        ]);

        Lense::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect(route('admin.lense.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\lense  $lense
     * @return \Illuminate\Http\Response
     */
    public function show(lense $lense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\lense  $lense
     * @return \Illuminate\Http\Response
     */
    public function edit(lense $lense)
    {
        return view('backend.inc.lenses.lense', compact('lense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\lense  $lense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lense $lense)
    {
        $lense->fill([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $lense->save();

        return redirect(route('admin.lense.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\lense  $lense
     * @return \Illuminate\Http\Response
     */
    public function destroy(lense $lense)
    {
        $lense->delete();
        return redirect(route('admin.lense.index'));
    }
}
