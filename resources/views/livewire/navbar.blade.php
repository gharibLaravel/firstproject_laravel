<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a wire:navigate class="nav-link" href="{{ route('home') }}">Home </a>
        </li>
        <li class="nav-item">
          <a wire:navigate class="nav-link" href="{{ route('personnes.index') }}">Liste Personnes</a>
        </li>
        <li class="nav-item">
          <a wire:navigate class="nav-link" href="{{ route('personnes.maj') }}">mise a jour Personnes</a>
        </li>
        <li class="nav-item">
          <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
           {{ __('Logout') }}
       </a>

       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
           @csrf
       </form>

        </li>
      </ul>
    </div>
</nav>

