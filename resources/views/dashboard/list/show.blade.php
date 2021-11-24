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
            <textarea readonly class="form-control"  id="content" name="content" rows="3" value="{{ $list->content}}"></textarea>
        </div>

        <div class="form-group">
            <label for="content"> Imatge </label>
            <input readonly class="form-control"  id="image" name="image" rows="3" value= "/images/{{$list->image}}" width="150"
        </div>

      

@endsection