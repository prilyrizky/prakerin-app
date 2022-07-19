@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Data siswa</h1>
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
      <form method="post" action="{{ route('siswa.update', $siswa->siswa_id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">NIS</label>
              <input type="text" class="form-control" name="nis" value="{{ $siswa->nis}}"/>
          </div>
          <div class="form-group">
              <label for="email">NISN</label>
              <input type="text" class="form-control" name="nisn" value="{{ $siswa->nisn }}"/>
          </div>
          <div class="form-group">
            <label for="email">Nama Siswa</label>
            <input type="text" class="form-control" name="nama_siswa" value="{{ $siswa->nama_siswa }}"/>
          </div>
          <div class="form-group">
            <label for="email">Kelas</label>
            <select name="kelas_id" id="" class="form-control">
              @foreach ($kelass as $key )
              <option value="{{ $key->kelas_id}}"> {{ $key->nama_kelas }} 
              </option>
              @endforeach
          </select>
          </div>
          <div class="form-group">
            <label for="email">Alamat</label>
            <input type="text" class="form-control" name="alamat" value="{{ $siswa->alamat }}"/>
         </div>
         <div class="form-group">
          <label for="email">No HP</label>
          <input type="text" class="form-control" name="no_hp" value="{{ $siswa->no_hp }}"/>
       </div>
       <div class="form-group">
        <label for="status_siswa">Status Siswa</label>
        <select name="status_siswa" id="" class="form-control">
          
          <option value="MASIH BERSEKOLAH">MASIH BERSEKOLAH</option>
          <option value="SUDAH LULUS">SUDAH LULUS</option>
           
      </select>
      </div>
         
          <button type="submit" class="btn btn-block btn-danger">Simpan</button>
          <button type="button" onclick="window.history.back();" class="btn btn-block btn-warning">Cancel</button>
      </form>
  </div>
</div>
@endsection