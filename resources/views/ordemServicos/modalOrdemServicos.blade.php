<!-- Modal cadastrar-->
<div class="modal fade p-0 m-0" id="addnewOrdemServico" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <label class="form-label for="nome_servico">Nome do serviço</label>
                        <select class="form-select @error('nome_servico') is-invalid @enderror" name="nome_servico" id="nome_servico" required>
                            <option value="" selected>Selecione o serviço</option>
                            @empty($servicos->toArray())
                                <option value="" class="text-danger">Não há serviços cadastrado</option>
                            @endempty
                            @foreach ($servicos as $servico)
                                <option value="{{ $servico->id }}"
                                    @if (old('nome_servico') == $servico->id) selected @endif>
                                    {{ $servico->nome }}
                                </option>
                            @endforeach
                        </select>
                        @error('turma')
                            <small class="invalid-feedback fw-bold">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3 col-md-8">
                        <label class="form-label for="nome_cliente">Nome do cliente</label>
                        <select class="form-select @error('nome_cliente') is-invalid @enderror" name="nome_cliente" id="nome_cliente" required>
                            <option value="" selected>Selecione o cliente</option>
                            @empty($clientes->toArray())
                                <option value="" class="text-danger">Não há clientes cadastrado</option>
                            @endempty
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
                        <label class="form-label for="abertura">Data de abertura</label>
                        <input type="date" name="abertura" class="form-control" required>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="form-label for="observacao">Observações</label>
                        <textarea name="observacao" cols="30" rows="10" class="form-control" required></textarea>
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
@foreach ($ordems as $ordem)
    <div class="modal fade bg-white viewOrdemServico" id="viewOrdemServico{{$ordem->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg bg-light">
            <div class="modal-content">
                <div class="modal-body row g-3">

                    <div class="mb-3 col-md-6">
                        <label class="form-label text-primary fw-bold">Nome do serviço:</label><br>
                        <?php $nomeServico = $servicos->find($ordem->servico_id)->nome;?>
                        {{ $nomeServico }}                                                
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label text-primary fw-bold">Data de abertura:</label><br>
                        {{ date('d-m-Y', strtotime($ordem->abertura)) }}
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="form-label text-primary fw-bold">Detalhes do serviço:</label><br>
                        <?php $detalhesServico = $servicos->find($ordem->servico_id)->detalhes;?>
                        {{ $detalhesServico }} 
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label text-primary fw-bold">Nome do cliente:</label><br>
                        <?php $nomeCliente = $clientes->find($ordem->servico_id)->nome;?>
                        {{ $nomeCliente }} 
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label text-primary fw-bold">Email do Cliente:</label><br>
                        <?php $emailCliente = $clientes->find($ordem->servico_id)->email;?>
                        {{ $emailCliente }} 
                    </div>

                    <div class="mb-3 col-md-4">
                        <label class="form-label text-primary fw-bold">Telefone do Cliente:</label><br>
                        <?php $telefoneCliente = $clientes->find($ordem->servico_id)->telefone;?>
                        {{ $telefoneCliente }}
                    </div>

                    <div class="mb-3 col-md-4">
                        <label class="form-label text-primary fw-bold">Cidade do Cliente:</label><br>
                        <?php $cidadeCliente = $clientes->find($ordem->servico_id)->cidade;?>
                        {{ $cidadeCliente }}
                    </div>

                    <div class="mb-3 col-md-4">
                        <label class="form-label text-primary fw-bold">Cep do Cliente:</label><br>
                        <?php $cepCliente = $clientes->find($ordem->servico_id)->cep;?>
                        {{ $cepCliente }}
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label text-primary fw-bold">Bairro do Cliente:</label><br>
                        <?php $bairroCliente = $clientes->find($ordem->servico_id)->bairro;?>
                        {{ $bairroCliente }}
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label text-primary fw-bold">Endereço do Cliente:</label><br>
                        <?php $ruaCliente = $clientes->find($ordem->servico_id)->rua;?>
                        <?php $numeroCliente = $clientes->find($ordem->servico_id)->numero;?>
                        {{ $ruaCliente }}, {{ $numeroCliente }}
                    </div>

                    <div class="mb-3 col-md-12">
                        <label class="form-label text-primary fw-bold">Observações:</label><br>
                        {{ $ordem->observacao }}
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sair</button>
                </div>
            </div>
        </div>
    </div>
@endforeach

