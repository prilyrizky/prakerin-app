@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Data Perusahaan</h1>
    <a href="{{ route('perusahaan.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data Perusahaan</a>
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
  <table class="table is-striped" id="tb_perusahaan">
    <thead>
        <tr class="table-warning">
          
          <td>Nama Perusahaan</td>
          <td>Alamat</td>
          <td>Kota</td>
          <td>Kode Pos</td>
          <td>Jenis Perusahaan</td>
          <td>Bidang Usaha</td>
          

         
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($perusahaan as $perusahaan)
        <tr>
            
            <td>{{$perusahaan->nama_perusahaan}}</td>
            <td>{{$perusahaan->alamat}}</td>
            <td>{{$perusahaan->kota}}</td>
            <td>{{$perusahaan->kode_pos}}</td>
            <td>{{$perusahaan->jenis_perusahaan}}</td>
            <td>{{$perusahaan->bidang_usaha}}</td>
       
            <td class="text-center">
                <a href="{{ route('perusahaan.edit', $perusahaan->perusahaan_id)}}" class="btn btn-primary btn-xs">
                  <i class="fa fa-edit"></i>Ubah</a>
                <form action="{{ route('perusahaan.destroy', $perusahaan->perusahaan_id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-xs btn-danger btn-flat show_confirm"  type="submit">
                      <i class="fa fa-trash"></i>Hapus
                    </button>
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
        $('#tb_perusahaan').DataTable();
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