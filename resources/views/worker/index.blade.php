   @extends('layout.main')

   @section('content')
    <hr>
    <br>
    @can('create', \App\Models\Worker::class)
    <div>
        <a href="{{route('workers.create')}}">Создать</a>
    </div>
    @endcan
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
        <div><a href="{{route('workers.show', $worker->id)}}">Посмотреть профиль</a></div>
        <br>
        <hr>
        @can ('update', \App\Models\Worker::class)
        <div><a href="{{route('workers.edit', $worker->id)}}">Редактировать профиль</a></div>
        @endcan
        <hr>
        <br>
        @can('delete', \App\Models\Worker::class)
        <div>
            <form action="{{route('workers.destroy', $worker->id)}}" method="post">
                @csrf
                @method('Delete')
                <input type="submit" value="УДАЛИТЬ">
            </form>
        </div>
        @endcan

        @endforeach
    <div class="my_nav">
        {{$workers->withQueryString()->links()}}
    </div>
@endsection
