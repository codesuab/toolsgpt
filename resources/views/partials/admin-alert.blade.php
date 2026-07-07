@if (session('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        <div class="alert-icon">
            <i class="ti ti-alert-circle"></i>
        </div>
        {{ session('error') }}
        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <div class="alert-icon">
            <i class="ti ti-check"></i>
        </div>
        {{ session('success') }}
        <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
    </div>
@endif
