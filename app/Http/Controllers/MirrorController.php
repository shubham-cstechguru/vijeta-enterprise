<?php

namespace App\Http\Controllers;

use App\Models\lense;
use App\Models\mirror;
use Illuminate\Http\Request;

class MirrorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mirrors = Mirror::get();
        return view('backend.inc.mirrors.indexmirror',compact('mirrors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.inc.mirrors.mirror');
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

        Mirror::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect(route('admin.mirror.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\mirror  $mirror
     * @return \Illuminate\Http\Response
     */
    public function show(mirror $mirror)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\mirror  $mirror
     * @return \Illuminate\Http\Response
     */
    public function edit(mirror $mirror)
    {
        return view('backend.inc.mirrors.mirror', compact('mirror'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\mirror  $mirror
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mirror $mirror)
    {
        $mirror->fill([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $mirror->save();

        return redirect(route('admin.mirror.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\mirror  $mirror
     * @return \Illuminate\Http\Response
     */
    public function destroy(mirror $mirror)
    {
        $mirror->delete();
        return redirect(route('admin.mirror.index'));
    }
}
