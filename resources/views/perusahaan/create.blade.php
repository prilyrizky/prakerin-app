@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Data Perusahaan</h1>

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
    Tambah Perusahaan
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
      <form method="post" action="{{ route('perusahaan.store') }}">
        <input type="hidden" name="perusahaan_id" class="form-control">
          <div class="form-group">
              @csrf
              <label for="name">Nama Perusahaan</label>
              <input type="text" class="form-control" name="nama_perusahaan" placeholder="Masukkan nama perusahaan" required/>
          </div>
          <div class="form-group">
            <label for="address">Alamat</label>
            <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat perusahaan" required/>
        </div>
        <div class="form-group">
          <label for="kota">Kota</label>
          <input type="text" class="form-control" list="kota" name="kota" placeholder="Masukkan kota" required/>
          <datalist id="kota">
            <option value="KOTA BEKASI">KOTA BEKASI</option>
            <option value="KABUPATEN BEKASI">KABUPATEN BEKASI</option>
            <option value="KOTA JAKARTA TIMUR">KOTA JAKARTA TIMUR</option>
            <option value="KOTA JAKARTA UTARA">KOTA JAKARTA UTARA</option>
            <option value="KOTA JAKARTA PUSAT">KOTA JAKARTA PUSAT</option>
            <option value="KOTA JAKARTA BARAT">KOTA JAKARTA BARAT</option>
            
         
        </datalist>
        </div>
        <div class="form-group">
           <label for="post_code">Kode Pos</label>
           <input type="text" class="form-control" name="kode_pos" placeholder="Masukkan Kode Pos" required/>
        </div>
        <div class="form-group">
          <label for="jenis_perusahaan">Jenis Perusahaan</label>
          <!--<input type="text" class="form-control" list="jenis_perusahaan" name="jenis_perusahaan" />-->
          <select class="form-control" name="jenis_perusahaan" id="jenis_perusahaan">
            <option value="BENGKEL">BENGKEL</option>
            <option value="INDUSTRI PABRIK">INDUSTRI PABRIK</option>
            <option value="PERUSAHAAN IT">PERUSAHAAN IT</option>
            <option value="UNIVERSITAS">UNIVERSITAS</option>
            <option value="BANK SWASTA">BANK SWASTA</option>
            <option value="PERKANTORAN">PERKANTORAN</option>
            <option value="BUMN">BUMN</option>
            <option value="BUMD">BUMD</option>
            <option value="KEMENTERIAN">KEMENTERIAN</option>
            <option value="PEMDA">PEMDA</option>
            <option value="RESTAURAN">RESTAURAN</option>
            <option value="RUMAH SAKIT">RUMAH SAKIT</option>
         
          </select>
       </div>
       <div class="form-group">
        <label for="bidang_usaha">Bidang Usaha</label>
        <!--<input type="text" class="form-control" name="bidang_usaha" list="bidang_usaha" />-->
        <select name="bidang_usaha" class="form-control"  id="bidang_usaha" style="width: 100%">
          <option value="INTERNET PROVIDER">INTERNET PROVIDER</option>
          <option value="BENGKEL MOTOR">BENGKEL MOTOR</option>
          <option value="BENGKEL MOBIL">BENGKEL MOBIL</option>
          <option value="PERBANKAN">PERBANKAN</option>
          <option value="JASA LOGISTIK">JASA LOGISTIK</option>
          <option value="JASA PENGIRIMAN">JASA PENGIRIMAN</option>
          <option value="JASA TRANSPORTASI">JASA TRANSPORTASI</option>
          <option value="TOUR & TRAVEL">TOUR & TRAVEL</option>
          <option value="FASHION">FASHION</option>
          <option value="KULINER">KULINER</option>
          <option value="PEMERINTAHAN">PEMERINTAHAN</option>
          <option value="KESEHATAN">KESEHATAN</option>
          <option value="MANUFACTURING">MANUFACTURING</option>
        </select>
     </div>
        
          <button type="submit" class="btn btn-block btn-danger">Simpan</button>
          <button type="button" onclick="window.history.back();" class="btn btn-block btn-warning">Batal</button>
      </form>
  </div>
</div>
@endsection


