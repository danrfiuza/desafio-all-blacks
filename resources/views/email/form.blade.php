@extends('template.principal')
@section('main')
    <form id="form-cliente">
        <input type="hidden" name="cliente_id" value="{{($cliente->id??'')}}"/>
        <input type="hidden" name="endereco_id" value="{{$endereco->id??''}}"/>
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
            <div class="summernote">summernote 1</div>
        </div>

        <button type="submit" class="btn btn-primary" id="btn-salvar-cliente">Submit</button>
    </form>
    <script>
        $('.summernote').summernote({
            height: 150,   //set editable area's height
            codemirror: { // codemirror options
            }
        });
    </script>
@endsection
