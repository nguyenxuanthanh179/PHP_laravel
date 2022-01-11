<?php

namespace App\Http\Controllers;

use App\Models\Student;
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

        return view('backend.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $student = new Student();
        $faculties = $this->studentRepo->arrFaculty();
        $gender = $this->studentRepo->arrGender();
        return view('backend.students.create_update', compact('student', 'gender', 'faculties'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $this->studentRepo->create($request->all());

        return redirect()->route('students.index')->with('success', 'Create success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = $this->studentRepo->find($id);
        $faculties = $this->studentRepo->arrFaculty();
        $gender = $this->studentRepo->arrGender();

        return view('backend.students.create_update', compact('faculties', 'gender', 'student'));
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
        $student = new Student();
        $this->subjectRepo->update($id, $request->all());
        // Thay đổi ảnh
        if ($request->hasFile('new_image')) {
            // xóa file cũ
            @unlink(public_path($student->image));
            // get file mới
            $file = $request->file('new_image');
            // get tên
            $filename = time().'_'.$file->getClientOriginalName();
            // duong dan upload
            $path_upload = 'uploads/student/';
            // upload file
            $request->file('new_image')->move($path_upload,$filename);

            $student->image = $path_upload.$filename;
        }

        return redirect()->route('students.index');
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
}
