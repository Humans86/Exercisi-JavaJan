<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('list.index')}}">JavaJan</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('list.index')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('list.index')}}">Series de TV</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('category.index')}}">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('user.index')}}">Usuaris</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
       
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
  
        <li class="nav-item">
          <a class="nav-link" href="{{route('user_profile')}}">Perfil</a>
        </li>
      </ul>
    </div>
  </nav>
