<html>
<head>
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">   
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <link rel="stylesheet"  href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <title>Controle de estoque</title>
</head>
<body>
<div class="container">

    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <div class="navbar-header">
                <a class="navbar-brand" href="/produtos">Estoque Laravel</a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="/produtos">Listagem</a></li>
                <li><a href="/produtos/form">Novo</a></li>
            </ul>

        </div>
    </nav>

    @yield('conteudo')

    <footer class="footer">
        <p>© Curso de Laravel do Alura.</p>
    </footer>

</div>
</body>
</html>