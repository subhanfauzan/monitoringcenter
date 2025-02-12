<?php

namespace App\Http\Controllers;

use App\Imports\ImportTiket;
use App\Models\Dapot;
use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totaltiket = Tiket::count();
        return view('pages.tiket', compact('totaltiket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'site_id' => 'required',
        ]);

        // Get site data
        $site = Dapot::where('site_id', $request->site_id)->first();

        $create = Tiket::create([
            'site_id' => $site->site_id,
            'site_name' => '',
            'saverity' => '',
            'nop' => $site->nop,
            'cluster_to' => $site->cluster_to,
            'suspect_problem' => '',
            'status_site' => '',
            'time_down' => '',
            'waktu_saat_ini' => '',
            'tim_fop' => '',
            'ticket_swfm' => '',
            'remark' => '',
        ]);

        if ($create) {
            return redirect()->route('tiket.index')->with('success', 'Data berhasil disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $tiket = Tiket::findOrFail($id);
            $tiket->delete();

            return response()->json([
                'success' => true,
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);

        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = $file->hashName();

        //temporary file

        $path = $file->storeAs('excel', $nama_file, 'public');

        $import = Excel::import(new ImportTiket(), public_path('storage/excel/' . $nama_file));

        //remove from server
        Storage::delete($path);

        if ($import) {
            //redirect
            // dd($file, $nama_file, $path);
            return redirect()
                ->route('tiket.index')
                ->with(['success' => 'Data Berhasil Diimport!']);
        } else {
            //redirect
            dd($file, $nama_file, $path);

            return redirect()
                ->route('tiket.index')
                ->with(['error' => 'Data Gagal Diimport!']);
        }
    }
}
