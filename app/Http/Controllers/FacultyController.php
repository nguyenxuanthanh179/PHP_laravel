<?php

namespace App\Http\Controllers;
use App\Models\Faculty;
use App\Repositories\Faculties\FacultyRepository;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    protected $facultyRepo;

    public function __construct(FacultyRepository $facultyRepo)
    {
        $this->facultyRepo = $facultyRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculty = Faculty::paginate(8);

        return view('backend.faculties.index', compact('faculty'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.faculties.create');
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
            'name' => 'required|unique:faculties|max:50',
        ]);
        $data = $request->all();
        $this->facultyRepo->create($data);

        return redirect()->route('faculty.index')->with('success', 'Create success');
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
        $faculty = $this->facultyRepo->find($id);

        return view('backend.faculties.edit', compact('faculty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:faculties|max:50',
        ]);
        $faculty = $request->all();
        $this->facultyRepo->update($id, $faculty);

        return redirect()->route('faculty.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->facultyRepo->delete($id);

        return redirect()->route('faculty.index');
    }
}
