@extends('dashboard.master')

@section('content')
    

<form action="{{route("list.store")}}" method="POST">
    @include('dashboard.list._form')
</form>

@endsection
