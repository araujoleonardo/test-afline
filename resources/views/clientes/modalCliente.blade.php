<!-- Modal cadastrar-->
<div class="modal fade" id="addnew" data-bs-backdrop="static" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <label class="form-label" for="nome">Nome</label>
                        <input type="text" name="nome" id="nomeAdd" class="form-control">
                        <span class="span-required">Nome deve ter no mínimo 3 caracteres</span>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="email">E-mail</label>
                        <input type="text" name="email" id="emailAdd" class="form-control">
                        <span class="span-required">E-mail Inválido</span>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="telefone">Celular com DDD</label>
                        <input type="text" name="telefone" id="telefoneAdd" class="form-control">
                        <span class="span-required">Digite um telefone válido, Ex. (99) 99999-9999</span>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label" for="estado">Estado</label>
                        <select class="form-select @error('estado') is-invalid @enderror" name="estado" id="estadoAdd" required>
                            <option value="" selected>Selecione o estado</option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
                        </select>                          
                        <span class="span-required">Escolha um estado</span>
                    </div>
                    <div class="mb-3 col-md-5">
                        <label class="form-label" for="cidade">Cidade</label>
                        <input type="text" name="cidade" id="cidadeAdd" class="form-control">
                        <span class="span-required">Mínimo 3 caracteres</span>
                    </div>
                    <div class="mb-3 col-md-2">
                        <label class="form-label" for="cep">Cep</label>
                        <input type="text" name="cep" id="cepAdd" class="form-control">
                        <span class="span-required">Digite um CEP válido</span>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="bairro">Bairro</label>
                        <input type="text" name="bairro" id="bairroAdd" class="form-control">
                        <span class="span-required">Mínimo 3 caracteres</span>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="rua">Rua</label>
                        <input type="text" name="rua" id="ruaAdd" class="form-control">
                        <span class="span-required">Mínimo 3 caracteres</span>
                    </div>
                    <div class="mb-3 col-md-2">
                        <label class="form-label" for="numero">Numero</label>
                        <input type="text" name="numero" id="numeroAdd" class="form-control">
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
<div class="modal fade" id="editClientModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <label class="form-label" for="nome">Nome</label>
                        <input type="text" name="nome" id="nomeEdit" class="form-control">
                        <span class="span-required-edit">Nome deve ter no mínimo 3 caracteres</span>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="email">E-mail</label>
                        <input type="email" name="email" id="emailEdit" class="form-control">
                        <span class="span-required-edit">E-mail Inválido</span>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="telefone">Telefone</label>
                        <input type="text" name="telefone" id="telefoneEdit" class="form-control">
                        <span class="span-required-edit">Digite um telefone válido, Ex. (99) 99999-9999</span>
                    </div>
                    <div class="mb-3 col-md-3">
                        <label class="form-label" for="estado">Estado</label>
                        <select class="form-select @error('estado') is-invalid @enderror" name="estado" id="estadoEdit" required>
                            <option value="" selected>Selecione o estado</option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
                        </select>                          
                        <span class="span-required-edit">Escolha um estado</span>
                    </div>
                    <div class="mb-3 col-md-5">
                        <label class="form-label" for="cidade">Cidade</label>
                        <input type="text" name="cidade" id="cidadeEdit" class="form-control">
                        <span class="span-required-edit">Mínimo 3 caracteres</span>
                    </div>
                    <div class="mb-3 col-md-2">
                        <label class="form-label" for="cep">Cep</label>
                        <input type="text" name="cep" id="cepEdit" class="form-control">
                        <span class="span-required-edit">Digite um CEP válido</span>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="bairro">Bairro</label>
                        <input type="text" name="bairro" id="bairroEdit" class="form-control">
                        <span class="span-required-edit">Mínimo 3 caracteres</span>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="rua">Rua</label>
                        <input type="text" name="rua" id="ruaEdit" class="form-control">
                        <span class="span-required-edit">Mínimo 3 caracteres</span>
                    </div>
                    <div class="mb-3 col-md-2">
                        <label class="form-label" for="numero">Numero</label>
                        <input type="text" name="numero" id="numeroEdit" class="form-control">
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
