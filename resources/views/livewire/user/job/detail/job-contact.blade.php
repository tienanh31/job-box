<div>
    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">{{ __('Contact Job') }}</h5>
        </div>
        <div class="card-body">
            <x-form wire:submit.prevent="sendContact">
                <x-admin.input
                    :label="__('Name')"
                    class="form-control"
                    id="name"
                    name="name"
                    model="name"
                    type="text"
                    :placeholder="__('Enter your name')"
                ></x-admin.input>

                <x-admin.input
                    :label="__('Email')"
                    class="form-control"
                    id="email"
                    name="email"
                    model="email"
                    type="email"
                    :placeholder="__('Enter your email')"
                ></x-admin.input>

                <x-admin.input
                    :label="__('Subject')"
                    class="form-control"
                    id="subject"
                    name="subject"
                    model="subject"
                    :placeholder="__('Enter subject')"
                    type="text"
                ></x-admin.input>

                <x-admin.input.textarea
                    :label="__('Message')"
                    class="form-control"
                    type="text"
                    name="message"
                    model="message"
                    :placeholder="__('Enter message')"
                    rows="7"
                ></x-admin.input.textarea>

                <div class="text-end">
                    <x-button
                        type="submit"
                        class="btn btn-primary">{{ __('Send Message') }}</x-button>
                </div>
            </x-form>
        </div>
    </div>
</div>
