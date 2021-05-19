    @csrf

      <div class="form-group">
        <label for="title">Titol</label>
        <input class="form-control" type="text" name="title" id="title" value="{{ old('title',$category->title) }}">

        @error('title')
          <small class="text-danger">{{$message}}</small>
        @enderror
      </div>
      <div class="form-group">
        <label for="url">URL</label>
        <input class="form-control" type="text" name="url" id="url" value="{{ old('url',$category->url) }}">

        @error('url')
          <small class="text-danger">{{$message}}</small>
        @enderror

      </div>

    <input type="submit" value="Enviar">


