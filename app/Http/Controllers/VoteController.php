<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Anda harus login terlebih dahulu!');
        }

        $request->validate([
            'paslon' => 'required|integer',
        ]);

        $paslon = $request->input('paslon');
        $userId = Auth::id();

        $existingVote = DB::table('vote')->where('user_id', $userId)->first();
        if ($existingVote) {
            return redirect()->back()->with('error', 'Anda sudah memberikan suara!');
        }

        DB::table('vote')->insert([
            'user_id' => $userId,
            'paslon' => $paslon,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Voting Anda telah diterima!');
    }
}
