<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>Paginação</title>
    </head>
    <body>

       <div class="container">
            <div class="card text-center">
                <div class="card-header">Tabela de Clientes</div>

                    <div class="card-body" >
                        <div class="card-title" id="card_title"></div>
                        <table class="table table-dark" id="tabelaClientes">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Sobrenome</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <nav id="paginator">
                            <ul class="pagination">
                                
                            </ul>
                        </nav>
                    </div>
            </div>
       </div>

       <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
       <script type="text/javascript" src="{{asset('js/paginacao.js')}}"></script>

    </body>
</html>
