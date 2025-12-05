<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;

class AdminClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Use paginate to get paginated data instead of all records with get().
    $classrooms = Classroom::with('students')->paginate(10); // This will return a paginated result (10 items per page)

    return view('admin.classroom.index', [
        'title' => 'Classrooms',
        'classrooms' => $classrooms,
    ]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.classroom.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
        ]);

        Classroom::create($validated);

        return redirect()->route('admin.classroom.index')
            ->with('success', 'Classroom created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        return view('admin.classroom.edit', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classroom $classroom)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $classroom->update($request->only('name'));

        return redirect()->route('admin.classroom.index')
            ->with('success', 'Classroom updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();

        return redirect()->route('admin.classroom.index')
            ->with('success', 'Classroom deleted successfully.');
    }
}