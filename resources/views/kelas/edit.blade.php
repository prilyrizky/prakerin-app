@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Data Kelas</h1>
@stop

@section('content')
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
      <form method="post" action="{{ route('kelas.update', $kelas->kelas_id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="nama_kelas">Nama kelas</label>
              <input type="text" class="form-control" name="nama_kelas" value="{{ $kelas->nama_kelas}}"/>
          </div>
          <div class="form-group">
              <label for="nama_jurusan">Nama Jurusan</label><br />
              <!--<input type="text" class="form-control" list="nama_jurusan" name="jurusan_id" placeholder="{{ $kelas->jurusan->nama_jurusan }}"/>-->
              <select name="jurusan_id" id="" class="form-control" >
                @foreach ($jurusans as $key )
                <option value="{{ $key->jurusan_id}}" >{{ $key->nama_jurusan }} 
                 
                </option>
                @endforeach
            </select>

          <div class="form-group">
            <label for="tahun_masuk">Tahun Masuk</label>
            <input type="text" class="form-control" name="tahun_masuk" value="{{ $kelas->tahun_masuk }}"/>
        </div>
         
          <button type="submit" class="btn btn-block btn-danger">Simpan</button>
          <button type="button" onclick="window.history.back();" class="btn btn-block btn-warning">Cancel</button>
      </form>
  </div>
</div>
@endsection


@section('css')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
    
</style>
@stop