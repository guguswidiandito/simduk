<?php

namespace App\Http\Controllers;

use App\Kelahiran;
use App\Kk;
use Illuminate\Http\Request;
use Session;

class KksController extends Controller
{
    public function index()
    {
        $kk = Kk::all();
        return view('kk.index')->withKk($kk);
    }

    public function create()
    {
        return view('kk.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'no_kk'     => 'required|unique:kks',
            'pindah_id' => 'required',
            'nama_kk'   => 'required',
            'alamat_kk' => 'required',
        ]);
        $kks = Kk::create($request->all());
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil menyimpan $kks->no_kk",
        ]);
        return redirect()->route('kk.index');
    }

    public function show($id)
    {
        $kks = Kk::find($id);
        return view('kk.show')->with(compact('kks'));
    }

    public function edit($id)
    {
        $kks = Kk::find($id);
        return view('kk.edit')->with(compact('kks'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'no_kk'     => 'required',
            'pindah_id' => 'required',
            'nama_kk'   => 'required',
            'alamat_kk' => 'required',
        ]);
        $kks = Kk::find($id);
        $kks->update($request->all());
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil menyimpan $kks->no_kk",
        ]);
        return redirect()->route('kk.index');
    }

    public function destroy($id)
    {
        $kks = Kk::find($id);
        $kks->delete($request->all());
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil menghapus $kks->no_kk",
        ]);
        return redirect()->route('kk.index');
    }

    public function kelahiran($no_kk)
    {
        $kk = Kk::whereNoKk($no_kk)->first()->get();
        return view('kk.kelahiran-index')->withKk($kk);
    }

    public function createKelahiran(Request $request, $no_kk)
    {
        $this->validate($request, [
            'no_akte'       => 'required|unique:kelahirans|integer',
            'nama_anak'     => 'required',
            'nama_orangtua' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        $kk            = Kk::whereNoKk($no_kk)->first();
        $data          = $request->all();
        $data['kk_id'] = $kk->id;
        $kelahiran     = Kelahiran::create($data);
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil menyimpan $kelahiran->no_akte",
        ]);
        return redirect()->back();
    }

    public function editKelahiran($no_kk, $no_akte)
    {
        $kelahiran = Kelahiran::whereNoAkte($no_akte)->first();
        return view('kk.kelahiran-edit')->withKelahiran($kelahiran);
    }

    public function updateKelahiran(Request $request, $no_kk, $no_akte)
    {
        $this->validate($request, [
            'no_akte'       => 'required|integer',
            'nama_anak'     => 'required',
            'nama_orangtua' => 'required',
            'jenis_kelamin' => 'required',
        ]);
        $kelahiran = Kelahiran::whereNoAkte($no_akte)->first();
        $kelahiran->update($request->all());
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil mengubah $kelahiran->no_akte",
        ]);
        return redirect(url('kk/' . $kelahiran->kk->no_kk . '/kelahiran'));
    }

    public function deleteKelahiran($no_kk, $no_akte)
    {
        $kelahiran = Kelahiran::whereNoAkte($no_akte)->first();
        $kelahiran->delete();
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil menghapus $kelahiran->no_akte",
        ]);
        return redirect()->back();
    }
}
