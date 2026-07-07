@extends('layouts.admin')
@section('title', 'Policy page')
@section('admin')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('ux.policy.post') }}" method="post">
                @csrf
                @include('partials.admin-alert')
                <div class="mb-3">
                    <label class="form-label required">Content</label>
                    <textarea id="hugerte-mytextarea" name="content">{{ old('content', $data?->content) }}</textarea>
                    @error('content')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
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
@endsection