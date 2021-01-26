<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
{{--<div>--}}

{{--    @foreach($posts as $post)--}}
{{--        <p>{{$post->body}}</p>--}}
{{--    @endforeach--}}
{{--</div>--}}

<div class="col-md-12">
    <table class="table table-dark">
        <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Body</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $key => $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->body}}</td>

            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
