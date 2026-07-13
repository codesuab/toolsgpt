@extends('layouts.admin')
@section('title', 'New tools')
@section('admin')
    <form class="row g-3" method="POST" action="{{ route('ux.tools.add.post') }}">
        @csrf
        @include('partials.admin-alert')
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <input type="hidden" name="id" value="{{ $data?->id }}">
                        <div class="col-12 col-md-8">
                            <label class="form-label required">Name</label>
                            <input class="form-control" name="name" value="{{ old('name', $data?->name) }}" />
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 col-md-4">
                            <label class="form-label required">Category</label>
                            <select class="form-control" name="category_id">
                                <option value="" selected>--category--</option>
                                @foreach ($category as $cat)
                                    <option value="{{ $cat['id'] }}" @if ($data?->category_id == $cat['id']) selected @endif>
                                        {{ $cat['name'] }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label required">Taq line</label>
                            <textarea class="form-control"
                                name="taq_line">{{ old('taq_line', $data?->taq_line) }}</textarea>
                            @error('taq_line')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label required">Slug</label>
                            <input class="form-control" name="slug" value="{{ old('slug', $data?->slug) }}" />
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label required">Long name</label>
                            <input class="form-control" name="title" value="{{ old('title', $data?->title) }}" />
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label required">Long name sub Title</label>
                            <textarea class="form-control"
                                name="short_title">{{ old('short_title', $data?->short_title) }}</textarea>
                            @error('short_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label required">Content</label>
                            <textarea id="hugerte-mytextarea"
                                name="content">{{ old('content', $data?->content) }}</textarea>
                            @error('content')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label required">FAQ</label>
                            <div class="card">
                                <div class="card-body">
                                    <div id="faq-wrapper">
                                        @if ($data)
                                            @foreach ($data?->faq as $f)
                                                <div class="faq-item border p-3 mb-3">
                                                    <input type="text" name="faq_question[]" value="{{ $f['question'] }}"
                                                        class="form-control mb-2" placeholder="Question">
                                                    <textarea name="faq_answer[]" class="form-control"
                                                        placeholder="Answer">{{ $f['answer'] }}</textarea>
                                                    <button type="button" class="btn btn-danger mt-2 remove-faq">Remove</button>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <button type="button" id="add-faq" class="btn btn-primary">
                                        Add FAQ
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label required">View</label>
                            <select class="form-control" name="view">
                                <option value="" selected>--Views--</option>
                                @foreach ($views as $v)
                                    <option value="{{ $v }}" @if ($data?->view == $v) selected @endif>{{ $v }}</option>
                                @endforeach
                            </select>
                            @error('view')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label required">Icon(SVG)</label>
                            <textarea class="form-control" name="icon">{{ old('icon', $data?->icon) }}</textarea>
                            @error('icon')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label required">Color</label>
                            <input type="color" class="form-control" name="color"
                                value="{{ old('color', $data?->color) }}" />
                            @error('color')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label required">Status</label>
                            <select class="form-control" name="status">
                                <option value="active" @if ($data?->status == 'active') selected @endif>Active</option>
                                <option value="inactive" @if ($data?->status == 'inactive') selected @endif>Inactive</option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label">Badge</label>
                            <select class="form-control" name="badge">
                                <option value="" selected>--badge--</option>
                                <option value="new" @if ($data?->badge == 'new') selected @endif>New</option>
                                <option value="popular" @if ($data?->badge == 'popular') selected @endif>Popular</option>
                                <option value="most used" @if ($data?->badge == 'most used') selected @endif>Most Used</option>
                                <option value="trending" @if ($data?->badge == 'trending') selected @endif>Trending</option>
                                <option value="featured" @if ($data?->badge == 'featured') selected @endif>Featured</option>
                            </select>
                            @error('badge')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label ">Meta Title</label>
                            <input class="form-control" name="meta_title"
                                value="{{ old('meta_title', $data?->meta_title) }}" />
                            @error('meta_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label ">Meta Description</label>
                            <textarea class="form-control"
                                name="meta_description">{{ old('meta_description', $data?->meta_description) }}</textarea>
                            @error('meta_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label ">Meta Keyword</label>
                            <textarea class="form-control"
                                name="meta_keyword">{{ old('meta_keyword', $data?->meta_keyword) }}</textarea>
                            @error('meta_keyword')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-between gap-1">
                            <button class="btn btn-primary w-full" type="submit">Save</button>
                            <button class="btn btn-danger w-full" type="reset">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/hugerte@1/hugerte.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let options = {
                selector: '#hugerte-mytextarea',
                height: 300,
                menubar: false,
                statusbar: false,
                plugins: [
                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap',
                    'preview', 'anchor',
                    'searchreplace', 'visualblocks', 'code', 'fullscreen',
                    'insertdatetime', 'media', 'table', 'code', 'help', 'wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat',
                content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }'
            }
            if (localStorage.getItem("tablerTheme") === 'dark') {
                options.skin = 'oxide-dark';
                options.content_css = 'dark';
            }
            hugeRTE.init(options);
        })
    </script>

    <script>
        // faq
        const wrapper = document.getElementById('faq-wrapper');
        document.getElementById('add-faq').addEventListener('click', () => {
            wrapper.insertAdjacentHTML('beforeend', `<div class="faq-item border p-3 mb-3"><input type="text" name="faq_question[]" class="form-control mb-2" placeholder="Question"><textarea name="faq_answer[]" class="form-control" placeholder="Answer"></textarea><button type="button" class="btn btn-danger mt-2 remove-faq">Remove</button></div>`);
        });
        wrapper.addEventListener('click', e => {
            if (e.target.classList.contains('remove-faq')) {
                e.target.closest('.faq-item').remove();
            }
        });

        // step
        const stepWrapper = document.getElementById('step-wrapper');
        document.getElementById('add-step').addEventListener('click', () => {
            stepWrapper.insertAdjacentHTML('beforeend', `<div class="step-item border p-3 mb-3"><input type="text" name="work_step_title[]" class="form-control mb-2" placeholder="Title"><textarea name="work_step_message[]" class="form-control" placeholder="Message"></textarea><button type="button" class="btn btn-danger mt-2 remove-step">Remove</button></div>`);
        });
        stepWrapper.addEventListener('click', e => {
            if (e.target.classList.contains('remove-step')) {
                e.target.closest('.step-item').remove();
            }
        });
    </script>
@endsection