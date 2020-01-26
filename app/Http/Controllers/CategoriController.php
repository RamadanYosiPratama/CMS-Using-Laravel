<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categori;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Jangan Lupa Manggil use App nya, all semua data latest data yang terakhir disis
        $categori = Categori::latest()->get();
        return view('categori.index',compact('categori')); //compact untuk parsing data
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('categori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dimana categori memanggil fungsi dari Categori yang ada di providers dan redirect itu seperti mengalihkan halaman ke indewx
        $this->validate($request,[
            'nama_kategori'=>'required|min:5',
            'slug'=>'required',
        ]);
        Categori::create($request->all());
        return redirect()->route('categori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categori= Categori::find($id);
        return view('categori.edit',compact('categori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categori = Categori::find($id);
        $categori->update($request->all());
        return redirect()->route('categori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categori = Categori::find($id);
        if(!$categori){
            return redirect()->back();
        }
        $categori->delete();
        return redirect()->route('categori.index');
        }

    }

