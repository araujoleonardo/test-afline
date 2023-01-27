<?php

namespace App\Http\Controllers;

use App\Clientes;
use App\OrdemServicos;
use App\Servicos;
use Illuminate\Http\Request;

class OrdemServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ordemServicos.indexOrdemServicos');
    }

    public function getOrdemServicos()
    {
        $ordems = OrdemServicos::all();
        $clientes = Clientes::all();
        $servicos = Servicos::all();
		$output = '';
		if ($ordems->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
                <tr>
                    <th>CLIENTE</th>
                    <th>SERVIÇO</th>
                    <th>DATA ABERTURA</th>
                    <th>OBSERVAÇÕES</th>
                    <th>OPÇÕES</th>
                </tr>
            </thead>
            <tbody>';
			foreach ($ordems as $ordem) {
                $cliente = $clientes->Where('id', $ordem->cliente_id);
                $nomeCliente = $cliente->first()->nome;
                $servico = $servicos->Where('id', $ordem->servico_id);
                $nomeServico = $servico->first()->nome;

				$output .= '<tr>
                    <td>' . $nomeCliente . '</td>
                    <td>' . $nomeServico . '</td>
                    <td>' . $ordem->abertura . '</td>
                    <td>' . $ordem->observacao . '</td>                   
                    <td>

                        <a href="#" id="editClient" 
                            data-id="' . $ordem->id . '"
                        class="text-success mx-1 editIcon" data-bs-toggle="modal" 
                        data-bs-target="#editClient"><i class="bi-pencil-square h4"></i></a>

                        <a href="#" id="deleteClient" data-id="' . $ordem->id . '" class="text-danger mx-1 deleteIcon" data-bs-target="#deleteClient"><i class="bi-trash h4"></i></a>
                    </td>
                </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Não exitem ordens de serviço!</h1>';
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
