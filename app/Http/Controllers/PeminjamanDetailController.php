<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman_detail;
use App\Http\Requests\StorePeminjaman_detailRequest;
use App\Http\Requests\UpdatePeminjaman_detailRequest;

class PeminjamanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePeminjaman_detailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePeminjaman_detailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman_detail  $peminjaman_detail
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman_detail $peminjaman_detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman_detail  $peminjaman_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman_detail $peminjaman_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePeminjaman_detailRequest  $request
     * @param  \App\Models\Peminjaman_detail  $peminjaman_detail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePeminjaman_detailRequest $request, Peminjaman_detail $peminjaman_detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman_detail  $peminjaman_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman_detail $peminjaman_detail)
    {
        //
    }
}
