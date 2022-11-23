<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supir;

class SupirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $supirs = Supir::where(function ($q) use ($request) {
            $q->where('nama_supir', 'LIKE', '%' . $request->search . '%');
        })->get();
        return view('dashboard.supir.index', [
            'supirs' =>  $supirs,
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
        return view('dashboard.supir.create');
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
            'nama_supir' => 'required',
            'no_telp'=> 'required'
        ]);

        supir::create($data);
        return redirect('/dashboard/supir');
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
    public function edit(supir $supir)
    {
        return view('dashboard.supir.edit', [
            'supir' => $supir,
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
        $supir = supir::find($id);
        $data= $request->validate([
            'nama_supir' => 'required',
            'no_telp'=> 'required'
        ]);

        $supir->update($data);
        return redirect('/dashboard/supir');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supir = supir::find($id)->delete();
        return redirect('/dashboard/supir');
    }
}
