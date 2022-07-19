<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Jurusan;

use Haruncpi\LaravelIdGenerator\IdGenerator;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //
        $jurusan = Jurusan::all();
        return view('jurusan.index', compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('jurusan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $jurusanId = IdGenerator::generate(['table' => 'tb_jurusan','field'=>'jurusan_id', 'length' => 2, 'prefix' => 'J']);
    
        $storeData = (
            [
            'jurusan_id' => $jurusanId,            
            'nama_jurusan' => $request -> nama_jurusan,
            'deskripsi' => $request -> deskripsi
            
        ]);

    
        
        $jurusan = Jurusan::create($storeData);
        
        return redirect('/jurusan')->with('completed', 'Jurusan telah tersimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $jurusan_id
     * @return \Illuminate\Http\Response
     */
    public function show($jurusan_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $jurusan_id
     * @return \Illuminate\Http\Response
     */
    public function edit($jurusan_id)
    {
        //
        $jurusan = Jurusan::findOrFail($jurusan_id);
        return view('jurusan.edit', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $jurusan_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $jurusan_id)
    {
        //
        $updateData = $request->validate([
            'nama_jurusan' => 'nullable',
            'deskripsi' => 'required|max:255',
            
        ]);
        Jurusan::where('jurusan_id','=',$jurusan_id)->update($updateData);
        return redirect('/jurusan')->with('completed', 'Perubahan telah disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($jurusan_id)
    {
        //
        $jurusan = Jurusan::findOrFail($jurusan_id);
        $jurusan->delete();
        return redirect('/jurusan')->with('completed', 'Data jurusan telah berhasil dihapus');
    }
}
