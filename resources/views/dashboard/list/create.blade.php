@extends('dashboard.master')

@section('content')
    
@include('dashboard.partials.validations-error')
<form action="{{route("list.store")}}" method="POST" enctype="multipart/form-data" >
    @csrf
    @include('dashboard.list._form')
</form>

@endsection
