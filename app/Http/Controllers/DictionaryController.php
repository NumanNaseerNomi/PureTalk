<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    public function create(Request $request)
    {
        $request->validate(
            [
                'word' => 'required|unique:dictionary',
                'isBlock' => 'boolean',
            ]
        );

        Dictionary::create($request->all());

        return redirect()->back()->with('success', 'Word added successfully.');
    }
}
