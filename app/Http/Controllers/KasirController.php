<?php

namespace App\Http\Controllers;

use App\Models\Kasir;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class KasirController extends Controller
{
    public function index()
    {
        $title = 'Data Kasir';
        $data = Kasir::all(); // or any other method to get the data
        return view('page.admin.riwayat.penukaranSampah', compact('title', 'data'));
    }

    public function getKasir(Request $request)
    {
        try {
            if ($request->ajax()) {
                $data = Kasir::get();
    
                return DataTables::of($data)
                    ->addColumn('id', function ($row) {
                        static $index = 0;
                        $index++;
                        return $index;
                    })
                    ->rawColumns(['id']) // If you want to treat 'id' column as raw HTML
                    ->make(true);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error while showing data: ' . $e->getMessage()]);
        }
    }
}
