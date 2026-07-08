@php
    $list = [
        [
            'label' => 'Overview',
            'link' => 'ux.home',
            'icon' => 'ti-home-2',
            'submenu' => [],
            'active' => ['ux.home'],
        ],
        [
            'label' => 'Category',
            'link' => 'ux.category',
            'icon' => 'ti-category',
            'submenu' => [],
            'active' => ['ux.category'],
        ],
        [
            'label' => 'Inbox',
            'link' => 'ux.inbox',
            'icon' => 'ti-inbox',
            'submenu' => [],
            'active' => ['ux.inbox'],
        ],
        [
            'label' => 'Top ad',
            'link' => 'ux.top.add',
            'icon' => 'ti-ad',
            'submenu' => [],
            'active' => ['ux.top.add'],
        ],
        [
            'label' => 'Tools',
            'link' => '',
            'icon' => 'ti-topology-star-3',
            'active' => ['ux.tools.list', 'ux.tools.add'],
            'submenu' => [
                [
                    'label' => 'Tools list',
                    'link' => 'ux.tools.list',
                ],
                [
                    'label' => 'New Tools',
                    'link' => 'ux.tools.add',
                ],
            ],
        ],
        [
            'label' => 'Blog',
            'link' => '',
            'icon' => 'ti-bookmarks',
            'active' => ['ux.blog'],
            'submenu' => [
                [
                    'label' => 'Blog list',
                    'link' => 'ux.blog',
                ],
                [
                    'label' => 'New Blog',
                    'link' => 'ux.blog.add',
                ],
            ],
        ],
        [
            'label' => 'Pages',
            'link' => '',
            'icon' => 'ti-app-window',
            'active' => ['ux.about.page', 'ux.trams.page', 'ux.policy.page'],
            'submenu' => [
                [
                    'label' => 'About',
                    'link' => 'ux.about.page',
                ],
                [
                    'label' => 'Privacy Policy',
                    'link' => 'ux.policy.page',
                ],
                [
                    'label' => 'Terms of Service',
                    'link' => 'ux.trams.page',
                ],
            ],
        ],
    ];
@endphp

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('admin-asset/admin.css') }}" />
    {{-- icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
</head>

<body>
    <div class="page">
        <header class="navbar navbar-expand-md d-print-none">
            <div class="container-xl">
                <!-- BEGIN NAVBAR TOGGLER -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                    aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- END NAVBAR TOGGLER -->
                <!-- BEGIN NAVBAR LOGO -->
                <div class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="{{ route('ux.home') }}" aria-label="Tabler">
                        ToolGPT
                    </a>
                </div>
                <!-- END NAVBAR LOGO -->
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 p-0 px-2" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <span class="avatar avatar-sm"
                                style="background-image: url({{ Auth::user()->avatar ? Auth::user()->avatar : asset('media/logo.png') }})">
                            </span>
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="mt-1 small text-secondary">Admin</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="{{ route('home') }}" class="dropdown-item"><i class="ti ti-home"></i> Visit
                                home</a>
                            <a href="{{ route('ux.profile') }}" class="dropdown-item"><i class="ti ti-user"></i>
                                Profile</a>
                            <a href="./settings.html" class="dropdown-item"><i class="ti ti-settings-2"></i>
                                Settings</a>
                            <a href="{{ route('logout') }}" class="dropdown-item"><i class="ti ti-logout"></i>
                                Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <header class="navbar-expand-md">
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar">
                    <div class="container-xl">
                        <div class="row flex-column flex-md-row flex-fill align-items-center">
                            <ul class="navbar-nav">
                                @foreach ($list as $item)
                                    <li
                                        class="nav-item {{ in_array(Route::currentRouteName(), $item['active']) ? 'active' : '' }} {{ count($item['submenu']) ? 'dropdown' : '' }}">
                                        <a class="nav-link {{ count($item['submenu']) ? 'dropdown-toggle' : '' }}"
                                            href="{{ count($item['submenu']) ? '#navbar-' . Str::slug($item['label']) : route($item['link']) }}"
                                            @if (count($item['submenu'])) data-bs-toggle="dropdown"
                                            data-bs-auto-close="outside" role="button" aria-expanded="false" @endif>
                                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                                <i class="ti {{ $item['icon'] }}" style="font-size:20px;"></i>
                                            </span>

                                            <span class="nav-link-title">
                                                {{ $item['label'] }}
                                            </span>
                                        </a>

                                        @if (count($item['submenu']))
                                            <div class="dropdown-menu">
                                                <div class="dropdown-menu-columns">
                                                    <div class="dropdown-menu-column">
                                                        @foreach ($item['submenu'] as $sub)
                                                            <a class="dropdown-item"
                                                                href="{{ route($sub['link'] ? $sub['link'] : 'home') }}">
                                                                {{ $sub['label'] }}
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="page-wrapper">
            <div class="page-body">
                <div class="container-xl">
                    @yield('admin')
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin-asset/admin.js') }}"></script>
    @yield('scripts')
</body>