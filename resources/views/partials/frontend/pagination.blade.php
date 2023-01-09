@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Previous">
                <i class="ti-angle-double-left"></i>
            </a>
        </li>
            {{-- <li class="disabled"><i class="ti-angle-double-left"></i></li> --}}
        @else
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">
                <i class="ti-angle-double-left"></i>
            </a>
        </li>
            {{-- <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li> --}}
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
                    <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
                        {{-- <li class="active"><span>{{ $page }}</span></li> --}}
                    @else
                        {{-- <li><a href="{{ $url }}">{{ $page }}</a></li> --}}
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">
                <i class="ti-angle-double-right"></i>
            </a>
        </li>
            {{-- <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li> --}}
        @else
        <li class="page-item disabled">
            <a class="page-link" href="#" aria-label="Next">
                <i class="ti-angle-double-right"></i>
            </a>
        </li>
            {{-- <li class="disabled"><span>&raquo;</span></li> --}}
        @endif
    </ul>
@endif