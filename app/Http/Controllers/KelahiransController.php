<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelahiran;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;

class KelahiransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $kelahirans = Kelahiran::with('kk')->get();   
                return Datatables::of($kelahirans)
                ->addColumn('action', function($kelahirans){
                    return view('datatable._action', [
                    'model' => $kelahirans,
                    'form_url' => route('kelahiran.destroy', $kelahirans->id),
                    'edit_url' => route('kelahiran.edit', $kelahirans->id),
                    'show_url' => route('kelahiran.show', $kelahirans->id),
                    'confirm_message' => 'Yakin mau menghapus ' . $kelahirans->nama . '?'

                ]);
            })->make(true);
        }
    $html = $htmlBuilder
        ->addColumn(['data' => 'no_akte', 'nama'=>'no_akte', 'title'=>'No Akte'])   
        ->addColumn(['data' => 'nama_anak', 'name'=>'nama_anak', 'title'=>'Nama Anak'])
        ->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'Opsi', 'orderable'=>false, 'searchable'=>false]);
        return view('kelahiran.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kelahiran.create');
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
            'no_akte'=>'required',
            'nama_anak'=>'required',
            'nama_orangtua'=>'required',
            'jenis_kelamin'=>'required',
            'kk_id'=>'required'
            ]);
        $kelahirans = Kelahiran::create($request->all());
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $kelahirans->no_akte"
        ]);
        return redirect()->route('kelahiran.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $kelahirans = Kelahiran::find($id);
        return view('kelahiran.show')->with(compact('kelahirans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelahirans = Kelahiran::find($id);
        return view('kelahiran.edit')->with(compact('kelahirans'));
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
            'no_akte'=>'required',
            'nama_anak'=>'required',
            'nama_orangtua'=>'required',
            'jenis_kelamin'=>'required',
            'kk_id'=>'required'
            ]);
        $kelahirans = Kelahiran::find($id);
        $kelahirans->update($request->all());
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menyimpan $kelahirans->no_akte"
        ]);
        return redirect()->route('kelahiran.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $kelahirans = Kelahiran::find($id);
        $kelahirans->delete($request->all());
        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Berhasil menghapus $kelahirans->no_akte"
        ]);
        return redirect()->route('kelahiran.index');
    }
}
