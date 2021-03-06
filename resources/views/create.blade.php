<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container">

    <form method="POST" action="{{route('superhero.store')}}" enctype="multipart/form-data">
        @csrf
        <label for="nickname">Nickname</label>
        <input type="text" class="form-control mt-2" id="nickname" name="nickname" required>

        <label class="mt-2" for="origin_description">Origin description</label>
        <input type="text" class="form-control mt-2" id="origin_description" name="origin_description" required>

        <label class="mt-2" for="real_name">Real name</label>
        <input type="text" class="form-control mt-2" id="real_name" name="real_name" required>

        <label class="mt-2" for="superpowers">Superpowers</label>
        <input type="text" class="form-control mt-2" id="superpowers" name="superpowers" required>

        <label class="mt-2" for="catch_phrase">Catch phrase</label>
        <input type="text" class="form-control mt-2" id="catch_phrase" name="catch_phrase" required>

        <div class="input-group mt-2">
            <div class="custom-file">
                <input type="file"
                       class="custom-file-input"
                       name="image"
                       required
                       accept="image/png, image/jpg, image/jpeg"
                >
            </div>
        </div>
        <button style="float: right" type="submit" class="btn btn-outline-primary  mt-2">Create</button>
    </form>
</div>
</body>
</html>



