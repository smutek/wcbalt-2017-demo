<div class="tab-pane {{ $cat_group['state'] }}" id="{{ $cat_group['id']  }}" role="tabpanel">
  <h2 class="cat-header">{{ $cat_group['title'] }}</h2>

  @if($cat_group['images'])

    <ul class="cats row">
      @foreach($cat_group['images'] as $image)
        <li class="cat col-sm-4">
          @php(xdebug_break())
          <img class="img-thumbnail" src="{{ $image['url'] }}" alt="{{ $image['alt'] }}">
        </li>
      @endforeach
    </ul>

  @endif

</div>
