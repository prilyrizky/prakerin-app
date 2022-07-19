@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Data pkl</h1>

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
    Tambah pkl
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
      <form method="post" action="{{ route('pkl.store') }}">
        @csrf
        <input type="hidden" name="pkl_id" class="form-control">
        <div class="form-group">
            @csrf
            <label for="email">Nama Siswa</label>
            <select name="siswa_id" id="" class="form-control">
              @foreach ($siswas as $key )
              <option value="{{ $key->siswa_id}}" >{{ $key->nama_siswa }} 
               
              </option>
              @endforeach
          </select>
          </div>
          <div class="form-group">
            <label for="email">Nama Perusahaan</label>
            <select name="perusahaan_id" id="" class="form-control">
              @foreach ($perusahaans as $perusahaan )
              <option value="{{ $perusahaan->perusahaan_id}}" >{{ $perusahaan->nama_perusahaan }} 
               
              </option>
              @endforeach
          </select>
          </div>
        <div class="form-group">
          <label for="kota">Tanggal Mulai</label>
          <input type="date" class="form-control" name="tgl_mulai" required/>
        </div>
        <div class="form-group">
           <label for="post_code">Tanggal Selesai</label>
           <input type="date" class="form-control" name="tgl_selesai" required/>
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
          <button type="button" onclick="window.history.back();" class="btn btn-block btn-warning">Batal</button>
      </form>
  </div>
</div>
@endsection


