<footer id="footer">
    <div class="container">
        <div class="footer-ribbon">
            <span>{{ __('About') }}</span>
        </div>
        <div class="row py-5 my-4">
            {{-- <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                <h5 class="text-3 mb-3">{{ __('NEWSLETTER') }}</h5>
                <p class="pr-1">{{ __('Keep up on our always evolving product features and technology. Enter your e-mail address and subscribe to our newsletter') }}.</p>
                <div class="alert alert-success d-none" id="newsletterSuccess">
                    <strong>{{ __('Success') }}!</strong> {{ __("You've been added to our email list") }}.
                </div>
                <div class="alert alert-danger d-none" id="newsletterError"></div>
                {{-- <form id="newsletterForm" action="php/newsletter-subscribe.php" method="POST" class="mr-4 mb-3 mb-md-0">
                    <div class="input-group input-group-rounded">
                        <input class="form-control form-control-sm bg-light" placeholder="{{ __("Email address") }}"
                            name="newsletterEmail" id="newsletterEmail" type="text">
                        <span class="input-group-append">
                            <button class="btn btn-light text-color-dark" type="submit"><strong>{{ __('GO')}}!</strong></button>
                        </span>
                    </div>
                </form>
            </div>--}}
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                {{-- <h5 class="text-3 mb-3">LATEST TWEETS</h5>
                <div id="tweet" class="twitter" data-plugin-tweets
                    data-plugin-options="{'username': 'oklerthemes', 'count': 2}">
                    <p>Please wait...</p>
                </div> --}}
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-md-0">
                <div class="contact-details">
                    <h5 class="text-3 mb-3">{{ __('Contact') }}</h5>
                    <ul class="list list-icons list-icons-lg">
                        <li class="mb-1"><i class="far fa-dot-circle text-color-primary"></i>
                            <p class="m-0">234 Huynh Thuc Khang, Ho Chi Minh</p>
                        </li>
                        <li class="mb-1"><i class="fab fa-whatsapp text-color-primary"></i>
                            <p class="m-0"><a href="tel:8001234567">(800) 123-4567</a></p>
                        </li>
                        <li class="mb-1"><i class="far fa-envelope text-color-primary"></i>
                            <p class="m-0"><a href="mailto:mail@example.com">mail@example.com</a></p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 col-lg-2">
                <h5 class="text-3 mb-3">{{ __('FOLLOW US') }}</h5>
                <ul class="social-icons">
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
    <div class="footer-copyright">
        <div class="container py-2">
            <div class="row py-4">
                <div
                    class="col-lg-1 d-flex align-items-center justify-content-center justify-content-lg-start mb-2 mb-lg-0">
                    <a href="{{route('index')}}" class="logo pr-0 pr-lg-3">
                        <img alt="Trang chủ" src="{{asset('assets/img/logo-footer.png')}}" class="opacity-5" width="49"
                            height="22" data-plugin-options="{'appearEffect': 'fadeIn'}">
                    </a>
                </div>
                <div
                    class="col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-start mb-4 mb-lg-0">
                    <p>© Copyright 2021. All Rights Reserved.</p>
                </div>
                <div class="col-lg-4 d-flex align-items-center justify-content-center justify-content-lg-end">
                    <nav id="sub-menu">
                        <ul>
                            <li><i class="fas fa-angle-right"></i><a href="{{ route('faq') }}"
                                    class="ml-1 text-decoration-none"> FAQ's</a></li>
                            <li><i class="fas fa-angle-right"></i><a href="{{ route('contact') }}"
                                    class="ml-1 text-decoration-none">{{ __('Contact') }}</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</footer>
