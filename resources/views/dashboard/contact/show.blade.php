@extends('dashboard.master')

@section('content')



@csrf

        <div class="form-group">
           <label for="name"> Nom </label>
            <input readonly class="form-control" type="text" name="name" id="name" value="{{ $contact->name}}">

            @error('name')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
             <label for="surname"> Cognom </label>
             <input readonly class="form-control" type="text" name="surname" id="surname" value="{{ $contact->surname}}">
        </div>
        <div class="form-group">
            <label for="email"> Email </label>
            <input readonly class="form-control" type="email" name="email" id="surname" value="{{ $contact->email}}">
       </div>
     
        <div class="form-group">
            <label for="content"> Contingut </label>
            <textarea readonly class="form-control"  id="content" name="content" rows="3" value="{{ $contact->message}}"></textarea>
        </div>


      

@endsection