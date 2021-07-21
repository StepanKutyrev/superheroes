






<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container">

    <form action="/superhero/create">
        <input class="btn btn-primary btn-sm" type="submit" value="Add new hero" />
    </form>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nickname</th>
                <th scope="col">origin_description</th>
                <th scope="col">superpowers</th>
                <th scope="col">catch_phrase</th>
                <th scope="col">actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($superheroes as $superhero)
                <tr>
                    <th scope="row">{{ $superhero->id }}</th>
                   <td>{{ $superhero->nickname }}</td>
                    <td>{{ $superhero->origin_description }}</td>
                    <td>{{ $superhero->superpowers }}</td>
                    <td>{{ $superhero->catch_phrase }}</td>
                    <td>
                        <form action="/superhero/{{ $superhero->id }}/edit">
                            <input class="btn btn-primary btn-sm" type="submit" value="edit" />
                        </form> </td>
                    </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
</body>
</html>



