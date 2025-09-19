<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\Siswa;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function peminjaman($id)
{
    $book = Buku::findOrFail($id);
    return view('peminjaman', compact('book'));
}

    public function prosesPinjam(Request $request)
    {
        $request->validate([
            'nisn' => 'required|string',
            'name' => 'required',
            'no_tlp' => 'required',
            'buku_id' => 'required|exists:Bukus,id'
        ]);

        $student = Siswa::where('nisn', $request->nisn)
                        ->where('name', $request->name)
                        ->where('no_tlp', $request->no_tlp)
                        ->first();

        if (!$student) {
            return back()->withErrors([
                'error' => 'Data siswa tidak ditemukan atau Ada data yang salah'
            ]);
        }

        // Proses peminjaman
        Peminjaman::create([
            'siswa_id' => $student->id,
            'buku_id' => $request->buku_id,
            'tgl_pinjam' => now()->format('Y-m-d'),
            'tgl_jatuh_tempo' => now()->addDays(14)->format('Y-m-d'),
            'status' => 'dipinjam'
        ]);

        // Update status buku
        Buku::where('id', $request->buku_id)->update(['status' => 'tidak Tersedia']);

        return redirect('/perpustakaan/list-buku')->with('status', 'Peminjaman buku berhasil!');
    }

        public function kembalikanBuku($id)
    {
        // Temukan data peminjaman
        $peminjaman = Peminjaman::findOrFail($id);

        // Validasi status buku
        if ($peminjaman->status === 'kembali') {
            return back()->with('error', 'Buku ini sudah dikembalikan sebelumnya');
        }

            // Update status peminjaman
            $peminjaman->update([
                'status' => 'kembali'
            ]);
            // Update status buku menjadi tersedia
            $peminjaman->buku()->update(['status' => 'tersedia']);

        return back()->with('status', 'Buku berhasil dikembalikan');
    }

    public function destroy($id)
    {
            $peminjaman = Peminjaman::findOrFail($id);
            $peminjaman->delete();
            return redirect()->back()->with('status', 'Data log peminjaman berhasil dihapus');
    }

}
