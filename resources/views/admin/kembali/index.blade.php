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

    <br>

    <center>
        <h2>Data dan Informasi Transaksi Peminjaman Buku</h2>
    </center>
@stop

@section('content')

        {{-- <form class="form-inline" method="post" action="{{ url('carikembali') }}">
            @csrf
    
            <div class="form-group mb-2">
                <label for="staticEmail2" class="sr-only"> Kolom </label>
                <select name="kolom" class="form-control-plaintext">
                <option value="nama"> Nama Peminjam </option>
                <option value="judul"> Judul Buku </option>
                </select>
            </div>
    
            <div class="form-group mx-sm-3 mb-2">
                <label class="sr-only"> Value </label>
                <input name="value" type="text" class="form-control" placeholder="...">
            </div>
    
            <input type="submit" value="cari" name="cari" class="btn btn-success mb-2">
        </form> --}}
    

        <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th> ID </th>
                <th> PEMINJAM </th>
                <th> ALAMAT </th>
                <th> BUKU </th>
                <th> PENERBIT </th>
                <th> TGL PINJAM </th>
                <th> TGL KEMBALI </th>
                <th> &nbsp; </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $pmj)
                <tr>
                    <td> {{ $pmj->id }} </td>
                    <td> {{ $pmj->nama }} </td>
                    <td> {{ $pmj->alamat }} </td>
                    <td> {{ $pmj->judul }} </td>
                    <td> {{ $pmj->penerbit }} </td>
                    <td> {{ $pmj->tgl_pinjam }} </td>
                    <td> {{ $pmj->tgl_kembali }} </td>
                    <td>
                        <div class="text-center">
                            @can('isAdmin' , 'isManager') 
                            
                            <a href="{{ URL::to('admin/hapuskembali/' . $pmj->id ) }}" class="btn btn-primary"> Dikembalikan </a>
                            
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
   
@stop