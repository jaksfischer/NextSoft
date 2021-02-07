$('.cons-click').on('click', function() {
    consCad();
});

function consCad()
{
    $.ajax({
        url: 'src/Controller/consulta.php',
        dataType: 'json',
        type: 'POST',
        data: $('form').serialize(),
        encode: true,
        success: function (response){
            if(response.status == 199)
            {
                $(".cad-msg").html(
                    "<div class='alert alert-success alert-dismissible fade show' role='alert'> " + response.message + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>"
                );
            } else if (response.status == 200)
            {
                $(".user-info").html(
                    "<h3>Usuário</h3> <div class='row align-center'> <div class='col-md-1 border'> ID </div> <div class='col-md-1 border'> User ID </div> <div class='col-md-3 border'> Nome </div> <div class='col-md-3 border'> Email </div> <div class='col-md-2 border'> CPF </div> <div class='col-md-2 border'> Telefone </div></div>" +
                    "<div class='row align-center'> <div class='col-md-1 border'> " + response.user.Id + " </div> <div class='col-md-1 border'>  " + response.user.IdUser + "  </div> <div class='col-md-3 border'>  " + response.user.Nome + "  </div> <div class='col-md-3 border'>  " + response.user.Email + "  </div> <div class='col-md-2 border'>  " + response.user.Cpf + "  </div> <div class='col-md-2 border'>  " + response.user.Telefone + "  </div> </div>" +
                    "<div class='row align-center'> <div class='col-md-2 border'> Bairro </div> <div class='col-md-1 border'>  CEP  </div> <div class='col-md-1 border'>  Comp.  </div> <div class='col-md-3 border'>  Logradouro  </div> <div class='col-md-1 border'>  Numero  </div> <div class='col-md-1 border'>  Estado  </div>  <div class='col-md-1 border'>  Tipo  </div> <div class='col-md-2 border'>  Ação  </div> </div>"
                );

                var arr = response.address;

                for (var i = 0; i < arr.length; i++) {
                    $(".info"+[i]).html(
                        "<div class='row align-center'> <div class='col-md-2 border'> " + arr[i].Bairro + " </div> <div class='col-md-1 border'>  " + arr[i].Cep + "  </div> <div class='col-md-1 border'>  " + arr[i].Complemento + "  </div> <div class='col-md-3 border'>  " + arr[i].Logradouro + "  </div> <div class='col-md-1 border'>  " + arr[i].Numero + "  </div> <div class='col-md-1 border'>  " + arr[i].Uf + " </div> <div class='col-md-1 border'>  " + arr[i].Tipo + "  </div> <div class='col-md-2 border'> <a href='editar.php?id="+arr[i].idUser+"&tipo="+arr[i].Tipo+"'><button class='btn btn-primary'>Editar</button></a> - <a href='deleta.php?id="+arr[i].idUser+"&tipo="+arr[i].Tipo+"'> <button class='btn btn-primary'>Excluir</button> </a> </div> </div>"
                    );
                }
            } else if (response.status == 400)
            {
                $(".cad-msg").html(
                    "<div class='alert alert-danger alert-dismissible fade show' role='alert'> " + response.message + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>"
                );
            }
        }
    });
}