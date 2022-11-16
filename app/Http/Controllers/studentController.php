<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::paginate(5);
        return view('welcome', [
            'students' => $students
        ])->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        $students = new Student;
        $students->name = $request->get('name');
        $students->email = $request->get('email');
        $students->mobile = $request->get('mobile');
        $students->save();
        // $input = $request->all();
        // Student::create($input);
        return redirect('student')->with('flash_message', 'Student has successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        return view('show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('edit')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);


        $student = Student::find($id);
        $input = $request->all();
        $student->update($input);
        return redirect('student')->with('flash_message', 'student Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::destroy($id);
        return redirect('student')->with('flash_message', 'Student has been deleted');
    }
}
