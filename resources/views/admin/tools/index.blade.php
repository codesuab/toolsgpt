@extends('layouts.admin')
@section('title', 'Tools list')
@section('admin')
    <div class="card">
        @include('partials.admin-alert')
        <div class="card-table">
            <div class="card-header">
                <div class="row w-full">
                    <div class="col">
                        <h3 class="card-title mb-0">Tool</h3>
                        <p class="text-secondary m-0">Manage tools list.</p>
                    </div>
                    <div class="col-md-auto col-sm-12">
                        <div class="ms-auto d-flex flex-wrap btn-list">
                            <div class="input-group input-group-flat w-auto">
                                <span class="input-group-text">
                                    <i class="ti ti-search" style="font-size: 20px;"></i>
                                </span>
                                <input id="advanced-table-search" type="text" class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="advanced-table">
                <div class="table-responsive">
                    <table class="table table-vcenter table-selectable">
                        <thead>
                            <tr>
                                <th>
                                    <button class="table-sort d-flex justify-content-between"
                                        data-sort="sort-name">Name</button>
                                </th>
                                <th>
                                    <button class="table-sort d-flex justify-content-between"
                                        data-sort="sort-category">Category</button>
                                </th>
                                <th>
                                    <button class="table-sort d-flex justify-content-between"
                                        data-sort="sort-status">Status</button>
                                </th>
                                <th>
                                    <button class="table-sort d-flex justify-content-between"
                                        data-sort="sort-view">Blade</button>
                                </th>
                                <th>
                                    <button class="table-sort d-flex justify-content-between">View</button>
                                </th>
                                <th>
                                    <button class="table-sort d-flex justify-content-between">Date</button>
                                </th>
                                <th>
                                    <button class="table-sort d-flex justify-content-between">Action</button>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-tbody">
                            @foreach ($data as $b)
                                <tr>
                                    <td class="sort-name">
                                        <div class="d-flex align-items-center gap-2">
                                            <div style="color: {{ $b->color }};">
                                                {!! $b?->icon !!}
                                            </div>
                                            <p class="mb-0">{{ $b->name }}</p>
                                        </div>
                                    </td>
                                    <td class="sort-category">
                                        <span
                                            class="badge bg-success-lt">{{ $b?->category?->name ? $b?->category?->name : 'Other'  }}</span>
                                    </td>
                                    <td class="sort-status">
                                        <span class="badge bg-success-lt">{{ $b->status }}</span>
                                    </td>
                                    <td class="sort-view">{{ $b->view }}</td>
                                    <td class="sort-date">{{ $b->usages }}</td>
                                    <td class="sort-date">{{ $b->created_at->format('M d, Y') }}</td>
                                    <td class="sort-date">
                                        <div class="btn-actions justify-content-end">
                                            <a href="{{ route('tool.details', ['slug' => $b->slug]) }}" target="_blank"
                                                class="btn btn-action" aria-label="Edit">
                                                <i class="ti ti-external-link" style="font-size: 20px;"></i>
                                            </a>
                                            <a href="{{ route('ux.tools.add', ['id' => $b->id]) }}" class="btn btn-action"
                                                aria-label="Edit">
                                                <i class="ti ti-edit" style="font-size: 20px;"></i>
                                            </a>
                                            <a href="{{ route('ux.tools.del', ['id' => $b->id]) }}" class="btn btn-action"
                                                aria-label="Edit">
                                                <i class="ti ti-trash" style="font-size: 20px;"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex align-items-center">
                    <div class="dropdown">
                        <a class="btn dropdown-toggle" data-bs-toggle="dropdown">
                            <span id="page-count" class="me-1">20</span>
                            <span>records</span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" onclick="setPageListItems(event)" data-value="10">10 records</a>
                            <a class="dropdown-item" onclick="setPageListItems(event)" data-value="20">20 records</a>
                            <a class="dropdown-item" onclick="setPageListItems(event)" data-value="50">50 records</a>
                            <a class="dropdown-item" onclick="setPageListItems(event)" data-value="100">100 records</a>
                        </div>
                    </div>
                    <ul class="pagination m-0 ms-auto">
                        <li class="page-item"><a class="page-link cursor-pointer" data-i="1" data-page="20">1</a>
                        </li>
                        <li class="page-item"><a class="page-link cursor-pointer" data-i="2" data-page="20">2</a>
                        </li>
                        <li class="page-item active"><a class="page-link cursor-pointer" data-i="3" data-page="20">3</a>
                        </li>
                        <li class="page-item"><a class="page-link cursor-pointer" data-i="4" data-page="20">4</a>
                        </li>
                        <li class="page-item disabled"><a class="page-link cursor-pointer">...</a></li>
                        <li class="page-item"><a class="page-link cursor-pointer" data-i="7" data-page="20">7</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
    <script>
        const advancedTable = {
            headers: [{
                "data-sort": "sort-title",
                name: "Title"
            },
            {
                "data-sort": "sort-status",
                name: "Status"
            },
            {
                "data-sort": "sort-date",
                name: "Date"
            },
            ],
        };
        const setPageListItems = (e) => {
            window.tabler_list["advanced-table"].page = parseInt(e.target.dataset.value);
            window.tabler_list["advanced-table"].update();
            document.querySelector("#page-count").innerHTML = e.target.dataset.value;
        };
        window.tabler_list = window.tabler_list || {};
        document.addEventListener("DOMContentLoaded", function () {
            const list = (window.tabler_list["advanced-table"] = new List("advanced-table", {
                sortClass: "table-sort",
                listClass: "table-tbody",
                page: parseInt("20"),
                pagination: {
                    item: (value) => {
                        return `<li class="page-item"><a class="page-link cursor-pointer">${value.page}</a></li>`;
                    },
                    innerWindow: 1,
                    outerWindow: 1,
                    left: 0,
                    right: 0,
                },
                valueNames: advancedTable.headers.map((header) => header["data-sort"]),
            }));
            const searchInput = document.querySelector("#advanced-table-search");
            if (searchInput) {
                searchInput.addEventListener("input", () => {
                    list.search(searchInput.value);
                });
            }
        });
    </script>
@endsection