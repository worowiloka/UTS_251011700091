<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;

class PlantController extends Controller
{
    public function index(Request $request)
    {
        $query = Plant::query();

        if ($request->filled('cahaya')) {
            $query->where('sunlight_requirements', $request->cahaya);
        }

        $plants = $query->paginate(6)->withQueryString();
        $lights = Plant::select('sunlight_requirements')->distinct()->pluck('sunlight_requirements');
        $best   = Plant::orderByDesc('price')->take(4)->get();

        return view('plants.index', compact('plants', 'lights', 'best'));
    }

    public function show(Plant $plant)
    {
        $related = Plant::where('id', '!=', $plant->id)->inRandomOrder()->take(3)->get();
        return view('plants.show', compact('plant', 'related'));
    }
}