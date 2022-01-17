<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Repositories\Students\StudentRepositoryInterface;
use App\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    protected $studentRepo;

    public function __construct(StudentRepositoryInterface $studentRepo)
    {
        $this->studentRepo = $studentRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->studentRepo->getLimit(8);
        $gender = $this->studentRepo->Gender();

        return view('backend.students.index', compact('students','gender'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = $this->studentRepo->newModel();
        $faculty = $this->studentRepo->Faculty();
        $gender = $this->studentRepo->Gender();

        return view('backend.students.create_update', compact('student', 'gender', 'faculty'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $this->studentRepo->createStudent($request->all());

        return redirect(route('students.index'))->with('success', 'Create success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Show danh sách điểm các môn học theo id của sinh viên
    public function show($id)
    {
        $student = $this->studentRepo->findOrFail($id);
        $subject = $this->studentRepo->Subject();

        return view('backend.students.show', compact('student','subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = $this->studentRepo->findOrFail($id);
        $faculty = $this->studentRepo->Faculty();
        $gender = $this->studentRepo->Gender();

        return view('backend.students.create_update', compact('faculty', 'gender', 'student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $this->studentRepo->updateStudent($id, $request->all());

        return redirect()->route('students.index',compact('student'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->studentRepo->delete($id);

        return redirect(route('students.index'));
    }
//student_subject
    public function delete($id)
    {
        $student = $this->studentRepo->findOrFail($id);
        $student->subjects()->detach($id);

        return redirect(route('students.index'));

    }
    public function markCreate()
    {
        $student = $this->studentRepo->newModel();
        $subject = $this->studentRepo->Subject();

        return view('backend.students.create_mark', compact('student','subject'));
    }
}
