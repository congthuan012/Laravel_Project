@extends('layout')
@section('title')
<title>Porto - Giới thiệu</title>
@endsection
@section('content')
<div role="main" class="main">

    <div class="container pt-5">

        <div class="row py-4 mb-2">
            <div class="col-md-7 order-2">
                <div class="overflow-hidden">
                    <h2 class="text-color-dark font-weight-bold text-12 mb-2 pt-0 mt-0 appear-animation"
                        data-appear-animation="maskUp" data-appear-animation-delay="300">HUYNH CONG THUAN</h2>
                </div>
                <p class="lead appear-animation" data-appear-animation="fadeInUpShorter"
                    data-appear-animation-delay="700"><small class="text-uppercase">{{ __('class') }}:</small> PHP_262C7N</p>
                <p class="pb-3 appear-animation" data-appear-animation="fadeInUpShorter"
                    data-appear-animation-delay="800"><small class="text-uppercase">{{ __('birthday') }}: </small> 05/02/2000</p>
                <hr class="solid my-4 appear-animation" data-appear-animation="fadeInUpShorter"
                    data-appear-animation-delay="900">
                <div class="row align-items-center appear-animation" data-appear-animation="fadeInUpShorter"
                    data-appear-animation-delay="1000">
                    <div class="col-lg-6">

                    </div>
                    <div class="col-sm-6 text-lg-right my-4 my-lg-0">
                        <strong class="text-uppercase text-1 mr-3 text-dark">{{ __('follow me') }}</strong>
                        <ul class="social-icons float-lg-right">
                            <li class="social-icons-facebook"><a href="https://www.facebook.com/thuan.huynhcong.712" target="_blank"
                                    title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="social-icons-twitter"><a href="https://t.me/congthuan012" target="_blank"
                                    title="Twitter"><i class="fab fa-telegram"></i></a></li>
                            <li class="social-icons-linkedin"><a href="https://www.instagram.com/thuanmom010101/" target="_blank"
                                    title="Linkedin"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-5 order-md-2 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInRightShorter">
                <img src="{{ asset('assets/img/avatars/Ami - ok.gif') }}" class="img-fluid mb-2" alt="">
            </div>
        </div>
    </div>

    {{-- <section class="section section-default border-0 mt-5 appear-animation" data-appear-animation="fadeIn"
        data-appear-animation-delay="1200">
        <div class="container py-4">

            <div class="row featured-boxes featured-boxes-style-4">
                <div class="col-md-6 col-lg-3 my-2">
                    <div class="m-0 featured-box featured-box-primary featured-box-effect-4 appear-animation"
                        data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1600">
                        <div class="box-content p-0 text-left">
                            <i class="icon-featured icon-screen-tablet icons text-12 m-0 p-0"></i>
                            <h4 class="font-weight-bold text-color-dark">Mobile Apps</h4>
                            <p class="mb-0">Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-2">
                    <div class="m-0 featured-box featured-box-primary featured-box-effect-4 appear-animation"
                        data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1400">
                        <div class="box-content p-0 text-left">
                            <i class="icon-featured icon-layers icons text-12 m-0 p-0"></i>
                            <h4 class="font-weight-bold text-color-dark">Creative Websites</h4>
                            <p class="mb-0">Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-2">
                    <div class="m-0 featured-box featured-box-primary featured-box-effect-4 appear-animation"
                        data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1400">
                        <div class="box-content p-0 text-left">
                            <i class="icon-featured icon-magnifier icons text-12 m-0 p-0"></i>
                            <h4 class="font-weight-bold text-color-dark">SEO Optimization</h4>
                            <p class="mb-0">Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 my-2">
                    <div class="m-0 featured-box featured-box-primary featured-box-effect-4 appear-animation"
                        data-appear-animation="fadeInRightShorter" data-appear-animation-delay="1600">
                        <div class="box-content p-0 text-left">
                            <i class="icon-featured icon-screen-desktop icons text-12 m-0 p-0"></i>
                            <h4 class="font-weight-bold text-color-dark">Brand Solutions</h4>
                            <p class="mb-0">Lorem ipsum dolor sit amet, coctetur adipiscing elit.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="container pt-5 pb-2">
        <div class="overflow-hidden">
            <h2 class="text-color-dark font-weight-normal text-6 mb-0 appear-animation" data-appear-animation="maskUp">
                <strong class="font-weight-extra-bold">Projects</strong></h2>
        </div>
        <div class="overflow-hidden mb-3">
            <p class="mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">Lorem
                ipsum dolor sit amet, consectetur adipiscing elit massa enim. Nullam id varius nunc.</p>
        </div>
        <div class="row">
            <div class="col">

                <div class="my-4 lightbox appear-animation" data-appear-animation="fadeInUpShorter"
                    data-plugin-options="{'delegate': 'a.lightbox-portfolio', 'type': 'image', 'gallery': {'enabled': true}}">
                    <div class="owl-carousel owl-theme pb-3"
                        data-plugin-options="{'items': 4, 'margin': 35, 'loop': false}">

                        <div class="portfolio-item">
                            <span
                                class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                                <span class="thumb-info-wrapper border-radius-0">
                                    <img src="{{ asset('assets/img/projects/project.jpg') }}" class="img-fluid border-radius-0" alt="">
                                    <span class="thumb-info-title">
                                        <span
                                            class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Presentation</span>
                                        <span class="thumb-info-type">Brand</span>
                                    </span>
                                    <span class="thumb-info-action">
                                        <a href="portfolio-single-wide-slider.html">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-primary"><i
                                                    class="fas fa-link"></i></span>
                                        </a>
                                        <a href="{{ asset('assets/img/projects/project.jpg') }}" class="lightbox-portfolio">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-light"><i
                                                    class="fas fa-search text-dark"></i></span>
                                        </a>
                                    </span>
                                </span>
                            </span>
                        </div>

                        <div class="portfolio-item">
                            <span
                                class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                                <span class="thumb-info-wrapper border-radius-0">
                                    <img src="{{ asset('assets/img/projects/project-1.jpg') }}" class="img-fluid border-radius-0" alt="">
                                    <span class="thumb-info-title">
                                        <span
                                            class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Porto
                                            Watch</span>
                                        <span class="thumb-info-type">Media</span>
                                    </span>
                                    <span class="thumb-info-action">
                                        <a href="portfolio-single-wide-slider.html">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-primary"><i
                                                    class="fas fa-link"></i></span>
                                        </a>
                                        <a href="{{ asset('assets/img/projects/project-1.jpg') }}" class="lightbox-portfolio">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-light"><i
                                                    class="fas fa-search text-dark"></i></span>
                                        </a>
                                    </span>
                                </span>
                            </span>
                        </div>

                        <div class="portfolio-item">
                            <span
                                class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                                <span class="thumb-info-wrapper border-radius-0">
                                    <img src="{{ asset('assets/img/projects/project-2.jpg') }}" class="img-fluid border-radius-0" alt="">
                                    <span class="thumb-info-title">
                                        <span
                                            class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Identity</span>
                                        <span class="thumb-info-type">Logo</span>
                                    </span>
                                    <span class="thumb-info-action">
                                        <a href="portfolio-single-wide-slider.html">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-primary"><i
                                                    class="fas fa-link"></i></span>
                                        </a>
                                        <a href="{{ asset('assets/img/projects/project-2.jpg') }}" class="lightbox-portfolio">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-light"><i
                                                    class="fas fa-search text-dark"></i></span>
                                        </a>
                                    </span>
                                </span>
                            </span>
                        </div>

                        <div class="portfolio-item">
                            <span
                                class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                                <span class="thumb-info-wrapper border-radius-0">
                                    <img src="{{ asset('assets/img/projects/project-27.jpg') }}" class="img-fluid border-radius-0" alt="">
                                    <span class="thumb-info-title">
                                        <span
                                            class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Porto
                                            Screens</span>
                                        <span class="thumb-info-type">Website</span>
                                    </span>
                                    <span class="thumb-info-action">
                                        <a href="portfolio-single-wide-slider.html">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-primary"><i
                                                    class="fas fa-link"></i></span>
                                        </a>
                                        <a href="{{ asset('assets/img/projects/project-27.jpg') }}" class="lightbox-portfolio">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-light"><i
                                                    class="fas fa-search text-dark"></i></span>
                                        </a>
                                    </span>
                                </span>
                            </span>
                        </div>

                        <div class="portfolio-item">
                            <span
                                class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                                <span class="thumb-info-wrapper border-radius-0">
                                    <img src="{{ asset('assets/img/projects/project-4.jpg') }}" class="img-fluid border-radius-0" alt="">
                                    <span class="thumb-info-title">
                                        <span
                                            class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Three
                                            Bottles</span>
                                        <span class="thumb-info-type">Logo</span>
                                    </span>
                                    <span class="thumb-info-action">
                                        <a href="portfolio-single-wide-slider.html">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-primary"><i
                                                    class="fas fa-link"></i></span>
                                        </a>
                                        <a href="{{ asset('assets/img/projects/project-4.jpg') }}" class="lightbox-portfolio">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-light"><i
                                                    class="fas fa-search text-dark"></i></span>
                                        </a>
                                    </span>
                                </span>
                            </span>
                        </div>

                        <div class="portfolio-item">
                            <span
                                class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                                <span class="thumb-info-wrapper border-radius-0">
                                    <img src="{{ asset('assets/img/projects/project-5.jpg') }}" class="img-fluid border-radius-0" alt="">
                                    <span class="thumb-info-title">
                                        <span
                                            class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Company
                                            T-Shirt</span>
                                        <span class="thumb-info-type">Brand</span>
                                    </span>
                                    <span class="thumb-info-action">
                                        <a href="portfolio-single-wide-slider.html">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-primary"><i
                                                    class="fas fa-link"></i></span>
                                        </a>
                                        <a href="{{ asset('assets/img/projects/project-5.jpg') }}" class="lightbox-portfolio">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-light"><i
                                                    class="fas fa-search text-dark"></i></span>
                                        </a>
                                    </span>
                                </span>
                            </span>
                        </div>

                        <div class="portfolio-item">
                            <span
                                class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                                <span class="thumb-info-wrapper border-radius-0">
                                    <img src="{{ asset('assets/img/projects/project-6.jpg') }}" class="img-fluid border-radius-0" alt="">
                                    <span class="thumb-info-title">
                                        <span
                                            class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Mobile
                                            Mockup</span>
                                        <span class="thumb-info-type">Website</span>
                                    </span>
                                    <span class="thumb-info-action">
                                        <a href="portfolio-single-wide-slider.html">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-primary"><i
                                                    class="fas fa-link"></i></span>
                                        </a>
                                        <a href="{{ asset('assets/img/projects/project-6.jpg') }}" class="lightbox-portfolio">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-light"><i
                                                    class="fas fa-search text-dark"></i></span>
                                        </a>
                                    </span>
                                </span>
                            </span>
                        </div>

                        <div class="portfolio-item">
                            <span
                                class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                                <span class="thumb-info-wrapper border-radius-0">
                                    <img src="{{ asset('assets/img/projects/project-7.jpg') }}" class="img-fluid border-radius-0" alt="">
                                    <span class="thumb-info-title">
                                        <span
                                            class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Porto
                                            Label</span>
                                        <span class="thumb-info-type">Media</span>
                                    </span>
                                    <span class="thumb-info-action">
                                        <a href="portfolio-single-wide-slider.html">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-primary"><i
                                                    class="fas fa-link"></i></span>
                                        </a>
                                        <a href="{{ asset('assets/img/projects/project-7.jpg') }}" class="lightbox-portfolio">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-light"><i
                                                    class="fas fa-search text-dark"></i></span>
                                        </a>
                                    </span>
                                </span>
                            </span>
                        </div>

                        <div class="portfolio-item">
                            <span
                                class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                                <span class="thumb-info-wrapper border-radius-0">
                                    <img src="{{ asset('assets/img/projects/project-23.jpg') }}" class="img-fluid border-radius-0" alt="">
                                    <span class="thumb-info-title">
                                        <span
                                            class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Business
                                            Folders</span>
                                        <span class="thumb-info-type">Logo</span>
                                    </span>
                                    <span class="thumb-info-action">
                                        <a href="portfolio-single-wide-slider.html">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-primary"><i
                                                    class="fas fa-link"></i></span>
                                        </a>
                                        <a href="{{ asset('assets/img/projects/project-23.jpg') }}" class="lightbox-portfolio">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-light"><i
                                                    class="fas fa-search text-dark"></i></span>
                                        </a>
                                    </span>
                                </span>
                            </span>
                        </div>

                        <div class="portfolio-item">
                            <span
                                class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                                <span class="thumb-info-wrapper border-radius-0">
                                    <img src="{{ asset('assets/img/projects/project-24.jpg') }}" class="img-fluid border-radius-0" alt="">
                                    <span class="thumb-info-title">
                                        <span
                                            class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Tablet
                                            Screen</span>
                                        <span class="thumb-info-type">Website</span>
                                    </span>
                                    <span class="thumb-info-action">
                                        <a href="portfolio-single-wide-slider.html">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-primary"><i
                                                    class="fas fa-link"></i></span>
                                        </a>
                                        <a href="{{ asset('assets/img/projects/project-24.jpg') }}" class="lightbox-portfolio">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-light"><i
                                                    class="fas fa-search text-dark"></i></span>
                                        </a>
                                    </span>
                                </span>
                            </span>
                        </div>

                        <div class="portfolio-item">
                            <span
                                class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                                <span class="thumb-info-wrapper border-radius-0">
                                    <img src="{{ asset('assets/img/projects/project-25.jpg') }}" class="img-fluid border-radius-0" alt="">
                                    <span class="thumb-info-title">
                                        <span
                                            class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Black
                                            Watch</span>
                                        <span class="thumb-info-type">Media</span>
                                    </span>
                                    <span class="thumb-info-action">
                                        <a href="portfolio-single-wide-slider.html">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-primary"><i
                                                    class="fas fa-link"></i></span>
                                        </a>
                                        <a href="{{ asset('assets/img/projects/project-25.jpg') }}" class="lightbox-portfolio">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-light"><i
                                                    class="fas fa-search text-dark"></i></span>
                                        </a>
                                    </span>
                                </span>
                            </span>
                        </div>

                        <div class="portfolio-item">
                            <span
                                class="thumb-info thumb-info-lighten thumb-info-no-borders thumb-info-bottom-info thumb-info-centered-icons border-radius-0">
                                <span class="thumb-info-wrapper border-radius-0">
                                    <img src="{{ asset('assets/img/projects/project-26.jpg') }}" class="img-fluid border-radius-0" alt="">
                                    <span class="thumb-info-title">
                                        <span
                                            class="thumb-info-inner line-height-1 font-weight-bold text-dark position-relative top-3">Monitor
                                            Mockup</span>
                                        <span class="thumb-info-type">Website</span>
                                    </span>
                                    <span class="thumb-info-action">
                                        <a href="portfolio-single-wide-slider.html">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-primary"><i
                                                    class="fas fa-link"></i></span>
                                        </a>
                                        <a href="{{ asset('assets/img/projects/project-26.jpg') }}" class="lightbox-portfolio">
                                            <span class="thumb-info-action-icon thumb-info-action-icon-light"><i
                                                    class="fas fa-search text-dark"></i></span>
                                        </a>
                                    </span>
                                </span>
                            </span>
                        </div>


                    </div>
                </div>


            </div>
        </div>
    </div> --}}

</div>
@endsection

