<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function index()
    {
        $students = Student::all();
        return view('student', compact('students'));
    }
    public function create()
    {
        $student = new Student();
        $student->fullname = $_POST['fullname'] ?? "emty";
        $student->program = $_POST['program'] ?? "emty";
        $student->income = $_POST['program'] ?? "emty";
        $student->gpa = (int)($_POST['gpa'] ?? 0);
        $student->save();
        return redirect('/student');
    }
}
