<div>
    <x-admin.card :header="__('Candidates Of Job')">
        <ul class="list-group pt-4">
            @foreach($applicants as $applicant)
                <li class="list-group-item list-group-item-action">
                    <div class="float-end">
                        <select wire:model="statuses.{{ $applicant->id }}" wire:change="updateStatus({{ $applicant->id }}, $event.target.value)" class="form-control">
                            <option value="pending">{{ __('Pending') }}</option>
                            <option value="reviewed">{{ __('Reviewed') }}</option>
                            <option value="shortlisted">{{ __('Shortlisted') }}</option>
                            <option value="interviewed">{{ __('Interviewed') }}</option>
                            <option value="offered">{{ __('Offered') }}</option>
                            <option value="accepted">{{ __('Accepted') }}</option>
                            <option value="rejected">{{ __('Rejected') }}</option>
                        </select>
                    </div>

                    <div class="d-flex mb-2 align-items-center">
                        <div class="flex-grow-1 ms-3">
                            <h5 class="list-title fs-15 mb-1">{{ $applicant->studentProfile->payload['firstName'] }} {{ $applicant->studentProfile->payload['lastName'] }}</h5>
                            <p class="list-text mb-0 fs-12">{{ $applicant->studentProfile->payload['email'] }}</p>
                            <p class="list-text fs-12">{{ __('Course: :course, Major: :major', ['course' => $applicant->studentProfile->payload['course'], 'major' => $applicant->studentProfile->payload['major']]) }}</p>
                        </div>
                    </div>
                </li>
            @endforeach

            @if(! $applicants->count())
                <x-admin.empty></x-admin.empty>
            @endif

            <div class="col-lg-12 d-flex gap-3 justify-content-end align-items-end py-3">
                @if ($currentPage > 1)
                    <button class="btn btn-outline-primary btn-sm" wire:click="previousPage">
                        <i class="ri-arrow-left-line align-bottom me-1"></i>
                    </button>
                @endif

                @if ($applicants->count() >= $perPage)
                    <button class="btn btn-outline-primary btn-sm" wire:click="nextPage">
                        <i class="ri-arrow-right-line align-bottom me-1"></i>
                    </button>
                @endif
            </div>
        </ul>
    </x-admin.card>
</div>
