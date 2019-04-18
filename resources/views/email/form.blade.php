@extends('template.principal')
@section('main')
    <form id="" action="/email/enviar" method="POST">
        {{csrf_field()}}

        <h3 class="bd-title">Enviar e-mail</h3>

        <div class="card col-4">
            <div class="card-body">
                <small>Monte o formato do e-mail para ser enviado e coloque informações do usuário entre chaves ({})que
                    deseja apresentar:
                    exemplo:
                </small>
                <samp>
            <p>Olá {nome},</p><p>Este é o seu e-mail: {email}</p><p>Obrigado pela sua atenção!</p><p><br></p><p>Att,</p><p>Desafio All blacks<img
                                src="http://allblacks.p21sistemas.com.br/images/logo.png"
                                style="width: 52.7344px; height: 37.4413px;">
        </samp>
            </div>
        </div>
        <div class="form-group">
            <label for="nome">E-mail</label>
            <small>Textos dinâmicos disponívies: {nome}, {email}, {uf}, {cidade}, {endereco}</small>
            <textarea class="summernote" name="email">
                </p><p><br></p><p>Att,</p><p>Desafio All blacks<img
                            src="http://allblacks.p21sistemas.com.br/images/logo.png"
                            style="width: 52.7344px; height: 37.4413px;"><br></p><p><br></p>
            </textarea>
        </div>

        <button type="submit" class="btn btn-primary" id="btn-salvar-cliente">
            Enviar
            <i class="fas fa-paper-plane"></i>
        </button>
    </form>
    <script>
        $('.summernote').summernote({
            height: 200,   //set editable area's height
            lang: "pt",
            hint: {
                words: ['{nome}', '{email}','{uf}','{cidade}','{endereco}'],
                match: /(\{)/,
                search: function (keyword, callback) {
                    callback($.grep(this.words, function (item) {
                        return item.indexOf(keyword) === 0;
                    }));
                }
            }
        });

    </script>
@endsection
