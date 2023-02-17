<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPaket;
use App\Models\Paket;

class DetailPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $paket_id)
    {
        $per = $request->per ? $request->per : 10;
        $detail_pakets = DetailPaket::with(['paket'])->where(function ($q) use ($request) {
            $q->where('nama', 'LIKE', '%' . $request->search . '%');
        })->where('paket_id', $paket_id)->paginate($per);
        $paket = Paket::find($paket_id);
        return view('dashboard.dtpaket.index', compact('detail_pakets', 'request', 'paket_id', 'paket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($paket_id)
    {
        return view('dashboard.dtpaket.create', compact('paket_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $paket_id)
    {
        $data = $request->validate([
            'nama' => 'required'
        ]);

        Paket::find($paket_id)->detail_pakets()->create($data);
        return redirect('/dashboard/paket/' . $paket_id . '/dtpaket')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($paket_id, $detail_paket_id)
    {
        $detail = DetailPaket::find($detail_paket_id);
        return view('dashboard.dtpaket.edit', compact('detail', 'paket_id', 'detail_paket_id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $paket_id, $detail_paket_id)
    {
        $detail_pakets = DetailPaket::find($detail_paket_id);
        $data= $request->validate([
            'nama' => 'required'
        ]);

        $detail_pakets->update($data);
        return redirect('/dashboard/paket/' . $paket_id . '/dtpaket')->with('info', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($paket_id, $detail_paket_id)
    {
         $detail_pakets = DetailPaket::find($detail_paket_id)->delete();
         return redirect('/dashboard/paket/' . $paket_id . '/dtpaket');
    }
}
