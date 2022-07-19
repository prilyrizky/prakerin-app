<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Siswa;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SiswaImport;
use Session;



class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $siswa = Siswa::with('kelas')->get();
        return view('siswa.index')->with('siswa',$siswa);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kelass = Kelas::all();
        
        return view('siswa.create', compact('kelass'));
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
        $siswaId = IdGenerator::generate(['table' => 'tb_siswa','field'=>'siswa_id', 'length' => 6, 'prefix' => 'S']);
        $storeData = ([
            'siswa_id' => $siswaId,
            'nis' => $request -> nis,
            'nisn' => $request -> nisn,
            'nama_siswa' => $request -> nama_siswa,
            'kelas_id' => $request -> kelas_id,
            'alamat' => $request -> alamat,
            'no_hp' => $request -> no_hp,
            'status_siswa' => $request -> status_siswa,
            
            
        ]);
        $siswa = Siswa::create($storeData);
        return redirect('/siswa')->with('completed', 'Data Siswa telah tersimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($siswa_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($siswa_id)
    {
        //
        $kelass = Kelas::all();
        $siswa = Siswa::findOrFail($siswa_id);
        return view('siswa.edit', compact('siswa','kelass'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $siswa_id)
    {
        //
        $updateData = ([
            'nis' => $request -> nis,
            'nisn' => $request -> nisn,
            'nama_siswa' => $request -> nama_siswa,
            'kelas_id' => $request -> kelas_id,
            'alamat' => $request -> alamat,
            'no_hp' => $request -> no_hp,
            'status_siswa' => $request -> status_siswa,
            
        ]);
        Siswa::where('siswa_id','=',$siswa_id)->update($updateData);
        return redirect('/siswa')->with('completed', 'Perubahan telah disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($siswa_id)
    {
        //
        $siswa = Siswa::findOrFail($siswa_id);
        $siswa->delete();

        return redirect('/siswa')->with('completed', 'Data Siswa telah berhasil dihapus');
    }
    public function import_excel() 
    {
        // import data
		Excel::import(new SiswaImport, request()->file('file')->store('file_siswa'));

        // notifikasi dengan session
		Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
		// alihkan halaman kembali
		return redirect('/siswa');
    }
}
