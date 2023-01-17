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
        <a href="{{ URL::to('admin/buku/create') }}" class="btn btn-info"> Tambah </a>
    @endcan

    <form class="form-inline" method="post" action="{{ url('caribuku') }}">
        @csrf

        <div class="form-group mb-2">
            <label class="sr-only"> Kolom </label>
            <select name="kolom" class="form-control-plaintext">
                <option value="judul"> Judul Buku </option>
                <option value="pengarang"> Pengarang </option>
                <option value="penerbit"> Penerbit </option>
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
            <td> JUDUL BUKU </td>
            <td> PENGARANG </td>
            <td> PENERBIT BUKU </td>
            <td> FOTO </td>
            <td> &nbsp; </td>
        </tr>
      </thead>
      <tbody>
        @foreach ($buku as $bk)
            <tr>
                <td> {{ $bk->id }} </td>
                <td> {{ $bk->judul }} </td>
                <td> {{ $bk->pengarang }} </td>
                <td> {{ $bk->penerbit }} </td>
                <td>
                    <img style="width:80px; height:90px"src="{{ asset('stokfoto/' . $bk->photo) }}">
                </td>
                <td>
                    <div class="text-center">
                        @can('isAdmin' , 'isManager')
                        <a href="{{ URL::to('admin/buku/' . $bk->id) }}">
                            <i class="fa fa-print" style="font-size:24px"></i>
                        </a>
                        |
                        <a href="{{ URL::to('admin/hapusbuku/' . $bk->id ) }}" class="btn btn-danger"> Hapus </a>
                        |
                        <a href="{{ URL::to('admin/buku/' . $bk->id . '/edit') }}" class="btn btn-warning"> Ubah </a>
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
