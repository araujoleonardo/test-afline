<!-- Modal cadastrar-->
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Cadastrar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('storeClientes') }}" id="addForm">
                @csrf
                <div class="modal-body row g-3">
                    <div class="mb-3 col-md-6">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="estado">Estado</label>
                        <input type="text" name="estado" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-2">
                        <label for="cep">Cep</label>
                        <input type="text" name="cep" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="rua">Rua</label>
                        <input type="text" name="rua" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-2">
                        <label for="numero">Numero</label>
                        <input type="text" name="numero" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal editar-->
<div class="modal fade" id="editClientModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Editar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('updateClientes') }}" id="editFormClient">
                @csrf
                <div class="modal-body row g-3">
                    <input type="hidden" id="idCliente" name="id">
                    <div class="mb-3 col-md-6">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email">E-mail</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" id="telefone" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="estado">Estado</label>
                        <input type="text" name="estado" id="estado" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" id="cidade" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-2">
                        <label for="cep">Cep</label>
                        <input type="text" name="cep" id="cep" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="bairro">Bairro</label>
                        <input type="text" name="bairro" id="bairro" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="rua">Rua</label>
                        <input type="text" name="rua" id="rua" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-2">
                        <label for="numero">Numero</label>
                        <input type="text" name="numero" id="numero" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
