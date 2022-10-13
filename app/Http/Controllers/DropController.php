<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drop;

class DropController extends Controller
{
    public function index()
    {
        $drops = Drop::all();
        return view('drops.index', compact('drops'));
    }

    public function addView()
    {
        return view('drops.add');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'hours' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png',
            'is_active' => 'nullable',
            'is_left' => 'nullable',
            'is_right' => 'nullable'
        ]);

        $data['image'] = $request->file('image')->store('dropimages', 'publicImages');
        $data['hours'] = json_encode($data['hours']);
        $data['is_active'] = isset($data['is_active']) && $data['is_active'] == "on" ? true : false;
        $data['is_left'] = isset($data['is_left']) && $data['is_left'] == "on" ? true : false;
        $data['is_right'] = isset($data['is_right']) && $data['is_right'] == "on" ? true : false;

        Drop::create($data);

        return redirect()->route('listDrop')->with('success', "Drop added successfully");
    }

    public function delete(Request $request, Drop $drop)
    {
        $drop->delete();
        return redirect()->route('listDrop')->with('success', "Drop deleted successfully");
    }

    public function edit(Request $request, Drop $drop)
    {
        return view('drops.edit', compact(('drop')));
    }

    public function update(Request $request, Drop $drop)
    {
        $data = $request->validate([
            'name' => 'required',
            'hours' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png',
            'is_active' => 'nullable',
            'is_left' => 'nullable',
            'is_right' => 'nullable'
        ]);

        if(isset($data['image']))
        {
            $data['image'] = $request->file('image')->store('dropimages', 'publicImages');
        }

        
        $data['hours'] = json_encode($data['hours']);
        $data['is_active'] = isset($data['is_active']) && $data['is_active'] == "on" ? true : false;
        $data['is_left'] = isset($data['is_left']) && $data['is_left'] == "on" ? true : false;
        $data['is_right'] = isset($data['is_right']) && $data['is_right'] == "on" ? true : false;

        $drop->update($data);

        return redirect()->route('listDrop')->with('success', "Drop Updated successfully");
    }
}
