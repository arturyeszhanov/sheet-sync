@if (session('success'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index: 1055">
        <div id="successToast" class="toast align-items-center text-bg-success border-0 fs-6 px-2 py-2" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif


