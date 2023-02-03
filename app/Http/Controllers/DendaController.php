<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\denda;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class DendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $per = $request->per ? $request->per : 10;

        $dendas = denda::with(['pesanan'])->where(function ($q) use ($request) {
            $q->where('telat_berapa_hari', 'LIKE', '%' . $request->search . '%');
        })->paginate($per);

        return view('dashboard.denda.index', [
            'dendas' =>  $dendas,
            'request' => $request
        ]);
    }

    public function cetak($id) {
        $denda = denda::find($id);
        $pdf = Pdf::loadView('laporan.denda', compact('denda'))->setPaper('a4', 'landscape');
        return $pdf->download('Struk Pesanan.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.denda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(DendaController $syaratKetentuan)
    {
        //
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
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

