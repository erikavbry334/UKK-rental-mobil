<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Armada;

class ArmadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per = $request->per ? $request->per : 10;

        $armadas = Armada::where(function ($q) use ($request) {
            $q->where('nama_armada', 'LIKE', '%' . $request->search . '%');
        })->paginate($per);
        return view('dashboard.armada.index', [
            'armadas' => $armadas,
            'request' => $request
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.armada.create');
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
            'nama_armada' => 'required',
            'no_plat'=> 'required',
            'harga'=> 'required',
            'gambar'=> 'required',
            'status'=> 'required',
        ]);

        $data['harga'] = str_replace('.', '', $data['harga']);
        $data['harga'] = str_replace(',', '.', $data['harga']);
        $data['gambar'] = 'storage/' . $request->file('gambar')->store('armada', 'public');

        Armada::create($data);
        return redirect('/dashboard/armada')->with('success', 'Data berhasil ditambahkan');
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
    public function edit(armada $armada)
    {
        return view('dashboard.armada.edit',[
            'armada' => $armada,
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
        $armada = armada::find($id);
        $data= $request->validate([
            'nama_armada' => 'required',
            'no_plat'=> 'required',
            'harga'=> 'required',
            'gambar'=> 'image',
            'status'=> 'required',
        ]);

        if (isset($request->gambar)) {
            if (is_file(storage_path('app/'.str_replace('storage', 'public', $armada->gambar)))) {
                unlink(storage_path('app/'.str_replace('storage', 'public', $armada->gambar)));
            }
            $data['gambar'] = 'storage/' . $request->file('gambar')->store('armada', 'public');
        }

        $data['harga'] = str_replace('.', '', $data['harga']);
        $data['harga'] = str_replace(',', '.', $data['harga']);
        $armada->update($data);
        return redirect('/dashboard/armada')->with('info', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $armada = armada::find($id)->delete();
        return redirect('/dashboard/armada');
    }
}
