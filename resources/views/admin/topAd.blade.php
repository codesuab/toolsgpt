@extends('layouts.admin')
@section('title', 'Top ad')
@section('admin')
    <div class="card">
        @include('partials.admin-alert')
        <div class="card-body">
            <form action="{{ route('ux.top.post') }}" method="POST" class="row g-3">
                @csrf
                <div class="col-12 col-md-10">
                    <label class="form-label required">Text</label>
                    <input type="text" class="form-control" name="text" value="{{ old('text', $data?->text) }}">
                    @error('text')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12 col-md-2">
                    <label class="form-label required">Status</label>
                    <select class="form-control" name="status">
                        <option value="show" @if (old('status', $data?->status) == 'show') selected @endif>Show</option>
                        <option value="hide" @if (old('status', $data?->status) == 'hide') selected @endif>Hide
                        </option>
                    </select>
                    @error('status')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12 col-md-8">
                    <label class="form-label required">Link</label>
                    <input type="url" class="form-control" name="link" value="{{ old('link', $data?->link) }}">
                    @error('link')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-12 col-md-4">
                    <label class="form-label required">Link label</label>
                    <input type="text" class="form-control" name="link_label"
                        value="{{ old('link_label', $data?->link_label) }}">
                    @error('link_label')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@endsection