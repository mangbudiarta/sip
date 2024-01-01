<span class="text-center mb-3 rating-star">
    @for ($i = 1; $i <= 5; $i++)
        @if ($i <= $ratarata)
            <i class="fa fa-star" style="color: gold;"></i>
        @else
            <i class="fa fa-star" style="color: gray;"></i>
        @endif
    @endfor
    <small>{{ $ratarata }} | {{ $jumlahreview }} ulasan</small>
</span>
