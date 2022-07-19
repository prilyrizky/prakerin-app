@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Edit Data perusahaan</h1>
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
      <form method="post" action="{{ route('perusahaan.update', $perusahaan->perusahaan_id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Nama perusahaan</label>
              <input type="text" class="form-control" name="nama_perusahaan" value="{{ $perusahaan->nama_perusahaan}}"/>
          </div>
          <div class="form-group">
              <label for="address">Alamat</label>
              <input type="text" class="form-control" name="alamat" value="{{ $perusahaan->alamat }}"/>
          </div>
          <div class="form-group">
            <label for="kota">Kota</label>
            <input type="text" class="form-control" list="kota" name="kota" value="{{ $perusahaan->kota }}"/>
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
             <input type="text" class="form-control" name="kode_pos" value="{{ $perusahaan->kode_pos }}"/>
          </div>
          <div class="form-group">
            <label for="jenis_perusahaan">Jenis Perusahaan</label>
            <!--<input type="text" class="form-control" list="jenis_perusahaan" name="jenis_perusahaan" value="{{ $perusahaan->jenis_perusahaan }}"/>-->
            <select class="js-example-basic-single" name="jenis_perusahaan" id="jenis_perusahaan" style="width: 100%">
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
          <!--<input type="text" class="form-control" name="bidang_usaha" value="{{ $perusahaan->bidang_usaha }}"/>-->
          <select name="bidang_usaha" class="js-example-basic-single"  id="bidang_usaha" style="width: 100%">
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

@section ('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
@stop

@section ('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop