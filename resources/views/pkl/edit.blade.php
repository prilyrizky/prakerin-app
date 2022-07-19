@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Data pkl</h1>
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
      <form method="post" action="{{ route('pkl.update', $pkl->pkl_id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Nama Siswa</label>
              
              <select name="siswa_id" id="" class="form-control" disabled>
                @foreach ($siswas as $key )
                <option value="{{ $key->siswa_id}}"> {{ $key->nama_siswa}} 
                </option>
                @endforeach
            </select>
            </div>
          <div class="form-group">
              <label for="email">Nama Perusahaan</label>
              
              <select name="perusahaan_id" id="" class="form-control">
                @foreach ($perusahaans as $perusahaan )
                <option value="{{ $perusahaan->perusahaan_id}}"> {{ $perusahaan->nama_perusahaan}} 
                </option>
                @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="start_date">Tanggal Mulai</label>
            <input type="date" class="form-control" name="tgl_mulai" value="{{ $pkl->tgl_mulai }}"/>
          </div>
          <div class="form-group">
            <label for="end_date">Tanggal Selesai</label>
            <input type="date" class="form-control" name="tgl_selesai" value="{{ $pkl->tgl_selesai }}"/>
          </div>
          
          <div class="form-group">
            <label for="jenis_pkl">Tahun Ajaran</label>
            <select class="form-control" name="tahun_ajaran">
              <option value="2022/2023">2022/2023</option>
              <option value="2023/2024">2023/2024</option>
             
            </select>
          </div>
          <div class="form-group">
            <label for="semester">Semester</label>
            <select name="semester" class="form-control">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
            </select>
         </div>
         <div class="form-group">
            <label for="status_pkl">Status PKL</label>
            <select name="status_pkl" class="form-control">
              <option value="Sudah Selesai">Sudah Selesai</option>
              <option value="Masih PKL">Masih PKL</option>
            </select>
         </div>
         
          <button type="submit" class="btn btn-block btn-danger">Simpan</button>
          <button type="button" onclick="window.history.back();" class="btn btn-block btn-warning">Cancel</button>
      </form>
  </div>
</div>
@endsection