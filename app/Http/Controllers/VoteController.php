<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;

class VoteController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Anda harus login terlebih dahulu!');
        }

        $userId = Auth::id();
        $voteCount = DB::table('vote')->count();
        $hasVoted = DB::table('vote')->where('user_id', $userId)->exists();

        $paslon1 = DB::table('vote')->where('paslon', 1)->count();
        $paslon2 = DB::table('vote')->where('paslon', 2)->count();

        $paslon1Percentage = $voteCount > 0 ? round(($paslon1 / $voteCount) * 100) : 0;
        $paslon2Percentage = $voteCount > 0 ? round(($paslon2 / $voteCount) * 100) : 0;

        return view('vote', [
            'voteCount' => $voteCount,
            'hasVoted' => $hasVoted,
            'paslon1' => $paslon1,
            'paslon1Percentage' => $paslon1Percentage,
            'paslon2' => $paslon2,
            'paslon2Percentage' => $paslon2Percentage,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'paslon' => 'required|integer',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $paslon = $request->input('paslon');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $userId = Auth::id();

        $referenceLat = -6.249117976950397;
        $referenceLon = 107.01034013743455;

        if (is_null($latitude) || is_null($longitude)) {
            return redirect()->back()->with('error', 'Lokasi Anda tidak dapat di deteksi!');
        }

        $distance = $this->distanceBetween($latitude, $longitude, $referenceLat, $referenceLon);

        if ($distance > 1) {
            return redirect()->back()->with('error', 'Anda tidak berada di dalam radius 1km dari lokasi voting!');
        }

        $existingVote = DB::table('vote')->where('user_id', $userId)->first();
        if ($existingVote) {
            return redirect()->back()->with('error', 'Anda sudah memberikan suara!');
        }

        DB::transaction(function () use ($userId, $paslon) {
            DB::table('vote')->insert([
                'user_id' => $userId,
                'paslon' => $paslon,
                'created_at' => now('Asia/Jakarta'),
                'updated_at' => now('Asia/Jakarta'),
            ]);

            Notification::create([
                'user_id' => $userId,
                'notification' => 'Pengguna melakukan voting',
            ]);
        });

        return redirect()->back()->with('success', 'Voting Anda telah diterima!');
    }

    private function distanceBetween($lat1, $lon1, $lat2, $lon2)
    {
        $earth_radius = 6371;
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $lat1 = deg2rad($lat1);
        $lat2 = deg2rad($lat2);
        $a = sin($dLat / 2) * sin($dLat / 2) + sin($dLon / 2) * sin($dLon / 2) * cos($lat1) * cos($lat2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $earth_radius * $c;
    }
}
