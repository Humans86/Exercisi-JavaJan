@extends('dashboard.master')

@section('content')

@include('dashboard.partials.validations-error')



<div class="card">
    <div class="card-header card-header-primary">
        <h4 class="card-title">
            TV-Show: <strong>{{ $list->title }}</strong>
        </h4>
    </div>
    <div class="card-body">
        <form action="{{ route("list.update",$list->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @include('dashboard.list._form')
        </form>
    </div>

    
</div>



@endsection