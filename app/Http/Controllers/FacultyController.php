<?php

namespace App\Http\Controllers;
use App\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Faculty::paginate(8);
        return view('backend.faculty.index', [
            'data' => $data
        ]);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.faculty.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $factory = new Faculty();
        $factory->name = $request->input('name');
        $request->validate([
            'name' => 'required|unique:faculties|max:50',
        ]);
        //lưu
        $factory->save();

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

        $faculty = Faculty::findorFail($id);

        return view('backend.faculty.edit',[
            'data'=>$faculty
        ]);
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
        $faculty = Faculty::findorFail($id);
        $faculty->name = $request->input('name');
        $request->validate([
            'name' => 'required|unique:faculties|max:50',
        ]);
        //lưu
        $faculty->save();
        //chuyển hướng trang về trang danh sách
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
        $faculty = Faculty::findorFail($id);
        $faculty->delete();
        return redirect()->route('faculty.index');
    }
}
