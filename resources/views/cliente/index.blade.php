@extends('template.principal')
@section('main')
    <h1 class="bd-title" id="content">Lista de Torcedores</h1>
    {{--<table class="table table-dark table-bordered table-hover" id="torcedores">--}}
    {{--<thead>--}}
    {{--<tr>--}}
    {{--<th scope="col">#</th>--}}
    {{--<th scope="col">Nome</th>--}}
    {{--<th scope="col">Documento</th>--}}
    {{--<th scope="col">E-mail</th>--}}
    {{--</tr>--}}
    {{--</thead>--}}
    {{--<tbody>--}}
    {{--@forelse($rsCliente as $cliente)--}}
    {{--<tr>--}}
    {{--<th scope="row">--}}
    {{--<button type="button" class="btn btn-primary">Primary</button>--}}
    {{--<button type="button" class="btn btn-danger">Danger</button>--}}
    {{--</th>--}}
    {{--<td>{{$cliente->nome}}</td>--}}
    {{--<td>{{$cliente->documento}}</td>--}}
    {{--<td>{{$cliente->email}}</td>--}}
    {{--</tr>--}}
    {{--</tbody>--}}
    {{--@empty--}}
    {{--</table>--}}
    {{--<div class="alert alert-info">--}}
    {{--<strong><i class="fa fa-database"></i></strong> Nenhum Registro foi encontrado--}}
    {{--</div>--}}
    {{--@endforelse--}}
    {{--<tfooter>--}}
    {{--{{$rsCliente->links() }}--}}
    {{--</tfooter>--}}
    {{--</table>--}}

    <table class="table table-dark table-bordered table-hover" id="torcedores">
        <thead>
        <tr>

            <th scope="col">Nome</th>
            <th scope="col">Documento</th>
            <th scope="col">E-mail</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>

      <script>
        $(document).ready(function () {
            $('#torcedores').DataTable({
                "processing": true,
                "serverSide": true,
                ajax: {
                    "url": "{{ url('listajson') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": {_token: "{{csrf_token()}}"}
                },
                "columns": [
                    {"data": "nome"},
                    {"data": "documento"},
                    {"data": "email"},
                ]

            });
        });
    </script>
@endsection
