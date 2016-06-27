
<?php $link_limit = 7 ?> 


@for ($i = 1; $i <= $paginator->lastPage(); $i++)
    

    <?php
    $half_total_links = floor($link_limit / 2);
    $from = $paginator->currentPage() - $half_total_links;
    $to = $paginator->currentPage() + $half_total_links;
    if ($paginator->currentPage() < $half_total_links) {
       $to += $half_total_links - $paginator->currentPage();
    }

    if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
        $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
    }
    ?>


    @if ($from < $i && $i < $to)

    @endif

@endfor





@if ($paginator->lastPage() > 1)
    <ul class="pagination">

{{-- first --}}

        @if ($paginator->currentPage() != 1 && $paginator->lastPage() >= 5) 
            <li> <a href="{{ $paginator->url(1) }}" > {{ trans('First') }} </a> </li>
        @endif

{{-- back --}}

        @if($paginator->currentPage() != 1)
            <li> <a href="{{ $paginator->url($paginator->currentPage()-1) }}"> < </a> </li>
        @endif

{{-- current --}}

        @for($i = max($paginator->currentPage()-2, 1); $i <= min(max($paginator->currentPage()-2, 1)+$link_limit,$paginator->lastPage()); $i++)
                <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
        @endfor

{{-- next --}}

        @if ($paginator->currentPage() != $paginator->lastPage())
            <li> <a href="{{ $paginator->url($paginator->currentPage()+1) }}" > > </a> </li>
        @endif

{{-- last --}}

        @if ($paginator->currentPage() != $paginator->lastPage() && $paginator->lastPage() >= 5)
            <li> <a href="{{ $paginator->url($paginator->lastPage()) }}" > >> </a> </li>
        @endif
    </ul>
@endif

