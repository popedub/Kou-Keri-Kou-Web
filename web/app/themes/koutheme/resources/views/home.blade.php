@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  @php
    $args = array(
      'cat' => 9
    );
  @endphp

  @query($args)
    @include('partials.content-featured')
  @endquery

  @while (have_posts()) @php(the_post())
    @if (in_category('9'))
      @include('partials.content-featured')
    @elseif (in_category('8'))
      @include('partials.content-'.get_post_type())
    @endif
  @endwhile
  {!! get_the_posts_navigation() !!}
@endsection
