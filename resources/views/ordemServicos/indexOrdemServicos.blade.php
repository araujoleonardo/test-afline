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
                var form = $(this).serialize();
                var url = $(this).attr('action');
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
            // $(document).on('click', '#editService', function(e){
            //     e.preventDefault();
            //     var id = $(this).data('id');
            //     var nome = $(this).data('nome');
            //     var status = $(this).data('status');
            //     var detalhes = $(this).data('detalhes');

            //     $('#editServiceModal').modal('show');
            //     $($nome).val(nome);
            //     $('#status').val(status);
            //     $('#detalhes').val(detalhes);
            //     $('#idService').val(id);
            // });

            //---------

            //Função deletar
            $(document).on('click', '#deleteOrdemServico', function(event){
                event.preventDefault();
                var id = $(this).data('id');
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
