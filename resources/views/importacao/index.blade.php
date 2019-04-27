@extends('template.principal')
@section('main')

    <div class="card col-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(isset($mensagem))
            <div class="alert alert-success" role="alert">
                This is a success alert—check it out!
            </div>
        @endif
        <div class="card-body">
            <form id="form-importacao-arquivo" action="/importacao/salvar" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="arquivo">Arquivo</label>
                    <input type="file" class="form-control-file" id="arquivo" name="arquivo">
                </div>
                <button type="submit" class="btn btn-primary" id="btn-salvar-arquivo">Salvar Arquivo</button>
            </form>
        </div>
    </div>
    <hr>
    <h3 class="bd-title" id="content">Lista de Importações</h3>

    <div class="table-responsive">

        <table class="table table-dark table-bordered table-hover table table-sm table-condensed" id="importacoes">
            <thead>
            <tr>
                <th scope="col"></th>
                <th scope="col">Nome</th>
                <th scope="col">Quantidade Processada</th>
                <th scope="col">Processado?</th>
                <th scope="col">Data Criação</th>
                <th scope="col">Data de Processamento</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            </tbody>
        </table>
    </div>

    <script>

        $('#btn-salvar-arquivo').on('click',(evt) => {
            evt.preventDefault();
            loading('Salvando arquivo, aguarde...');
            $('#form-importacao-arquivo').submit();
        });

        $(document).ready(function () {
            carregarListagem();
        });

        function carregarListagem() {
            $('#importacoes').DataTable({
                destroy: true,
                "processing": true,
                "serverSide": true,
                "searching": false,
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                },
                ajax: {
                    "url": "{{ url('importacao/listajson') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": {_token: "{{csrf_token()}}"}
                },
                "columns": [
                    {
                        "data": "id", render: function (data, type, row, meta) {
                            if (row.processado === 0) {
                                return `
                                <button
                                type="button"
                                id="${data}"
                                title="Importar Torcedores"
                                class="btn btn-info importar"
                                >
                                <i class="fas fa-file-import"></i>
                                </button>
                             `;
                            }
                            return '';
                        }
                    },
                    {"data": "nome_original"},
                    {"data": "quantidade_processada"},
                    {
                        "data": "processado", render: (data, type, row, meta) => {
                            return data === 0 ? 'Não' : 'Sim'
                        }
                    },
                    {
                        "data": "created_at", render: (data, type, row, meta) => {
                            return moment(data).format('DD/MM/YYYY H:mm:ss');
                        }
                    },
                    {
                        "data": "updated_at", render: (data, type, row, meta) => {
                            return moment(data).format('DD/MM/YYYY H:mm:ss');
                        }
                    },
                ]

            });
        }

        $(document).on('click', '.importar', function () {
            loading();
            let id = $(this).attr('id');
            $.ajax({
                type: 'GET',
                url: `/importacao/importar/${id}`,
            }).then((res) => {
                loading();
                Swal.fire(res.msg, '', 'success').then(() => {
                    carregarListagem();
                });
            }).catch((err) => {
                loading();
                Swal.fire(err, '', 'error');
            });
        });

        $('.modal').on('hidden.bs.modal', function () {
            $('.modal-title').html('');
            $('.modal-body').html('');
        })
    </script>
@endsection
