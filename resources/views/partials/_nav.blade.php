<!-- As a link -->
<nav class="navbar navbar-light bg-dark">
   <a href="{{route('dashboard')}}" class="brand-link">
      <span class="brand-text font-weight-light">{{config('app.name')}}</span>
    </a>
     <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
      </div>
</nav>
  