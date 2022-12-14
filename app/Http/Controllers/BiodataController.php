<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BiodataController extends Controller
{
    function showEditBiodata(Request $request) {
        $dataBiodata = DB::table('users')->select('id', 'nama', 'prodi', 'jabatan', 'status', 'email', 'nidn', 'nip', 'jabatan_fungsional', 'keaktifan')->where('id', '=', $request->id)->first();

        return response()->json($dataBiodata, 200);
    }

    function editBiodata(Request $request) {
        $rules = [
            'ubahNip' => 'required|min_digits:10|numeric',
            'ubahNidn' => 'required|min_digits:10|numeric',
            'jabatanfungsional' => 'required',
        ];

        $message = [
            'required' => 'Input :attribute tidak boleh kosongs',
            'numeric' => 'Input :attribute harus berupa angka',
            'min_digits' => 'Input :attribute minimal :min karakter'
        ];

        if ($this->validate($request, $rules, $message)) {
            DB::table('users')->where('id', '=', Auth::user()->id)->update([
                'nip' => $request->ubahNip,
                'nidn' => $request->ubahNidn,
                'prodi' => $request->prodi,
                'status' => $request->statusdosen,
                'jabatan' => $request->jabatan,
                'jabatan_fungsional' => $request->jabatanfungsional,
                'status_serdos' => $request->ubahSerdos,
                'nomor_sertifikasi' => $request->ubahSertifikasi
            ]);
        }

        return redirect('/rencana-kerja/'.Auth::user()->periode.'/biodata');
    }

}
