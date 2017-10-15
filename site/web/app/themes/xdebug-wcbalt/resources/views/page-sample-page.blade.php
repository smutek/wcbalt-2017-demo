@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('partials.page-header')
    @php(the_content())

    @if($foo)
      <h2>{{ $foo['title'] }}</h2>
      <ul>
        @foreach($foo['items'] as $item)
          <li>{{ $item }}</li>
        @endforeach
      </ul>
    @endif

  @endwhile
@endsection
