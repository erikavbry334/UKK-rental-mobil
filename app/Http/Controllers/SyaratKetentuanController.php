<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SyaratKetentuan;

class SyaratKetentuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $syarat = SyaratKetentuan::first();
        return view('dashboard.syarat-ketentuan.index', [
            'syarat' =>  $syarat,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.syarat-ketentuan.create');
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
            'isi' => 'required',
        ]);

        if ($syarat = SyaratKetentuan::first()) {
            $syarat->update($data);
        } else {
            SyaratKetentuan::create($data);;
        }
        return redirect('/dashboard/syarat-ketentuan')->with('success', 'Data berhasil diperbarui');
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
    public function edit(SyaratKetentuan $syaratKetentuan)
    {
        return view('dashboard.syarat-ketentuan.edit', [
            'syarat' => $syaratKetentuan,
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
        $syarat = SyaratKetentuan::find($id);
        $data= $request->validate([
            'syarat' => 'required',
            'ketentuan' => 'required',
        ]);

        $syarat->update($data);
        return redirect('/dashboard/syarat-ketentuan')->with('info', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $syarat = SyaratKetentuan::find($id)->delete();
        return redirect('/dashboard/syarat-ketentuan');
    }
}
