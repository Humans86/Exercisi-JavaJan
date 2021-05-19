@extends('dashboard.master')

@section('content')



@csrf

        <div class="form-group">
           <label for="title"> Titol </label>
            <input readonly class="form-control" type="text" name="title" id="title" value="{{ $category->title}}">

        </div>
        <div class="form-group">
             <label for="url"> URL </label>
             <input readonly class="form-control" type="text" name="url" id="url" value="{{ $category->url}}">
        </div>
        
     

@endsection