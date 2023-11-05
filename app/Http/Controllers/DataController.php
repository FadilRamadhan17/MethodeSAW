<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\AlternatifKriteriaValue;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index()
    {
        return view('data.index');
    }

    public function indexkriteria()
    {
        $kriteria = Kriteria::orderBy('id', 'DESC')->get();

        return view('data.kriteria.index', compact('kriteria'));
    }

    public function createkriteria()
    {
        return view('data.kriteria.create');
    }

    public function storekriteria(Request $request)
    {

        $this->validate($request, [
            'kriteria' => 'required',
            'bobot' => 'required',
        ]);


        Kriteria::create([
            'kriteria' => $request->kriteria,
            'bobot' => $request->bobot,
        ]);

        return redirect()->route('kriteria')->with(['success' => 'Data berhasil disimpan!']);
    }

    public function editkriteria(string $id)
    {
        $kriteria = Kriteria::findOrFail($id);

        return view('data.kriteria.edit', compact('kriteria'));
    }

    public function updatekriteria(Request $request, string $id)
    {
        $this->validate($request, [
            'kriteria' => 'required',
            'bobot' => 'required',
        ]);

        $kriteria = Kriteria::findOrFail($id);

        $kriteria->update([
            'kriteria' => $request->kriteria,
            'bobot' => $request->bobot,
        ]);

        return redirect()->route('kriteria')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroykriteria(string $id)
    {
        $kriteria = Kriteria::findOrFail($id);

        $kriteria->delete();

        return redirect()->route('kriteria')->with(['success' => 'Data Berhasil di Hapus!']);
    }

    public function indexalternatif()
    {
        $alternatif = Alternatif::orderBy('id', 'DESC')->get();

        return view('data.alternatif.index', compact('alternatif'));
    }

    public function createalternatif()
    {
        return view('data.alternatif.create');
    }

    public function storealternatif(Request $request)
    {

        $this->validate($request, [
            'nama' => 'required',
            'keterangan' => 'required',
        ]);


        Alternatif::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('alternatif')->with(['success' => 'Data berhasil disimpan!']);
    }

    public function editalternatif(string $id)
    {
        $alternatif = Alternatif::findOrFail($id);

        return view('data.alternatif.edit', compact('alternatif'));
    }

    public function updatealternatif(Request $request, string $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        $kriteria = Alternatif::findOrFail($id);

        $kriteria->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('alternatif')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    public function destroyalternatif(string $id)
    {
        $kriteria = Alternatif::findOrFail($id);

        $kriteria->delete();

        return redirect()->route('alternatif')->with(['success' => 'Data Berhasil di Hapus!']);
    }

    public function indexdata()
    {
        $data = AlternatifKriteriaValue::all();
        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();

        return view('data.data.index', compact('data', 'alternatif', 'kriteria'));
    }

    public function createdata()
    {
        $data = AlternatifKriteriaValue::all();
        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();
        // $alternatifData = Alternatif::orderBy('id', 'DESC')->get();
        // $kriteriaData = Kriteria::orderBy('id', 'DESC')->get();
        return view('data.data.create', compact('data', 'alternatif', 'kriteria'));
    }

    public function storedata(Request $request)
    {
        // dd($request->all());

        $data = $request->input('data');

        foreach ($data as $idAlternatif => $kriteriaData) {
            foreach ($kriteriaData as $idKriteria => $rowData) {
                $value = $rowData['value'];
                $idAlternatif = $rowData['id_alternatif'];
                $idKriteria = $rowData['id_kriteria'];

                AlternatifKriteriaValue::where('alternatif_id', $idAlternatif)
                    ->where('kriteria_id', $idKriteria)
                    ->delete();

                AlternatifKriteriaValue::create([
                    'alternatif_id' => $idAlternatif,
                    'kriteria_id' => $idKriteria,
                    'value' => $value,
                ]);
            }
        }

        // $request->validate([
        //     'kriteria_id' => 'required',
        //     'alternatif_id' => 'required',
        //     'value' => 'required',
        // ]);

        // AlternatifKriteriaValue::create([
        //     'alternatif_id' => $request->alternatif_id,
        //     'kriteria_id' => $request->kriteria_id,
        //     'value' => $request->value,
        // ]);

        return redirect()->route('data.value')->with(['success' => 'Data berhasil disimpan!']);
    }

    // public function editdata(string $id)
    // {
    //     $alternatif = Alternatif::orderBy('id', 'DESC')->get();
    //     $kriteria = Kriteria::orderBy('id', 'DESC')->get();
    //     $data = AlternatifKriteriaValue::with('alternatif', 'kriteria')->get();

    //     return view('data.data.edit', compact('kriteria', 'alternatif', 'data'));
    // }

    // public function updatedata(Request $request, string $id)
    // {

    //     $request->validate([
    //         'kriteria_id' => 'required',
    //         'alternatif_id' => 'required',
    //         'value' => 'required',
    //     ]);

    //     $data = Alternatif::findOrFail($id);

    //     $data->update([
    //         'alternatif_id' => $request->alternatif_id,
    //         'kriteria_id' => $request->kriteria_id,
    //         'value' => $request->value,
    //     ]);

    //     return redirect()->route('data')->with(['success' => 'Data Berhasil Diupdate!']);
    // }

    // public function destroydata(string $id)
    // {
    //     $data = AlternatifKriteriaValue::findOrFail($id);

    //     $data->delete();

    //     return redirect()->route('data')->with(['success' => 'Data Berhasil di Hapus!']);
    // }
}
