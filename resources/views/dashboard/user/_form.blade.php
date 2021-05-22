    @csrf

      <div class="form-group">
        <label for="name">Nom</label>
        <input class="form-control" type="text" name="name" id="name" value="{{ old('name',$user->name) }}">
      </div>

      @error('name')
          <small class="text-danger">{{$message}}</small>
        @enderror

      <div class="form-group">
        <label for="surname">surname</label>
        <input class="form-control" type="text" name="surname" id="surname" value="{{ old('surname',$user->surname) }}">
      </div>
      
      @error('surname')
      <small class="text-danger">{{$message}}</small>
    @enderror

      <div class="form-group">
        <label for="email"> Correu Electrònic </label>
         <input class="form-control" type="email" name="email" id="email" value="{{old('email',$user->email)}}">
      </div>

      @error('email')
      <small class="text-danger">{{$message}}</small>
    @enderror

    @if ($pasw)
      <div class="form-group">
      <label for="password"> Contrasenya </label>
      <input class="form-control" type="password" name="password" id="password" value="{{ old('password',$user->password) }}">
    </div>

    @error('password')
    <small class="text-danger">{{$message}}</small>
  @enderror
    @endif
      
    <input type="submit" value="Enviar">

