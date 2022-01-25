<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = DB::table('nilai')->get();

        return view('nilai', ['nilai' => $nilai]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', Rule::unique('nilai')],
            'quis' => ['required', 'integer', 'min:0', 'max:100'],
            'tugas' => ['required', 'integer', 'min:0', 'max:100'],
            'absensi' => ['required', 'integer', 'min:0', 'max:100'],
            'praktek' => ['required', 'integer', 'min:0', 'max:100'],
            'uas' => ['required', 'integer', 'min:0', 'max:100'],
        ]);

        try {
            $nilai = ($request->quis + $request->tugas + $request->absensi + $request->praktek + $request->uas) / 5;
            $grade = $nilai <= 65 ? 'D' : ($nilai <= 75 ? 'C' : ($nilai <= 85 ? 'B' : 'A'));

            DB::table('nilai')->insert(
                array(
                    'name' => $request->name,
                    'quis' => $request->quis,
                    'tugas' => $request->tugas,
                    'absensi' => $request->absensi,
                    'praktek' => $request->praktek,
                    'uas' => $request->uas,
                    'nilai' => $nilai,
                    'grade' => $grade,
                )
            );
        }
        catch (QueryException $e) {
            switch ($e->errorInfo[1]) {
                default:
                    Log::channel('stderr')->error($e->getMessage());
                    break;
            }
        }

        return redirect()->route('nilai');
    }

    public function get(Request $request, $id)
    {
        $nilai = DB::table('nilai')->where('id', $id)->first();

        if (!$nilai) {
            return redirect()->route('nilai');
        }

        return view('input', ['nilai' => $nilai]);
    }

    public function put(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', Rule::unique('nilai')->ignore($id)],
            'quis' => ['required', 'integer', 'min:0', 'max:100'],
            'tugas' => ['required', 'integer', 'min:0', 'max:100'],
            'absensi' => ['required', 'integer', 'min:0', 'max:100'],
            'praktek' => ['required', 'integer', 'min:0', 'max:100'],
            'uas' => ['required', 'integer', 'min:0', 'max:100'],
        ]);

        try {
            $nilai = ($request->quis + $request->tugas + $request->absensi + $request->praktek + $request->uas) / 5;
            $grade = $nilai <= 65 ? 'D' : ($nilai <= 75 ? 'C' : ($nilai <= 85 ? 'B' : 'A'));

            DB::table('nilai')->where('id', $id)->update(
                array(
                    'name' => $request->name,
                    'quis' => $request->quis,
                    'tugas' => $request->tugas,
                    'absensi' => $request->absensi,
                    'praktek' => $request->praktek,
                    'uas' => $request->uas,
                    'nilai' => $nilai,
                    'grade' => $grade,
                )
            );
        }
        catch (QueryException $e) {
            switch ($e->errorInfo[1]) {
                default:
                    Log::channel('stderr')->error($e->getMessage());
                    break;
            }
        }

        return redirect()->route('nilai');
    }

    public function delete(Request $request, $id)
    {
        DB::table('nilai')->delete($id);

        return redirect()->route('nilai');
    }
}
