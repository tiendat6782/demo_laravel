<?php

namespace App\Http\Controllers;
use App\Http\Requests\StudentRequest;
use  Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(Request $request){
        $title = "hello";
        $name = "abcd";
         
        $students = DB::table('studentss')
        ->select('id','name','email')
        ->get();
        if($request->post() && $request->email){
            //an vao thi nhay vao trong day
            $students = DB::table('studentss')
        ->select('id','name','email')
        ->where('email','like','%'.$request->email.'%')
        ->get();
        }  
        // // dd($students);
        // $studentsC = DB::table('studentss')
        // ->where('id','>=',1)
        // ->where('id','<=',5)
        // ->orWhere('email','=','roman30@example.net') //orwhere la hoac ,, where la va
        // ->get();
        // // dd($studentsC);
        // //tra ve 1 dong du lieu
        // $student = DB::table('studentss')
        // ->where('id','=','1')
        // ->first();
        // dd($student);
        return view('Student.index', compact('title','name','students'));
    }
    public function addStudent(StudentRequest $request){
        //nếu tồn tại request post , khi ng dùng click vào nút thì mới laf post
        if($request->post()){


            // dd(233);
        }
        return view('Student.add');
    }
}
