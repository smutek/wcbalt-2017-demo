@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())

  @include('partials.page-header')

  @php(the_content())

  @if($cat_groups)
    <ul class="nav nav-tabs" id="cat_tabs" role="tablist">
      @foreach($cat_groups as $cat_group)
        @include('partials.cat-tabs')
      @endforeach
    </ul>

    <div class="tab-content">
      @foreach($cat_groups as $cat_group)
        @include('partials.cat-panes')
      @endforeach
    </div>
  @endif

  @endwhile
@endsection
