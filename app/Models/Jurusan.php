<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = 'tb_jurusan';
    protected $primaryKey = 'jurusan_id';
    protected $fillable = ['jurusan_id','nama_jurusan','deskripsi'];
    public $timestamps = false;
    public $incrementing = false;
    

    public function kelas() {
        $this->hasMany('\App\Models\Kelas');
    }


}
