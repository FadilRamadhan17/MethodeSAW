<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\AlternatifKriteriaValue;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class MethodeSAWController extends Controller
{
    public function index()
    {
        $data = AlternatifKriteriaValue::with('kriteria', 'alternatif')->get();

        return view('menu.methodewp', compact('data'));
    }

    public function methodesaw()
    {

        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();
        $altkrit = AlternatifKriteriaValue::all();

        if ($altkrit->isEmpty()) {
            return view('kosong.index');
        }

        // Membuat array untuk menyimpan bobot kriteria
        $max = [];

        $results = [];

        foreach ($alternatif as $a) {
            $resultRow = [];

            foreach ($kriteria as $k) {
                // Mencari data dari tabel AlternatifKriteriaValue berdasarkan id alternatif dan kriteria
                $altKriteriaData = $altkrit->where('alternatif_id', $a->id)->where('kriteria_id', $k->id)->first();

                if ($altKriteriaData) {
                    // Jika data ditemukan, akses nilai 'value'
                    $value = $altKriteriaData->value;

                    // Akses total value berdasarkan id_kriteria dari $sums
                    $maxKriteria = AlternatifKriteriaValue::where('kriteria_id', $k->id)->max('value');
                    $max[$k->id] = $maxKriteria;

                    // Hitung hasil
                    $result = $value / $maxKriteria;

                    $resultRow[$k->id] = round($result, 2);
                } else {
                    // Jika data tidak ditemukan, lakukan sesuatu jika diperlukan
                    // Contoh: $resultRow[$k->id] = 0;
                }
            }

            $results[$a->id] = $resultRow;
        }

        return view('menu.methodewp', compact('results', 'alternatif', 'kriteria'));
    }

    public function hasil()
    {

        $alternatif = Alternatif::all();
        $kriteria = Kriteria::all();
        $altkrit = AlternatifKriteriaValue::all();

        if ($altkrit->isEmpty()) {
            return view('kosong.index');
        }

        // Membuat array untuk menyimpan bobot kriteria
        $max = [];

        $results = [];

        foreach ($alternatif as $a) {
            $resultRow = [];

            foreach ($kriteria as $k) {
                // Mencari data dari tabel AlternatifKriteriaValue berdasarkan id alternatif dan kriteria
                $altKriteriaData = $altkrit->where('alternatif_id', $a->id)->where('kriteria_id', $k->id)->first();

                if ($altKriteriaData) {
                    // Jika data ditemukan, akses nilai 'value'
                    $value = $altKriteriaData->value;

                    // Akses total value berdasarkan id_kriteria dari $sums
                    $maxKriteria = AlternatifKriteriaValue::where('kriteria_id', $k->id)->max('value');
                    $max[$k->id] = $maxKriteria;

                    // Hitung hasil
                    $result = $value / $maxKriteria;

                    $resultRow[$k->id] = round($result, 2);
                } else {
                    // Jika data tidak ditemukan, lakukan sesuatu jika diperlukan
                    // Contoh: $resultRow[$k->id] = 0;
                }
            }

            $results[$a->id] = $resultRow;
        }

        $finalResults = [];

        foreach ($alternatif as $a) {
            $finalResult = 0;

            foreach ($kriteria as $k) {
                // Mencari data bobot kriteria berdasarkan id kriteria
                $bobot = $k->bobot;

                // Mengakses hasil perhitungan dari $results
                $result = $results[$a->id][$k->id];

                // Melakukan perkalian hasil perhitungan dengan bobot kriteria
                $finalResult += $result * $bobot;
            }

            $finalResults[$a->id] = $finalResult;
        }

        arsort($finalResults);

        // Inisialisasi array untuk menyimpan peringkat
        $ranking = [];

        // Hitung peringkat dan simpan dalam array
        $rank = 1;
        foreach ($finalResults as $alternatifId => $hasil) {
            $alternatif = Alternatif::find($alternatifId); // Mengambil data alternatif berdasarkan ID

            if ($alternatif) {
                $ranking[] = [
                    'rank' => $rank,
                    'alternatif_keterangan' => $alternatif->keterangan,
                    'alternatif_name' => $alternatif->nama,
                    'final_value' => $hasil,
                ];
            }

            $rank++;
        }

        return view('menu.hasil', compact('finalResults', 'alternatif', 'ranking'));
    }
}
