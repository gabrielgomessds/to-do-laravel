@if ($paginator->hasPages())
    <div class="pagination">
    @if ($paginator->onFirstPage())
                <a class="page-link" href="#" tabindex="-1">&laquo;</a>
        @else
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}">&laquo;</a>
        @endif
        
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled">{{ $element }}</li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                            <a class="active">{{ $page }}</a>
                    @else
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
    @if ($paginator->hasMorePages())
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
        @else
            <a href="#">&raquo;</a>
        @endif
    </div>
@endif