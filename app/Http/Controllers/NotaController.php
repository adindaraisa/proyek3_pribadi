<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    public function create()
    {
        $data = Nota::all();
        return view("page.admin.news.create", compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $request->validate([
                'kode_tenan' => 'required',
                'kode_kasir' => 'required',
                'jumlah_belanja' => 'required',
                'diskon' => 'required',
            ]);

            $nota = new Nota();
            $nota->kode_tenan = $request->input('kode_tenan');
            $nota->kode_kasir = $request->input('kode_kasir');
            $nota->jumlah_belanja = $request->input('jumlah_belanja');
            $nota->diskon = $request->input('diskon');
            $nota->save();

            Alert::success('Berhasil', 'Data berhasil ditambah');
            return redirect()->route('home.index');
    }
}
