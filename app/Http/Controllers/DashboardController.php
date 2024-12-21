<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        $voteCount = DB::table('vote')->count();
        $paslon1 = DB::table('vote')->where('paslon', 1)->count();
        $paslon2 = DB::table('vote')->where('paslon', 2)->count();

        $paslon1Percentage = $voteCount > 0 ? round(($paslon1 / $voteCount) * 100) : 0;
        $paslon2Percentage = $voteCount > 0 ? round(($paslon2 / $voteCount) * 100) : 0;

        $notifications = DB::table('notifications')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($notification) {
                $notification->formatted_created_at = date('d M Y H:i', strtotime($notification->created_at));
                return $notification;
            });

        $users = User::with('member')->get();

        return view('dashboard', compact('notifications', 'voteCount', 'paslon1', 'paslon1Percentage', 'paslon2', 'paslon2Percentage', 'users'));
    }

    public function userStore(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required',
            'token' => 'nullable',
            'universitas' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'nim' => 'nullable', // NIM is optional now
            'nomor_telpon' => 'required',
            'pekerjaan' => 'required',
            'divisi' => 'required',
            'jabatan' => 'required',
            'periode' => 'required',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'token' => str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT),
        ]);

        if (!$user) {
            return redirect()->back()->withErrors(['msg' => 'Failed to create user']);
        }

        $member = $user->member()->create([
            'universitas' => $request->universitas,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'nim' => $request->nim,  // Make sure NIM is nullable
            'nomor_telpon' => $request->nomor_telpon,
            'pekerjaan' => $request->pekerjaan,
            'divisi' => $request->divisi,
            'jabatan' => $request->jabatan,
            'periode' => $request->periode,
        ]);

        if (!$member) {
            return redirect()->back()->withErrors(['msg' => 'Failed to create member details']);
        }

        return redirect()->route('dashboard.index')->with('success', 'User created successfully.');
    }


    public function userUpdate(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'role' => 'required',
            'token' => 'nullable',
            'universitas' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'nim' => 'required',
            'nomor_telpon' => 'required',
            'pekerjaan' => 'required',
            'divisi' => 'required',
            'jabatan' => 'required',
            'periode' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'role' => $request->role,
            'token' => $request->token,
        ]);

        $user->member()->update($request->only([
            'universitas', 'nama', 'alamat', 'nim', 'nomor_telpon', 'pekerjaan', 'divisi', 'jabatan', 'periode'
        ]));

        return redirect()->route('dashboard.index')->with('success', 'User updated successfully.');
    }

    public function userDestroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->member()->delete();
        $user->delete();

        return redirect()->route('dashboard.index')->with('success', 'User deleted successfully.');
    }
}
