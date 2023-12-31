<?php

namespace App\Http\Controllers;
use App\Http\Requests\StudentRequest;
use  Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;


class StudentController extends Controller
{
    public function index(Request $request)
    {
        $title = "hello";
        $name = "abcd";

        $students = DB::table('studentss')
        ->select('id', 'name', 'email','image')
        ->get();
        $students = Student::all();
        if($request->post() && $request->email) {
            //an vao thi nhay vao trong day
            $students = DB::table('studentss')
        ->select('id', 'name', 'email')
        ->where('email', 'like', '%'.$request->email.'%')
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
        return view('Student.index', compact('title', 'name', 'students'));
    }
    public function addStudent(StudentRequest $request)
    {
        
        //nếu tồn tại request post , khi ng dùng click vào nút thì mới laf post
        if($request->isMethod('POST')) {
            $params = $request->except('_token');
        // neu nhu ton tai file thi post len
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $params['image'] = uploadFile("hinh", $request->file('image'));
        }
            $student = Student::create($params);
            if($student->id) {
                Session::flash('success', 'Thêm mới thành công sinh viên');
                return redirect()->route('route_student_add');
            }
            // dd(233);
        }
        return view('Student.add');
    }

    // public function editStudent(StudentRequest $request, $id){
    //     //cach 1 DB query
    //     // $student = DB::table('studentss')->where('id','=',$id)->first();
    //     //cach 2 dung model
    //     $student = Student::find($id);
    //     //  dd($student);
    //     if($request->isMethod('POST')){
    //         $result = Student::where('id',$id)->update($request->except('_token'));
    //     }
    //     if($result){
    //         Session::flash('success','Thêm mới thành công sinh viên');
    //         return redirect()->route('route_student_edit',['id'=>$id]);
    //     }
    //     return view('Student.edit', compact('student'));

    // }
    public function editStudent(StudentRequest $request, $id)
    {
        //cách 1: sử dụng DB query
        //$student = DB::table('students')->where('id', $id)->first();

        //cách 2: sử dụng model
        $student = Student::find($id);

        if ($request->isMethod('POST')) {
            $params = $request->except('_token');
            if($request->hasFile('image') && $request->file('image')->isValid()){
                //xoa anh cu
                $resultDL = storage::delete('/public/'.$student->image); //$resultDL ktra co file de xoa k
                if($resultDL){
                    $params['image'] = uploadFile('hinh',$request->file('image'));
                    //neu co anh de xoa thi se up anh moi len
                }else{
                    $params['image'] = $student->image;
                    //neu k co anh de xoa thi van se lay anh cu
                }
            }
            $result = Student::where('id', $id)->update($params);

            if ($result) {
                Session::flash('success', 'Cập nhật sinh viên thành công');
                return redirect()->route('route_student_edit', ['id' => $id]);
            } else {
                Session::flash('error', 'Cập nhật sinh viên thất bại');
            }
        }

        return view('Student.edit', compact('student'));
    }

    public function deleteStudent($id){
        Student::where('id',$id)->delete();
        Session::flash('success', 'Xóa thành công sinh viên có id: '.$id);
                return redirect()->route('route_student_index');
    }
}
