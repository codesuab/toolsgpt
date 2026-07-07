@extends('layouts.admin')
@section('title', 'Profile')
@section('admin')
    <div class="card">
        <form action="{{ route('ux.profile.post') }}" method="POST" class="card-body" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12 mb-2">
                    @include('partials.admin-alert')
                </div>
                <div class="col-12 mb-2">
                    <span class="avatar avatar-xl"
                        style="background-image: url({{ Auth::user()->avatar ? Auth::user()->avatar : asset('media/logo.png') }})"></span>
                </div>
                <div class="col-12">
                    <label class="form-label">Avatar</label>
                    <div class="input-icon mb-3">
                        <input type="file" accept="image/*" class="form-control @error('avatar') is-invalid @enderror"
                            name="avatar" />
                    </div>
                    @error('avatar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12">
                    <label class="form-label required">Name</label>
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <i class="ti ti-user text-2xl"></i>
                        </span>
                        <input type="text" value="{{ Auth::user()->name }}"
                            class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="Full name" />
                    </div>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label required">Email</label>
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <i class="ti ti-mail"></i>
                        </span>
                        <input type="email" value="{{ Auth::user()->email }}"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            placeholder="Email address" />
                    </div>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-12 col-md-6">
                    <label class="form-label">Password</label>
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <i class="ti ti-brand-samsungpass"></i>
                        </span>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            placeholder="*******" />
                    </div>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
