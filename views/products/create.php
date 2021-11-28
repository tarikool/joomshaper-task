<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>

<div class="row justify-content-center" style="margin-top: 150px;">
    <div class="col-md-6">

        <div class="card">
            <div class="card-header">
                Product
            </div>

            <div class="card-body">
                <form method="POST" action="add-products" id="product-form">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3 error-message">
                            </div>
                        </div>


                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Product Name</label>
                                <input type="text" class="form-control" name="name">
                                <p class="text-danger" id="message-name"></p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Unit Price</label>
                                <input type="text" class="form-control" name="unit_price">
                                <p class="text-danger" id="message-unit_price"></p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Total Quantity</label>
                                <input type="text" class="form-control" name="quantity">
                                <p class="text-danger" id="message-quantity"></p>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <label for="description">Description</label>
                            <textarea name="description" id="description"  class="form-control" cols="3" rows="5"></textarea>
                            <p class="text-danger" id="message-description"></p>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary submit my-3">Submit</button>
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
        const form = $('#product-form');

        form.submit(function () {
            event.preventDefault();
            $('.error-message').html('');
            $('[id^="message"]').html('');

            let route = form.attr('action');
            let type = form.attr('method');

            $.ajax({
                url: route,
                type: type,
                data: {
                    name: $('[name="name"]').val(),
                    unit_price: $('[name="unit_price"]').val(),
                    quantity: $('[name="quantity"]').val(),
                    description: $('[name="description"]').val(),
                },
                success: function (response) {
                    window.location.href = 'products';
                },
                error: function(xhr, status, error) {
                    let errors = JSON.parse(xhr.responseText);

                    $.each( errors, function( key, message ) {
                        $('#message-'+ key ).html(message);
                    });

                    console.log(error);
                }
            });

        })


    })
</script>

</html>


