<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        // Mengambil semua laporan dari Supabase, diurutkan dari yang terbaru
        $reports = Report::orderBy('created_at', 'desc')->get();
        return view('welcome', compact('reports'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Simpan data ke Supabase
        Report::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // Kembali ke halaman utama dengan pesan sukses
        return redirect()->back()->with('success', 'Laporan berhasil dikirim!');
    }
}