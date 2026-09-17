<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Achievement;
use Illuminate\Http\Request;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::latest()->get();
        return view('admin.achievements.index', compact('achievements'));
    }

    public function create()
    {
        return view('admin.achievements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'level' => 'nullable|string|max:100',
            'year' => 'nullable|string|max:10',
            'description' => 'nullable|string',
        ]);

        Achievement::create($request->all());

        return redirect()->route('admin.achievements.index')->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function edit(Achievement $achievement)
    {
        return view('admin.achievements.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'level' => 'nullable|string|max:100',
            'year' => 'nullable|string|max:10',
            'description' => 'nullable|string',
        ]);

        $achievement->update($request->all());

        return redirect()->route('admin.achievements.index')->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Achievement $achievement)
    {
        $achievement->delete();
        return back()->with('success', 'Prestasi berhasil dihapus.');
    }
}
