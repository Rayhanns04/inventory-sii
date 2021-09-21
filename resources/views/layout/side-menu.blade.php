@extends('../layout/main')

@section('head')
    @yield('subhead')
@endsection

@section('content')
    @include('../layout/components/mobile-menu')
    <div class="flex">
        <!-- BEGIN: Side Menu -->
        <nav class="side-nav">
            <a href="" class="intro-x flex items-center pl-5 pt-4">
                <img alt="Midone Tailwind HTML Admin Template" class="w-6"
                    src="{{ asset('dist/images/logo.svg') }}">
                <span class="hidden xl:block text-white text-lg ml-3">
                    Mid<span class="font-medium">one</span>
                </span>
            </a>
            <div class="side-nav__devider my-6"></div>
            <ul>
                <li>
                    <a href="/" class="side-menu @if (request()->is('/')) side-menu--active @endif">
                        <div class="side-menu__icon">
                            <i data-feather="home"></i>
                        </div>
                        <div class="side-menu__title">
                            Dashboard
                        </div>
                    </a>
                </li>

                <li>
                    <a class="side-menu @if (request()->is('settings/*')) side-menu--active @endif">
                        <div class="side-menu__icon">
                            <i data-feather="tool"></i>
                        </div>
                        <div class="side-menu__title">
                            Pengaturan
                            <div class="side-menu__sub-icon">
                                <i data-feather="chevron-down"></i>
                            </div>
                        </div>
                    </a>

                    <ul class="{{ request()->is('settings/*') ? 'side-menu__sub-open' : '' }}">
                        <li>
                            <a href="/settings/floors"
                                class="{{ request()->is('settings/floors') ? 'side-menu side-menu--active' : 'side-menu' }}">
                                <div class="side-menu__icon">
                                    <i data-feather="layers"></i>
                                </div>
                                <div class="side-menu__title">
                                    Lantai
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/settings/conditions"
                                class="{{ request()->is('settings/conditions') ? 'side-menu side-menu--active' : 'side-menu' }}">
                                <div class="side-menu__icon">
                                    <i data-feather="activity"></i>
                                </div>
                                <div class="side-menu__title">
                                    Kondisi Barang
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/settings/rooms"
                                class="{{ request()->is('settings/rooms') ? 'side-menu side-menu--active' : 'side-menu' }}">
                                <div class="side-menu__icon">
                                    <i data-feather="maximize"></i>
                                </div>
                                <div class="side-menu__title">
                                    Ruangan
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="/settings/stuffs"
                                class="{{ request()->is('settings/stuffs') ? 'side-menu side-menu--active' : 'side-menu' }}">
                                <div class="side-menu__icon">
                                    <i data-feather="package"></i>
                                </div>
                                <div class="side-menu__title">
                                    Barang
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>

                @php
                    $floors = App\Models\Floor::all();
                @endphp

                <li>
                    <a class="side-menu @if (request()->is('reports/*')) side-menu--active @endif">
                        <div class="side-menu__icon">
                            <i data-feather="file-text"></i>
                        </div>
                        <div class="side-menu__title">
                            Laporan


                            <div class="side-menu__sub-icon">
                                <i data-feather="chevron-down"></i>
                            </div>
                        </div>
                    </a>

                    <ul class="{{ request()->is('reports/*') ? 'side-menu__sub-open' : '' }}">
                        @foreach ($floors as $floor)
                            @if ($floor->rooms->isNotEmpty())
                                <li>
                                    <a class="side-menu @if (request()->is('reports/*')) side-menu--active @endif">
                                        <div class="side-menu__icon">
                                            <i data-feather="layers"></i>
                                        </div>
                                        <div class="side-menu__title">
                                            {{ $floor->name }}


                                            <div class="side-menu__sub-icon">
                                                <i data-feather="chevron-down"></i>
                                            </div>
                                        </div>
                                    </a>

                                    <ul class="{{ request()->is('reports/*') ? 'side-menu__sub-open' : '' }}">
                                        @foreach ($floor->rooms as $room)
                                            <li>
                                                <a href="/reports/floors/{{ $room->id }}"
                                                    class="{{ request()->is('reports/floors') ? 'side-menu side-menu--active' : 'side-menu' }}">
                                                    <div class="side-menu__icon">
                                                        <i data-feather="maximize"></i>
                                                    </div>
                                                    <div class="side-menu__title">
                                                        {{ $room->name }}
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </li>

                <li>
                    <a href="/recapOfWeek" class="side-menu @if (request()->is('/recapOfWeek')) side-menu--active @endif">
                        <div class="side-menu__icon">
                            <i data-feather="bookmark"></i>
                        </div>
                        <div class="side-menu__title">
                            Rekap Pekanan
                        </div>
                    </a>
                </li>
            </ul>

        </nav>
        <!-- END: Side Menu -->
        <!-- BEGIN: Content -->
        <div class="content">
            @include('../layout/components/top-bar')
            @yield('subcontent')
        </div>
        <!-- END: Content -->
    </div>
@endsection
