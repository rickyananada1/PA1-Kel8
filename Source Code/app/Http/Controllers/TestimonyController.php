<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonyController extends Controller
{
    public function create()
    {
        return view('user.testimonies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'review' => 'required',
            'image' => 'required|image|max:2048',
        ]);

        $user = Auth::user();

        $imagePath = $request->file('image')->store('testimonies', 'public');

        $testimony = Testimony::create([
            'user_id' => $user->id,
            'review' => $request->input('review'),
            'image' => $imagePath,
        ]);

        return redirect()->route('testimonies.showAll', $testimony->id)->with('success', 'Testimony created successfully!');
    }

    // public function destroy(Testimony $testimony)
    // {
    //     $user = Auth::user();
    //     if ($testimony->user_id !== $user->id) {
    //         abort(403); // Jika bukan testimoni pengguna yang saat ini sedang login, berikan akses ditolak
    //     }
    //     $testimony->delete();
    //     return redirect()->route('testimonies.index')->with('success', 'Testimony deleted successfully!');
    // }

    public function showAll()
    {
        $testimonies = Testimony::all();
        return view('user.testimonies.show-all', compact('testimonies'));
    }    
    

    public function index()
    {
        $testimonies = Testimony::all();
        return view('admin.testimonies.index', compact('testimonies'));
    }

    public function adminDestroy(Testimony $testimony)
    {
        $testimony->delete();
        return redirect()->route('admin.testimonies.index')->with('success', 'Testimony deleted successfully!');
    }
    
}
