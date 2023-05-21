@if ($paginator->hasPages())
    <div class="search__pagination">
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="search__pagination_link _active">{{ $page }}</span>
                    @else
                        <a class="search__pagination_link" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
    </div>
@endif
