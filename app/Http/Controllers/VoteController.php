<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Voter;


class VoteController extends Controller
{

    public function showLoginForm()
    {
        return view('vote.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'password' => 'required|string',
        ]);

        $voter = Voter::where('student_id', $request->input('student_id'))->first();

        if ($voter && $request->input('password') === $voter->password) {
            session(['voter_logged_in' => true, 'voter_id' => $voter->id, 'voter_username' => $voter->username]);

            return redirect()->route('vote.index');
        } else {
            return back()->withErrors([
                'student_id' => 'Invalid student ID or password.',
            ])->withInput();
        }
    }

    public function voteIndex()
    {

        if (!session('voter_logged_in')) {
            return redirect()->route('login.form')->with('error', 'You must be logged in to access this page.');
        }


        return view('vote.index');
    }


    public function logout()
    {
        session()->flush();

        return redirect()->route('vote.login');
    }
}
