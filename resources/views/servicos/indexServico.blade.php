@extends('layouts.main')

@section('title', 'Serviços')

@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.css" />
@endsection


@section('content')    
    
<div class="container">
    <div class="card shadow m-5">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <h3 class="text-primary">Listagem de Serviços</h3>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addnewService">
                <i class="bi bi-plus-circle"></i>
                Novo Serviço
            </button>
        </div>
        <div class="card-body" id="show_all_servicos">
            <h1 class="text-center text-secondary my-5">Carregando...</h1>
        </div>
    </div> 
</div>      

@endsection

@section('js')
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.10.25/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){

        getServico()

        //Função salvar
        $('#addFormService').on('submit', function(e){
            e.preventDefault();
            let form = $(this).serialize();
            let url = $(this).attr('action');
            let nome = $("#nomeServicoAdd").val();

            const spans  = document.querySelectorAll('.span-addServico');

            if (nome.length < 3) {
                document.getElementById("nomeServicoAdd").style.border = "2px solid red";
                spans[0].style.display = 'block';
                return false;
            }

            $.ajax({
                type: 'POST',
                url: url,
                data: form,
                dataType: 'json',
                success: function(){
                    $('#addnewService').modal('hide');
                    $('#addFormService')[0].reset();
                    Swal.fire({
                        title: 'Sucesso!',
                        text: 'Serviço cadastrado com sucesso!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                    getServico();
                }
            });
        });
        //----------

        //Função editar
        $(document).on('click', '#editService', function(e){
            e.preventDefault();
            let id = $(this).data('id');
            let nome = $(this).data('nome');
            let status = $(this).data('status');
            let detalhes = $(this).data('detalhes');

            $('#editServiceModal').modal('show');
            $('#nomeServicoEdit').val(nome);
            $('#statusEdit').val(status);
            $('#detalhesEdit').val(detalhes);
            $('#idService').val(id);
        });

        $('#editFormService').on('submit', function(e){
            e.preventDefault();
            let form = $(this).serialize();
            let url = $(this).attr('action');
            let nome = $("#nomeServicoEdit").val();

            const spans  = document.querySelectorAll('.span-editServico');

            if (nome.length < 3) {
                document.getElementById("nomeServicoEdit").style.border = "2px solid red";
                spans[0].style.display = 'block';
                return false;
            }

            $.post(url, form, function(data) {
                $('#editServiceModal').modal('hide');
                Swal.fire({
                    title: 'Sucesso!',
                    text: 'Serviço alterado com sucesso!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
                getServico();
            })
        });
        //---------

        //Função deletar
        $(document).on('click', '#deleteService', function(event){
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
                    deleteService(id);
                    Swal.fire(
                        'Excluído!',
                        'O Serviço foi excluído com sucesso.',
                        'success'
                    )
                }
            })
        });

        function deleteService(id) {
            $.ajax({
                url: '/deleteservicos/' + id,
                type: 'POST',
                data: {
                    _token: '{!! csrf_token() !!}',
                },
                success: function(result) {
                    getServico();
                },
                error: function(xhr, status, error) {
                    // Error
                    console.log(error);
                }
            });                
        }
        //---------

        function getServico() {
            $.ajax({
                url: '{{ route('getServicos') }}',
                method: 'get',
                success: function(response) {
                    $("#show_all_servicos").html(response);
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