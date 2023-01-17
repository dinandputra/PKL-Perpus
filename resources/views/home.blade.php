@extends('adminlte::page')

@section('title', 'Taman Baca - AdminSite')

@section('content_header')
    <div class="text-center">
        <h1> Selamat Datang di Halaman Admin Taman .Baca </h1>
    </div>
@stop

@section('content')
    <div class="card-body text-center">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop