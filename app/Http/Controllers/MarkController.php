<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Repositories\Marks\MarkRepositoryInterface;
use App\Http\Requests\MarkRequest;

class MarkController extends Controller
{
    protected $markRepo;

    public function __construct(MarkRepositoryInterface $markRepo)
    {
        $this->markRepo = $markRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = $this->markRepo->getLimit(8);

        return view('backend.marks.index', compact('marks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mark = new Mark();
        $student = $this->markRepo->Student();
        $subject = $this->markRepo->Subject();
        return view('backend.marks.create_update', compact('mark', 'student', 'subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarkRequest $request)
    {
        $this->markRepo->create($request->all());

        return redirect()->route('marks.index')->with('success', 'Create success');
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
        $mark = $this->markRepo->find($id);
        $student = $this->markRepo->Student();
        $subject = $this->markRepo->Subject();
        return view('backend.marks.create_update', compact('mark','student', 'subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MarkRequest $request, $id)
    {
        $this->markRepo->update($id, $request->all());
        $student = $this->markRepo->Student();
        $subject = $this->markRepo->Subject();
        return redirect()->route('marks.index', compact('student', 'subject'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->markRepo->delete($id);

        return redirect()->route('marks.index');
    }
}
