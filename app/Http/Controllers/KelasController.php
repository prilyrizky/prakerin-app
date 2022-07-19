<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kelas;
use App\Models\Jurusan;

use Haruncpi\LaravelIdGenerator\IdGenerator;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kelas = Kelas::with('jurusan')->get();
        return view('kelas.index')->with('kelas',$kelas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jurusans = Jurusan::all();
        
        return view('kelas.create', compact('jurusans'));
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

        $kelasId = IdGenerator::generate(['table' => 'tb_kelas','field'=>'kelas_id', 'length' => 7, 'prefix' => 'KLS-']);
        $storeData = ([
            'kelas_id' => $kelasId,
            'nama_kelas' => $request -> nama_kelas,
            'jurusan_id' => $request -> jurusan_id,
            'tahun_masuk' => $request -> tahun_masuk,
            
            
        ]);
        $kelas = Kelas::create($storeData);
        return redirect('/kelas')->with('completed', 'Data Tempat PKL telah tersimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kelas_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kelas_id)
    {
        //
        $jurusans = Jurusan::all();
        $kelas = Kelas::findOrFail($kelas_id);
        return view('kelas.edit', compact('kelas','jurusans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kelas_id)
    {
        //
        $updateData = ([
            'nama_Kelas' => $request -> nama_kelas,
            'jurusan_id' => $request -> jurusan_id,
            'tahun_masuk' => $request -> tahun_masuk,
            
        ]);
        Kelas::where('kelas_id','=',$kelas_id)->update($updateData);
        return redirect('/kelas')->with('completed', 'Perubahan telah disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kelas_id)
    {
        //
        $kelas = Kelas::findOrFail($kelas_id);
        $kelas->delete();

        return redirect('/kelas')->with('completed', 'Data Tempat PKL telah berhasil dihapus');
    }
}
