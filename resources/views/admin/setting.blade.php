@extends('layouts.admin')
@section('title', 'Setting')
@section('admin')
    <div class="card">
        <div class="card-body">
            @include('partials.admin-alert')
            <div class="mb-3">
                <label class="form-label">Cron job</label>
                <input type="text" value="{{ $command }}" class="form-control">
            </div>
            <div class="mb-3 d-flex align-items-center justify-content-end gap-2">
                <a href="{{ route('ux.setting.cache') }}" class="btn btn-danger"><i class="ti ti-bolt" style="font-size: 16px; margin-right: 5px;"></i> Cache Clear</a>
                <a href="{{ route('ux.setting.sitemap') }}" class="btn btn-primary"><i class="ti ti-file-type-xml" style="font-size: 16px; margin-right: 5px;"></i> Sitemap Generate</a>
            </div>
        </div>
    </div>
@endsection