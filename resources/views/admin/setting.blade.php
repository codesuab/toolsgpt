@extends('layouts.admin')
@section('title', 'Setting')
@section('admin')
    <div class="card">
        <div class="card-body">
            <input type="text" value="{{ $command }}" class="form-control">
        </div>
    </div>
@endsection