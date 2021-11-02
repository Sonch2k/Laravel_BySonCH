<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <title>Document</title>
</head>
<body>
<a href="{{ action('Api\UserController@exportFile') }}">Export File</a>
    <table class="table table-striped">
        <thead>
        <th>ID</th>
        <th>Name</th>
        <th>EMAIL</th>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Laravel Import Excel to database Example - ItSolutionStuff.com
        </div>
        <div class="card-body">
            <form action="import" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>

