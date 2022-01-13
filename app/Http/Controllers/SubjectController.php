<?php

namespace App\Http\Controllers;

use App\Repositories\Subjects\SubjectRepositoryInterface;
use App\Http\Requests\SubjectRequest;

class SubjectController extends Controller
{
    protected $subjectRepo;

    public function __construct(SubjectRepositoryInterface $subjectRepo)
    {
        $this->subjectRepo = $subjectRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = $this->subjectRepo->getLimit(8);

        return view('backend.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = $this->subjectRepo->newModel();

        return view('backend.subjects.create_update', compact('subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest  $request)
    {
        $this->subjectRepo->create($request->all());

        return redirect()->route('subjects.index')->with('success', 'Create success');
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
        $subject = $this->subjectRepo->findOrFail($id);

        return view('backend.subjects.create_update', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest  $request, $id)
    {
        $this->subjectRepo->update($id, $request->all());

        return redirect()->route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->subjectRepo->delete($id);

        return redirect()->route('subjects.index');
    }
}
