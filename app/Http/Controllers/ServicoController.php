<?php

namespace App\Http\Controllers;

use App\Servicos;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('servicos.indexServico');
    }

    public function getServico()
    {
        $servicos = Servicos::all();
		$output = '';
		if ($servicos->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
                <tr>
                    <th>NOME</th>
                    <th>STATUS</th>
                    <th>OPÇÕES</th>
                </tr>
            </thead>
            <tbody>';
			foreach ($servicos as $servico) {
				$output .= '<tr>
                    <td>' . $servico->nome . '</td>
                    <td>' . $servico->status . '</td>                   
                    <td>
                        <a href="#" id="#" class="text-primary mx-1 showIcon"><i class="bi-file-earmark-text h4"></i></a>

                        <a href="#" id="editService" 
                            data-id="' . $servico->id . '"
                            data-nome="' . $servico->nome . '"
                            data-detalhes="' . $servico->detalhes . '"
                            data-status="' . $servico->status . '"
                        class="text-success mx-1 editIcon" data-bs-toggle="modal" 
                        data-bs-target="#editService"><i class="bi-pencil-square h4"></i></a>

                        <a href="#" id="deleteService" data-id="' . $servico->id . '" class="text-danger mx-1 deleteIcon" data-bs-target="#deleteService"><i class="bi-trash h4"></i></a>
                    </td>
                </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Não exitem serviços cadastrados!</h1>';
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
            $servico = new Servicos();
            $servico->nome = $request->input('nome');
            $servico->status = $request->input('status');
            $servico->detalhes = $request->input('detalhes');

            // Salvar
            $servico->save();

            return response($servico);
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
            $servico = Servicos::find($request->id);
            $servico->nome = $request->input('nome');
            $servico->status = $request->input('status');
            $servico->detalhes = $request->input('detalhes');

            // Atualizar
            $servico->update();

            return response($servico);
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
        Servicos::find($id)->delete();

        return response()->json(['success' => 'Serviço deletado com  successo!']);
    }
}
