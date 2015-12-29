<!DOCTYPE html>
<html>
    <head>
        <meta id="token" name="token" value="{{ csrf_token() }}">
        <title>OT Manager</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

        <style>
            body {
                padding-top: 70px;
            }

            .img-circle {
                width: 8%;
            }

            .alert {
                top: 70px !important;
            }

            .modal-link {
                cursor: pointer;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            @yield('content')
        </div>

        <script src="/js/vendor.js"></script>
        <script src="/js/app.js"></script>
    </body>
</html>