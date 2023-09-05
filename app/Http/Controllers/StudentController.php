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
    public function edit() {
        try {
            if(!isset($_POST['student-id'])) throw new Exception('id is emty or undifind');
            $student = Student::find($_POST['student-id']);
            $student->fullname = $_POST['fullname'] ?? 'emty';
            $student->program = $_POST['program'] ?? 'emty';
            $student->income = $_POST['income'] ?? 'emty';
            $student->gpa = $_POST['gpa'] ?? 'emty';
            $student->save();
            return redirect('/student');
        } catch (Exception $err) {
            return $err->getMessage();
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
            return redirect('/student');
        } catch (Exception $err) {
            return redirect('/student');
        }
    }
}
