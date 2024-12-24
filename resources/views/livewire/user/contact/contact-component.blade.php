<div>
    <div class="container-fluid">
        <div class="page-content">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="bg-soft-warning position-relative">
                            <div class="card-body p-5">
                                <div class="text-center">
                                    <h3>{{ __('Contact Us') }}</h3>
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
                            <x-form wire:submit.prevent="sendContact">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <x-admin.input
                                            :label="__('Name')"
                                            class="form-control"
                                            id="name"
                                            name="name"
                                            model="name"
                                            type="text"
                                            :placeholder="__('Enter your name')"
                                        ></x-admin.input>
                                    </div>

                                    <div class="col-lg-4">
                                        <x-admin.input
                                            :label="__('Email')"
                                            class="form-control"
                                            id="email"
                                            name="email"
                                            model="email"
                                            type="email"
                                            :placeholder="__('Enter your email')"
                                        ></x-admin.input>
                                    </div>

                                    <div class="col-lg-4">
                                        <x-admin.input
                                            :label="__('Subject')"
                                            class="form-control"
                                            id="subject"
                                            name="subject"
                                            model="subject"
                                            :placeholder="__('Enter subject')"
                                            type="text"
                                        ></x-admin.input>
                                    </div>

                                    <div class="col-lg-12">
                                        <x-admin.input.textarea
                                            :label="__('Message')"
                                            class="form-control"
                                            type="text"
                                            name="message"
                                            model="message"
                                            :placeholder="__('Enter message')"
                                            rows="10"
                                        ></x-admin.input.textarea>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <x-button
                                                type="submit"
                                                class="btn btn-primary">{{ __('Send Message') }}</x-button>
                                        </div>
                                    </div>
                                </div>
                            </x-form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
