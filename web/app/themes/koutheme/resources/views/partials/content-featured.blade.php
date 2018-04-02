<article @php(post_class())>

  <header>

    @if(has_post_thumbnail())
      <?= the_post_thumbnail('destacado', array('class' => 'img-fluid')) ?>
    @endif

    @if(get_field('embed') )
      @php(the_field('embed'))
    @endif
  </header>
  <div class="entry-summary">
    <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
    @if(get_field('info') )
      <?= the_field('info');?>
    @endif
    @php(the_excerpt())
  </div>
</article>
