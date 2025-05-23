   @extends('layout.main')

   @section('content')
    <hr>
    <br>
    <div>
        <a href="{{route('worker.create')}}">Создать</a>
    </div>

    <div>
        <form action="{{route('worker.index')}}">
            <input type="text" name="name" placeholder="name" value="{{request()->get('name')}}">
            <input type="text" name="surname" placeholder="surname" value="{{request()->get('surname')}}">
            <input type="text" name="email" placeholder="email" value="{{request()->get('email')}}">
            <input type="number" name="from" placeholder="from" value="{{request()->get('from')}}">
            <input type="number" name="to" placeholder="to" value="{{request()->get('to')}}">
            <input type="text" name="description" placeholder="description" value="{{request()->get('description')}}">
            <input id="isMarried" type="checkbox" name="is_married"
                {{request()->get('is_married') == 'on' ? 'checked' : ''}}
            >
            <label for="isMarried">Замужем?</label>
            <input type="submit">
            <a href="{{ route('worker.index')}}">Сбросить</a>
        </form>
    </div>
    <hr>
    <hr>
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
    <div class="my_nav">
        {{$workers->withQueryString()->links()}}
    </div>
@endsection
