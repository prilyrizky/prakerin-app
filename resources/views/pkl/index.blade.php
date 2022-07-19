@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Data Kegiatan PKL</h1>
    <a href="{{ route('pkl.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Data PKL</a>
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
  <table class="table is-striped" id="tb_pkl" style="width:100%">
    <thead>
        <tr class="table-warning" >
          
          <td>Nama Siswa</td>
          <td>Nama Perusahaan</td>
          <td>Tanggal Mulai</td>
          <td>Tanggal Selesai</td>
          <td>Tahun Ajaran</td>
          <td>Semester</td>
          <td>Status pkl</td>
          

         
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($pkl as $pkl)
        <tr>
            <td>{{$pkl->nama_siswa}}</td>
            <td>{{$pkl->nama_perusahaan}}</td>
            <td>{{$pkl->tgl_mulai}}</td>
            <td>{{$pkl->tgl_selesai}}</td>
            <td>{{$pkl->tahun_ajaran}}</td>
            <td>{{$pkl->semester}}</td>
            <td>{{$pkl->status_pkl}}</td>
              
       
            <td class="text-center">
                <a href="{{ route('pkl.edit', $pkl->pkl_id)}}" class="btn btn-primary btn-xs">
                  <i class="fa fa-edit"></i>Ubah</a>
                <form action="{{ route('pkl.destroy', $pkl->pkl_id)}}" method="post" style="display: inline-block">
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
    $(document).ready(function () {
      $('#tb_pkl').DataTable();
    });
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