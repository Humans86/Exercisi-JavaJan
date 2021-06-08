@extends('dashboard.master')

@section('content')

@include('dashboard.partials.validations-error')

<a class="btn btn-success btn-sm float-right mb-5" href="{{ route('list.create') }}">
    <i class="fa fa-plus"></i>
</a>

<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            TV-Show: <strong>{{ $list->title }}</strong>
        </h4>
    </div>
    <div class="card-body">
        <form action="{{ route("list.update",$list->id) }}" method="POST">
            @method('PUT')
            @include('dashboard.list._form')
        </form>
    </div>
</div>


<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            Carrega les imatges per: <strong>{{ $list->title }}</strong>
        </h4>
        <div class="card-category">
            Aqui podràs carregar més imatges:
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route("list.image",$list) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col">
                    <button class="btn btn-primary"><i class="fa fa-upload">Pujar</i></button>
                </div>
            </div>
        </form>
    </div>
</div>

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
                        class="float-left btn btn-success btn-sm mt-1"><i class="fa fa-download">Download</i></a>

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