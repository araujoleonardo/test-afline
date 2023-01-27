<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.index');
    }

    public function getStudent()
    {
        $students = Students::all();
        $output = '';
        if ($students->count() > 0) {
            $output .= '<table class="table table-striped table-sm text-center align-middle">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>';
            foreach ($students as $student) {
                $output .= '<tr>
                    <td>' . $student->id . '</td>
                    <td>' . $student->name . '</td>
                    <td>' . $student->email . '</td>
                    <td>
                        <a href="#" data-id="' . $student->id . '"
                            data-name="' . $student->name . '"
                            data-email="' . $student->email . '"
                            class="text-success mx-1 editIcon edit" 
                            data-bs-toggle="modal" 
                            data-bs-target="#editStudentModal"><i class="bi-pencil-square h4"></i></a>
    
                        <a href="#" class="delete text-danger mx-1 deleteIcon" data-id=' . $student->id . '><i class="bi-trash h4"></i></a>
                    </td>
                  </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {
            // Create New
            $student = new Students();
            $student->name = $request->input('name');
            $student->email = $request->input('email');

            // Salvar student
            $student->save();

            return response($student);
        }
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
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $student = Students::find($request->id);
            $student->name = $request->input('name');
            $student->email = $request->input('email');

            // Atualizar student
            $student->update();

            return response($student);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Students::find($id);

        Students::destroy($student);
    }
}
