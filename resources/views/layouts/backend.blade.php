<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>
            @hasSection('title')
                @yield('title')
                 |
            @endif
         BookWriter</title>

        <meta name="description" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Icons -->
        <link rel="shortcut icon" href="{{ asset('media/favicons/favicon.png') }}">
        <link rel="icon" sizes="192x192" type="image/png" href="{{ asset('media/favicons/favicon-192x192.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('media/favicons/apple-touch-icon-180x180.png') }}">

        <!-- Fonts and Styles -->
        @yield('css_before')
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
        <link rel="stylesheet" id="css-main" href="{{ mix('/css/oneui.css') }}">

        
        <!-- You can include a specific file from public/css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="{{ mix('/css/themes/amethyst.css') }}"> -->
        @yield('css_after')

        <!-- Scripts -->
        <script>window.Laravel = {!! json_encode(['csrfToken' => csrf_token(),]) !!};</script>
    </head>
    <body>
        <div id="page-container" class="sidebar-o enable-page-overlay sidebar-dark side-scroll page-header-fixed main-content-narrow">

            <!-- Sidebar -->
            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="content-header">
                    <!-- Logo -->
                    <a class="font-semibold text-dual" href="/">
                        <i class="fa fa-book-open"></i>
                    </a>
                    <!-- END Logo -->

                    <!-- Extra -->
                    <div>
                        <!-- Dark Mode -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="dark_mode_toggle" href="javascript:void(0)">
                            <i class="far fa-moon"></i>
                        </a>
                        <!-- END Dark Mode -->

                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                            <i class="fa fa-fw fa-times"></i>
                        </a>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Extra -->
                </div>
                <!-- END Side Header -->

                <!-- Sidebar Scrolling -->
                <div class="js-sidebar-scroll">
                    <!-- Side Navigation -->
                    <div class="content-side">
                        {{-- Livre, Structure, Str. Chapitres, Personnages, Geographie, Univers, Illustrations, Notes, Sources, Fiches, Dashboard --}}
                        <ul class="nav-main">
                            <li class="nav-main-item">
                                <a class="nav-main-link {{ (request()->is('dashboard*')) ? 'active' : '' }}" href="{{route('dashboard.index')}}">
                                    <i class="nav-main-link-icon si si-grid"></i>
                                    <span class="nav-main-link-name">Dashboard</span>
                                </a>
                            </li>
                            
                            {{-- <li class="nav-main-heading">Lorem Ipsum</li> --}}
                            <li class="nav-main-item {{ (request()->is('bookinfo*')) ? 'open' : '' }}">
                                <a class="nav-main-link {{ (request()->is('bookinfo*')) ? 'active' : '' }}" data-toggle="submenu" aria-haspopup="true" aria-expanded="true" href="{{route('bookinfo.index')}}">
                                    <i class="nav-main-link-icon fa fa-newspaper"></i>
                                    <span class="nav-main-link-name">Book</span>
                                </a>
                            </li>
                            <li class="nav-main-item {{ (request()->is('structure*')) ? 'open' : '' }}">
                                <a class="nav-main-link {{ (request()->is('structure*')) ? 'active' : '' }}" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{route('structure.index')}}">
                                    <i class="nav-main-link-icon si si-list"></i>
                                    <span class="nav-main-link-name">Structure</span>
                                </a>
                            </li>
                            <li class="nav-main-item {{ (request()->is('str_chapters*')) ? 'open' : '' }}">
                                <a class="nav-main-link nav-main-link-submenu {{ (request()->is('str_chapters*')) ? 'active' : '' }}" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{route('str_chapters.index')}}">
                                    <i class="nav-main-link-icon fa fa-laptop-medical"></i>
                                    <span class="nav-main-link-name">Str. Chapters</span>
                                </a>
                                @if(isset($chapters))
                                    @foreach ( $chapters as $chapter)
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link {{ (request()->is('str_chapters/'.$chapter->chapter_number)) ? 'active' : '' }}" href="{{route('str_chapters.show',$chapter->chapter_number)}}">
                                                    <span class="nav-main-link-name">Chapter-{{$chapter->chapter_number ?? '0'}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    @endforeach
                                @endif
                            </li>
                            <li class="nav-main-item {{ (request()->is('chapters*')) ? 'open' : '' }}">
                                <a class="nav-main-link nav-main-link-submenu {{ (request()->is('chapters*')) ? 'active' : '' }}" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{route('chapters.index')}}">
                                    <i class="nav-main-link-icon fa fa-receipt"></i>
                                    <span class="nav-main-link-name">Chapters</span>
                                </a>

                                @if(isset($chapters))
                                    @foreach ( $chapters as $chapter)
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link {{ (request()->is('chapters/'.$chapter->id)) ? 'active' : '' }}" href="{{route('chapters.show',$chapter->id)}}">
                                                    <span class="nav-main-link-name">{{$chapter->chapter_title ?? ''}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    @endforeach
                                @endif
                            </li>
                            <li class="nav-main-item {{ (request()->is('characters*')) ? 'open' : '' }}">
                                <a class="nav-main-link nav-main-link-submenu {{ (request()->is('characters*')) ? 'active' : '' }}" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{route('characters.index')}}">
                                    <i class="nav-main-link-icon fa fa-skating"></i>
                                    <span class="nav-main-link-name">Characters</span>
                                </a>

                                @if(isset($characters))
                                    @foreach ( $characters as $character)
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link {{ (request()->is('characters/'.$character->id)) ? 'active' : '' }}" href="{{route('characters.show',$character->id)}}">
                                                    <span class="nav-main-link-name">{{$character->f_name ?? ''}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    @endforeach
                                @endif
                            </li>
                            <li class="nav-main-item {{ (request()->is('geography*')) ? 'open' : '' }}">
                                <a class="nav-main-link nav-main-link-submenu {{ (request()->is('geography*')) ? 'active' : '' }}" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{route('geography.index')}}">
                                    <i class="nav-main-link-icon fa fa-spinner"></i>
                                    <span class="nav-main-link-name">Geography</span>
                                </a>
                                
                                @if(isset($geographies))
                                    @foreach ( $geographies as $geography)
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link {{ (request()->is('geography/'.$geography->id)) ? 'active' : '' }}" href="{{route('geography.show',$geography->id)}}">
                                                    <span class="nav-main-link-name">{{$geography->place_name ?? ''}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    @endforeach
                                @endif
                            </li>
                            <li class="nav-main-item {{ (request()->is('universe*')) ? 'open' : '' }}">
                                <a class="nav-main-link nav-main-link-submenu {{ (request()->is('universe*')) ? 'active' : '' }}" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{route(('universeList'))}}">
                                    <i class="nav-main-link-icon fa fa-star-of-david"></i>
                                    <span class="nav-main-link-name">Universe</span>
                                </a>
                                {{-- Myths and Legends, Civilization, Bestiary, Magic, Technology, Other --}}
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item {{ (request()->is('universe/myths*')) ? 'open' : '' }}">
                                      <a class="nav-main-link nav-main-link-submenu {{ (request()->is('universe/myths*')) ? 'active' : '' }}" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{route('myths_and_legends.index')}}">
                                        <i class="nav-main-link-icon fa fa-atom"></i>
                                        <span class="nav-main-link-name">Myths and Legends</span>
                                      </a>
                                      
                                        @if(isset($ml_universes))
                                            @foreach ( $ml_universes as $universe)
                                                <ul class="nav-main-submenu">
                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link {{ (request()->is('universe/myths-and-legends/'.$universe->id)) ? 'active' : '' }}" href="{{route('myths_and_legends.show',$universe->id)}}">
                                                            <span class="nav-main-link-name">{{$universe->title ?? ''}}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        @endif
                                    </li>
                                </ul>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item {{ (request()->is('universe/civilization*')) ? 'open' : '' }}">
                                      <a class="nav-main-link nav-main-link-submenu {{ (request()->is('universe/civilization*')) ? 'active' : '' }}" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{route('civilization.index')}}">
                                        <i class="nav-main-link-icon fa fa-building"></i>
                                        <span class="nav-main-link-name">Civilization</span>
                                      </a>
                                      @if(isset($c_universes))
                                            @foreach ( $c_universes as $universe)
                                                <ul class="nav-main-submenu">
                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link {{ (request()->is('universe/civilization/'.$universe->id)) ? 'active' : '' }}" href="{{route('civilization.show',$universe->id)}}">
                                                            <span class="nav-main-link-name">{{$universe->name ?? ''}}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        @endif
                                    </li>
                                </ul>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item {{ (request()->is('universe/bestiary*')) ? 'open' : '' }}">
                                      <a class="nav-main-link nav-main-link-submenu {{ (request()->is('universe/bestiary*')) ? 'active' : '' }}" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{route('bestiary.index')}}">
                                        <i class="nav-main-link-icon fa fa-dizzy"></i>
                                        <span class="nav-main-link-name">Bestiary</span>
                                      </a>
                                      @if(isset($b_universes))
                                            @foreach ( $b_universes as $universe)
                                                <ul class="nav-main-submenu">
                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link {{ (request()->is('universe/bestiary/'.$universe->id)) ? 'active' : '' }}" href="{{route('bestiary.show',$universe->id)}}">
                                                            <span class="nav-main-link-name">{{$universe->name ?? ''}}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        @endif
                                    </li>
                                </ul>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item {{ (request()->is('universe/magic*')) ? 'open' : '' }}">
                                      <a class="nav-main-link nav-main-link-submenu {{ (request()->is('universe/magic*')) ? 'active' : '' }}" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{route('magic.index')}}">
                                        <i class="nav-main-link-icon fa fa-bullseye"></i>
                                        <span class="nav-main-link-name">Magic</span>
                                      </a>
                                      @if(isset($m_universes))
                                            @foreach ( $m_universes as $universe)
                                                <ul class="nav-main-submenu">
                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link {{ (request()->is('universe/magic/'.$universe->id)) ? 'active' : '' }}" href="{{route('magic.show',$universe->id)}}">
                                                            <span class="nav-main-link-name">{{$universe->name ?? ''}}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        @endif
                                    </li>
                                </ul>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item {{ (request()->is('universe/technology*')) ? 'open' : '' }}">
                                      <a class="nav-main-link nav-main-link-submenu {{ (request()->is('universe/technology*')) ? 'active' : '' }}" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{route('technology.index')}}">
                                        <i class="nav-main-link-icon fa fa-assistive-listening-systems"></i>
                                        <span class="nav-main-link-name">Technology</span>
                                      </a>
                                      @if(isset($t_universes))
                                            @foreach ( $t_universes as $universe)
                                                <ul class="nav-main-submenu">
                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link {{ (request()->is('universe/technology/'.$universe->id)) ? 'active' : '' }}" href="{{route('technology.show',$universe->id)}}">
                                                            <span class="nav-main-link-name">{{$universe->name ?? ''}}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        @endif
                                    </li>
                                </ul>
                                <ul class="nav-main-submenu">
                                    <li class="nav-main-item {{ (request()->is('universe/other*')) ? 'open' : '' }}">
                                      <a class="nav-main-link nav-main-link-submenu {{ (request()->is('universe/other*')) ? 'active' : '' }}" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{route('other.index')}}">
                                        <i class="nav-main-link-icon fa fa-plus"></i>
                                        <span class="nav-main-link-name">Other</span>
                                      </a>
                                      @if(isset($o_universes))
                                            @foreach ( $o_universes as $universe)
                                                <ul class="nav-main-submenu">
                                                    <li class="nav-main-item">
                                                        <a class="nav-main-link {{ (request()->is('universe/other/'.$universe->id)) ? 'active' : '' }}" href="{{route('other.show',$universe->id)}}">
                                                            <span class="nav-main-link-name">{{$universe->title ?? ''}}</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        @endif
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-main-item {{ (request()->is('illustrations*')) ? 'open' : '' }}">
                                <a class="nav-main-link nav-main-link-submenu {{ (request()->is('illustrations*')) ? 'active' : '' }}" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{route('illustrations.index')}}">
                                    <i class="nav-main-link-icon fa fa-image"></i>
                                    <span class="nav-main-link-name">Illustrations</span>
                                </a>
                            </li>
                            <li class="nav-main-item {{ (request()->is('notes*')) ? 'open' : '' }}">
                                <a class="nav-main-link nav-main-link-submenu {{ (request()->is('notes*')) ? 'active' : '' }}" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{route('notes.index')}}">
                                    <i class="nav-main-link-icon si si-pencil"></i>
                                    <span class="nav-main-link-name">Notes</span>
                                </a>
                                
                                @if(isset($notes))
                                    @foreach ( $notes as $note)
                                        <ul class="nav-main-submenu">
                                            <li class="nav-main-item">
                                                <a class="nav-main-link {{ (request()->is('notes/'.$note->id)) ? 'active' : '' }}" href="{{route('notes.show',$note->id)}}">
                                                    <span class="nav-main-link-name">{{$note->title ?? ''}}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    @endforeach
                                @endif
                            </li>
                            <li class="nav-main-item {{ (request()->is('sources*')) ? 'open' : '' }}">
                                <a class="nav-main-link {{ (request()->is('sources*')) ? 'active' : '' }}" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="{{route('sources.index')}}">
                                    <i class="nav-main-link-icon si si-list"></i>
                                    <span class="nav-main-link-name">Sources</span>
                                </a>
                            </li>
                            <li class="nav-main-item {{ (request()->is('cards*')) ? 'open' : '' }}">
                                <a class="nav-main-link nav-main-link-submenu {{ (request()->is('cards*')) ? 'active' : '' }}" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                                    <i class="nav-main-link-icon fa fa-heart"></i>
                                    <span class="nav-main-link-name">Cards</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END Side Navigation -->
                </div>
                <!-- END Sidebar Scrolling -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="d-flex align-items-center">
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <!-- END Toggle Sidebar -->

                        <!-- Toggle Mini Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                        <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                            <i class="fa fa-fw fa-ellipsis-v"></i>
                        </button>
                        <!-- END Toggle Mini Sidebar -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="d-flex align-items-center">
                        <!-- Search Form (visible on larger screens) -->
                        <form class="d-md-inline-block" action="{{route('dashboard.index')}}" method="POST">
                            @csrf
                            <div class="input-group input-group-sm">
                                <input type="text" class="form-control form-control-alt" placeholder="Synonym.." id="page-header-search-input2" name="synonym">
                                {{-- <span class="input-group-text border-0">
                                    <i class="fa fa-fw fa-search"></i>
                                </span> --}}
                            </div>
                        </form>
                        <!-- END Search Form -->

                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block ms-2">
                            <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="Header Avatar" style="width: 21px;">
                                <span class="d-none d-sm-inline-block ms-2">{{ Auth::user()->fullname }}</span>
                                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ms-1 mt-1"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
                                <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ asset('media/avatars/avatar10.jpg') }}" alt="">
                                    <p class="mt-2 mb-0 fw-medium">{{ Auth::user()->fullname }}</p>
                                </div>
                                <div class="p-2">
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                        <span class="fs-sm fw-medium">Settings</span>
                                    </a>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        
                                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
                                            <span class="fs-sm fw-medium">Log Out</span>
                                        </a>
                                    </form>

                                </div>
                            </div>
                        </div>                        
                        <!-- END User Dropdown -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Loader -->
                <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-body-extra-light">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                @yield('content')
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <!--
            OneUI JS

            Core libraries and functionality
        -->
        <script src="{{ mix('js/oneui.app.js') }}"></script>

        <!-- Laravel Scaffolding JS -->
        <!-- <script src="{{ mix('/js/laravel.app.js') }}"></script> -->

        @yield('js_after')
    </body>
</html>
