
  
    <div class="card">
      <div class="card-header card-header-primary">
          <h4 class="card-title">
              Nova Categoria: 
          </h4>
      </div>
  </div>

   @csrf
  
  <div class="card">
    <div class="card-header card-header-primary">
        <label for="title">Titol</label>
        <input class="form-control" type="text" name="title" id="title" value="{{ old('title',$category->title) }}">

        @error('title')
          <small class="text-danger">{{$message}}</small>
        @enderror

      <div class="form-group">
        <label for="url">URL</label>
        <input class="form-control" type="text" name="url" id="url" value="{{ old('url',$category->url) }}">

        @error('url')
          <small class="text-danger">{{$message}}</small>
        @enderror

    
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




