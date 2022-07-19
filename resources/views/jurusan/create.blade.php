@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Data Jurusan</h1>
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
    Tambah Jurusan
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
      <form method="post" action="{{ route('jurusan.store') }}">
        <input type="hidden" name="jurusan_id" class="form-control">
          <div class="form-group">
              @csrf
              <label for="name">Nama Jurusan</label>
              <input type="text" class="form-control" name="nama_jurusan" placeholder="Masukkan nama jurusan" required/>
          </div>
          <div class="form-group">
              <label for="deskripsi">Deskripsi</label>
              <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan deskripsi jurusan" required/>
          </div>
        
          <button type="submit" class="btn btn-block btn-danger">Simpan</button>
          <button type="button" onclick="window.history.back();" class="btn btn-block btn-warning">Batal</button>
      </form>
  </div>
</div>
@endsection