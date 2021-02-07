$('.cad-click').on('click', function() {
    cadBanco();
});

function cadBanco()
{
    $.ajax({
        url: 'src/Controller/cad.php',
        dataType: 'json',
        type: 'POST',
        data: $('form').serialize(),
        encode: true,
        success: function (response){
            console.log(response);
            if(response.status == 199)
            {
                // $(".news-msg").addClass("alert-warning alert-dismissible fade show");
                $(".cad-msg").html(
                    "<div class='alert alert-success alert-dismissible fade show' role='alert'> " + response.message + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>"
                );
            } else if (response.status == 200)
            {
                // $(".news-msg").addClass("alert-secondary alert-dismissible fade show");
                $(".cad-msg").html(
                    "<div class='alert alert-success alert-dismissible fade show' role='alert'> " + response.message + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>"
                );
            } else if (response.status == 400)
            {
                // $(".news-msg").addClass("alert-secondary alert-dismissible fade show");
                $(".cad-msg").html(
                    "<div class='alert alert-danger alert-dismissible fade show' role='alert'> " + response.message + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>"
                );
            }
        }
    });
}