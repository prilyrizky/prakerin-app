@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Data Jurusan</h1>
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
    Edit & Update
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
      <form method="post" action="{{ route('jurusan.update', $jurusan->jurusan_id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Nama Jurusan</label>
              <input type="text" class="form-control" name="nama_jurusan" value="{{ $jurusan->nama_jurusan}}" disabled/>
          </div>
          <div class="form-group">
              <label for="email">Deskripsi</label>
              <input type="text" class="form-control" name="deskripsi" value="{{ $jurusan->deskripsi }}"/>
          </div>
         
          <button type="submit" class="btn btn-block btn-danger">Simpan</button>
          <button type="button" onclick="window.history.back();" class="btn btn-block btn-warning">Cancel</button>
      </form>
  </div>
</div>
@endsection