@extends('dashboard.master')

@section('content')
    
@include('dashboard.partials.validations-error')

<form action="{{route("category.update",$category->id)}}" method="POST">
    @method('PUT')
    @csrf
    @include('dashboard.category._form')
</form>
@endsection
