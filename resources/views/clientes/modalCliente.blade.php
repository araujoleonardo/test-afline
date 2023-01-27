<!-- Modal cadastrar aluno-->
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Cadastrar Aluno</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('storeClientes') }}" id="addForm">
                @csrf
                <div class="modal-body row g-3">
                    <div class="mb-3 col-md-6">
                        <label for="name">Nome do Aluno</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="municipio">Cidade</label>
                        <input type="text" name="municipio" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" id="add_aluno_btn" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal editar aluno-->
<div class="modal fade" id="editClientModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Editar Aluno</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('updateClientes') }}" id="editFormClient">
                @csrf
                <div class="modal-body row g-3">
                    <input type="hidden" id="idCliente" name="id">
                    <div class="mb-3 col-md-6">
                        <label for="name">Nome do Aluno</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="cpf">CPF</label>
                        <input type="text" name="cpf" id="cpf" class="form-control" required>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label for="municipio">Cidade</label>
                        <input type="text" name="municipio" id="municipio" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" id="telefone" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Alterar</button>
                </div>
            </form>
        </div>
    </div>
</div>
