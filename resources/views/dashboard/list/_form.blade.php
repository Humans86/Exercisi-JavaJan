    @csrf

      <div class="form-group">
        <label for="title">Titol</label>
        <input class="form-control" type="text" name="title" id="title" value="{{ old('title',$list->title) }}">

        @error('title')
          <small class="text-danger">{{$message}}</small>
        @enderror
      </div>
      <div class="form-group">
        <label for="url">URL</label>
        <input class="form-control" type="text" name="url" id="url" value="{{ old('url',$list->url) }}">

        @error('url')
          <small class="text-danger">{{$message}}</small>
        @enderror

      </div>

      <div class="form-group">
        <label for="category_id">Categoria</label>
        <br>
        <select class="form-group" name="category_id" id="category_id">
          @foreach ($categories as $title => $id)
          <option {{ $list->category_id == $id ? 'selected="selected"' : '' }} value="{{ $id }}">{{ $title }}</option>               
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label for="content"> Contingut </label>
        <textarea class="form-control"  id="content" name="content" rows="3" value="{{ old('content',$list->content) }}"> </textarea>

        @error('content')
          <small class="text-danger">{{$message}}</small>
        @enderror

      </div>
    <input type="submit" value="Enviar">

