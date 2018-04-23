@if ($paginator->hasPages())
    <ul class="pagination" style="min-height: 0px !important;">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>上一頁</span></li>
        @else
            <li><a role="ajax" href="{{ $paginator->previousPageUrl() }}" rel="prev">上一頁</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a role="ajax" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a role="ajax" href="{{ $paginator->nextPageUrl() }}" rel="next">下一頁</a></li>
        @else
            <li class="disabled"><span>下一頁</span></li>
        @endif
    </ul>
@endif
