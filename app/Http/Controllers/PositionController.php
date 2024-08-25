<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access this page.');
        }

        $positions = Position::all();
        return view('admin.positions.index', compact('positions'));
    }

    public function create()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access this page.');
        }

        return view('admin.positions.create');
    }

    public function store(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access this page.');
        }

        $request->validate([
            'name' => 'required|string|max:30',
            'max_vote' => 'required',
            // 'priority' => 'required',
        ]);

        $maxPriority = Position::max('priority');
        $newPriority = $maxPriority ? $maxPriority + 1 : 1;

        Position::create([
            'name' => $request->input('name'),
            'max_vote' => $request->input('max_vote'),
            'priority' => $newPriority,
        ]);

        return redirect()->route('positions.index')->with('success', 'positions created successfully.');
    }

    public function edit(Position $position)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access this page.');
        }

        return view('admin.positions.edit', compact('position'));
    }


    public function update(Request $request, Position $position)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access this page.');
        }

        $request->validate([
            'name' => 'required|string|max:30',
            'max_vote' => 'required',
            // 'priority' => 'required',
        ]);

        $position->update($request->all());

        return redirect()->route('positions.index')->with('success', 'Position updated successfully.');
    }

    public function destroy(Position $position)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login')->with('error', 'You must be logged in to access this page.');
        }

        $position->delete();

        return redirect()->route('positions.index')->with('success', 'Position deleted successfully.');
    }
}
