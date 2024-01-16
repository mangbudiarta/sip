{{-- tempat alert notif --}}
<div class="alert-notif"></div>
@forelse ($review as $item)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $item->wisatawan->nama }} </h5>
            <h6 class="card-subtitle mb-2 text-muted">Rating: {{ $item->rating }}<i class="fa fa-star text-warning"></i>
            </h6>
            <div class="d-flex justify-content-between">
                <p class="card-text">{{ $item->review }}</p>
                <p class="text-muted text-primary">{{ $item->created_at->format('d-M-Y') }}</p>
            </div>
        </div>
    </div>
@empty
    <p class="text-center">Ayo, jadilah pemberi review pertama</p>
@endforelse
