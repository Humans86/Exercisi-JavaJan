<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <router-link class="navbar-brand" to="/">JavaJan</router-link>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        
          <li class="nav-link">
              <router-link to="/categories" class="nav-link text-white">Categories</router-link>
          </li>
          <li class="nav-link">
            <router-link to="/" class="nav-link text-white">Home</router-link>
        </li>
      </ul>

      <ul class="navbar-nav">
          <li class="nav-item">

              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>

          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">
                 Registre
          </a>
          </li>
      </ul>

  </div>
</nav>