<?php

namespace App\Http\Controllers;

use App\Models\Student;  //panngil model student
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $students = [
        //     [
        //         'id'      => 1,
        //         'name'    => 'santoso',
        //         'grade'   => '10 PPLG 2',
        //         'email'   => 'san@gmail.com',
        //         'address' => 'Jakarta',
        //     ],
        //     [
        //         'id'      => 2,
        //         'name'    => 'dika',
        //         'grade'   => '11 PPLG 1',
        //         'email'   => 'dika@gmail.com',
        //         'address' => 'Surabaya',
        //     ],
        //     [
        //         'id'      => 3,
        //         'name'    => 'Ahmad',
        //         'grade'   => '12 PPLG 2',
        //         'email'   => 'ahmad@gmail.com',
        //         'address' => 'Bandung',
        //     ],
        //     [
        //         'id'      => 4,
        //         'name'    => 'Marlina',
        //         'grade'   => '11 ANIMASI 2',
        //         'email'   => 'marlin@gmail.com',
        //         'address' => 'Semarang',
        //     ],
        //     [
        //         'id'      => 5,
        //         'name'    => 'Rudi',
        //         'grade'   => '10 DKV 3',
        //         'email'   => 'rud@gmail.com',
        //         'address' => 'Medan',
        //     ],
        // ];


        $students = Student::all(); //panggil semua data di model student

        return view('students',[
            'title'   => "Students",
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
