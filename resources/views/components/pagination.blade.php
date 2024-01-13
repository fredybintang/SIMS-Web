<div>
    <span>Show {{ $paginator->lastItem() }} from {{ $paginator->total() }}</span>
</div>

@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Tautan Previous --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link" aria-label="Previous">
                    <span aria-hidden="true">
                        < </span>
                    </span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">
                        < </span>
                </a>
            </li>
        @endif

        @if ($paginator->lastPage() > 1)
            <ul class="pagination">
                {{-- First Page Link --}}
                <li class="page-item {{ $paginator->onFirstPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url(1) }}">1</a>
                </li>

                @if ($paginator->lastPage() > 3)
                    {{-- Dots or Second Page Link --}}
                    @if ($paginator->currentPage() > 2)
                        <li class="disabled page-item"><span class="page-link">...</span></li>
                    @endif

                    {{-- Pages within Range --}}
                    @for ($i = max(2, $paginator->currentPage() - 1); $i <= min($paginator->lastPage() - 1, $paginator->currentPage() + 1); $i++)
                        <li class="page-item {{ $paginator->currentPage() === $i ? 'active' : '' }}">
                            <a href="{{ $paginator->url($i) }}" class="page-link">{{ $i }}</a>
                        </li>
                    @endfor

                    {{-- Dots or Last Page Link --}}
                    @if ($paginator->currentPage() < $paginator->lastPage() - 2)
                        <li class="disabled page-item"><span class="page-link">...</span></li>
                    @endif
                @else
                    {{-- Pages within Range --}}
                    @for ($i = 2; $i <= $paginator->lastPage() - 1; $i++)
                        <li class="page-item {{ $paginator->currentPage() === $i ? 'active' : '' }}">
                            <a href="{{ $paginator->url($i) }}" class="page-link">{{ $i }}</a>
                        </li>
                    @endfor
                @endif

                {{-- Last Page Link --}}
                @if ($paginator->lastPage() > 1)
                    <li class="page-item {{ $paginator->currentPage() === $paginator->lastPage() ? 'active' : '' }}">
                        <a class="page-link"
                            href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
                    </li>
                @endif
            </ul>
        @endif

        {{-- Tautan Next --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">></span>
                </a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true">
                <span class="page-link" aria-label="Next">
                    <span aria-hidden="true">></span>
                </span>
            </li>
        @endif
    </ul>
@endif
