<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Alert;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $alerts = Alert::orderBy('created_at', 'desc')->get();
        return view('students.index', compact('students', 'alerts'));
    }

    public function store(Request $request)
    {

    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit', ['student' => $student]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->nationality = $request->nationality;
        $student->birth_department = $request->birth_department;
        $student->birth_city = $request->birth_city;
        $student->age = $request->age;
        $student->gender = $request->gender;
        $student->stratum = $request->stratum;
        $student->pbm = $request->pbm;
        $student->admission_type = $request->admission_type;
        $student->faculty = $request->faculty;
        $student->program = $request->program;
        $student->save();
        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('students.index');
    }
}
