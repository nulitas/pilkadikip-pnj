<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CandidateController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access this page.');
        }

        $candidates = Candidate::with('position')->get();
        return view('admin.candidates.index', compact('candidates'));
    }

    public function create()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access this page.');
        }

        $positions = Position::all();
        return view('admin.candidates.create', compact('positions'));
    }

    public function store(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access this page.');
        }

        $request->validate([
            'position_id' => 'required|exists:positions,id',
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'major' => 'required|string|max:255',
            'study' => 'required|string|max:255',
            'generation' => 'required|string|max:4',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        Candidate::create($data);

        return redirect()->route('candidates.index')->with('success', 'Candidate created successfully.');
    }


    public function edit(Candidate $candidate)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access this page.');
        }

        $positions = Position::all();
        return view('admin.candidates.edit', compact('candidate', 'positions'));
    }

    public function update(Request $request, Candidate $candidate)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access this page.');
        }

        $request->validate([
            'position_id' => 'required|exists:positions,id',
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|max:2048',
            'major' => 'required|string|max:255',
            'study' => 'required|string|max:255',
            'generation' => 'required|string|max:4',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            if ($candidate->photo) {
                Storage::disk('public')->delete($candidate->photo);
            }

            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $candidate->update($data);

        return redirect()->route('candidates.index')->with('success', 'Candidate updated successfully.');
    }

    public function destroy(Candidate $candidate)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access this page.');
        }

        if ($candidate->photo) {
            Storage::disk('public')->delete($candidate->photo);
        }

        $candidate->delete();

        return redirect()->route('candidates.index')->with('success', 'Candidate deleted successfully.');
    }
}
