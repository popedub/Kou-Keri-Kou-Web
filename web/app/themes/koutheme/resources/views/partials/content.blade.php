<article @php(post_class())>
  <div class="box">
  <header>
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>

  </header>
  <div class="entry-summary">
    {{-- si es un disco --}}
    @if(in_category('discos'))
      @if(get_field('bandcamp') )
        @php(the_field('bandcamp'))
      @endif
    @endif

    {{-- si es un concierto --}}
    @if(in_category('conciertos'))
      @if(has_post_thumbnail())
        @php(the_post_thumbnail('destacado', array('class' => 'img-fluid')))
      @endif

      @if(get_field('info') )
        @php(the_field('info'))
      @endif
    @endif

    {{-- si es un video --}}
    @if(in_category('videos'))
      @if(get_field('video'))
        <div class="embed-responsive embed-responsive-16by9">
          @php(the_field('video'))
        </div>
        @php(the_excerpt())
      @endif
    @endif

    {{-- si es una noticia --}}
    @if(in_category('noticias'))
      @if(get_field('embeds'))
        <div class="embed-responsive embed-responsive-16by9">
          @php(the_field('embeds'))
        </div>
      @elseif(get_field('videos'))
        <div class="embed-responsive embed-responsive-16by9">
          @php(the_field('videos'))
        </div>
      @elseif(has_post_thumbnail())
        @php(the_post_thumbnail('destacado', array('class' => 'img-fluid')))
      @endif


      @php(the_excerpt())
    @endif
  </div>
  </div>
</article>
