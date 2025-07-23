@extends('layout.main')

@section('content')
    <div class="abstract-container">
        <div class="abstract-header">
            @can('create', \App\Models\Worker::class)
                <div class="creation-circle">
                    <a href="{{route('workers.create')}}">+</a>
                </div>
            @endcan
            <div class="title-rectangle">
                <h1>СОТРУДНИКИ</h1>
            </div>
        </div>

        <div class="filter-pyramid">
            <form action="{{ route('workers.index') }}">
                <div class="input-group">
                    <div class="input-row">
                        <input type="text" name="name" placeholder="ИМЯ">
                        <input type="text" name="surname" placeholder="ФАМИЛИЯ">
                    </div>
                    <div class="input-row">
                        <input type="text" name="email" placeholder="EMAIL">
                        <div class="age-range">
                            <input type="number" name="from" placeholder="ОТ">
                            <div class="range-divider"></div>
                            <input type="number" name="to" placeholder="ДО">
                        </div>
                    </div>
                    <div class="input-row">
                        <input type="text" name="description" placeholder="ОПИСАНИЕ">
                        <div class="marriage-toggle">
                            <div class="toggle-track">
                                <input id="isMarried" type="checkbox" name="is_married">
                                <div class="toggle-thumb"></div>
                            </div>
                            <label for="isMarried">БРАК</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="submit-triangle">▲</button>
            </form>
        </div>

        <div class="worker-grid">
            @foreach($workers as $worker)
                <div class="worker-card">
                    <div class="worker-geometry">
                        <div class="worker-circle"></div>
                        <div class="worker-triangle"></div>
                        <div class="worker-square"></div>
                    </div>

                    <div class="worker-data">
                        <div class="data-line name-rect">{{$worker->name}}</div>
                        <div class="data-line surname-rect">{{$worker->surname}}</div>
                        <div class="data-line email-circle">{{$worker->email}}</div>
                        <div class="data-line age-pyramid">{{$worker->age}}</div>
                        <div class="data-line desc-line">{{$worker->description}}</div>
                        <div class="marriage-status {{$worker->is_married ? 'married' : 'single'}}">
                            {{$worker->is_married ? '■' : '□'}}
                        </div>
                    </div>

                    <div class="worker-actions">
                        <a href="{{route('workers.show', $worker->id)}}" class="action-circle view-circle">●</a>
                        @can ('update', \App\Models\Worker::class)
                            <a href="{{route('workers.edit', $worker->id)}}" class="action-circle edit-circle">◑</a>
                        @endcan
                        @can('delete', \App\Models\Worker::class)
                            <form action="{{route('workers.destroy', $worker->id)}}" method="post">
                                @csrf
                                @method('Delete')
                                <button type="submit" class="action-circle delete-circle">⨯</button>
                            </form>
                        @endcan
                    </div>
                </div>
            @endforeach
        </div>

        <div class="pagination-abstract">
            {{$workers->withQueryString()->links()}}
        </div>
    </div>

    <style>
        /* Base abstract styles */
        .abstract-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background: #f0f0f0;
            font-family: 'Arial', sans-serif;
        }

        .abstract-header {
            display: flex;
            align-items: center;
            margin-bottom: 40px;
        }

        .title-rectangle {
            background: #000;
            color: #fff;
            padding: 15px 30px;
            flex-grow: 1;
        }

        .title-rectangle h1 {
            margin: 0;
            font-weight: 400;
            letter-spacing: 3px;
        }

        .creation-circle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: #000;
            margin-right: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .creation-circle a {
            color: #fff;
            text-decoration: none;
            font-size: 24px;
            font-weight: bold;
        }

        /* Filter pyramid */
        .filter-pyramid {
            position: relative;
            margin-bottom: 50px;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .input-row {
            display: flex;
            gap: 10px;
        }

        .input-row input {
            flex: 1;
            padding: 12px;
            border: 2px solid #000;
            background: transparent;
            outline: none;
            font-size: 14px;
        }

        .age-range {
            display: flex;
            align-items: center;
            flex: 1;
            position: relative;
        }

        .range-divider {
            width: 1px;
            height: 80%;
            background: #000;
            margin: 0 5px;
        }

        .marriage-toggle {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .toggle-track {
            width: 40px;
            height: 20px;
            background: #ccc;
            position: relative;
            cursor: pointer;
        }

        .toggle-thumb {
            position: absolute;
            width: 20px;
            height: 20px;
            background: #000;
            top: 0;
            left: 0;
            transition: transform 0.3s;
        }

        #isMarried:checked ~ .toggle-thumb {
            transform: translateX(20px);
        }

        #isMarried {
            display: none;
        }

        .submit-triangle {
            position: absolute;
            right: 0;
            bottom: 0;
            width: 0;
            height: 0;
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            border-bottom: 30px solid #000;
            background: transparent;
            cursor: pointer;
            color: #fff;
            font-size: 0;
        }

        /* Worker cards */
        .worker-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }

        .worker-card {
            background: #fff;
            border: 2px solid #000;
            padding: 20px;
            position: relative;
            min-height: 250px;
        }

        .worker-geometry {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 5px;
        }

        .worker-circle {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #000;
        }

        .worker-triangle {
            width: 0;
            height: 0;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            border-bottom: 17px solid #000;
        }

        .worker-square {
            width: 20px;
            height: 20px;
            background: #000;
        }

        .worker-data {
            margin-top: 30px;
        }

        .data-line {
            margin-bottom: 8px;
            padding: 5px;
        }

        .name-rect {
            border-left: 3px solid #000;
        }

        .surname-rect {
            border-bottom: 2px solid #000;
        }

        .email-circle {
            display: inline-block;
            padding: 5px 10px;
            border: 1px solid #000;
            border-radius: 15px;
        }

        .age-pyramid {
            display: inline-block;
            padding: 5px;
            background: #000;
            color: #fff;
            clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
        }

        .desc-line {
            border-top: 1px dashed #000;
            padding-top: 8px;
            margin-top: 15px;
        }

        .marriage-status {
            position: absolute;
            bottom: 20px;
            right: 20px;
            font-size: 24px;
        }

        .married { color: #000; }
        .single { color: #ccc; }

        .worker-actions {
            position: absolute;
            bottom: 20px;
            left: 20px;
            display: flex;
            gap: 10px;
        }

        .action-circle {
            display: block;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            border: 2px solid #000;
            text-align: center;
            line-height: 26px;
            text-decoration: none;
            color: #000;
            font-size: 20px;
        }

        .delete-circle {
            border-color: #ff0000;
            color: #ff0000;
            background: transparent;
            cursor: pointer;
        }

        /* Pagination */
        .pagination-abstract {
            margin-top: 50px;
            text-align: center;
        }

        .pagination-abstract .pagination {
            display: flex;
            justify-content: center;
            list-style: none;
            padding: 0;
        }

        .pagination-abstract .page-item {
            margin: 0 5px;
        }

        .pagination-abstract .page-link {
            display: block;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            border: 1px solid #000;
            text-decoration: none;
            color: #000;
        }

        .pagination-abstract .active .page-link {
            background: #000;
            color: #fff;
        }
    </style>
@endsection
