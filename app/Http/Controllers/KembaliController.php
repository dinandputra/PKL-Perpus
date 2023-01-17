<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\Peminjam;
use App\Http\Requests\StorePeminjamanRequest;
use App\Http\Requests\UpdatePeminjamanRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class KembaliController extends Controller
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
        return view('admin.kembali.index' , compact('peminjaman') );
    }

    public function carikembali( Request $request )
    {
        // $peminjaman = DB::table('peminjamen AS pmj')
        //         ->join('bukus AS bk' , 'pmj.buku_id' , '=' , 'bk.id')
        //         ->join('peminjams AS pj' , 'pmj.anggota_id' , '=' , 'pj.id')
        //         ->where( $request->kolom , '=' , $request->value )
        //         ->select('pmj.id' , 'pmj.judul' , 'pmj.nama' , 'pmj.tgl_pinjam' , 'pmj.tgl_kembali')
        //         ->get();

        $buku = Buku::where('judul' , '=' , $request->judul )->get();
        
        $peminjam = Peminjam::where('nama' , '=' , $request->nama )->get();
        
        // return response()->json( $request->all() );

        return redirect("admin/kembali");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeminjamanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeminjamanRequest  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeminjamanRequest $request, Peminjaman $peminjaman)
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

        return redirect("admin/kembali");
    }
}
