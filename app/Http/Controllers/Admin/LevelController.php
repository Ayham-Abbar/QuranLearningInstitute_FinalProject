<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $levels = Level::all();
        return view('admin.levels.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $requestValidate = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $level = Level::create($requestValidate);
        return redirect()->route('admin.levels.index')->with('success', 'Level created successfully');
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $level = Level::find($id);
        $courses = $level->courses;
        return view('admin.levels.show', compact('courses','level'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $level = Level::find($id);
        return view('admin.levels.edit', compact('level'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $requestValidate = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        $level = Level::find($id);
        $level->update($requestValidate);
        return redirect()->route('admin.levels.index')->with('success', 'Level updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $level = Level::find($id);
        $level->delete();
        return redirect()->route('admin.levels.index')->with('success', 'Level deleted successfully');
    }
    public function showStudents($id)
    {
        $level = Level::find($id);
        // $users = $level->users;
        $groups = Group::where('level_id', $id)->with('users')->get();
        $users=$groups->pluck('users')->flatten();
        return view('admin.levels.show-student', compact('users','level'));
    }
}
