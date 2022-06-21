<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Http\request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('id', 'desc')->get();



        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        // dd($request); (dd is dump and die for diagnostic)
        // $student = Student::create($request->all());
        $student = Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'address' => $request->address,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
        ]);
        $student = Student::where([
            'name' => $request->name,
            'nim' => $request->nim,
            'address' => $request->address,
            'phone' => $request->phone,
            'birth_date' => $request->birth_date,
        ])->first();
            // (each key must be same as column name)
        return response()->json([
            'success' => true,
            'data' => $student,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    // public function edit(Student $student)
    // {
    //     return view('students.edit', compact('student'));
    // } (without making student from id)

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request)
    {
        $student = Student::findOrFail($request->id);
        // dd($request);
        $student->update($request->all());
        return response()->json([
            'success' => true,
            'data' => $student,
        ]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return response()->json([
            'success' => true,
        ]);

    }
}
