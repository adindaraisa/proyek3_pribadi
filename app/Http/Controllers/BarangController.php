<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class BarangController extends Controller
{
    public function index()
    {
        $title = 'Barang';
        $data = Barang::all(); // or any other method to get the data
        return view('page.admin.barang.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getBarang(Request $request)
     {
        try {
            if ($request->ajax()) {
                $data = Barang::get();

                return DataTables::of($data)
                    ->addColumn('id', function ($row) {
                        static $index = 0;
                        $index++;
                        return $index;
                    })

                    ->addColumn('options', function ($dpoint) {
                        return "<a href='#' data-toggle='modal' data-target='#exampleModal{$dpoint->id}'><i class='fas fa-edit fa-lg'></i></a>
                                <a style='border: none; background-color:transparent;' class='hapusData' data-id='$dpoint->id' data-url='barang/{$dpoint->id}'><i class='fas fa-trash fa-lg text-danger'></i></a>";
                    })
                    ->rawColumns(['options'])
                    ->make(true);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error while showing data: ' . $e->getMessage());
        }
     }

    public function create()
    {
        
    }

    public function getKodeBarangAttribute()
    {
        $nim = '035'; // Replace with your actual NIM
        $lastBarang = Barang::where('kode_barang', 'like', 'BRG' . $nim . '%')->latest('kode_barang')->first();

        if (!$lastBarang) {
            $kodeBarang = 'BRG' . $nim . '01';
        } else {
            $lastNumber = intval(substr($lastBarang->kode_barang, -2));
            $nextNumber = str_pad($lastNumber + 1, 2, '0', STR_PAD_LEFT);
            $kodeBarang = 'BRG' . $nim . $nextNumber;
        }

        return $kodeBarang;
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nama_barang' => 'required',
                'satuan' => 'required',
                'harga_satuan' => 'required',
                'stok' => 'required',
            ]);



            $dpoint = new Barang();
            $dpoint->kode_barang = $this->getKodeBarangAttribute();
            $dpoint->nama_barang = $request->input('nama_barang');
            $dpoint->satuan = $request->input('satuan');
            $dpoint->harga_satuan = $request->input('harga_satuan');
            $dpoint->stok = $request->input('stok');
            $dpoint->save();

            Alert::success('Berhasil', 'Data berhasil ditambah');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error while create data Barang ' . $e->getMessage());
        }
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
        //
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
        try {
            $request->validate([
                'nama_barang' => 'required',
                'satuan' => 'required',
                'harga_satuan' => 'required',
            ]);
    
            $dpoint = Barang::find($id);
            if (!$dpoint) {
                return redirect()->back()->with('error', 'Data not found.');
            }
    
            $dpoint->nama_barang = $request->input('nama_barang');
            $dpoint->satuan = $request->input('satuan');
            $dpoint->harga_satuan = $request->input('harga_satuan');
            $dpoint->save();
    
            Alert::success('Berhasil', 'Data berhasil diupdate');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error while updating data Barang ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $dpoint = Barang::find($id);

            if (!$dpoint) {
                return redirect()->back()->with('error', 'Data Jenis Sampah tidak ditemukan.');
            }


            $dpoint->delete();

            return response()->json([
                'msg' => 'Data yang dipilih telah Dihapus'
            ]);

        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error while deleting data sampah: ' . $e->getMessage());
        }
    }
}
