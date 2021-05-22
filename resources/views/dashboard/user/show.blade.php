@extends('dashboard.master')

@section('content')




        <div class="form-group">
           <label for="name"> Nom </label>
            <input readonly class="form-control" type="text" name="name" id="name" value="{{ $user->name}}">

          
        </div>

        <div class="form-group">
                <label for="surname"> Cognom </label>
                 <input readonly class="form-control" type="text" name="surname" id="surname" value="{{ $user->surname}}">
     
        </div>
        
        
     
@endsection