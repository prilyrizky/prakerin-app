<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Siswa;
use App\Models\KegPKL;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class KegPKLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pkl = KegPKL::join('tb_siswa','tb_siswa.siswa_id','=','keg_pkl.siswa_id')
                -> join('tb_perusahaan','tb_perusahaan.perusahaan_id','=','keg_pkl.perusahaan_id')
                ->get(['keg_pkl.pkl_id','tb_siswa.nama_siswa','tb_perusahaan.nama_perusahaan','tgl_mulai','tgl_selesai','tahun_ajaran','semester','status_pkl']);
        
        return view('pkl.index',compact('pkl'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $siswas = Siswa::all();
        $perusahaans = Perusahaan::all();
        
        return view('pkl.create', compact('siswas','perusahaans'));
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
        $p1 = "PKL-";
        $p2 = $request -> siswa_id;
        $p3 = $request -> perusahaan_id;

        $prefix = $p1.$p2."-".$p3."-";


        $pklId = IdGenerator::generate(['table' => 'keg_pkl','field'=>'pkl_id', 'length' => 18, 'prefix' => $prefix]);
        $storeData = ([
            'pkl_id' => $pklId,
            'siswa_id' => $request -> siswa_id,
            'perusahaan_id' => $request -> perusahaan_id,
            'tgl_mulai' => $request -> tgl_mulai,
            'tgl_selesai' => $request -> tgl_selesai,
            'tahun_ajaran' => $request -> tahun_ajaran,
            'semester' => $request -> semester,
            'status_pkl' => $request -> status_pkl,
            
            
        ]);
        $pkl = KegPKL::create($storeData);
        return redirect('/pkl')->with('pkl');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($pkl_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pkl_id)
    {
        //
     

        $siswas = Siswa::all();
        $perusahaans = Perusahaan::all();
        $pkl = KegPKL::findOrFail($pkl_id);
        return view('pkl.edit', compact('pkl','siswas','perusahaans'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pkl_id)
    {
        //
        $updateData = ([
            
            'perusahaan_id' => $request -> perusahaan_id,
            'tgl_mulai' => $request -> tgl_mulai,
            'tgl_selesai' => $request -> tgl_selesai,
            'tahun_ajaran' => $request -> tahun_ajaran,
            'semester' => $request -> semester,
            'status_pkl' => $request -> status_pkl,
            
        ]);
        KegPKL::where('pkl_id','=',$pkl_id)->update($updateData);
        return redirect('/pkl')->with('completed', 'Perubahan telah disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pkl_id)
    {
        //
        $pkl = KegPKL::findOrFail($pkl_id);
        $pkl->delete();

        return redirect('/pkl')->with('completed', 'Data Siswa telah berhasil dihapus');
    }
}
