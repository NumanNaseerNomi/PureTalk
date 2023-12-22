<?php

namespace App\Http\Controllers;

use App\Models\Dictionary;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    public function index()
    {
        $words = Dictionary::orderBy('word')->get();

        return view('dictionary', compact('words'));
    }

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

    public function update(Request $request)
    {
        $request->validate(
            [
                'id' => 'required',
                'word' => 'required|unique:dictionary'
            ]
        );
        
        $item = Dictionary::findOrFail($request->input('id'));
        $item->word = $request->input('word');
        $item->save();
        
        return redirect()->back()->with('success', 'Word updated successfully.');
    }

    public function toggleBlock(Request $request)
    {
        $request->validate(['id' => 'required']);
        
        $word = Dictionary::findOrFail($request->input('id'));
        $word->isBlock = !$word->isBlock;
        $word->save();

        $status = $word->isBlock ? 'blocked' : 'unblocked';
        
        return redirect()->back()->with('success', "Word $status successfully.");
    }

    public function delete(Request $request)
    {
        $request->validate(['id' => 'required']);
        
        Dictionary::destroy($request->input('id'));

        return redirect()->back()->with('success', 'Word deleted successfully.');
    }
}
