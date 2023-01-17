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
        @can('isAdmin' , 'isManager') 
           <a href="{{ URL::to('admin/peminjam/create') }}" class="btn btn-info"> Tambah </a>
        @endcan

        <form class="form-inline" method="post" action="{{ url('caripeminjam') }}">
            @csrf

            <div class="form-group mb-2">
                <label class="sr-only"> Kolom </label>
                <select name="kolom" class="form-control-plaintext">
                    <option value="nama"> Nama Peminjam </option>
                    <option value="alamat"> Alamat Peminjam </option>
                </select>
            </div>
    
            <div class="form-group mx-sm-3 mb-2">
                <label class="sr-only"> Value </label>
                <input name="value" type="text" class="form-control" placeholder="...">
            </div>
    
            <input type="submit" value="cari" name="cari" class="btn btn-success mb-2">
        </form>
    

    <table class="table table-striped table-bordered table-hover">
      <thead>
        <tr>
            <td> ID </td>
            <td> NAMA PEMINJAM </td>
            <td> ALAMAT PEMINJAM </td>
            <td> NOMOR TELEPON </td>
            <td> &nbsp; </td>
        </tr>
      </thead>
      <tbody>
        @foreach ($peminjam as $pj)
            <tr>
                <td> {{ $pj->id }} </td>
                <td> {{ $pj->nama }} </td>
                <td> {{ $pj->alamat }} </td>
                <td> {{ $pj->telephone }} </td>
                <td>
                    <div class="text-center">
                        @can('isAdmin' , 'isManager') 
                        <a href="{{ URL::to('admin/peminjam/' . $pj->id) }}"> 
                            <i class="fa fa-print" style="font-size:24px"></i>
                        </a>
                        |
                        <a href="{{ URL::to('admin/hapuspeminjam/' . $pj->id ) }}" class="btn btn-danger"> Hapus </a>
                        |
                        <a href="{{ URL::to('admin/peminjam/' . $pj->id . '/edit') }}" class="btn btn-warning"> Ubah </a>
                        @endcan
                    </div>
                </td>
            </tr>
        @endforeach
      </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop