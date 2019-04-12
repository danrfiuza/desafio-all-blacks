<form id="form-cliente">
    <input type="hidden" name="cliente_id" value="{{$cliente->id}}">
    <input type="hidden" name="endereco_id" value="{{$endereco->id}}">
    <div class="form-group">
        <h3 class="bd-title">Dados do Pessoais</h3>
        <label for="nome">Nome</label>
        <input
            type="text"
            class="form-control form-control-sm"
            id="nome"
            placeholder="Informe nome"
            name="email"
            value="{{$cliente->nome}}"
        />
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input
            type="email"
            class="form-control form-control-sm"
            id=""
            placeholder="Informe email"
            name="email"
            value="{{$cliente->email}}"
        >
    </div>

    <div class="form-group">
        <label for="documento">Documento</label>
        <input
            type="text"
            class="form-control form-control-sm"
            id="documento"
            placeholder="Informe documento"
            name="documento"
            value="{{$cliente->documento}}"
        >
    </div>

    <div class="form-group">
        <label for="telefone">Telefone</label>
        <input
            type="text"
            class="form-control form-control-sm"
            id="telefone"
            placeholder="Informe telefone"
            name="telefone"
            value="{{$cliente->telefone}}"
        >
    </div>
    <hr>

    <h3 class="bd-title">Dados do Endereço</h3>

    <div class="form-group">
        <label for="uf">UF</label>
        <input
            type="text"
            class="form-control form-control-sm"
            id="uf"
            placeholder="Informe Unidade Federativa"
            name="uf"
            value="{{$endereco->uf}}"
        >
    </div>

    <div class="form-group">
        <label for="cidade">Cidade</label>
        <input
            type="text"
            class="form-control form-control-sm"
            id="uf"
            placeholder="Informe Cidade"
            name="cidade"
            value="{{$endereco->cidade}}"
        >
    </div>

    <div class="form-group">
        <label for="cep">CEP</label>
        <input
            type="text"
            class="form-control form-control-sm"
            id="cep"
            placeholder="Informe CEP"
            name="cep"
            value="{{$endereco->cep}}"
        >
    </div>

    <div class="form-group">
        <label for="endereco">Endereço</label>
        <input
            type="text"
            class="form-control form-control-sm"
            id="endereco"
            placeholder="Informe Endereço"
            name="endereco"
            value="{{$endereco->endereco}}"
        >
    </div>

    <div class="form-group">
        <label for="bairro">Bairro</label>
        <input
            type="text"
            class="form-control form-control-sm"
            id="bairro"
            placeholder="Informe Bairro"
            name="bairro"
            value="{{$endereco->bairro}}"
        >
    </div>

    <button type="submit" class="btn btn-primary" id="btn-salvar-cliente">Submit</button>
</form>
<script>
    $('#btn-salvar-cliente').on('click',(evt) => {
        let cliente_id = $('[name=cliente_id]').val();
        evt.preventDefault();
        let form = $('#form-cliente').serialize();
        $.ajax({
            type: 'POST',
            data: form,
            url: `cliente`
        }).done((res) => {
            console.log(res);
        });

    });
</script>
