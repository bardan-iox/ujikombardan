<?php

namespace App\Http\Controllers;

use App\Models\Achievement;

class AchievementController extends Controller
{
    public function index()
    {
        $achievements = Achievement::latest()->paginate(10);
        return view('prestasi.index', compact('achievements'));
    }
}
