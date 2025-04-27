@extends('layout.main')

@section('content')
<div>
    <form action="{{route('worker.store')}}" method="Post">
        @csrf
        <br><input type="text" name="name" placeholder="name" value="{{old('name')}}">
        @error('name')
        <div>Поле "имя" является обязательным, дружок</div>
        @enderror
        <br><input type="text" name="surname" placeholder="surname" value="{{old('surname')}}">
        @error('surname')
        <div>{{$message}}</div>
        @enderror
        <br><input type="text" name="email" placeholder="email" value="{{old('email')}}"> @error('email')
        <div>{{$message}}</div>
        @enderror
        <br><input type="number" name="age" placeholder="age" value="{{old('age')}}"> @error('age')
        <div>{{$message}}</div>
        @enderror
        <br><textarea name="description">{{old('description')}}</textarea>@error('description')
        <div>{{$message}}</div>
        @enderror
        <br><input {{old('is_married') == 'on' ? 'checked' : ''}} id="isMarried" type="checkbox" name="is_married"
                   placeholder="is_married"> @error('is_married')
        <div>{{$message}}</div>
        @enderror
        <label for="isMarried">Замужем?</label>
        <br>
        <button type="submit">Отправить</button>
    </form>
</div>


<div><a href="{{route('worker.index')}}">Назад</a></div>
<hr>
<br>
@endsection
