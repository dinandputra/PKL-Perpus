<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Peminjam;
use App\Models\Peminjaman_detail;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $peminjaman = DB::table('peminjamen AS pmj')
                ->join('peminjams AS pej' , 'pmj.anggota_id' , '=' , 'pej.id')
                ->join('peminjaman_details AS det' , 'pmj.id' , '=' , 'det.peminjaman_id')
                ->join('bukus AS bk' , 'det.buku_id' , '=' , 'bk.id')
                ->select('pmj.id' , 'pej.nama' , 'pej.alamat' , 'bk.judul' , 'bk.penerbit' , 'pmj.tgl_pinjam' , 'pmj.tgl_kembali')
                ->get();

        // return response()->json( [$peminjaman ] );
        return view('admin.peminjaman.index' , compact('peminjaman') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peminjam = Peminjam::all();

        $buku = Buku::all();

        // return response()->json( [ $peminjam  , $buku] );

        return view('admin.peminjaman.create' , compact( 'peminjam' , 'buku') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeminjamanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // -1- simpan tabel peminjaman

        $peminjaman = Peminjaman::create([
            'anggota_id' => $request->anggota_id,
            'tgl_pinjam' => $request->tgl_pinjam,
            'tgl_kembali' => $request->tgl_kembali,
        ]);

        return response()->json( $peminjaman->id );

        return redirect("admin/peminjaman");

        
    }

    public function simpanDetail(Request $request)
    {
        // -2- simpan tabel peminjaman_detail

        $detail = Peminjaman_detail::create([
            'peminjaman_id' => $request->peminjaman_id,
            'buku_id' => $request->buku_id,
        ]);

        return response()->json('tersimpan');

        return redirect("admin/peminjaman");


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        $peminjaman = DB::table('peminjamen AS pmj')
                ->join('peminjams AS pej' , 'pmj.anggota_id' , '=' , 'pej.id')
                ->join('peminjaman_details AS det' , 'pmj.id' , '=' , 'det.peminjaman_id')
                ->join('bukus AS bk' , 'det.buku_id' , '=' , 'bk.id')
                ->select('pmj.id' , 'pej.nama' , 'pej.alamat' , 'bk.judul' , 'bk.penerbit' , 'pmj.tgl_pinjam' , 'pmj.tgl_kembali')
                ->get();

        // return response()->json( [$peminjaman ] );
        return view('admin.peminjaman.index' , compact('peminjaman') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjaman = Peminjaman::find($id);

        return view('admin.peminjaman.edit' , compact('peminjaman'));
    }

    public function caripeminjaman( Request $request )
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeminjamanRequest  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjaman = Peminjaman::find($id);
        $peminjaman->delete();

        return redirect('admin/peminjaman');
    }
}
