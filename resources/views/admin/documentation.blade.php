@extends('admin.layouts.main')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="row">
                    <div class="col-xxl">
                        <h4 class="fw-bold py-3 mb-4">Documentation</h4>
                        <!-- Table Layout Start -->
                        <div class="card mb-4 p-3">
                            <a href="https://drive.google.com/file/d/1xSNOvnL5rMsphogOFkIajbv0pQYqqqw0/view?usp=drive_link"
                                target="_blank"> <i class="menu-icon tf-icons bx bx-file me-2"></i>Download</a>
                        </div>
                        <div class="col-lg-8 col-12">
                            <p id="delayed-text">Mohon tunggu......</p>
                            <iframe src="https://drive.google.com/file/d/1xSNOvnL5rMsphogOFkIajbv0pQYqqqw0/preview"
                                width="100%" height="500"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        setTimeout(function() {
            // Hide the delayed text after 5 seconds
            setTimeout(function() {
                var delayedText = document.getElementById('delayed-text');
                delayedText.style.display = 'none';
            }, 2000);
        });
    </script>
@endsection
