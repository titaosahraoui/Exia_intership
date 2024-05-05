<style>
    /* Pagination container */
.pagination {
    display: flex;
    justify-content: center;
    padding: 20px;
    list-style: none;
}

/* Pagination items */
.pagination li {
    display: inline-block;
    margin: 0 5px;
}

/* Pagination links */
.pagination a, .pagination span {
    color: #007bff; /* Primary color */
    padding: 8px 16px;
    text-decoration: none;
    border-radius: 5px;
    border: 1px solid #ddd;
}

/* Active page */
.pagination li.active span {
    background-color: #007bff;
    color: white;
    border-color: #007bff;
}

/* Hover effect */
.pagination a:hover {
    background-color: #f0f0f0;
}

</style>
@if ($paginator->hasPages())
    <nav>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled" aria-disabled="true"><span>@lang('pagination.previous')</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>
            @else
                <li class="disabled" aria-disabled="true"><span>@lang('pagination.next')</span></li>
            @endif
        </ul>
    </nav>
@endif
