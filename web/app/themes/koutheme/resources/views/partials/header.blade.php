<header class="banner" id="banner-menu">
  <div class="container">
    <a class="brand" href="{{ home_url('/') }}">{{ get_bloginfo('name', 'display') }}</a>
    <input id="burger" type="checkbox" />

    <label for="burger" class="h">
        <span></span>
        <span></span>
        <span></span>
    </label>


    <nav class="nav-primary">
      @if (has_nav_menu('primary_navigation'))
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
      @endif
    </nav>
  </div>
</header>
