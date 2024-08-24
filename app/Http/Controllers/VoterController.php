<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;

class VoterController extends Controller
{

    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access this page.');
        }

        $voters = Voter::all();
        return view('admin.voters.index', compact('voters'));
    }


    public function create()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access this page.');
        }

        return view('admin.voters.create');
    }


    public function store(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access this page.');
        }

        $request->validate([
            'student_id' => 'required|string|max:30',
            'password' => 'required|string|max:255',
            'name' => 'required|string|max:30',
            'major' => 'required|string|max:60',
            'study' => 'required|string|max:60',
            'generation' => 'required|string|max:10',
        ]);

        Voter::create($request->all());

        return redirect()->route('voters.index')->with('success', 'Voter created successfully.');
    }


    public function edit(Voter $voter)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access this page.');
        }

        return view('admin.voters.edit', compact('voter'));
    }


    public function update(Request $request, Voter $voter)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access this page.');
        }

        $request->validate([
            'student_id' => 'required|string|max:30',
            'password' => 'required|string|max:255',
            'name' => 'required|string|max:30',
            'major' => 'required|string|max:60',
            'study' => 'required|string|max:60',
            'generation' => 'required|string|max:10',
        ]);

        $voter->update($request->all());

        return redirect()->route('voters.index')->with('success', 'Voter updated successfully.');
    }


    public function destroy(Voter $voter)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access this page.');
        }

        $voter->delete();

        return redirect()->route('voters.index')->with('success', 'Voter deleted successfully.');
    }
}
