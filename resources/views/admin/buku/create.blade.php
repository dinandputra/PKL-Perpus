@extends('adminlte::page')

@section('title', 'Taman Baca - AdminSite' )

@section('content_header')
    <div class="card-head text-center">
        @can('isAdmin')
            <div class="btn btn-success btn-lg">
            You have Admin Access
            </div>
        @elsecan('isManager')
            <div class="btn btn-primary btn-lg">
            You have Manager Access
            </div>
        @else
            <div class="btn btn-info btn-lg">
                You have User Access
            </div>
        @endcan
    </div>
@stop

@section('content')
    <form method="post" action="{{ URL::to('admin/buku') }}" enctype="multipart/form-data">
     @csrf
     
       <label> Judul Buku : </label>
       <input type="text" name="judul" class="form-control">

       <label> Nama Pengarang : </label>
       <input type="text" name="pengarang" class="form-control">

       <label> Penerbit Buku : </label>
       <input type="text" name="penerbit" class="form-control">

       <label> Foto : </label>
       <input type="file" name="photo" class="form-control">

       <br>

       <input type="submit" value="simpan" name="simpan" class="btn btn-success">
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop