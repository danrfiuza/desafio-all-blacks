<form id="form-cliente">
    <input type="hidden" name="cliente_id" value="{{($cliente->id??'')}}"/>
    <input type="hidden" name="endereco_id" value="{{$endereco->id??''}}"/>
    {{csrf_field()}}
    <div class="form-group">
        <h3 class="bd-title">Dados do Pessoais</h3>
        <label for="nome">Nome</label>
        <input
                type="text"
                class="form-control form-control-sm"
                id="nome"
                placeholder="Informe nome"
                name="nome"
                value="{{$cliente->nome??''}}"
        />
        <div class="invalid-feedback" id="erros-nome">
        </div>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input
                type="email"
                class="form-control form-control-sm"
                id="email"
                placeholder="Informe email"
                name="email"
                value="{{$cliente->email??''}}"
        />
        <div class="invalid-feedback" id="erros-email">
        </div>
    </div>

    <div class="form-group">
        <label for="documento">Documento</label>
        <input
                type="text"
                class="form-control form-control-sm"
                id="documento"
                placeholder="Informe documento"
                name="documento"
                value="{{$cliente->documento??''}}"
        />
        <div class="invalid-feedback" id="erros-documento">
        </div>
    </div>

    <div class="form-group">
        <label for="telefone">Telefone</label>
        <input
                type="text"
                class="form-control form-control-sm"
                id="telefone"
                placeholder="Informe telefone"
                name="telefone"
                value="{{$cliente->telefone??''}}"
        />
        <div class="invalid-feedback" id="erros-telefone">
        </div>
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
                value="{{$endereco->uf??''}}"
        />
        <div class="invalid-feedback" id="erros-uf">
        </div>
    </div>

    <div class="form-group">
        <label for="cidade">Cidade</label>
        <input
                type="text"
                class="form-control form-control-sm"
                id="uf"
                placeholder="Informe Cidade"
                name="cidade"
                value="{{$endereco->cidade??''}}"
        />
        <div class="invalid-feedback" id="erros-cidade">
        </div>
    </div>

    <div class="form-group">
        <label for="cep">CEP</label>
        <input
                type="text"
                class="form-control form-control-sm"
                id="cep"
                placeholder="Informe CEP"
                name="cep"
                value="{{$endereco->cep??''}}"
        />
        <div class="invalid-feedback" id="erros-cep">
        </div>
    </div>

    <div class="form-group">
        <label for="endereco">Endereço</label>
        <input
                type="text"
                class="form-control form-control-sm"
                id="endereco"
                placeholder="Informe Endereço"
                name="endereco"
                value="{{$endereco->endereco??''}}"
        />
        <div class="invalid-feedback" id="erros-endereco">
        </div>
    </div>

    <div class="form-group ">
        <label for="bairro">Bairro</label>
        <input
                type="text"
                class="form-control form-control-sm"
                id="bairro"
                placeholder="Informe Bairro"
                name="bairro"
                value="{{$endereco->bairro??''}}"
        />
        <div class="invalid-feedback" id="erros-bairro">
        </div>
    </div>

    <button type="submit" class="btn btn-primary" id="btn-salvar-cliente">Submit</button>
</form>
<script>
    $('#btn-salvar-cliente').on('click', function (evt) {
        evt.preventDefault();

        let form = $('#form-cliente');

        $.ajax({
            type: 'POST',
            data: form.serialize(),
            url: 'cliente/salvar'
        }).then(res => {
            $('.modal').modal('hide');
            Swal.fire(
                '',
                res.msg,
                'success'
            );
            form.find('input').removeClass('is-invalid');
            carregarListagem();

        }).catch((jqXHR) => {
            if (jqXHR.status === 500) {
                Swal.fire(
                    '',
                    'Ocorreu um erro, entre em contato com o administrador do sistema.',
                    'error'
                );
                return;
            }

            let response = JSON.parse(jqXHR.responseText);
            form.find('input').removeClass('is-invalid');
            $.each(response.errors, (campo, erros) => {

                let input = form.find(`[name=${campo}]`);
                input.addClass('is-invalid');
                $(`#erros-${campo}`).html('');
                $.each(erros, (index, value) => {

                    $(`#erros-${campo}`).append(`<p>${value}</p>`);

                });

            });

        });

    });
</script>
