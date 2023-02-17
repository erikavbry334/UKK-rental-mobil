<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per = $request->per ? $request->per : 10;
        $pakets = Paket::where(function ($q) use ($request) {
            $q->where('nama_paket', 'LIKE', '%' . $request->search . '%');
        })->paginate($per);
        return view('dashboard.paket.index', [
            'pakets'=> $pakets,
            'request' => $request,
            'title' => 'Paket'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('dashboard.paket.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data= $request->validate([
            'nama_paket' => 'required',
            'harga'=> 'required',
            'gambar'=> 'required'
        ]);

        $data['harga'] = str_replace('.', '', $data['harga']);
        $data['harga'] = str_replace(',', '.', $data['harga']);
        $data['gambar'] = 'storage/' . $request->file('gambar')->store('paket', 'public');

        Paket::create($data);   
        return redirect('/dashboard/paket')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(Paket $paket)
    {
        return view('dashboard.paket.edit', [
            'paket' => $paket,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paket = Paket::find($id);
        $data= $request->validate([
            'nama_paket' => 'required',
            'harga'=> 'required',
            'gambar'=> 'image'
        ]);

        if (isset($request->gambar)) {
            if (is_file(storage_path('app/'.str_replace('storage', 'public', $paket->gambar)))) {
                unlink(storage_path('app/'.str_replace('storage', 'public', $paket->gambar)));
            }
            $data['gambar'] = 'storage/' . $request->file('gambar')->store('paket', 'public');
        }

        $data['harga'] = str_replace('.', '', $data['harga']);
        $data['harga'] = str_replace(',', '.', $data['harga']);
        $paket->update($data);
        return redirect('/dashboard/paket')->with('info', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paket = Paket::find($id)->delete();
        return redirect('/dashboard/paket');
    }
}
