@extends('template.principal')
@section('main')
    <form id="" action="/email/salvar" method="POST">
        {{csrf_field()}}

        <h3 class="bd-title">Enviar e-mail</h3>

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
            <label for="nome">Nome</label>
            <textarea class="summernote" name="email">summernote 1</textarea>
        </div>

        <button type="submit" class="btn btn-primary" id="btn-salvar-cliente">Enviar <i class="fas fa-paper-plane"></i></button>
    </form>
    <script>
        $('.summernote').summernote({
            height: 150,   //set editable area's height
            codemirror: { // codemirror options
            }
        });
    </script>
@endsection
