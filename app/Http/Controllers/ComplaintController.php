<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function index()
    {
        $data = Complaint::where('user_id', Auth::id())->latest()->get();
        return view('dashboard', compact('data'));
    }

    public function admin()
    {
        $data = Complaint::latest()->get();
        return view('admin', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'foto' => 'nullable|image'
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->store('complaints', 'public');
        }

        Complaint::create([
            'user_id' => Auth::id(),
            'judul' => $request->judul,
            'isi' => $request->isi,
            'foto' => $foto,
            'status' => 'pending'
        ]);

        return back();
    }

    public function status(Request $request, $id)
    {
        Complaint::findOrFail($id)->update([
            'status' => $request->status
        ]);

        return back();
    }

    public function destroy($id)
    {
        Complaint::findOrFail($id)->delete();
        return back();
    }

    public function selesai($id)
    {
        Complaint::where('id', $id)
        ->where('user_id', Auth::id())
        ->delete();

        return back();
    }
}