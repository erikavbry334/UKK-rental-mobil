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
        $per = $request->per ? $request->per : 10;

        $syarats = SyaratKetentuan::where(function ($q) use ($request) {
            $q->where('syarat', 'LIKE', '%' . $request->search . '%');
        })->paginate($per);
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
            'syarat' => 'required',
            'ketentuan' => 'required',
        ]);

        SyaratKetentuan::create($data);
        return redirect('/dashboard/syarat-ketentuan')->with('success', 'Data berhasil ditambahkan');
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
