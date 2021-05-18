@extends('dashboard.master')

@section('content')
    
@include('dashboard.partials.validations-error')

<form action="{{route("list.update",$list->id)}}" method="POST">
    @method('PUT')
    @csrf
    @include('dashboard.list._form')
</form>
<br>
<form action="{{ route("list.image",$list)}}" method="POST" enctype="multipart/form-data">
@csrf
    <div class="row">
        <div class="col">
            <input type="file" name="image" class="form-control">
        </div>
         <div class="col">
            <input type="submit" class="btn btn-primary" value="Pujar">
         </div>
    </div>
@endsection
