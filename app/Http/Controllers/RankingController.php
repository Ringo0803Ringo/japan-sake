<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ranking;

class RankingController extends Controller
{
    public function index()
    {
        $rankings = Ranking::with('brand')->orderBy('rank', 'asc')->get();
        return view('top', compact('rankings'));
    }
}
