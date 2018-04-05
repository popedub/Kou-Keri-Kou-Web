<article @php(post_class())>
  <div class="box">
    <header>

      @if(has_post_thumbnail())
        <?= the_post_thumbnail('destacado', array('class' => 'img-fluid')) ?>
      @elseif(get_field('embeds'))
        <div class="embed-responsive embed-responsive-16by9">
          @php(the_field('embeds'))
        </div>
      @elseif(get_field('videos'))
        <div class="embed-responsive embed-responsive-16by9">
          @php(the_field('videos'))
        </div>
      @endif

    </header>
    <div class="entry-summary">
      <h2 class="entry-title"><a href="{{ get_permalink() }}">{{ get_the_title() }}</a></h2>
      @if(get_field('info') )
        <?= the_field('info');?>
      @endif
      @php(the_excerpt())
    </div>
  </div>
</article>
