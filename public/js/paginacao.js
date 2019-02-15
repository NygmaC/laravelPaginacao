
function getDadosGridIndex(page) {
    $.get('/json', {page: page}, function(data) {
        montargrid(data);
        $('#card_title').html('Exibindo(' + data.per_page + " de " + data.total + ") " 
         + " Cliente de" + data.from + " até " + data.to);
    });
}

function montargrid(data) {
    $('#tabelaClientes>tbody>tr').remove();
    for(i=0; i<data.data.length; i++) {
        var row = "<tr>" +
                    "<td>" + data.data[i].id + "</td>" +
                    "<td>" + data.data[i].nome + "</td>" +
                    "<td>" + data.data[i].sobrenome + "</td>" +
                    "<td>" + data.data[i].email + "</td>" +
                "</tr>";

        $('#tabelaClientes>tbody').append(row);
    }
    montarpaginator(data);
}

function montarpaginator(data) {

    $('#paginator>ul>li').remove();
    var Anterior = getItemAnterior(data);
    $('#paginator>ul').append(Anterior);

    //Validacao para movimentacao dos links do GRID
    numeroDeItens = 6;
    if((data.current_page - numeroDeItens/2) <= 1) {
        inicio = 1;

    }else if((data.last_page - data.current_page) < numeroDeItens) {
        inicio = data.last_page - (n + 1);
    }
    else{
        inicio = data.current_page - numeroDeItens/2;
    }
    
    fim = inicio + (numeroDeItens - 1);

    for(i=inicio; i<=fim; i++) {
       
        if(i == data.current_page) {
            pageItem = '<li class="page-item active">'; 
        }else {
            pageItem = '<li class="page-item">';
        }

        pageItem += '<a class="page-link" pagina = "' + i + '" href="javascript:void(0)">' + i +'</a> </li>';
        $('#paginator>ul').append(pageItem);
    }

    $('#paginator>ul').append(getItemNext(data));

    $('#paginator>ul>li>a').click(function() {
        getDadosGridIndex($(this).attr('pagina'));
    })
}

function getItemNext(data) {
    i = data.current_page + 1;

    if(data.last_page == data.current_page){

        return '<li class="page-item disabled"> <a class="page-link" pagina = "' + i + '" href="javascript:void(0)">Proximo</a></li>';
    }
    return '<li class="page-item"> <a class="page-link" pagina = "' + i + '" href="javascript:void(0)">Proximo</a></li>';
}

function getItemAnterior(data) {
    i = data.current_page - 1;
    
    if(1 == data.current_page){
        return '<li class="page-item disabled"> <a class="page-link" pagina = "' + i + '" href="javascript:void(0)">Anterior</a></li>';
    }
    return '<li class="page-item"> <a class="page-link" pagina = "' + i + '" href="javascript:void(0)">Anterior</a></li>';
}

$( function () {
    getDadosGridIndex(1);
});