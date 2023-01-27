<?php

namespace App\Http\Controllers;

use App\Clientes;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clientes.indexCliente');
    }

    public function getCliente()
    {
        $alunos = Clientes::all();
		$output = '';
		if ($alunos->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
                <tr>
                    <th>ALUNO</th>
                    <th>E-MAIL</th>
                    <th>CPF</th>
                    <th>CIDADE</th>
                    <th>TELEFONE</th>
                    <th>OPÇÕES</th>
                </tr>
            </thead>
            <tbody>';
			foreach ($alunos as $aluno) {
				$output .= '<tr>
                    <td>' . $aluno->name . '</td>
                    <td>' . $aluno->email . '</td>
                    <td>' . $aluno->cpf . '</td>
                    <td>' . $aluno->municipio . '</td>
                    <td>' . $aluno->telefone . '</td>
                    <td>
                        <a href="#" id="#" class="text-primary mx-1 showIcon"><i class="bi-file-earmark-text h4"></i></a>

                        <a href="#" id="editClient" 
                            data-id="' . $aluno->id . '"
                            data-name="' . $aluno->name . '"
                            data-email="' . $aluno->email . '"
                            data-cpf="' . $aluno->cpf . '"
                            data-municipio="' . $aluno->municipio . '"
                            data-telefone="' . $aluno->telefone . '"
                        class="text-success mx-1 editIcon" data-bs-toggle="modal" 
                        data-bs-target="#editClient"><i class="bi-pencil-square h4"></i></a>

                        <a href="#" id="deleteClient" data-id="' . $aluno->id . '" class="text-danger mx-1 deleteIcon" data-bs-target="#deleteClient"><i class="bi-trash h4"></i></a>
                    </td>
                </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Não exitem alunos cadastrados!</h1>';
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
            $student = new Clientes();
            $student->name = $request->input('name');
            $student->email = $request->input('email');
            $student->cpf = $request->input('cpf');
            $student->municipio = $request->input('municipio');
            $student->telefone = $request->input('telefone');

            // Salvar
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
    public function edit($id)
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
            $student = Clientes::find($request->id);
            $student->name = $request->input('name');
            $student->email = $request->input('email');
            $student->cpf = $request->input('cpf');
            $student->municipio = $request->input('municipio');
            $student->telefone = $request->input('telefone');

            // Atualizar
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
    public function delete($id)
    {
        Clientes::find($id)->delete();

        return response()->json(['success' => 'Record deleted successfully!']);
    }
}
