@extends('layouts.admin')
@section('title', 'New blog')
@section('admin')
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('ux.blog.add.post') }}">
                @csrf

                @include('partials.admin-alert')
                <input type="hidden" name="id" value="{{ $data?->id }}">
                <div class="mb-3">
                    <label class="form-label required">Title</label>
                    <input type="text" name="title" value="{{ old('title', $data?->title) }}" id="title-input"
                        class="form-control @error('title') is-invalid @enderror" />
                    <p>
                        <u class="text-primary" id="slug-preview">{{ old('slug', $data?->slug) }}</u>
                    </p>
                    <input type="hidden" name="slug" id="slug" value="{{ old('slug', $data?->slug) }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label required">Excerpt</label>
                    <textarea class="form-control @error('excerpt') is-invalid @enderror"
                        name="excerpt">{{ old('excerpt', $data?->excerpt) }}</textarea>
                    @error('excerpt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label required">Content</label>
                    <textarea id="hugerte-mytextarea" name="content">{{ old('content', $data?->content) }}</textarea>
                    @error('content')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="row mb-3">
                    <div class="col-12 col-md-6">
                        <label class="form-label required">Meta Title</label>
                        <input class="form-control @error('meta_title') is-invalid @enderror" name="meta_title"
                            id="metaTitle" value="{{ old('meta_title', $data?->meta_title) }}">
                        @error('meta_title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label required">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" name="status">
                            <option value="draft" {{ old('status', $data?->status) == 'draft' ? 'selected' : '' }}>
                                Draft
                            </option>

                            <option value="published" {{ old('status', $data?->status) == 'published' ? 'selected' : '' }}>
                                Published
                            </option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Meta Description</label>
                    <textarea class="form-control @error('meta_description') is-invalid @enderror"
                        name="meta_description">{{ old('meta_description', $data?->meta_description) }}</textarea>
                    @error('meta_description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Meta Keywords</label>
                    <textarea class="form-control @error('meta_keywords') is-invalid @enderror"
                        name="meta_keywords">{{ old('meta_keywords', $data?->meta_keywords) }}</textarea>
                    @error('meta_keywords')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    Save
                </button>
            </form>
        </div>
    </div>
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
        const titleInput = document.getElementById('title-input')
        const slugPreview = document.getElementById('slug-preview')
        const metTitle = document.getElementById('metaTitle')
        const slugInput = document.getElementById('slug')
        titleInput.addEventListener('input', function (e) {
            slugMake(e.target.value)
            metTitle.value = e.target.value
        });

        function slugMake(val) {
            let slug = val
                .toLowerCase()
                .trim()
                .replace(/[^\w\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/--+/g, '-');

            slugPreview.textContent = slug;
            slugInput.value = slug
        }
        slugMake(e.target.value)
    </script>
@endsection