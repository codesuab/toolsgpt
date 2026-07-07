@if (session('error'))
    <div
        class="w-full px-4 py-2 flex items-center justify-center gap-1 bg-red-50 text-red-500 text-sm font-normal rounded-brand-card">
        <i class="ti ti-alert-circle text-lg"></i> <span> {{ session('error') }}</span>
    </div>
@endif
@if (session('success'))
    <div
        class="w-full px-4 py-2 flex items-center justify-center gap-1 bg-green-50 text-green-500 text-sm font-normal rounded-brand-card">
        <i class="ti ti-circle-dashed-check text-lg"></i> <span>{{ session('success') }}</span>
    </div>
@endif