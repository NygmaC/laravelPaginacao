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

                    <div class="card-body">
                            <h5>Exibindo {{ $clientes->count() }} de {{ $clientes->total() }} clientes
                                {{ $clientes->firstItem() }} a {{ $clientes->lastItem()}}
                            </h5>
                            <table class="table table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Sobrenome</th>
                                        <th scope="col">Email</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $c)
                                    <tr>
                                            <td>{{$c->id}}</td>
                                            <td>{{$c->nome}}</td>
                                            <td>{{$c->sobrenome}}</td>
                                            <td>{{$c->email}}</td>
                                        </tr>        
                                    @endforeach
                                   
                                </tbody>
                            </table>
                    </div>
                    <div class="card-footer">
                        {{ $clientes->links() }}
                    </div>
            </div>
       </div>

       <script type="text/javascript" src="{{asset('js/app.js')}}"></script>
       <script type="text/javascript" src="{{asset('js/paginacao.js')}}"></script>

    </body>
</html>
