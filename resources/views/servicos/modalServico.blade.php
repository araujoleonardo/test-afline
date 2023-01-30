<!-- Modal cadastrar-->
<div class="modal fade" id="addnewService" data-bs-backdrop="static" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <label for="nome" class="form-label">Nome do serviço</label>
                        <input type="text" name="nome" id="nomeServicoAdd" class="form-control">
                        <span class="span-addServico">Mínimo 3 caracteres</span>
                    </div>

                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="status">Status</label>
                        <select class="form-select @error('status') is-invalid @enderror" name="status" id="statusAdd" required>
                            <option value="" selected>Selecione o status</option>
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
                        </select> 
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="detalhes" class="form-label">Detalhes do serviço</label>
                        <textarea name="detalhes" cols="30" rows="10" id="detalhesAdd" class="form-control"></textarea>
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
<div class="modal fade" id="editServiceModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" id="nomeServicoEdit" class="form-control">
                        <span class="span-editServico">Mínimo 3 caracteres</span>
                    </div>
                    
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="status">Status</label>
                        <select class="form-select @error('status') is-invalid @enderror" name="status" id="statusEdit" required>
                            <option value="" selected>Selecione o status</option>
                            <option value="Ativo">Ativo</option>
                            <option value="Inativo">Inativo</option>
                        </select> 
                    </div>                         

                    <div class="mb-3 col-md-12">
                        <label for="detalhes" class="form-label">Detalhes do serviço</label>
                        <textarea name="detalhes" id="detalhesEdit" cols="30" rows="10" class="form-control" required></textarea>
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
