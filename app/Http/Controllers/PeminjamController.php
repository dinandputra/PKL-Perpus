<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use App\Http\Requests\UpdatePeminjamRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjam = DB::table('peminjams AS pj')
                    ->select('pj.id' , 'pj.nama' , 'pj.alamat' , 'pj.telephone')
                    ->get();

        return view('admin.peminjam.index' , compact('peminjam') );
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( "admin/peminjam/create" );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeminjamRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $peminjam = Peminjam::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telephone' => $request->telephone,
        ]);

        return redirect('admin/peminjam');
        // return response()->json( $buku );
    }


    public function caripeminjam( Request $request )
    {
        // return response()->json($request->all());

        $peminjam = DB::table('peminjams AS pj')
                    ->where( $request->kolom , '=' , $request->value)
                    ->select('pj.id' , 'pj.nama' , 'pj.alamat' , 'pj.telephone')
                    ->get();

        return view('admin.peminjam.index' , compact('peminjam') );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjam $peminjam)
    {
        return view('admin.peminjam.cetak' , compact('peminjam') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjam = Peminjam::find($id);

        return view('admin.peminjam.edit' , compact('peminjam'));
        // return response()->json( $peminjam );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeminjamRequest  $request
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id)
    {
        $peminjam = Peminjam::find($id);
        $peminjam->nama = $request->nama;
        $peminjam->alamat = $request->alamat;
        $peminjam->telephone = $request->telephone;
        $peminjam->save();

        return redirect('admin/peminjam');
        // return response()->json( $peminjam );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peminjam = Peminjam::find($id);
        $peminjam->delete();

        return redirect('admin/peminjam');
    }
}
