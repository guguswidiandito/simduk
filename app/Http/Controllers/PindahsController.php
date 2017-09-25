<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pindah;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class PindahsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $pindahs = Pindah::with('penduduk')->get();   
                return Datatables::of($pindahs)
                ->addColumn('action', function($pindahs){
                    return view('datatable._action', [
                    'model' => $pindahs,
                    'form_url' => route('pindah.destroy', $pindahs->id),
                    'edit_url' => route('pindah.edit', $pindahs->id),
                    'show_url' => route('pindah.show', $pindahs->id),
                    'confirm_message' => 'Yakin mau menghapus ' . $pindahs->no_pindah . '?'

                ]);
            })->make(true);
        }
    $html = $htmlBuilder
        ->addColumn(['data' => 'no_pindah', 'nama'=>'no_pindah', 'title'=>'No Pindah'])   
        ->addColumn(['data' => 'penduduk.nama', 'name'=>'penduduk.nama', 'title'=>'Nama'])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Opsi', 'orderable'=>false, 'searchable'=>false]);
        return view('pindah.index')->with(compact('html'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pindah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'no_pindah'=>'required',
            'penduduk_id'=>'required',
            'tgl_pindah'=>'required',
            'alamat_tuju'=>'required',
            'keterangan'=>'required'
            ]);
        $pindahs = Pindah::create($request->all());
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $pindahs->no_pindah"
        ]);
        return redirect()->route('pindah.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pindahs = Pindah::find($id);
        return view('pindah.show')->with(compact('pindahs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pindahs = Pindah::find($id);
        return view('pindah.edit')->with(compact('pindahs'));
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
        $this->validate($request, [
            'no_pindah'=>'required',
            'penduduk_id'=>'required',
            'tgl_pindah'=>'required',
            'alamat_tuju'=>'required',
            'keterangan'=>'required'
            ]);
        $pindahs = Pindah::find($id);
        $pindahs->update($request->all());
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil mengupdate $pindahs->no_pindah"
        ]);
        return redirect()->route('pindah.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $pindahs = Pindah::find($id);
        $pindahs->delete($request->all());
        Session::flash("flash_notification", [
             "level"=>"success",
             "message"=>"Berhasil menghapus $pindahs->no_pindah"
            ]);
        return redirect()->route('pindah.index');
    }
}
