<article @php(post_class())>
  <div class="box">
  <header>
    <h1 class="entry-title">{{ get_the_title() }}</h1>
  </header>
  <div class="entry-content">
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
      @elseif(get_field('embeds'))
        <div class="embed-responsive embed-responsive-16by9">
          @php(the_field('embeds'))
        </div>
      @elseif(get_field('videos'))
        <div class="embed-responsive embed-responsive-16by9">
          @php(the_field('videos'))
        </div>
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
        @php(the_content())
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

    @php(the_content())
    @endif
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
  </div>
</article>
