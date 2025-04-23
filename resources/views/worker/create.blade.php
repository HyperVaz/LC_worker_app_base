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
    Создать рабочего
</div>
<div>
    <form action="{{route('worker.store')}}" method="Post">
        @csrf
        <br><input type="text" name="name" placeholder="name">
        <br><input type="text" name="surname" placeholder="surname">
        <br><input type="text" name="email" placeholder="email">
        <br><input type="number" name="age" placeholder="age">
        <br><textarea name="description"></textarea>
        <br><input id="isMarried" type="checkbox" name="is_married" placeholder="is_married">
        <label for="isMarried">Замужем?</label>
        <br><button type="submit">Отправить</button>
    </form>
</div>


<div><a href="{{route('worker.index')}}">Назад</a></div>
<hr>
<br>
</body>
</html>
