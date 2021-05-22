    @csrf

      <div class="form-group">
        <label for="title">Titol</label>
        <input class="form-control" type="text" name="title" id="title" value="{{ old('title',$category->title) }}">
      </div>

      @error('title')
      <small class="text-danger">{{$message}}</small>
    @enderror

      <div class="form-group">
        <label for="url">URL</label>
        <input class="form-control" type="text" name="url" id="url" value="{{ old('url',$category->url) }}">
      </div>

      @error('url')
      <small class="text-danger">{{$message}}</small>
    @enderror

    <input type="submit" value="Enviar">


