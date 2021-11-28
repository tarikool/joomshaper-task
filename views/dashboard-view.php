<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>





<nav class="navbar navbar-expand-md navbar-light bg-light">

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="navbar-brand" href="#">Home</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </li>
        </ul>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="logout">Logout</a>
            </li>
        </ul>
    </div>
</nav>


<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                Welcome <?=$user['name'] ?>
            </div>
        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>


<script>
    $(document).ready(function () {
        const form = $('#login-form');

        form.submit(function () {
            event.preventDefault();
            $('.error-message').html('');

            let route = form.attr('action');
            let type = form.attr('method');

            $.ajax({
                url: route,
                type: type,
                data: {
                    email: $('[name="email"]').val(),
                    password: $('[name="password"]').val(),
                },
                success: function (response) {
                    window.location.href = 'dashboard';
                },
                error: function(xhr, status, error) {
                    let errors = JSON.parse(xhr.responseText);

                    $.each( errors, function( key, message ) {
                        $('.error-message')
                            .append("<p class='text-danger'>"+ message+ "</p>");

                    });

                }
            });

        })


    })
</script>

</html>


