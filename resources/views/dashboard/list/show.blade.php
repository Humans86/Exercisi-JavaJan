@extends('dashboard.master')

@section('content')



@csrf

        <div class="form-group">
           <label for="title"> Titol </label>
            <input readonly class="form-control" type="text" name="title" id="title" value="{{ $list->title}}">

            @error('title')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
             <label for="url_clean"> URL </label>
             <input readonly class="form-control" type="text" name="url" id="url" value="{{ $list->url}}">
        </div>
        <div class="form-group">
            <label for="category_id"> Categoria</label>
            <input readonly class="form-control" type="text" name="category_id" id="category_id" value="{{ $list->category->title}}">
       </div>
     
        <div class="form-group">
            <label for="content"> Contingut </label>
            <textarea readonly class="form-control"  id="descripcio" name="content" rows="3" >{{ $list->content}}</textarea>

            @error('content')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
      

@endsection