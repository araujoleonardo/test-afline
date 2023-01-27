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
        $clientes = Clientes::all();
		$output = '';
		if ($clientes->count() > 0) {
			$output .= '<table class="table table-striped table-sm text-center align-middle">
            <thead>
                <tr>
                    <th>NOME</th>
                    <th>E-MAIL</th>
                    <th>TELEFONE</th>
                    <th>ESTADO</th>
                    <th>CIDADE</th>
                    <th>CEP</th>
                    <th>BAIRRO</th>
                    <th>RUA</th>
                    <th>OPÇÕES</th>
                </tr>
            </thead>
            <tbody>';
			foreach ($clientes as $cliente) {
				$output .= '<tr>
                    <td>' . $cliente->nome . '</td>
                    <td>' . $cliente->email . '</td>
                    <td>' . $cliente->telefone . '</td>
                    <td>' . $cliente->estado . '</td>
                    <td>' . $cliente->cidade . '</td>
                    <td>' . $cliente->cep . '</td>
                    <td>' . $cliente->bairro . '</td>
                    <td>' . $cliente->rua . '</td>                    
                    <td>

                        <a href="#" id="editClient" 
                            data-id="' . $cliente->id . '"
                            data-nome="' . $cliente->nome . '"
                            data-email="' . $cliente->email . '"
                            data-telefone="' . $cliente->telefone . '"
                            data-estado="' . $cliente->estado . '"
                            data-cidade="' . $cliente->cidade . '"
                            data-cep="' . $cliente->cep . '"
                            data-bairro="' . $cliente->bairro . '"
                            data-rua="' . $cliente->rua . '"
                            data-numero="' . $cliente->numero . '"
                        class="text-success mx-1 editIcon" data-bs-toggle="modal" 
                        data-bs-target="#editClient"><i class="bi-pencil-square h4"></i></a>

                        <a href="#" id="deleteClient" data-id="' . $cliente->id . '" class="text-danger mx-1 deleteIcon" data-bs-target="#deleteClient"><i class="bi-trash h4"></i></a>
                    </td>
                </tr>';
			}
			$output .= '</tbody></table>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">Não exitem clientes cadastrados!</h1>';
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
            $cliente = new Clientes();
            $cliente->nome = $request->input('nome');
            $cliente->email = $request->input('email');
            $cliente->telefone = $request->input('telefone');
            $cliente->estado = $request->input('estado');
            $cliente->cidade = $request->input('cidade');
            $cliente->cep = $request->input('cep');
            $cliente->bairro = $request->input('bairro');
            $cliente->rua = $request->input('rua');
            $cliente->numero = $request->input('numero');

            // Salvar
            $cliente->save();

            return response($cliente);
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
            $cliente = Clientes::find($request->id);
            $cliente->nome = $request->input('nome');
            $cliente->email = $request->input('email');
            $cliente->telefone = $request->input('telefone');
            $cliente->estado = $request->input('estado');
            $cliente->cidade = $request->input('cidade');
            $cliente->cep = $request->input('cep');
            $cliente->bairro = $request->input('bairro');
            $cliente->rua = $request->input('rua');
            $cliente->numero = $request->input('numero');

            // Atualizar
            $cliente->update();

            return response($cliente);
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

        return response()->json(['success' => 'Cliente deletado com  successo!']);
    }
}
