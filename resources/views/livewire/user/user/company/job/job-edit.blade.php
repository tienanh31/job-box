<div>
    <div class="page-content">
        <div class="container mt-5">
            <div class="row mt-n5">
                <div class="col-lg-3">
                    <x-user.user.sidebar-profile-layout></x-user.user.sidebar-profile-layout>
                </div>

                <div class="col-lg-9">
                    <x-admin.card>
                        <x-form wire:submit.prevent="updateJob">
                            <div class="row">
                                <div class="col-lg-6">
                                    <x-admin.input
                                        :label="__('Job Name')"
                                        class="form-control"
                                        type="text"
                                        id="name"
                                        name="name"
                                        model="name"
                                        placeholder="{{ __('Enter name') }}"
                                    ></x-admin.input>
                                </div>

                                <div class="col-lg-6">
                                    <x-admin.input
                                        :label="__('Job Position')"
                                        class="form-control"
                                        type="text"
                                        id="position"
                                        name="position"
                                        model="position"
                                        placeholder="{{ __('Enter position') }}"
                                    ></x-admin.input>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">{{ __('Category') }} <span class="text-danger">*</span></label>
                                    <select class="form-select" wire:model="category">
                                        <option value="">{{ __('Choose An Option') }}</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label class="form-label">{{ __('Type') }} <span class="text-danger">*</span></label>
                                    <select class="form-select" wire:model="type">
                                        <option value="">{{ __('Choose An Option') }}</option>
                                        <option value="Full Time">{{ __('Full Time') }}</option>
                                        <option value="Part Time">{{ __('Part Time') }}</option>
                                        <option value="Freelance">{{ __('Freelance') }}</option>
                                        <option value="Internship">{{ __('Internship') }}</option>
                                    </select>

                                    @error('type')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-12">
                                    <x-admin.editor
                                        :label="__('Description')"
                                        class="form-control"
                                        type="text"
                                        id="description"
                                        name="description"
                                        model="description"
                                        rows="7"
                                        placeholder="{{ __('Enter content') }}"
                                    >
                                    </x-admin.editor>
                                </div>

                                <div class="col-lg-4">
                                    <x-admin.input
                                        :label="__('No. of Vacancy')"
                                        class="form-control"
                                        type="number"
                                        id="vacancy"
                                        name="vacancy"
                                        model="vacancy"
                                        placeholder="{{ __('Enter vacancy') }}"
                                    ></x-admin.input>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">{{ __('Experiences') }} <span class="text-danger">*</span></label>
                                    <select class="form-select" wire:model="experience">
                                        <option value="">{{ __('Choose An Option') }}</option>
                                        <option value="0">{{ __('0 Year') }}</option>
                                        <option value="1">{{ __('1 Year') }}</option>
                                        <option value="2">{{ __('2 Years') }}</option>
                                        <option value="3">{{ __('3 Years') }}</option>
                                        <option value="more">{{ __('More 3 Years') }}</option>
                                    </select>

                                    @error('experience')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-4">
                                    <x-admin.datepicker
                                        :label="__('Deadline For Filing')"
                                        class="form-control"
                                        type="text"
                                        id="deadlineForFiling"
                                        name="deadlineForFiling"
                                        model="deadlineForFiling"
                                    ></x-admin.datepicker>
                                </div>

                                <div class="col-lg-6">
                                    <x-admin.input
                                        :label="__('Salary Min')"
                                        class="form-control"
                                        id="min"
                                        name="min"
                                        model="min"
                                        placeholder="{{ __('Enter min (VND)') }}"
                                        x-mask:dynamic="$money($input, ',')"
                                        x-data
                                        :require="false"
                                    ></x-admin.input>
                                </div>

                                <div class="col-lg-6">
                                    <x-admin.input
                                        :label="__('Salary Max')"
                                        class="form-control"
                                        id="max"
                                        name="max"
                                        model="max"
                                        placeholder="{{ __('Enter max (VND)') }}"
                                        x-mask:dynamic="$money($input, ',')"
                                        x-data
                                        :require="false"
                                    ></x-admin.input>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">{{ __('Provinces') }} <span class="text-danger">*</span></label>
                                    <select class="form-select" wire:model.live="provinceId">
                                        @if(! $provinceId)
                                            <option value="">{{ __('Choose Your Province') }}</option>
                                        @endif
                                        @foreach($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('provinceId')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">{{ __('Districts') }} <span class="text-danger">*</span></label>
                                    <select class="form-select" wire:model.live="districtId">
                                        @if(! $districtId)
                                            <option value="">{{ __('Choose A District') }}</option>
                                        @endif
                                        @foreach($districts as $district)
                                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('districtId')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">{{ __('Wards') }} <span class="text-danger">*</span></label>
                                    <select class="form-select" wire:model.live="wardId">
                                        @if(! $wardId)
                                            <option value="">{{ __('Choose A Ward') }}</option>
                                        @endif
                                        @foreach($wards as $ward)
                                            <option value="{{ $ward->id }}">{{ $ward->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('wardId')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-lg-6">
                                    <x-admin.input
                                        :label="__('Latitude')"
                                        class="form-control"
                                        type="text"
                                        id="latitude"
                                        name="latitude"
                                        model="latitude"
                                        placeholder="{{ __('Enter latitude') }}"
                                    ></x-admin.input>
                                </div>

                                <div class="col-lg-6">
                                    <x-admin.input
                                        :label="__('Longitude')"
                                        class="form-control"
                                        type="text"
                                        id="longitude"
                                        name="longitude"
                                        model="longitude"
                                        placeholder="{{ __('Enter longitude') }}"
                                    ></x-admin.input>
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <span class="text-primary">
                                        {!! __('You can get your exact coordinates from: :here', ['here' => '<a class="link-info" href="https://www.latlong.net/convert-address-to-lat-long.html" target="_blank">click here</a>']) !!}
                                    </span>
                                </div>

                                @if($addresses->count() > 0)
                                    <div class="col-lg-12 mb-3">
                                        <ol>
                                            @foreach($addresses as $key => $address)
                                                <li>
                                                    <p>
                                                        {{ __('Address: :ward, :district, :province', ['ward' => $address->ward->name, 'district' => $address->district->name, 'province' => $address->province->name]) }}
                                                        <span
                                                            style="cursor: pointer"
                                                            wire:click="deleteAddress({{ $address->id }})"
                                                            class="badge badge-soft-danger">{{ __('Delete') }}</span>
                                                    </p>
                                                </li>
                                            @endforeach
                                        </ol>
                                    </div>
                                @endif

                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                        <x-button
                                            type="submit"
                                            class="btn btn-primary">{{ __('Save Data') }}</x-button>
                                    </div>
                                </div>
                            </div>
                        </x-form>
                    </x-admin.card>

                    <div>
                        <livewire:user.user.company.job.job-candidate wire:key="jobCandidate" :job="$job"></livewire:user.user.company.job.job-candidate>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
