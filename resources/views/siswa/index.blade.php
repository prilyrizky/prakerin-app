@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Data siswa</h1>
    <a href="{{ route('siswa.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data Siswa</a>
 
		{{-- notifikasi form validasi --}}
		@if ($errors->has('file'))
		<span class="invalid-feedback" role="alert">
			<strong>{{ $errors->first('file') }}</strong>
		</span>
		@endif
 
		{{-- notifikasi sukses --}}
		@if ($sukses = Session::get('sukses'))
		<div class="alert alert-success alert-block">
			<button type="button" class="close" data-dismiss="alert">×</button> 
			<strong>{{ $sukses }}</strong>
		</div>
		@endif
 
		<button type="button" class="btn btn-sm btn-primary mr-5" data-toggle="modal" data-target="#importExcel">
      <i class="fa fa-file-excel"></i> Impor Data Siswa
		</button>
 
		<!-- Import Excel -->
		<div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<form method="post" action="/siswa/import_excel" enctype="multipart/form-data">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
						</div>
						<div class="modal-body">
 
							{{ csrf_field() }}
 
							<label>Pilih file excel</label>
							<div class="form-group">
								<input type="file" name="file" required="required">
							</div>
 
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
							<button type="submit" class="btn btn-primary">Impor</button>
						</div>
					</div>
				</form>
			</div>
		</div>

@stop

@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-hover is-striped" id="tabel_siswa">
    <thead>
        <tr class="table-warning">
          
          <td>NIS</td>
          <td>NISN</td>
          <td>Nama</td>
          <td>Kelas</td>
          <td>Alamat</td>
          <td>No HP</td>
          <td>Status Siswa</td>
          

         
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($siswa as $siswa)
        <tr>
            <td>{{$siswa->nis}}</td>
            <td>{{$siswa->nisn}}</td>
            <td>{{$siswa->nama_siswa}}</td>
            <td>{{$siswa->kelas->nama_kelas}}</td>
            <td>{{$siswa->alamat}}</td>
            <td>{{$siswa->no_hp}}</td>
            <td>{{$siswa->status_siswa}}</td>
              
       
            <td class="text-center">
                <a href="{{ route('siswa.edit', $siswa->siswa_id)}}" class="btn btn-primary btn-xs">
                  <i class="fa fa-edit"></i>Ubah</a>
                <form action="{{ route('siswa.destroy', $siswa->siswa_id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-xs btn-danger btn-flat show_confirm"  type="submit">
                      <i class="fa fa-trash"></i>Hapus</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection

@section('js')
    <script>
      $(document).ready(function() {
        $('#tabel_siswa').DataTable();
    } );
    </script>
    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
    
        $('.show_confirm').click(function(event) {
              var form =  $(this).closest("form");
              var name = $(this).data("name");
              event.preventDefault();
              swal({
                  title: `Are you sure you want to delete this record?`,
                  text: "If you delete this, it will be gone forever.",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  form.submit();
                }
              });
          });
      
    </script>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bulma.min.css">
@stop