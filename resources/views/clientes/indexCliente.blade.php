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
            let form = $(this).serialize();
            let url = $(this).attr('action');
            let nome = $("#nomeAdd").val();
            let email = $("#emailAdd").val();
            let telefone = $("#telefoneAdd").val();
            let estado = $("#estadoAdd").val();
            let cidade = $("#cidadeAdd").val();
            let cep = $("#cepAdd").val();
            let bairro = $("#bairroAdd").val();
            let rua = $("#ruaAdd").val();
            let numero = $("#numeroAdd").val();
            const spans  = document.querySelectorAll('.span-required');

            if (nome.length < 3) {
                document.getElementById("nomeAdd").style.border = "2px solid red";
                spans[0].style.display = 'block';
                return false;
            }

            let emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (!emailRegex.test(email)) {
                document.getElementById("emailAdd").style.border = "2px solid red";               
                spans[1].style.display = 'block';                
                return false;
            }

            let telefoneRegex = /^\(\d{2}\)\s\d{5}-\d{4}$/;
            if (!telefoneRegex.test(telefone)) {
                document.getElementById("telefoneAdd").style.border = "2px solid red";
                spans[2].style.display = 'block';                
                return false;
            }

            if (estado.length > 2) {
                document.getElementById("estadoAdd").style.border = "2px solid red";
                spans[3].style.display = 'block';                
                return false;
            }

            if (cidade.length < 3) {
                document.getElementById("cidadeAdd").style.border = "2px solid red";
                spans[4].style.display = 'block';                
                return false;
            }

            let cepRegex = /^\d{5}-\d{3}$/;
            if (!cepRegex.test(cep)) {
                document.getElementById("cepAdd").style.border = "2px solid red";               
                spans[5].style.display = 'block';                
                return false;
            }

            if (bairro.length < 3) {
                document.getElementById("bairroAdd").style.border = "2px solid red";
                spans[6].style.display = 'block';                
                return false;
            }

            if (rua.length < 3) {
                document.getElementById("ruaAdd").style.border = "2px solid red";
                spans[7].style.display = 'block';                
                return false;
            }

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
            let id = $(this).data('id');
            let nome = $(this).data('nome');
            let email = $(this).data('email');
            let telefone = $(this).data('telefone');
            let estado = $(this).data('estado');
            let cidade = $(this).data('cidade');
            let cep = $(this).data('cep');
            let bairro = $(this).data('bairro');
            let rua = $(this).data('rua');
            let numero = $(this).data('numero');

            $('#editClientModal').modal('show');
            $('#nomeEdit').val(nome);
            $('#emailEdit').val(email);
            $('#telefoneEdit').val(telefone);
            $('#estadoEdit').val(estado);
            $('#cidadeEdit').val(cidade);
            $('#cepEdit').val(cep);
            $('#bairroEdit').val(bairro);
            $('#ruaEdit').val(rua);
            $('#numeroEdit').val(numero);
            $('#idCliente').val(id);
        });

        $('#editFormClient').on('submit', function(e){
            e.preventDefault();
            let form = $(this).serialize();
            let url = $(this).attr('action');
            let nome = $("#nomeEdit").val();
            let email = $("#emailEdit").val();
            let telefone = $("#telefoneEdit").val();
            let estado = $("#estadoEdit").val();
            let cidade = $("#cidadeEdit").val();
            let cep = $("#cepEdit").val();
            let bairro = $("#bairroEdit").val();
            let rua = $("#ruaEdit").val();
            let numero = $("#numeroEdit").val();
            const spans  = document.querySelectorAll('.span-required-edit');

            if (nome.length < 3) {
                document.getElementById("nomeEdit").style.border = "2px solid red";
                spans[0].style.display = 'block';
                return false;
            }

            let emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (!emailRegex.test(email)) {
                document.getElementById("emailEdit").style.border = "2px solid red";               
                spans[1].style.display = 'block';                
                return false;
            }

            let telefoneRegex = /^\(\d{2}\)\s\d{5}-\d{4}$/;
            if (!telefoneRegex.test(telefone)) {
                document.getElementById("telefoneEdit").style.border = "2px solid red";
                spans[2].style.display = 'block';                
                return false;
            }

            if (estado.length > 2) {
                document.getElementById("estadoEdit").style.border = "2px solid red";
                spans[3].style.display = 'block';                
                return false;
            }

            if (cidade.length < 3) {
                document.getElementById("cidadeEdit").style.border = "2px solid red";
                spans[4].style.display = 'block';                
                return false;
            }

            let cepRegex = /^\d{5}-\d{3}$/;
            if (!cepRegex.test(cep)) {
                document.getElementById("cepEdit").style.border = "2px solid red";               
                spans[5].style.display = 'block';                
                return false;
            }

            if (bairro.length < 3) {
                document.getElementById("bairroEdit").style.border = "2px solid red";
                spans[6].style.display = 'block';                
                return false;
            }

            if (rua.length < 3) {
                document.getElementById("ruaEdit").style.border = "2px solid red";
                spans[7].style.display = 'block';                
                return false;
            }

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