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
    <form method="post" action="{{ URL::to('admin/peminjam/' . $peminjam->id ) }}" enctype="multipart/form-data">
     @csrf
     @method('PUT')

       <label> Nama Peminjam : </label>
       <input type="text" name="nama" class="form-control" value="{{ $peminjam->nama }}">

       <label> Alamat Peminjam : </label>
       <input type="text" name="alamat" class="form-control" value="{{ $peminjam->alamat }}">

       <label> Nomor Telepon : </label>
       <input type="text" name="telephone" class="form-control" value="{{ $peminjam->telephone }}">

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