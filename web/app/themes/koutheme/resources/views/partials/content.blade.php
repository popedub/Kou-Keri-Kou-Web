<article @php(post_class())>
  <header>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>

  </header>
  <div class="entry-summary">
    @if(get_field('embed') )
      @php(the_field('embed'))
    @endif
    @if(get_field('descripcion') )

    @endif
    @php(the_excerpt())
  </div>
</article>
