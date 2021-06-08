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
</form>
<div class="card">
    <div class="card-header-primary">
        <h4 class="card-title">
            Imatges per <strong>{{ $list->title }}</strong>
        </h4>
        <div class="card-category">
            Totes les imatges per <strong>{{ $list->title }}</strong>
        </div>
    </div>
    <div class="card-body">
        <div class="row mt-3">
            @foreach($list->images as $image)
                <div class="col-3">
                    <img class="w-100" src="{{ $image->getImageUrl() }}">
                    <a href="{{ route("list.image-download",$image->id) }}"
                        class="float-left btn btn-success btn-sm mt-1">Download<i class="fa fa-download"></i></a>

                    <form action="{{ route("list.image-delete",$image->id) }}" method="POST">
                        @method("DELETE")
                        @csrf
                        <button class="float-right btn btn-danger btn-sm mt-1" type="submit">Delete<i class="fa fa-trash"></i></button>
                    </form>

                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
