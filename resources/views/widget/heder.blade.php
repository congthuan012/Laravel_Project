<header id="header" class="header-effect-shrink"
    data-plugin-options="{'stickyEnabled': true, 'stickyEffect': 'shrink', 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyChangeLogo': true, 'stickyStartAt': 120, 'stickyHeaderContainerHeight': 70}">
    <div class="header-body border-color-primary header-body-bottom-border">
        <div class="header-top header-top-default border-bottom-0">
            <div class="container">
                <div class="header-row py-2">
                    <div class="header-column justify-content-start">
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills text-uppercase text-2">
                                    <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                        <a class="nav-link pl-0" href="{{ route('about') }}"><i class="fas fa-angle-right"></i>
                                            {{ __('About') }}</a>
                                    </li>
                                    <li class="nav-item nav-item-anim-icon d-none d-md-block">
                                        <a class="nav-link" href="{{ route('contact') }}"><i class="fas fa-angle-right"></i>
                                            {{ __('Contact') }}</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-column justify-content-end">
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills">
                                    <li class="nav-item">
                                        <a href="mailto:congthuan036288@gmail.com"><i
                                                class="far fa-envelope text-4 text-color-primary" style="top: 1px;"></i>
                                            congthuan036288@gmail.com</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="tel:123-456-7890"><i class="fab fa-whatsapp text-4 text-color-primary"
                                                style="top: 0;"></i> 123-456-7890</a>
                                    </li>

                                    @php
                                    $langs = config('my.langs');
                                    @endphp

                                    <li class="nav-item dropdown nav-item-right-border">
                                        <a class="nav-link text-color-default text-color-hover-primary" href="#"
                                            role="button" id="dropdownLanguage" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            {{ $langs[App::getLocale() ]}}
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-arrow-centered min-width-0"
                                            aria-labelledby="dropdownLanguage" style="">
                                            @foreach ($langs as $key=>$value)
                                            <a class="dropdown-item"
                                                href="{{ route('language',$key)}}">{{$value}}</a>
                                            @endforeach
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-container container">
            <div class="header-row">
                <div class="header-column">
                    <div class="header-row">
                        <div class="header-logo">
                            <a href="index.html">
                                <img alt="Porto" width="100" height="48"
                                    src="{{asset('assets/img/logo-default-slim.png')}}">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="header-column justify-content-end">
                    <div class="header-row">
                        <div class="header-nav header-nav-links order-2 order-lg-1">
                            <div
                                class="header-nav-main header-nav-main-square header-nav-main-effect-2 header-nav-main-sub-effect-1">
                                <nav class="collapse">
                                    <ul class="nav nav-pills" id="mainNav">
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle {{ isset($page) && $page=='home'?'active':'' }}"
                                                href="{{route('index')}}">
                                                {{ __('Home') }}
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle {{ isset($page) && $page=='product'?'active':'' }}"
                                                href="{{route('product.shop')}}">
                                                {{ __('Shop') }}
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle {{ isset($page) && $page=='blog'?'active':'' }}"
                                                href="{{route('blog.index')}}">
                                                {{ __('Blog') }}
                                            </a>
                                        </li>

                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle {{ isset($page) && $page=='about'?'active':'' }}"
                                                href="{{route('about')}}">
                                                {{ __('About') }}
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle {{ isset($page) && $page=='contact'?'active':'' }}"
                                                href="{{route('contact')}}">
                                                {{ __('Contact') }}
                                            </a>
                                        </li>
                                        @if (auth()->user())
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle" href="#">
                                                {{ auth()->user()->ten }}
                                                <i class="fas fa-chevron-down"></i></a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('profile')}}">{{ __('Profile') }}</a>
                                                </li>
                                                <li><a class="dropdown-item" href="{{ route('logout') }}">{{ __('Logout') }}</a>
                                            </ul>
                                        </li>
                                        @else
                                        <li class="dropdown">
                                            <a class="dropdown-item dropdown-toggle {{ isset($page) && $page=='login'?'active':'' }}"
                                                href="{{route('login')}}">
                                                {{ __('Sigin') }}
                                            </a>
                                        </li>
                                        @endif


                                    </ul>
                                </nav>
                            </div>

                            <button class="btn header-btn-collapse-nav" data-toggle="collapse"
                                data-target=".header-nav-main nav">
                                <i class="fas fa-bars"></i>
                            </button>

                        </div>
                        <div
                            class="header-nav-features header-nav-features-no-border header-nav-features-lg-show-border order-1 order-lg-2">
                            <div class="header-nav-feature header-nav-features-search d-inline-flex">
                                <a href="#" class="header-nav-features-toggle text-decoration-none"
                                    data-focus="headerSearch"><i class="fas fa-search header-nav-top-icon"></i></a>
                                <div class="header-nav-features-dropdown" id="headerTopSearchDropdown">
                                    <form role="search" action="{{ route('search') }}" method="post">
                                        @csrf
                                        <div class="simple-search input-group">
                                            <input class="form-control text-1" id="headerSearch" name="search" type="search"
                                                value="" placeholder="{{ __('Search') }}...">
                                            <span class="input-group-append">
                                                <button class="btn" type="submit">
                                                    <i class="fas fa-search header-nav-top-icon"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="header-nav-feature header-nav-features-cart d-inline-flex ml-2">
                                <a href="#" class="header-nav-features-toggle">
                                    <img src="{{ asset('assets/img/icons/icon-cart.svg') }}" width="14" alt=""
                                        class="header-nav-top-icon-img">
                                    <span class="cart-info d-none">
                                        <span class="cart-qty">1</span>
                                    </span>
                                </a>
                                <div class="header-nav-features-dropdown" id="headerTopCartDropdown"
                                    style="max-height: 400px;overflow: auto;">
                                    <div style="width: 265px" id="minicart">
                                        @include('widget.minicart')
                                    </div>
                                    <div class="actions">
                                        <a class="btn btn-dark" href="{{route('cart')}}">{{ __('View cart') }}</a>
                                        <a class="btn btn-primary" href="{{route('checkout')}}">{{ __('Checkout') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
