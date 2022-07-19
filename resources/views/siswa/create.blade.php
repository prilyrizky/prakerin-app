@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Data siswa</h1>
    
@stop
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Tambah siswa
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('siswa.store') }}">
        <input type="hidden" name="siswa_id" class="form-control">
        <div class="form-group">
          @csrf
          <label for="name">NIS</label>
          <input type="text" class="form-control" name="nis" placeholder="Masukan NIS siswa" required/>
      </div>
          <div class="form-group">
              @csrf
              <label for="name">NISN</label>
              <input type="text" class="form-control" name="nisn" placeholder="Masukkan NISN siswa" required/>
          </div>
          <div class="form-group">
              <label for="email">Nama Siswa</label>
              <input type="text" class="form-control" name="nama_siswa" placeholder="Masukkan Nama Siswa" required/>
          </div>
          <div class="form-group">
            <label for="email">Kelas</label>
            <select name="kelas_id" id="" class="form-control">
              @foreach ($kelass as $key )
              <option value="{{ $key->kelas_id}}" >{{ $key->nama_kelas }} 
               
              </option>
              @endforeach
          </select>
          </div>
          <div class="form-group">
            <label for="email">Alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat siswa" required/>
          </div>
          <div class="form-group">
            <label for="email">No HP</label>
            <input type="text" class="form-control" name="no_hp" placeholder="Masukan No HP siswa" />
          </div>
          <div class="form-group">
            <label for="email">Status Siswa</label>
            <select name="status_siswa" id="" class="form-control">
              <option value="MASIH BERSEKOLAH">MASIH BERSEKOLAH</option>
              <option value="SUDAH LULUS">SUDAH LULUS</option>
            </select>
          </div>
        
          <button type="submit" class="btn btn-block btn-danger">Simpan</button>
          <button type="button" onclick="window.history.back();" class="btn btn-block btn-warning">Batal</button>
      </form>
  </div>
</div>
@endsection