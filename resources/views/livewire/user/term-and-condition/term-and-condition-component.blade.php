<div>
    <div class="container-fluid">
        <div class="page-content">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="bg-soft-warning position-relative">
                            <div class="card-body p-5">
                                <div class="text-center">
                                    <h3>{{ __('Term And Conditions') }}</h3>
                                </div>
                            </div>
                            <div class="shape">
                                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" width="1440" height="60" preserveAspectRatio="none" viewBox="0 0 1440 60">
                                    <g mask="url(&quot;#SvgjsMask1001&quot;)" fill="none">
                                        <path d="M 0,4 C 144,13 432,48 720,49 C 1008,50 1296,17 1440,9L1440 60L0 60z" style="fill: var(--vz-card-bg-custom);"></path>
                                    </g>
                                    <defs>
                                        <mask id="SvgjsMask1001">
                                            <rect width="1440" height="60" fill="#ffffff"></rect>
                                        </mask>
                                    </defs>
                                </svg>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            {!! $settings['termAndCondition'] !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
