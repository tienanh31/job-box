<footer class="custom-footer bg-dark py-2 position-relative">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mt-4">
                <div>
                    <div>
                        <img src="{{ asset($settings['logoDark']) }}" alt="logo light" height="20" />
                    </div>
                    <div class="mt-4 fs-13">
                        <p>{{ $settings['siteSlogan'] }}</p>
                    </div>

                    <div class="fb-page" data-href="https://web.facebook.com/jobx.co" data-tabs="timeline" data-height="70" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://web.facebook.com/jobx.co" class="fb-xfbml-parse-ignore"><a href="https://web.facebook.com/jobx.co">Job Box</a></blockquote></div>
                </div>
            </div>

            <div class="col-lg-7 ms-lg-auto">
                <div class="row">
                    <div class="col-sm-4 mt-4">
                        <h5 class="text-white mb-0">{{ __('About Us') }}</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                <li><x-link :to="route('term-and-condition.user')">{{ __('Term And Conditions') }}</x-link></li>
                                <li><x-link :to="route('privacy-policy.user')">{{ __('Privacy Policy') }}</x-link></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-4">
                        <h5 class="text-white mb-0">{{ __('Support') }}</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                <li><x-link :to="route('faq-list.user')">{{ __('FAQs') }}</x-link></li>
                                <li><x-link :to="route('contact-us.user')">{{ __('Contact') }}</x-link></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-sm-4 mt-4">
                        <h5 class="text-white mb-0">{{ __('For Jobs') }}</h5>
                        <div class="text-muted mt-3">
                            <ul class="list-unstyled ff-secondary footer-list">
                                <li><x-link :to="route('job-list.user')">{{ __('List Of Jobs') }}</x-link></li>
                                <li><x-link :to="route('company-list.user')">{{ __('Companies') }}</x-link></li>
                                <li><x-link :to="route('student-list.user')">{{ __('Candidates') }}</x-link></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row text-center text-sm-start align-items-center mt-5">
            <div class="col-sm-6">

                <div>
                    <p class="copy-rights mb-0">
                        2024 © {{ $settings['siteName'] }}
                    </p>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end mt-sm-0">
                    <ul class="list-inline mb-3 footer-social-link">
                        @if($settings['facebook'])
                            <li class="list-inline-item">
                                <a
                                    target="_blank"
                                    href="{{ $settings['facebook'] }}" class="avatar-xs d-block">
                                    <div class="avatar-title rounded-circle">
                                        <i class="ri-facebook-fill"></i>
                                    </div>
                                </a>
                            </li>
                        @endif

                        @if($settings['youtube'])
                            <li class="list-inline-item">
                                <a
                                    target="_blank"
                                    href="{{ $settings['youtube'] }}" class="avatar-xs d-block">
                                    <div class="avatar-title rounded-circle">
                                        <i class="ri-youtube-fill"></i>
                                    </div>
                                </a>
                            </li>
                        @endif

                        @if($settings['email'])
                            <li class="list-inline-item">
                                <a
                                    href="mailto:{{ $settings['email'] }}" class="avatar-xs d-block">
                                    <div class="avatar-title rounded-circle">
                                        <i class="ri-google-fill"></i>
                                    </div>
                                </a>
                            </li>
                        @endif

                        @if($settings['phoneNumber'])
                            <li class="list-inline-item">
                                <a href="tel:{{ $settings['phoneNumber'] }}" class="avatar-xs d-block">
                                    <div class="avatar-title rounded-circle">
                                        <i class="ri-phone-line"></i>
                                    </div>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
