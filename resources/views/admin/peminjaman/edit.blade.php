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
    <form method="post" action="{{ URL::to('admin/peminjaman/' . $peminjaman->id) }}" enctype="multipart/form-data">
     @csrf
     @method('PUT')
     
        <label> ID - JUDUL </label>
        <select name="buku_id" class="form-control">
        @foreach ($peminjaman as $pmj)
            <option value="{{ $pmj->id }}"> {{ $pmj->buku_id }} - {{ $pmj->judul }} </option>
        @endforeach
        </select>

        <label> ID - NAMA </label>
        <select name="anggota_id" class="form-control">
        @foreach ($peminjaman as $pmj)
            <option value="{{ $pmj->id }}"> {{ $pmj->anggota_id }} - {{ $pmj->nama }} </option>
        @endforeach
        </select>
        
        <label> Tanggal Peminjaman </label>
        <input type="date" name="tgl_pinjam" class="form-control">

        <label> Tanggal Pengembalian </label>
        <input type="date" name="tgl_kembali" class="form-control">

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