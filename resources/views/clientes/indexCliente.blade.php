@extends('layouts.main')

@section('title', 'Clientes')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />
@endsection


@section('content')    
    
    <div class="card shadow">
        <div class="card-header bg-info d-flex justify-content-between align-items-center">
            <h3 class="text-light">Listagem de alunos</h3>
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addnew">
                <i class="bi bi-plus-circle"></i>
                Cadastrar Aluno
            </button>
        </div>
        <div class="card-body" id="show_all_alunos">
            <h1 class="text-center text-secondary my-5">Loading...</h1>
        </div>
    </div>   

@endsection

@include('clientes.modalCliente')

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){

        getClient()

        //Função salvar
        $('#addForm').on('submit', function(e){
            e.preventDefault();
            var form = $(this).serialize();
            var url = $(this).attr('action');

            $.ajax({
                type: 'POST',
                url: url,
                data: form,
                dataType: 'json',
                success: function(){
                    $('#addnew').modal('hide');
                    $('#addForm')[0].reset();
                    Swal.fire({
                        title: 'Sucesso!',
                        text: 'Cliente cadastrado com sucesso!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                    getClient();
                }
            });
        });
        //----------

        //Função editar
        $(document).on('click', '#editClient', function(e){
            e.preventDefault();
            var id = $(this).data('id');
            var name = $(this).data('name');
            var email = $(this).data('email');
            var cpf = $(this).data('cpf');
            var municipio = $(this).data('municipio');
            var telefone = $(this).data('telefone');

            $('#editClientModal').modal('show');
            $('#name').val(name);
            $('#email').val(email);
            $('#cpf').val(cpf);
            $('#municipio').val(municipio);
            $('#telefone').val(telefone);
            $('#idCliente').val(id);
        });

        $('#editFormClient').on('submit', function(e){
            e.preventDefault();
            var form = $(this).serialize();
            var url = $(this).attr('action');

            $.post(url, form, function(data) {
                $('#editClientModal').modal('hide');
                Swal.fire({
                    title: 'Sucesso!',
                    text: 'Cliente alterado com sucesso!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                getClient();
            })
        });
        //---------

        //Função deletar
        $(document).on('click', '#deleteClient', function(event){
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
                    deleteRecord(id);
                    Swal.fire(
                        'Excluído!',
                        'O cliente foi excluído com sucesso.',
                        'success'
                    )
                }
            })
        });

        function deleteRecord(id) {
            $.ajax({
                url: '/delete/' + id,
                type: 'POST',
                data: {
                    _token: '{!! csrf_token() !!}',
                },
                success: function(result) {
                    getClient();
                },
                error: function(xhr, status, error) {
                    // Error
                    console.log(error);
                }
            });                
        }
        //---------

        function getClient() {
            $.ajax({
                url: '{{ route('getClientes') }}',
                method: 'get',
                success: function(response) {
                    $("#show_all_alunos").html(response);
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