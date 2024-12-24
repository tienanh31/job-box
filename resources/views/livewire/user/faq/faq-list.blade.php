@php
    $categoryIcons = [
        'General Questions' => 'ri-question-line',
        'Manage Account' => 'ri-user-settings-line',
        'Privacy & Security' => 'ri-shield-keyhole-line',
    ];
@endphp

<div>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card rounded-0 bg-soft-success mx-n4 mt-n4 border-top">
                        <div class="px-4">
                            <div class="row">
                                <div class="col-xxl-5 align-self-center">
                                    <div class="py-4">
                                        <h4 class="display-6 coming-soon-text">{{ __('Frequently asked questions') }}</h4>
                                        <p class="text-success fs-15 mt-3">{{ __('If you can not find answer to your question in our FAQ, you can always contact us or email us. We will answer you shortly!') }}</p>
                                        <div class="hstack flex-wrap gap-2">
                                            <a href="mailto:{{ $settings['email'] }}" type="button" class="btn btn-primary btn-label rounded-pill"><i class="ri-mail-line label-icon align-middle rounded-pill fs-16 me-2"></i> {{ __('Email Us') }}</a>
                                            <a href="tel:{{ $settings['phoneNumber'] }}" type="button" class="btn btn-info btn-label rounded-pill"><i class="ri-phone-line label-icon align-middle rounded-pill fs-16 me-2"></i> {{ __('Call Us') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-evenly">
                        @foreach ($faqs as $category => $categoryFaqs)
                            <div class="col-lg-4">
                                <div class="mt-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-shrink-0 me-1">
                                            <i class="{{ $categoryIcons[$category] }} fs-24 align-middle text-success me-1"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="fs-16 mb-0 fw-semibold">{{ $category }}</h5>
                                        </div>
                                    </div>

                                    <div class="accordion accordion-border-box" id="{{ Str::slug($category) }}-accordion">
                                        @foreach ($categoryFaqs as $faq)
                                            <div class="accordion-item">
                                                <h2 class="accordion-header" id="{{ Str::slug($category) }}-heading{{ $loop->index }}">
                                                    <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#{{ Str::slug($category) }}-collapse{{ $loop->index }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="{{ Str::slug($category) }}-collapse{{ $loop->index }}">
                                                        {{ $faq->question }}
                                                    </button>
                                                </h2>
                                                <div id="{{ Str::slug($category) }}-collapse{{ $loop->index }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" aria-labelledby="{{ Str::slug($category) }}-heading{{ $loop->index }}" data-bs-parent="#{{ Str::slug($category) }}-accordion">
                                                    <div class="accordion-body">
                                                        {!! $faq->answer !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if(! $faqs->count())
                            <div class="col-lg-12">
                                <x-admin.empty></x-admin.empty>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
