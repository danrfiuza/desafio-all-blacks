@extends('template.principal')
@section('main')
    <h1 class="bd-title" id="content">Lista de Torcedores
        <button
                title="Adicionar Novo torcedor"
                class="btn btn-success"
                data-toggle="modal"
                data-target=".bd-example-modal-lg"
                id="btn-incluir"
        >
            <i class="fas fa-user-plus"></i>
        </button>
    </h1>


    <div class="table-responsive">

        <table class="table table-dark table-bordered table-hover table table-sm" id="torcedores">
            <thead>
            <tr>
                <th scope="col"></th>
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
    </div>

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            carregarListagem();
        });

        function carregarListagem() {
            $('#torcedores').DataTable({
                destroy: true,
                "processing": true,
                "serverSide": true,
                "language": {
                    "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json"
                },
                ajax: {
                    "url": "{{ url('listajson') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": {_token: "{{csrf_token()}}"}
                },
                "columns": [
                    {
                        "data": "id", render: function (data, type, row, meta) {
                            return `
                            <button
                                type="button"
                                id="${data}"
                                class="btn btn-primary editar"
                                data-toggle="modal"
                                data-target=".bd-example-modal-lg"
                            >
                                <i class="fas fa-edit"></i>
                            </button>
                            <button
                                type="button"
                                id="${data}"
                                class="btn btn-danger remover"
                            >
                            <i class="fas fa-trash"></i>
                            </button>
                            `;
                        }
                    },
                    {"data": "nome"},
                    {"data": "documento"},
                    {"data": "email"},
                ]

            });
        }

        $(document).on('click', '.editar', function () {
            let id = $(this).attr('id');
            $.get(`cliente/${id}`)
                .done((res) => {
                    $('.modal-title').html('Editar');
                    $('.modal-body').html(res);
                });
        });

        $(document).on('click', '.remover', function () {
            let id = $(this).attr('id');
            Swal.fire({
                title: 'Tem certeza?',
                text: "Você deseja mesmo excluir este torcedor?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.value) {
                    $.get(`cliente/deletar/${id}`)
                        .then((res) => {
                            Swal.fire('Torcedor Deletado', '', 'success');
                            carregarListagem();
                        }).catch((err) => {
                        Swal.fire('Ocorreu um erro.', '', 'error');
                    });
                }
            });
        });

        $('#btn-incluir').click(() => {
            $.get('novo')
                .done((res) => {
                    $('.modal-title').html('Incluir');
                    $('.modal-body').html(res);
                });
        });

        $('.modal').on('hidden.bs.modal', function () {
            $('.modal-title').html('');
            $('.modal-body').html('');
        })
    </script>
@endsection
