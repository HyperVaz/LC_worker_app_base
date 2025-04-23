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
    <hr>
    <br>
    <div>
        <a href="{{route('worker.create')}}">Создать</a>
    </div>
    <br>
    <hr>
    @foreach($workers  as $worker)
        <div>Name:{{$worker->name}}</div>
        <div>SurName:{{$worker->surname}}</div>
        <div>Mail:{{$worker->email}}</div>
        <div>Age:{{$worker->age}}</div>
        <div>Desp:{{$worker->description}}</div>
        <div>Zamuzhem:{{$worker->is_married}}</div>
        <div><a href="{{route('worker.show', $worker->id)}}">Посмотреть профиль</a></div>
        <br>
        <hr>
        <div><a href="{{route('worker.edit', $worker->id)}}">Редактировать профиль</a></div>
        <hr>
        <br>
        <div>
            <form action="{{route('worker.delete', $worker->id)}}" method="post">
                @csrf
                @method('Delete')
                <input type="submit" value="УДАЛИТЬ">
            </form>
        </div>
        @endforeach
</body>
</html>
