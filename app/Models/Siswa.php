<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'tb_siswa';
    protected $primaryKey = 'siswa_id';
    protected $fillable = ['siswa_id','nis','nisn','nama_siswa','kelas_id','alamat','no_hp','status_siswa'];
    public $timestamps = false;
    public $incrementing = false;

    public function kelas()
    {
        return $this->belongsTo('App\Models\Kelas','kelas_id');
    }

    public function pkl()
    {
        return $this->belongsToMany('App\Models\KegPKL','pkl_id');
    }
}
