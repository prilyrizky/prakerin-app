<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegPKL extends Model
{
    use HasFactory;
    protected $table = 'keg_pkl';
    protected $primaryKey = 'pkl_id';
    protected $fillable = ['pkl_id','siswa_id','perusahaan_id','tgl_mulai','tgl_selesai','tahun_ajaran','semester','status_pkl'];
    public $timestamps = false;
    public $incrementing = false;

    public function siswa()
    {
        return $this->belongsToMany('App\Models\Siswa','siswa_id');
    }

    public function perusahaan()
    {
        return $this->belongsToMany('App\Models\Perusahaan','perusahaan_id');
    }


}
