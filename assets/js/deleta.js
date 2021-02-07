$('.deleta').on('click', function() {
    delCad();
});

function delCad()
{
    $.ajax({
        url: 'src/Controller/deletaCad.php',
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
                $(".msg").html(
                    "<div class='alert alert-success alert-dismissible fade show' role='alert'> " + response.message + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>"
                );
                window.location.href = "index.html";
            } else if (response.status == 400)
            {
                $(".msg").html(
                    "<div class='alert alert-danger alert-dismissible fade show' role='alert'> " + response.message + "<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button> </div>"
                );
            }
        }
    });
}