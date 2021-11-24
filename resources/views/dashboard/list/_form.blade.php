
  
    <div class="card">
      <div class="card-header card-header-primary">
          <h4 class="card-title">
              Nou TV-SHOW: 
          </h4>
      </div>
  </div>

  <form action="{{ route('list.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
  
  <div class="card">
    <div class="card-header card-header-primary">
        <label for="title">Titol</label>
        <input class="form-control" type="text" name="title" id="title" value="{{ old('title',$list->title) }}">

        @error('title')
          <small class="text-danger">{{$message}}</small>
        @enderror

      <div class="form-group">
        <label for="url">URL</label>
        <input class="form-control" type="text" name="url" id="url" value="{{ old('url',$list->url) }}">

        @error('url')
          <small class="text-danger">{{$message}}</small>
        @enderror

    

      <div class="form-group">
        <label for="category_id">Categoria</label>
        <br>
        <select class="form-group" name="category_id" id="category_id">
          @foreach ($categories as $title => $id)
          <option {{ $list->category_id == $id ? 'selected="selected"' : '' }} value="{{ $id }}">{{ $title }}</option>               
          @endforeach
        </select>

        <div class="form-group">
          <label for="content">Contingut</label>
          <textarea class="form-control" id="content" name="content" rows="3">{{ old('content',$list->content) }}</textarea>
      </div>

        @error('content')
          <small class="text-danger">{{$message}}</small>
        @enderror
    
        
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Post Image:</strong>
             <input type="file" name="image" class="form-control" placeholder="Post Title">
             
            @error('image')
              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
           @enderror
        </div>
        <div class="form-group">

        
          


        </div>
    </div>
        
          <button type="submit" class="btn btn-primary ml-3">Submit</button>
      
    </div>
      </div>
    </div>
  </div>

</form>



