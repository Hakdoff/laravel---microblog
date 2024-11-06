@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-[#333333] leading-5">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex rtl:flex-row-reverse shadow-sm rounded-md">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-[#333333] bg-[#f5f5f5] border border-gray-300 cursor-default rounded-l-md leading-5" aria-hidden="true">
                                @include('svg.prev-first')
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-[#333333] bg-[#f5f5f5] border border-gray-300 rounded-l-md leading-5 hover:bg-gray-200 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-200 active:text-[#333333] transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                            @include('svg.prev-else')
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @php
                        $start = $paginator->currentPage() - 2; // show 2 pages before current
                        $end = $paginator->currentPage() + 2; // show 2 pages after current
                        $start = max(1, $start); // never less than 1
                        $end = min($paginator->lastPage(), $end); // never greater than last page
                    @endphp

                    @if($start > 1)
                        <a href="{{ $paginator->url(1) }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-[#333333] bg-[#f5f5f5] border border-gray-300 leading-5 hover:bg-gray-200 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-200 active:text-[#333333] transition ease-in-out duration-150">1</a>
                        @if($start > 2)
                            <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-[#333333] bg-[#f5f5f5] border border-gray-300 cursor-default leading-5">...</span>
                        @endif
                    @endif

                    @foreach(range($start, $end) as $page)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-[#333333] border border-gray-300 cursor-default leading-5">{{ $page }}</span>
                            </span>
                        @else
                            <a href="{{ $paginator->url($page) }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-[#333333] bg-[#f5f5f5] border border-gray-300 leading-5 hover:bg-gray-200 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-200 active:text-[#333333] transition ease-in-out duration-150" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    @if($end < $paginator->lastPage())
                        @if($end < $paginator->lastPage() - 1)
                            <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-[#333333] bg-[#f5f5f5] border border-gray-300 cursor-default leading-5">...</span>
                        @endif
                        <a href="{{ $paginator->url($paginator->lastPage()) }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-[#333333] bg-[#f5f5f5] border border-gray-300 leading-5 hover:bg-gray-200 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-200 active:text-[#333333] transition ease-in-out duration-150">{{ $paginator->lastPage() }}</a>
                    @endif

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-[#333333] bg-[#f5f5f5] border border-gray-300 rounded-r-md leading-5 hover:bg-gray-200 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-200 active:text-[#333333] transition ease-in-out duration-150" aria-label="{{ __('pagination.next') }}">
                            @include('svg.next-first')
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-[#333333] bg-[#f5f5f5] border border-gray-300 cursor-default rounded-r-md leading-5" aria-hidden="true">
                                @include('svg.next-else')
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
