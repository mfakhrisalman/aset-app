<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Assets;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $asset = Assets::paginate(2); 

        return view('assets.index', ['assets' => $asset]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->only(['kode', 'nama', 'asal', 'tipe','bahan','ukuran','tahun','keterangan','status']);

        if (auth()->check()) {
            $validatedData['user_id'] = auth()->user()->id;
        } else {
            return redirect('/')->with('error', 'Mohon Login Untuk Menambahkan Data Aset');
        }


        Assets::create($validatedData);

        return redirect('/asets')->with('success', 'Data Aset Baru Berhasil Ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(Assets $aset)
    {
            return view('assets.show',[
                'asset' => $aset
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assets $aset)
    {
        return view('assets.edit',[
            'asset' => $aset
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assets $aset)
    {
        $validatedData = $request->only(['kode', 'nama', 'asal', 'tipe','bahan','ukuran','tahun','keterangan','status']);

    
        Assets::where('id', $aset->id)
            ->update($validatedData);
        
        return redirect('/asets')->with('success', 'Data Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assets $aset)
    {
        Assets::destroy($aset->id);
        return redirect('/asets')->with('success', 'Data Aset Berhasil Dihapus');
    }
}
