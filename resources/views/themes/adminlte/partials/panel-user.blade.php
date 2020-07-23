<div class="image">
  <img src="{{ miAvatar(auth()->user()) }}" class="img-circle elevation-2" alt="User Image">
</div>
<div class="info">
  <a href="#" class="d-block "
     title="{{ auth()->user()->nombres }}">
    {{ strtoupper( auth()->user()->user) }}
  </a>
</div>