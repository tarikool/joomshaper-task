<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>

<div class="row justify-content-center" style="margin-top: 150px;">
    <div class="col-md-6">

        <div class="card">
            <div class="card-header">
                Registration
            </div>

            <div class="card-body">
                <form method="POST" action="registration" id="login-form">



                    <div class="mb-3 error-message">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" class="form-control"
                               name="name">

                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="text" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp"
                               name="email">

                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1"
                               name="password">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1"
                               name="confirm_password">
                    </div>


                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_seller">
                        <label class="form-check-label" for="exampleCheck1"
                               >Register as a seller</label>
                    </div>


                    <button type="submit" class="btn btn-primary submit">Submit</button>
                    <span class="float-right">Already have an account? <a href="login">Login</a></span>
                </form>
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
                    name: $('[name="name"]').val(),
                    email: $('[name="email"]').val(),
                    password: $('[name="password"]').val(),
                    confirm_password: $('[name="confirm_password"]').val(),
                    is_seller: $('[name="is_seller"]').is(':checked') ? 1 : 0,
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


