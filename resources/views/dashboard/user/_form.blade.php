@csrf

<div class="form-group">
   <label for="name"> Nom </label>
    <input class="form-control" type="text" name="name" id="name" value="{{old('name',$user->name)}}">

</div>

<div class="form-group">
    <label for="surname"> Cognom </label>
     <input class="form-control" type="text" name="surname" id="surname" value="{{old('surname',$user->surname)}}">

 </div>

 <div class="form-group">
  <label for="username"> Username </label>
   <input class="form-control" type="text" name="username" id="username" value="{{old('username',$user->username)}}">

</div>

<div class="form-group">
    <label for="email"> Correu Electrònic </label>
     <input class="form-control" type="email" name="email" id="email" value="{{old('email',$user->email)}}">

</div>

@if ($pasw)
 <div class="form-group">
    <label for="password"> Contrassenya </label>
     <input class="form-control" type="password" name="password" id="password" value="{{old('password',$user->password)}}">
 </div>
@endif



<input type="submit" value="Enviar" class="btn btn-primary">



  

