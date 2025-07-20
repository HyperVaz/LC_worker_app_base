<!doctype html>
<html lang="en">
@extends('layout.main')

@section('content')
        <div>Name:{{$worker->name}}</div>
        <div>SurName:{{$worker->surname}}</div>
        <div>Mail:{{$worker->email}}</div>
        <div>Age:{{$worker->age}}</div>
        <div>Desp:{{$worker->description}}</div>
        <div>Zamuzhem:{{$worker->is_married}}</div>
        <div><a href="{{route('workers.index')}}">Назад</a></div>
        <hr>
        <br>
@endsection
