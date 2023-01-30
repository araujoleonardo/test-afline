@extends('layouts.main')

@section('title', 'Ordem_de_Servicos')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />
@endsection


@section('content')

    <div class="container">
        <div class="card shadow m-5">
            <div class="card-header bg-light d-flex justify-content-between align-items-center">
                <h3 class="text-primary">Ordens de Serviço</h3>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnewOrdemServico">
                    <i class="bi bi-plus-circle"></i>
                    Criar Nova
                </button>
            </div>
            <div class="card-body" id="show_all_ordemServicos">
                <h1 class="text-center text-secondary my-5">Carregando...</h1>
            </div>
        </div>
    </div>

@endsection
@include('ordemServicos.modalOrdemServicos')
@section('js')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {

            getOrdemServico()

            //Função salvar
            $('#addFormOrdemServico').on('submit', function(e){
                e.preventDefault();
                let form = $(this).serialize();
                let url = $(this).attr('action');
                    $.ajax({
                    type: 'POST',
                    url: url,
                    data: form,
                    dataType: 'json',
                    success: function(){
                        $('#addnewOrdemServico').modal('hide');
                        $('#addFormOrdemServico')[0].reset();
                        Swal.fire({
                            title: 'Sucesso!',
                            text: 'Serviço cadastrado com sucesso!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                        getOrdemServico();
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                        console.log(status);
                        console.log(error);
                    }
                });
            });

            //----------

            //Função Detalhes
            $(document).on('click', '#verOrdemServico', function(e){
                e.preventDefault();
                let idOrdem = $(this).data('id');
                let abertura = $(this).data('abertura');
                let observacao = $(this).data('observacao');
                let nomeCliente = $(this).data('cliente');
                let nomeServico = $(this).data('servico');
                let detalhes = $(this).data('detalhes');
                let email = $(this).data('email');
                let telefone = $(this).data('telefone');
                let estado = $(this).data('estado');
                let cidade = $(this).data('cidade');
                let cep = $(this).data('cep');
                let bairro = $(this).data('bairro');
                let rua = $(this).data('rua');
                let numero = $(this).data('numero');

                $('#viewOrdemServico').modal('show');
                $('#idOrdem').text(idOrdem);
                var data = new Date(abertura);
                var dataFormatada = data.toLocaleDateString('pt-BR');
                $('#abertura').text(dataFormatada);
                $('#observacao').text(observacao);
                $('#nomeCliente').text(nomeCliente);
                $('#nomeServico').text(nomeServico);
                $('#email').text(email);
                $('#telefone').text(telefone);
                $('#estado').text(estado);
                $('#cidade').text(cidade);
                $('#cep').text(cep);
                $('#bairro').text(bairro);
                $('#rua').text(rua);
                $('#numero').text(numero);
                $('#detalhes').text(detalhes);
            });

            //---------

            //Função deletar
            $(document).on('click', '#deleteOrdemServico', function(event){
                event.preventDefault();
                let id = $(this).data('id');
                Swal.fire({
                    title: 'Tem certeza?',
                    text: "Você não poderá reverter isso!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, excluir!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        deleteOrdemService(id);
                        Swal.fire(
                            'Excluído!',
                            'A ordem de serviço foi excluída com sucesso.',
                            'success'
                        )
                    }
                })
            });

            function deleteOrdemService(id) {
                $.ajax({
                    url: '/deleteOrdemServicos/' + id,
                    type: 'POST',
                    data: {
                        _token: '{!! csrf_token() !!}',
                    },
                    success: function(result) {
                        getOrdemServico();
                    },
                    error: function(xhr, status, error) {
                        // Error
                        console.log(error);
                    }
                });
            }
            //---------

            function getOrdemServico() {
                $.ajax({
                    url: '{{ route('getOrdemServicos') }}',
                    method: 'get',
                    success: function(response) {
                        $("#show_all_ordemServicos").html(response);
                        $("table").DataTable({
                            "language": {
                                "url": "https://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                            }
                        });
                    }
                });
            }
        });
    </script>
@endsection
