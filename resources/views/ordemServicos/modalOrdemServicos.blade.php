<!-- Modal cadastrar-->
<div class="modal fade p-0 m-0" id="addnewOrdemServico" data-bs-backdrop="static" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg bg-ligth">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Nova Ordem de Serviço</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('storeOrdemServicos') }}" id="addFormOrdemServico">
                @csrf
                <div class="modal-body row g-3">

                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="nome_servico">Nome do serviço</label>
                        <select class="form-select @error('nome_servico') is-invalid @enderror" name="nome_servico" id="nome_servico" required>
                            <?php $ativo = $servicos->where('status', 'Ativo'); ?>
                            @if ($ativo->toArray())
                                <option value="" selected>Selecione o serviço</option>
                            @else
                                <option value="" class="text-danger">Não existem serviços ativos cadastrados</option>
                            @endif                            
                            @foreach ($ativo as $servico)
                                    <option value="{{ $servico->id }}" @if (old('nome_servico') == $servico->id) selected @endif >
                                        {{ $servico->nome }}
                                    </option>                                   
                            @endforeach
                        </select>
                        @error('turma')
                            <small class="invalid-feedback fw-bold">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-8">
                        <label class="form-label" for="nome_cliente">Nome do cliente</label>
                        <select class="form-select @error('nome_cliente') is-invalid @enderror" name="nome_cliente" id="nome_cliente" required>
                            @if ($clientes->toArray())
                                <option value="" selected>Selecione o cliente</option>
                            @else
                                <option value="" class="text-danger">Não existem clientes cadastrados</option>
                            @endif
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}"
                                    @if (old('nome_cliente') == $cliente->id) selected @endif>
                                    {{ $cliente->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('turma')
                            <small class="invalid-feedback fw-bold">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-4">
                        <label class="form-label" for="abertura">Data de abertura</label>
                        <input type="date" name="abertura" class="form-control @error('abertura') is-invalid @enderror" value="{{ old('abertura') }}" required>
                        @error('abertura')
                            <small class="invalid-feedback fw-bold">{{ $message }}</small>
                        @enderror 
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="form-label" for="observacao">Observações</label>
                        <textarea name="observacao" cols="30" rows="10" class="form-control"></textarea>
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


<!-- Modal Detalhes-->
    <div class="modal fade bg-white viewOrdemServico" data-bs-backdrop="static" id="viewOrdemServico" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg bg-light">
            <div class="modal-content">
                <div class="modal-body row g-3">

                    <div class="col-md-6 detalhes">
                        <label class="form-label text-primary fw-bold">Nome do serviço:</label><br>
                        <label class="form-label" id="nomeServico"></label>
                    </div>

                    <div class="col-md-6 detalhes">
                        <label class="form-label text-primary fw-bold">Data de abertura:</label><br>
                        <label class="form-label" id="abertura"></label>
                    </div>

                    <div class="col-md-12 detalhes">
                        <label class="form-label text-primary fw-bold">Detalhes do serviço:</label><br>
                        <label class="form-label" id="detalhes"></label>
                    </div>

                    <div class="col-md-6 detalhes">
                        <label class="form-label text-primary fw-bold">Nome do cliente:</label><br>
                        <label class="form-label" id="nomeCliente"></label>
                    </div>

                    <div class="col-md-6 detalhes">
                        <label class="form-label text-primary fw-bold">Email do Cliente:</label><br>
                        <label class="form-label" id="email"></label>
                    </div>

                    <div class="col-md-4 detalhes">
                        <label class="form-label text-primary fw-bold">Telefone do Cliente:</label><br>
                        <label class="form-label" id="telefone"></label>
                    </div>

                    <div class="col-md-4 detalhes">
                        <label class="form-label text-primary fw-bold">Cidade do Cliente:</label><br>
                        <label class="form-label" id="cidade"></label>
                    </div>

                    <div class="col-md-4 detalhes">
                        <label class="form-label text-primary fw-bold">Cep do Cliente:</label><br>
                        <label class="form-label" id="cep"></label>
                    </div>

                    <div class="col-md-6 detalhes">
                        <label class="form-label text-primary fw-bold">Bairro do Cliente:</label><br>
                        <label class="form-label" id="bairro"></label>
                    </div>

                    <div class="col-md-6 detalhes">
                        <label class="form-label text-primary fw-bold">Endereço do Cliente:</label><br>
                        <label class="form-label" id="rua"></label>, 
                        <label class="form-label" id="numero"></label>
                    </div>

                    <div class="col-md-12 detalhes">
                        <label class="form-label text-primary fw-bold">Observações:</label><br>
                        <label class="form-label" id="observacao"></label>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sair</button>
                </div>
            </div>
        </div>
    </div>

