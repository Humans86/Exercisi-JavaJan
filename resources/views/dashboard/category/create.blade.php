@extends('dashboard.master')

@section('content')
    
@include('dashboard.partials.validations-error')

<form action="{{route("category.store")}}" method="POST" enctype="multipart/form-data" >
    @include('dashboard.category._form')
</form>

@endsection
