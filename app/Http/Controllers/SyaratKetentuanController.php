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
        $syarats = SyaratKetentuan::where(function ($q) use ($request) {
            $q->where('keterangan', 'LIKE', '%' . $request->search . '%');
        })->get();
        return view('dashboard.syarat-ketentuan.index', [
            'syarats' =>  $syarats,
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
            'keterangan' => 'required',
        ]);

        SyaratKetentuan::create($data);
        return redirect('/dashboard/syarat-ketentuan');
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
            'keterangan' => 'required',
        ]);

        $syarat->update($data);
        return redirect('/dashboard/syarat-ketentuan');
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
