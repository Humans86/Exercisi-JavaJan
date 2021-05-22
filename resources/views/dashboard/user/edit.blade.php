@extends('dashboard.master')

@section('content')
    
@include('dashboard.partials.validations-error')

<form action="{{route("user.update",$user->id)}}" method="POST">
    @method('PUT')
    @csrf
    @include('dashboard.user._form',['pasw'=>false])
</form>

@endsection
