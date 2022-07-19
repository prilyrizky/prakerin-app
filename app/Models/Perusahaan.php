<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'tb_perusahaan';
    protected $primaryKey = 'perusahaan_id';
    protected $fillable = ['perusahaan_id','nama_perusahaan','alamat','kota','kode_pos','jenis_perusahaan','bidang_usaha'];
    public $timestamps = false;
    protected $keyType = 'string';

    public function pkl()
    {
        return $this->belongsToMany('App\Models\KegPKL','pkl_id');
    }
}
