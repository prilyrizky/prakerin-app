@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Data Jurusan</h1>
    <a href="{{ route('jurusan.create')}}" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Tambah Jurusan</a>
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
  
  <table class="table is-striped">
    <thead>
        <tr class="table-warning">
          
          <td>Nama Jurusan</td>
          <td>Deskripsi</td>
         
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($jurusan as $jurusan)
        <tr>
            
            <td>{{$jurusan->nama_jurusan}}</td>
            <td>{{$jurusan->deskripsi}}</td>
       
            <td class="text-center">
                <a href="{{ route('jurusan.edit', $jurusan->jurusan_id)}}" class="btn btn-primary btn-xs">
                  <i class="fa fa-edit"></i> Ubah</a>
                <form action="{{ route('jurusan.destroy', $jurusan->jurusan_id)}}" method="post" style="display: inline-block">
                    @csrf
                    
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection

@section ('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bulma.min.css">
@stop