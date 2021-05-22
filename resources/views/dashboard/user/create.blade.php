@extends('dashboard.master')

@section('content')

    
<form action="{{route("user.store")}}" method="POST">
    @include('dashboard.user._form',['pasw'=>true])

</form>


@endsection
