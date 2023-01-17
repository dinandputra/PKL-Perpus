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
    <div class="row">
        <div class="col-md-9">
            <div id="frmPinjam">
                @csrf
           
                  <label> Nama Peminjam </label>
                  <select name="anggota_id" id="anggota_id" class="form-control">
                  @foreach ($peminjam as $pj)
                      <option value="{{ $pj->id }}"> {{ $pj->nama }} </option>
                  @endforeach
                  </select>

                  <div id="dvGrupBuku">
                    <div class="row" id="dvBuku">
                        <div class="col-md-6">
                            <label> Judul Buku </label>
                            <select name="buku_id" id="buku_id" class="form-control">
                            @foreach ($buku as $bk)
                                <option value="{{ $bk->id }}"> {{ $bk->judul }} </option>
                            @endforeach
                            </select>
                        </div>
 
                        <div class="col-md-1">
                            <label> &nbsp; </label>
                            <button class="btn btn-primary form-control" id="btnPlus"> + </button>
                        </div>
                   </div>
                  </div>

                  <label> Tanggal Peminjaman </label>
                  <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control">
                  
                  <label> Tanggal Pengembalian </label>
                  <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control">
                  
                  <br>
           
                  <input type="submit" value="simpan" name="simpan" id="btnSimpan" class="btn btn-success">
            </div>
        </div>
    </div>
@stop

@section('css')
    
@stop

@section('js')
    <script>
      $(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        const isi = `
            
                <div class="row" id="dvBuku">
                    <div class="col-md-6">
                        <label> Judul Buku </label>
                        <select name="buku_id" id="buku_id" class="form-control">
                        @foreach ($buku as $bk)
                            <option value="{{ $bk->id }}"> {{ $bk->judul }} </option>
                        @endforeach
                        </select>
                    </div>
                </div>
        `;

        $('#btnSimpan').click(function (e) { 
            e.preventDefault();
            let anggota_id = $('#anggota_id').val();
            let tgl_pinjam = $('#tgl_pinjam').val();
            let tgl_kembali = $('#tgl_kembali').val();


            // -1- simpan tabel peminjaman
            
            $.ajax({
                type: "POST",
                url: "/admin/peminjaman",
                data: {
                    'anggota_id' : anggota_id,
                    'tgl_pinjam' : tgl_pinjam,
                    'tgl_kembali' : tgl_kembali
                },
                dataType: "JSON",
                success: function (response) {

                    // -2- simpan tabel peminjaman_detail

                    $('select', $('#dvGrupBuku')).each(function () {
                        let id = parseInt (response);
                        console.log(`isi=${id}`);

                        $.ajax({
                            type: "POST",
                            url: "/admin/simpandetail",
                            data: {
                                'peminjaman_id' : id,
                                'buku_id' : $(this).val(),
                            },
                            dataType: "JSON",
                            success: function (response) {
                                console.log(response);
                            }
                        });
                        
                    });
                    
                }
            });

            
        });

        $('#btnPlus').click(function (e) { 
            e.preventDefault();
            $(isi).insertAfter( '#dvBuku' );
        });
      });
    </script>
@stop