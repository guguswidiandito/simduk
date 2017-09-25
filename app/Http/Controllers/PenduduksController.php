<?php

namespace App\Http\Controllers;

use App\Kematian;
use App\Pendatang;
use App\Penduduk;
use App\Pindah;
use Illuminate\Http\Request;
use Session;

class PenduduksController extends Controller
{
    public function index(Request $request)
    {
        $penduduks = Penduduk::paginate(10);
        return view('penduduk.index')->withPenduduks($penduduks);
    }

    public function create()
    {
        return view('penduduk.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'no_ktp'              => 'required|unique:penduduks',
            'nama'                => 'required|unique:penduduks',
            'agama'               => 'required',
            'alamat'              => 'required',
            'pendidikan_terakhir' => 'required',
            'status'              => 'required',
            'pekerjaan'           => 'required',
        ]);
        $penduduks = Penduduk::create($request->all());
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil menyimpan $penduduks->nama",
        ]);
        return redirect()->route('penduduk.index');
    }

    public function show($id)
    {
        $penduduks = Penduduk::find($id);
        return view('penduduk.show')->with(compact('penduduks'));
    }

    public function edit($id)
    {
        $penduduks = Penduduk::find($id);
        return view('penduduk.edit')->with(compact('penduduks'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'no_ktp'              => 'required',
            'nama'                => 'required',
            'agama'               => 'required',
            'alamat'              => 'required',
            'pendidikan_terakhir' => 'required',
            'status'              => 'required',
            'pekerjaan'           => 'required',
        ]);
        $penduduks = Penduduk::find($id);
        $penduduks->update($request->all());
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil mengupdate $penduduks->nama",
        ]);
        return redirect()->route('penduduk.index');
    }

    public function destroy(Request $request, $id)
    {
        $penduduks = Penduduk::find($id);
        $penduduks->delete($request->all());
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil menghapus $penduduks->nama",
        ]);
        return redirect()->route('penduduk.index');
    }

    public function pindah($no_ktp)
    {
        $penduduk = Penduduk::where('no_ktp', $no_ktp);
        return view('penduduk.pindah-index')->withPenduduk($penduduk);
    }

    public function createPindah(Request $request, $no_ktp)
    {
        $this->validate($request, [
            'no_pindah'   => 'required|unique:pindahs',
            'tgl_pindah'  => 'required',
            'alamat_tuju' => 'required',
            'keterangan'  => 'required',
        ]);
        $penduduk = Penduduk::where('no_ktp', $no_ktp)->get();
        foreach ($penduduk as $p) {
            $penduduk = $p->id;
        }
        $data                = $request->all();
        $data['penduduk_id'] = $penduduk;
        $pindah              = Pindah::create($data);
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil menambahkan $pindah->no_pindah",
        ]);
        return redirect()->back();
    }

    public function editPindah($no_ktp, $no_pindah)
    {
        $pindah = Pindah::where('no_pindah', $no_pindah)->first();
        return view('penduduk.pindah-edit')->withPindah($pindah);
    }

    public function updatePindah(Request $request, $no_ktp, $no_pindah)
    {
        $this->validate($request, [
            'no_pindah'   => 'required',
            'tgl_pindah'  => 'required',
            'alamat_tuju' => 'required',
            'keterangan'  => 'required',
        ]);
        $pindah = Pindah::where('no_pindah', $no_pindah)->first();
        $pindah->update($request->all());
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil mengubah $pindah->no_pindah",
        ]);
        return redirect(url('penduduk/' . $pindah->penduduk->no_ktp . '/pindah'));
    }

    public function deletePindah($no_ktp, $no_pindah)
    {
        $pindah = Pindah::where('no_pindah', $no_pindah)->first();
        $pindah->delete();
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil menghapus $datang->no_pindah",
        ]);
        return redirect()->back();
    }

    public function datang($no_ktp)
    {
        $penduduk = Penduduk::where('no_ktp', $no_ktp);
        return view('penduduk.pendatang-index')->withPenduduk($penduduk);
    }

    public function createDatang(Request $request, $no_ktp)
    {
        $this->validate($request, [
            'no_pendatang' => 'required|unique:pendatangs',
            'tgl_datang'   => 'required',
            'alamat_asal'  => 'required',
            'keterangan'   => 'required',
        ]);
        $penduduk = Penduduk::where('no_ktp', $no_ktp)->get();
        foreach ($penduduk as $p) {
            $penduduk = $p->id;
        }
        $data                = $request->all();
        $data['penduduk_id'] = $penduduk;
        $datang              = Pendatang::create($data);
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil menambahkan $datang->no_pendatang",
        ]);
        return redirect()->back();
    }

    public function editDatang($no_ktp, $no_pendatang)
    {
        $datang = Pendatang::where('no_pendatang', $no_pendatang)->first();
        return view('penduduk.pendatang-edit')->withDatang($datang);
    }

    public function updateDatang(Request $request, $no_ktp, $no_pendatang)
    {
        $this->validate($request, [
            'no_pendatang' => 'required',
            'tgl_datang'   => 'required',
            'alamat_asal'  => 'required',
            'keterangan'   => 'required',
        ]);
        $datang = Pendatang::where('no_pendatang', $no_pendatang)->first();
        $datang->update($request->all());
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil mengubah $datang->no_pendatang",
        ]);
        return redirect(url('penduduk/' . $datang->penduduk->no_ktp . '/datang'));
    }

    public function deleteDatang($no_ktp, $no_pendatang)
    {
        $datang = Pendatang::where('no_pendatang', $no_pendatang)->first();
        $datang->delete();
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil menghapus $datang->no_pendatang",
        ]);
        return redirect()->back();
    }

    public function kematian($no_ktp)
    {
        $penduduk = Penduduk::where('no_ktp', $no_ktp)->first();
        return view('penduduk.kematian-index')->withPenduduk($penduduk);
    }

    public function createKematian(Request $request, $no_ktp)
    {
        $this->validate($request, [
            'no_kematian'      => 'required|unique:kematians',
            'tgl_kematian'     => 'required',
            'tempat_meninggal' => 'required',
            'sebab_meninggal'  => 'required',
        ]);
        $penduduk = Penduduk::where('no_ktp', $no_ktp)->get();
        foreach ($penduduk as $p) {
            $penduduk = $p->id;
        }
        $data                = $request->all();
        $data['penduduk_id'] = $penduduk;
        $kematian            = Kematian::create($data);
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil menambahkan $kematian->no_kematian",
        ]);
        return redirect()->back();
    }

    public function editKematian($no_ktp, $no_kematian)
    {
        $kematian = Kematian::where('no_kematian', $no_kematian)->first();
        return view('penduduk.kematian-edit')->withKematian($kematian);
    }

    public function updateKematian(Request $request, $no_ktp, $no_kematian)
    {
        $this->validate($request, [
            'no_kematian'      => 'required',
            'tgl_kematian'     => 'required',
            'tempat_meninggal' => 'required',
            'sebab_meninggal'  => 'required',
        ]);
        $kematian = Kematian::where('no_kematian', $no_kematian)->first();
        $kematian->update($request->all());
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil mengubah $kematian->no_kematian",
        ]);
        return redirect(url('penduduk/' . $kematian->penduduk->no_ktp . '/kematian'));
    }

    public function deleteKematian($no_ktp, $no_kematian)
    {
        $kematian = Kematian::where('no_kematian', $no_kematian)->first();
        $kematian->delete();
        Session::flash("flash_notification", [
            "level"   => "success",
            "message" => "Berhasil menghapus $kematian->no_kematian",
        ]);
        return redirect()->back();
    }

}
