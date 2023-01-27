@extends('layouts.main')

@section('title', 'Clientes')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />
@endsection


@section('content')    
    
    <div class="card shadow m-5">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <h3 class="text-primary">Listagem de Clientes</h3>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnew">
                <i class="bi bi-plus-circle"></i>
                Novo Cliente
            </button>
        </div>
        <div class="card-body" id="show_all_alunos">
            <h1 class="text-center text-secondary my-5">Carregando...</h1>
        </div>
    </div>   

@endsection

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
            var nome = $(this).data('nome');
            var email = $(this).data('email');
            var telefone = $(this).data('telefone');
            var estado = $(this).data('estado');
            var cidade = $(this).data('cidade');
            var cep = $(this).data('cep');
            var bairro = $(this).data('bairro');
            var rua = $(this).data('rua');
            var numero = $(this).data('numero');

            $('#editClientModal').modal('show');
            $('#nome').val(nome);
            $('#email').val(email);
            $('#telefone').val(telefone);
            $('#estado').val(estado);
            $('#cidade').val(cidade);
            $('#cep').val(cep);
            $('#bairro').val(bairro);
            $('#rua').val(rua);
            $('#numero').val(numero);
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