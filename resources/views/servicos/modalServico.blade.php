<!-- Modal cadastrar-->
<div class="modal fade" id="addnewService" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Cadastrar Serviço</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('storeServicos') }}" id="addFormService">
                @csrf
                <div class="modal-body row g-3">
                    <div class="mb-3 col-md-8">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="status">Status</label>
                        <input type="text" name="status" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="detalhes">Detalhes do serviço</label>
                        <textarea name="detalhes" cols="30" rows="10" class="form-control" required></textarea>
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


<!-- Modal editar-->
<div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Editar Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('updateServicos') }}" id="editFormService">
                @csrf
                <div class="modal-body row g-3">
                    <input type="hidden" id="idService" name="id">
                    <div class="mb-3 col-md-8">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="name" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="status">Status</label>
                        <input type="text" name="status" id="status" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="detalhes">Detalhes do serviço</label>
                        <textarea name="detalhes" id="detalhes" cols="30" rows="10" class="form-control" required></textarea>
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
