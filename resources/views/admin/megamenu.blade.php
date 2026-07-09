@extends('layouts.admin')
@section('title', 'Mega menu')
@section('admin')
    <div class="card">
        @include('partials.admin-alert')
        <div class="card-table">
            <div class="card-header">
                <div class="row w-full">
                    <div class="col">
                        <h3 class="card-title mb-0">Mega menu</h3>
                        <p class="text-secondary m-0">Manage mega menu.</p>
                    </div>
                    <div class="col-md-auto col-sm-12">
                        <div class="ms-auto d-flex flex-wrap btn-list">
                            <div class="input-group input-group-flat w-auto">
                                <span class="input-group-text">
                                    <i class="ti ti-search" style="font-size: 20px;"></i>
                                </span>
                                <input id="advanced-table-search" type="text" class="form-control" autocomplete="off">
                            </div>
                            <button data-bs-toggle="modal" id="newButton" data-bs-target="#exampleModal"
                                class="btn btn-primary">Add
                                new</button>
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
                                        data-sort="sort-name">Tool</button>
                                </th>
                                <th>
                                    <button class="table-sort d-flex justify-content-between"
                                        data-sort="sort-email">Col</button>
                                </th>
                                <th>
                                    <button class="table-sort d-flex justify-content-between"
                                        data-sort="sort-subject">Status</button>
                                </th>
                                <th>
                                    <button class="table-sort d-flex justify-content-between"
                                        data-sort="sort-date">Date</button>
                                </th>
                                <th>
                                    <button class="table-sort d-flex justify-content-between">Action</button>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-tbody">
                            @foreach ($data as $b)
                                <tr>
                                    <td class="sort-title">
                                        <div class="flex items-center gap-2">
                                            <div style="color: {{ $b->tool->color }}">
                                                {!! $b?->tool?->icon !!}
                                            </div>
                                            <p>{{ $b?->tool?->name }}</p>
                                        </div>
                                    </td>
                                    <td class="sort-email">
                                        <span class="text-capitalize">
                                            {{ $b->col }}
                                        </span>
                                    </td>
                                    <td class="sort-subject">
                                        @if ($b->status == 'active')
                                            <span class="badge bg-blue text-blue-fg text-capitalize">{{ $b->status }}</span>
                                        @else
                                            <span class="badge bg-red text-red-fg text-capitalize">{{ $b->status }}</span>
                                        @endif
                                    </td>
                                    <td class="sort-date">{{ $b->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <div class="btn-actions justify-content-end">
                                            <a href="javascript:void(0);" onclick="openEdit({{ $b }})" class="btn btn-action"
                                                aria-label="Edit">
                                                <i class="ti ti-edit" style="font-size: 20px;"></i>
                                            </a>
                                            <a href="{{ route('ux.mega.del', ['id' => $b->id]) }}" class="btn btn-action"
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

    <div class="modal" id="exampleModal" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mega menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ux.mega.post') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="mb-3">
                            <label class="form-label required">Name</label>
                            <select name="tool_id" class="form-control">
                                <option value="" selected>--tool--</option>
                                @foreach ($tool as $t)
                                    <option value="{{ $t->id }}">{{ $t->name }}</option>
                                @endforeach
                            </select>
                            @error('tool_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Col</label>
                            <select name="col" class="form-control">
                                <option value="" selected>--col--</option>
                                @foreach (['one', 'tow', 'three'] as $t)
                                    <option value="{{ $t }}">{{ $t }}</option>
                                @endforeach
                            </select>
                            @error('col')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label required">Status</label>
                            <select name="status" class="form-control">
                                <option value="" selected>--status--</option>
                                @foreach (['active', 'inactive'] as $t)
                                    <option value="{{ $t }}">{{ $t }}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Save now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/2.3.1/list.min.js"></script>
    <script>
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
            }));
            const searchInput = document.querySelector("#advanced-table-search");
            if (searchInput) {
                searchInput.addEventListener("input", () => {
                    list.search(searchInput.value);
                });
            }
        });
    </script>

    <script>
        function openEdit(data) {
            const idInput = document.querySelector('[name="id"]');
            const toolInput = document.querySelector('[name="tool_id"]');
            const nameInput = document.querySelector('[name="col"]');
            const slugInput = document.querySelector('[name="status"]');

            idInput.value = data.id;
            toolInput.value = data.tool_id;
            nameInput.value = data.col;
            slugInput.value = data.status;
            

            document.getElementById('newButton').click();
        }
    </script>
@endsection