@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Data Kelas</h1>
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
    Tambah Kelas
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
      <form method="post" action="{{ route('kelas.store') }}">
        <input type="hidden" name="kelas_id" class="form-control">
          <div class="form-group">
              @csrf
              <label for="nama">Nama kelas</label>
              <input type="text" class="form-control" name="nama_kelas" placeholder="Contoh: 2223-TKJ-A" required/>
          </div>
          <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <!--<input type="text" class="form-control" name="jurusan_id"/>-->
            <select name="jurusan_id" id="" class="form-control">
                @foreach ($jurusans as $key )
                <option value="{{ $key->jurusan_id}}" >{{ $key->nama_jurusan }} 
                 
                </option>
                @endforeach
            </select>
        </div>
          <div class="form-group">
              <label for="tahun_masuk">Tahun Masuk</label>
              <!--<input type="text" class="form-control" name="tahun_masuk"/>-->
              <select class="form-control" name="tahun_masuk" id="tahun_masuk" style="width: 100%">
                <option value="2021/2022">2021/2022</option>
                <option value="2022/2023">2022/2023</option>
                
               
             
              </select>
          </div>
        
          <button type="submit" class="btn btn-block btn-danger">Simpan</button>
          <button type="button" onclick="window.history.back();" class="btn btn-block btn-warning">Batal</button>
      </form>
  </div>
</div>
@endsection