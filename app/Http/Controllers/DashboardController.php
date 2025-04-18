<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cell;

class DashboardController extends Controller
{
    public function index()
    {
        $cells = Cell::all();
        return view('dashboard', compact('cells'));
    }

    public function configure($id)
    {
        $cell = Cell::findOrFail($id);
        return view('configure', compact('cell'));
    }

    public function saveConfiguration(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'link' => 'required|url',
            'color' => 'required|string|max:20',
        ]);

        $cell = Cell::findOrFail($id);
        $cell->update([
            'title' => $request->title,
            'link' => $request->link,
            'color' => $request->color,
        ]);

        return redirect('/')->with('success', 'Cell updated!');
    }
}
