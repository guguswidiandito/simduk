<?php

namespace App\Http\Controllers;

use App\Pendatang;
use Illuminate\Http\Request;
use Session;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Html\Builder;

class PendatangsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
            $pendatangs = Pendatang::with('penduduk')->get();
            return Datatables::of($pendatangs)
                ->addColumn('action', function ($pendatangs) {
                    return view('datatable._action', [
                        'model'           => $pendatangs,
                        'form_url'        => route('pendatang.destroy', $pendatangs->id),
                        'edit_url'        => route('pendatang.edit', $pendatangs->id),
                        'show_url'        => route('pendatang.show', $pendatangs->id),
                        'confirm_message' => 'Yakin mau menghapus ' . $pendatangs->nama . '?',

                    ]);
                })->make(true);
        }
        $html = $htmlBuilder
            ->addColumn(['data' => 'no_pendatang', 'nama' => 'no_pendatang', 'title' => 'No Pendatang'])
            ->addColumn(['data' => 'penduduk.nama', 'name' => 'penduduk.nama', 'title' => 'Nama'])
            ->addColumn(['data' => 'action', 'name' => 'action', 'title' => 'Opsi', 'orderable' => false, 'searchable' => false]);
        return view('pendatang.index')->with(compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pendatang.create');
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
            'no_pendatang' => 'required',
            'penduduk_id'  => 'required',
            'tgl_datang'   => 'required',
            'alamat_asal'  => 'required',
            'keterangan'   => 'required',
        ]);
        $pendatangs = Pendatang::create($request->all());
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil menyimpan $pendatangs->no_pendatang",
        ]);
        return redirect()->route('pendatang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pendatangs = Pendatang::find($id);
        return view('pendatang.show')->with(compact('pendatangs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pendatangs = Pendatang::find($id);
        return view('pendatang.edit')->with(compact('pendatangs'));
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
            'no_pendatang' => 'required',
            'penduduk_id'  => 'required',
            'tgl_datang'   => 'required',
            'alamat_asal'  => 'required',
            'keterangan'   => 'required',
        ]);
        $pendatangs = Pendatang::find($id);
        $pendatangs->update($request->all());
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil mengupdate $pendatangs->no_pendatang",
        ]);
        return redirect()->route('pendatang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $pendatangs = Pendatang::find($id);
        $pendatangs->kematian()->delete();
        $pendatangs->pendatang()->delete();
        $pendatangs->pindah()->delete();
        $pendatangs->delete();
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil menghapus $pendatangs->no_pendatang",
        ]);
        return redirect()->route('pendatang.index');
    }
}
