<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Requests\UpdateBukuRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = DB::table('bukus AS  bk')
                    ->select( 'bk.id' , 'bk.judul' , 'bk.pengarang' , 'bk.penerbit' , 'bk.photo')
                    ->get();

        return view('admin.buku.index' , compact('buku') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( "admin/buku/create" );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBukuRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $namaFile = rand( pow(10, 3 -1), pow (10, 3)-1 ) . '_' . $request->file('photo')->getClientOriginalName();

        $request->photo->move(public_path('stokfoto'), $namaFile);

        $buku = Buku::create([
            'judul' => $request->judul,
            'pengarang' => $request->pengarang,
            'penerbit' => $request->penerbit,
            'photo' => $namaFile
        ]);

        return redirect('admin/buku');
        // return response()->json( $buku );
    }

    public function caribuku( Request $request )
    {
        // dd($request->kolom);
        $buku = DB::table('bukus AS  bk')
                    ->where( $request->kolom , 'LIKE','%'.$request->value.'%' )
                    ->select( 'bk.id' , 'bk.judul' , 'bk.pengarang' , 'bk.penerbit' , 'bk.photo')
                    ->get();

        return view('admin.buku.index' , compact('buku') );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(Buku $buku)
    {
        return view('admin.buku.cetak' , compact('buku') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = Buku::find($id);

        return view('admin.buku.edit' , compact('buku'));
        // return response()->json( $buku );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBukuRequest  $request
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        if ( $request->hasfile('photo') ) {

            $namaFile = rand( pow(10, 3 -1), pow (10, 3)-1 ) . '_' . $request->file('photo')->getClientOriginalName();

            $request->photo->move(public_path('stokfoto'), $namaFile);

            $buku = Buku::find($id);
            $buku->judul = $request->judul;
            $buku->pengarang = $request->pengarang;
            $buku->penerbit = $request->penerbit;
            $buku->photo = $namaFile;
            $buku->save();

            return redirect('admin/buku');
            // return response()->json( $buku );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        // return response()->json( $buku );
        return redirect('admin/buku');
    }
}
