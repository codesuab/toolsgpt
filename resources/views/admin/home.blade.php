@extends('layouts.admin')
@section('admin')
    <div class="row g-2 align-items-center">
        <div class="col">
            <div class="page-pretitle">Overview</div>
            <h2 class="page-title">Dashboard</h2>
        </div>
        <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <a href="{{ route('ux.tools.add') }}" class="btn btn-primary btn-5">
                    <i class="ti ti-plus"></i>
                    Create new tool
                </a>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-1">
        <div class="col-12">
            <div class="row row-cards">
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-primary text-white avatar">
                                        <i class="ti ti-topology-star-3"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">{{ $active_tools }} Tools</div>
                                    <div class="text-secondary">{{ $inactive_tools }} inactive tools</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span class="bg-green text-white avatar">
                                        <i class="ti ti-bookmarks"></i>
                                    </span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">{{ $active_blog }} Blog</div>
                                    <div class="text-secondary">{{ $inactive_blog }} draft blog</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span
                                        class="bg-x text-white avatar">
                                        <i class="ti ti-inbox"></i></span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">{{ $inbox }} Total</div>
                                    <div class="text-secondary">total message</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="card card-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                    <span
                                        class="bg-facebook text-white avatar">
                                        <i class="ti ti-menu-2"></i></span>
                                </div>
                                <div class="col">
                                    <div class="font-weight-medium">{{ $active_menu }} Items</div>
                                    <div class="text-secondary">{{ $inactive_menu }} inactive items</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection