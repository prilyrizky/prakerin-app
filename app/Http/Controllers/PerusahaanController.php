<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $perusahaan = Perusahaan::all();
        return view('perusahaan.index', compact('perusahaan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('perusahaan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $perusahaanId = IdGenerator::generate(['table' => 'tb_perusahaan','field'=>'perusahaan_id', 'length' => 4, 'prefix' => 'P']);
        $storeData = 
        ([
            'perusahaan_id' => $perusahaanId,
            'nama_perusahaan' => $request -> nama_perusahaan,
            'alamat' => $request -> alamat,
            'kota' => $request -> kota,
            'kode_pos' => $request -> kode_pos,
            'jenis_perusahaan' => $request -> jenis_perusahaan,
            'bidang_usaha' => $request -> bidang_usaha,
            
        ]);
        $perusahaan = Perusahaan::create($storeData);
        return redirect('/perusahaan')->with('completed', 'Data Tempat PKL telah tersimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($perusahaan_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($perusahaan_id)
    {
        //
        $perusahaan = Perusahaan::findOrFail($perusahaan_id);
        return view('perusahaan.edit', compact('perusahaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $perusahaan_id)
    {
        //
        $updateData = $request->validate([
            'nama_perusahaan' => 'required|max:255',
            'alamat' => 'required|max:255',
            'kota' => 'required|max:255',
            'kode_pos' => 'required|max:255',
            'jenis_perusahaan' => 'required|max:255',
            'bidang_usaha' => 'required|max:255',
            
        ]);
        Perusahaan::where('perusahaan_id','=',$perusahaan_id)->update($updateData);
        return redirect('/perusahaan')->with('completed', 'Perubahan telah disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($perusahaan_id)
    {
        //
        $perusahaan = Perusahaan::findOrFail($perusahaan_id);
        $perusahaan->delete();

        return redirect('/perusahaan')->with('completed', 'Data Tempat PKL telah berhasil dihapus');
    }
}
