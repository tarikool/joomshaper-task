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
                <table class="table table-responsive product-table">

                </table>
            </div>
        </div>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

</body>


<script>
    $(document).ready(function () {

        dataTable =  $('.user-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                type: 'post',
                url: 'get-products',
                data: {

                }
            },
            search: {
                return: false
            },
            columns: [
                {data: 'id', orderable: false, searchable: false},
                {data: 'name', title: 'NAME'},
                {data: 'unit_price', title: 'Unit Price'},
                {data: 'quantity', title: 'Available'},
                {data: 'description', title: 'Description'},
                {data: 'created_at', title: 'Created At'},
            ]
        });



        $.modalCallBackOnAnyChange = function () {
            dataTable.draw(false);
        }



    })
</script>

</html>


