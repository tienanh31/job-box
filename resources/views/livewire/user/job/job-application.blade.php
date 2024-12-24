<div>
    <div class="page-content">
        <div class="container-fluid">
            <x-admin.card>
                <x-form wire:submit.prevent="applyJob">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div
                                        wire:ignore
                                        x-data
                                        x-init="
                                                        FilePond.create($refs.input);
                                                        FilePond.setOptions({
                                                            allowMultiple: false,
                                                            server: {
                                                                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                                                    @this.upload('resume', file, load, error, progress)

                                                                },
                                                                revert: (filename, load) => {
                                                                    @this.removeUpload('resume', filename, load)
                                                                },
                                                            },
                                                        });
                                                        ">
                                        <label>{{ __('Upload Your Resume') }}</label>
                                        <input
                                            type="file"
                                            x-ref="input"
                                            wire:model="resume">
                                    </div>

                                    @error('resume')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-12">
                                    <x-admin.input.textarea
                                        name="presentation"
                                        model="presentation"
                                        id="presentation"
                                        :label="__('Presentation')"
                                        :placeholder="__('Enter presentation')"
                                        rows="10"
                                        class="form-control"></x-admin.input.textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-8">
                            <div class="col-lg-12">
                                <div class="alert alert-info alert-border-left">
                                    <i class="ri-information-line me-3 align-middle"></i> <strong>{{ __('Job Information') }}</strong>
                                    <div class="d-flex my-3 align-items-center">
                                        <div class="flex-shrink-0">
                                            <img src="{{ $job->company->avatar != null ? asset($job->company->avatar->url) : asset('assets/images/users/avatar-1.jpg') }}" alt="{{ $job->company->name }}" title="{{ $job->company->companyProfile->payload['name'] }}" class="avatar-sm rounded-circle">
                                        </div>
                                        <div class="flex-grow-1 ms-2 text-info">
                                            <h5 class="card-title mb-1">{{ $job->name }}</h5>
                                            <p class="text-muted mb-1">{{ $job->position }}</p>
                                            <h6 class="mb-1">{{ __(':min - :max', ['min' => $job->min_salary > 0 ? BaseHelper::moneyFormatForHumans($job->min_salary) : __('N/A'), 'max' => $job->max_salary ? BaseHelper::moneyFormatForHumans($job->max_salary) : __('N/A')]) }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="alert alert-warning alert-border-left" role="alert">
                                    <i class="ri-alert-line me-3 align-middle"></i> <strong>{{ __('Attention') }}</strong>
                                    <ol>
                                        <li>{{ __('For the best experience, you should use popular browsers like Google Chrome or Firefox.') }}</li>
                                        <li>{{ __('Please always be careful during the job search process and proactively research company information and job positions before applying.') }}</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="hstack gap-2 justify-content-end">
                                <x-button
                                    type="submit"
                                    class="btn btn-primary">
                                    <i wire:loading
                                       wire:target="applyJob"
                                       class="mdi mdi-loading mdi-spin align-middle me-2"></i>
                                    <i wire:loading.attr="hidden"
                                       wire:target="applyJob"
                                       class="ri-mail-send-line align-bottom me-1"></i>
                                    {{ __('Apply Job') }}</x-button>
                            </div>
                        </div>
                    </div>
                </x-form>
            </x-admin.card>
        </div>
    </div>
</div>
