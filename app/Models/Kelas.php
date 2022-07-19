<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'tb_kelas';
    protected $primaryKey = 'kelas_id';
    protected $fillable = ['kelas_id','nama_kelas','alamat','jurusan_id','tahun_masuk'];
    public $timestamps = false;
    protected $keyType = 'string';
    public $incrementing = false;

    public function jurusan()
    {
        return $this->belongsTo('App\Models\Jurusan','jurusan_id');
    }

    public function siswa() {
        $this->hasMany('\App\Models\Siswa');
    }
    
    
    
}
