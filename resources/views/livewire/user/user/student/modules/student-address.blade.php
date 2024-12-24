<div>
    <x-form wire:submit.prevent="saveAddress">
        <div class="row">
            <div class="col-lg-6">
                <x-admin.input
                    :label="__('House number')"
                    class="form-control"
                    type="text"
                    id="houseNumber"
                    name="houseNumber"
                    model="houseNumber"
                    placeholder="{{ __('Enter house number') }}"
                    :require="false"
                ></x-admin.input>
            </div>

            <div class="col-lg-6">
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

            <div class="col-lg-6">
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

            <div class="col-lg-6 mb-3">
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

            <div class="col-lg-12">
                <div class="hstack gap-2 justify-content-end">
                    <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <x-button
                        type="submit"
                        class="btn btn-primary">{{ __('Create New') }}</x-button>
                </div>
            </div>
        </div>
    </x-form>
</div>
