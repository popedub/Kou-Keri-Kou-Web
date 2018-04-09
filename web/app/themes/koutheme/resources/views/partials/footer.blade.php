<footer class="content-info">
  <div class="container">
    @php(dynamic_sidebar('sidebar-footer'))
      <div class="social">
        <span class="fb">
          <a href={!! $links['facebook'] !!} target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a>
        </span>
        <span class="instg">
          <a href={!! $links['instagram'] !!} target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
        </span>
        <span class="mail">
          <a href={!! $links['mail']!!} target="_blank"><i class="fa fa-envelope fa-2x"></i></a>
        </span>
      </div>
      <div class="anio">
        {!! $anio !!}{{ __(' ©', 'sage') }}
      </div>
  </div>
</footer>
