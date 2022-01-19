<?php

namespace App\Http\Controllers;

use App\Repositories\Faculties\FacultyRepositoryInterface;
use App\Repositories\Students\StudentRepositoryInterface;
use App\Http\Requests\StudentRequest;
use App\Repositories\Subjects\SubjectRepositoryInterface;

class StudentController extends Controller
{
    protected $studentRepo;
    protected $subjectRepo;
    protected $facultyRepo;

    public function __construct(StudentRepositoryInterface $studentRepo, SubjectRepositoryInterface $subjectRepo, FacultyRepositoryInterface $facultyRepo)
    {
        $this->studentRepo = $studentRepo;
        $this->subjectRepo = $subjectRepo;
        $this->facultyRepo = $facultyRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->studentRepo->getLimit(8);
        $gender = $this->studentRepo->gender();

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
        $faculty = $this->studentRepo->arrayName($this->facultyRepo->getAll());
        $gender = $this->studentRepo->gender();

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
        $subject = $this->studentRepo->arrayName($this->subjectRepo->getAll());

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
        $faculty = $this->studentRepo->arrayName($this->facultyRepo->getAll());
        $gender = $this->studentRepo->gender();

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
    public function markDelete($id)
    {
        $student = $this->studentRepo->newModel();
        $student->subjects()->detach($id);
        return redirect(route('students.index'));

    }
    public function markStore()
    {
        $student = $this->studentRepo->newModel();
        $student->subjects()->attach([
            1,
            2,
            3
        ], [
            'mark' => '6',
            'student_id' => '7',
        ]);
        return redirect(route('students.index'));
    }

    public function markEdit($id)
    {
        return view('backend.students.show');
    }

}
