@extends('template.principal')
@section('main')
    @if (\Session::has('success'))
        <div class="alert alert-success">
            {!! \Session::get('success') !!}
        </div>
    @endif
    @if (\Session::has('error'))
        <div class="alert alert-danger">
            {!! \Session::get('error') !!}
        </div>
    @endif
    <form id="form-enviar-email" action="/email/enviar" method="POST">
        {{csrf_field()}}

        <h3 class="bd-title">Enviar e-mail</h3>

        <div class="card col-6">
            <div class="card-body">
                <small>Monte o formato do e-mail para ser enviado e coloque informações do usuário entre chaves ({})que
                    deseja apresentar:
                    exemplo:
                </small>
                <br>
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

        <button type="submit" class="btn btn-primary" id="btn-enviar-email">
            Enviar
            <i class="fas fa-paper-plane"></i>
        </button>
    </form>
    <script>
        $('#btn-enviar-email').on('click',(evt) => {
            evt.preventDefault();
            loading('Enviando  e-mails, aguarde...');
            $('#form-enviar-email').submit();
        });

        $('.summernote').summernote({
            height: 200,
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
