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
    <div>
        Index
    </div>
    @foreach($workers  as $worker)
        <div>Name:{{$worker->name}}</div>
        <div>SurName:{{$worker->surname}}</div>
        <div>Mail:{{$worker->email}}</div>
        <div>Age:{{$worker->age}}</div>
        <div>Desp:{{$worker->description}}</div>
        <div>Zamuzhem:{{$worker->is_married}}</div>
        <div><a href="{{route('worker.show', $worker->id)}}">Посмотреть профиль</a></div>
        <hr>
        <br>
        @endforeach
</body>
</html>
