<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Exception;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function index()
    {
        $students = Student::all();
        return view('student', compact('students'));
    }
    public function create(Request $request)
    {
        $student = new Student();
        $student->fullname = $request->fullname ?? "emty";
        $student->program = $request->program ?? "emty";
        $student->income = $request->income ?? "emty";
        $student->gpa = (double)($request->gpa ?? 0);
        $student->save();
        return redirect('/student');
    }
    public function edit(Request $request) {
        try {
            if(!isset($_POST['student-id'])) throw new Exception('id is emty or undifind');
            $student = Student::find($_POST['student-id']);
            $student->fullname =$request->fullname ?? 'emty';
            $student->program = $request->program ?? 'emty';
            $student->income = $request->income ?? 'emty';
            $student->gpa =  (double) $request->gpa ?? 0;
            $student->save();
            return redirect('/student');
        } catch (Exception $err) {
            return redirect('/student');
        }
    }
    public function delete()
    {
        try {
            if (!isset($_GET['id'])) throw new Exception();
            $student = Student::find($_GET['id']);
            if (!$student) throw new Exception();
            $student->delete();
            return redirect('/student')->with('success', 'delete success!');;
        } catch (Exception $err) {
            return redirect('/student');
        }
    }
}
