<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Desafio All Blacks</title>
    <!-- jQuery -->
    {{--<script src="{{asset('js/app.js')}}"></script>--}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"
            integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>

    {{--fontawesome--}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    {{--datatables--}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    {{--summernote--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>

    {{--swal--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


    <script src="{{URL::asset('js/moment.js')}}"></script>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <a class="navbar-brand" href="/">
        <img
                src="http://allblacks-stg.azurewebsites.net/Images/dnaImages/ablogo.png"
                width="40"
                height="30"
                class="d-inline-block align-top" alt=""
        >
        <span class="text-capitalize text-light align-middle">Desafio All Blacks</span>
    </a>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-light"
                   href="#" id=""
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Serviços
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item text-dark" href="/importacao">Importar Torcedores</a>
                    <a class="dropdown-item text-dark" href="/email">Enviar E-mail</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<main class="col-10 py-md-3 container" role="main">
    <div
            id='loading'
            style='
            position:fixed;
            height:100%;
            width:100%;
            overflow:hidden;
            top:0;
            left:0;
            background-color: darkgrey;
            z-index:99999999;
            opacity: .9;
            display: none;
        '
    >
        <div
                class=""
                style="
                height: 100%;
                display: flex;
                align-items: center;
                justify-content: center;
            "
        >
            <div class="fa-5x">
                <i class="fas fa-cog fa-spin"></i>
            </div>
            <span id="mensagem-loading"></span>
        </div>
    </div>
    @yield('main')
</main>
</body>
<script>
    function loading(mensagem = 'Processando arquivo.Aguarde.') {
        if(mensagem) {
            $('#mensagem-loading').html(mensagem);
        }
        $('#loading').toggle();
    }
</script>
</html>
