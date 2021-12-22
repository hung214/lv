<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Todo-List</title>
    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="/assets/vue.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <style>
        table button {
            margin-left: 20px
        }
    </style>
</head>
<body id="app-layout">

{{-- @dump($list) --}}
    <nav class="navbar navbar-default">
         <div class="container">
            <a class="navbar-brand" href="#">Todolist</a>
        </div>
    </nav>
    <div class="container">

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Modify Task</h5>
                <form class="form-inline" action="{{env('APP_URL')}}/todolist/{{$list[0]->id}}" method="POST">
                    {{ method_field("PUT") }}
                    <div class="form-group col-md-10 col-lg-10 col-sm-10">
                        <input type="text" name="name" class="form-control col-md-12 col-sm-12" id="task" placeholder=" Name" value="{{$list[0]->name}}">
                    </div>
                    <button class="btn btn-primary">save</button>

                    {{ csrf_field() }}


                </form>
            </div>
        </div>

    </div>

</body>




        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</html>
