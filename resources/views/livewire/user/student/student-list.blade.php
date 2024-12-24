<div>
    <div class="page-content">
        <div class="container">
            <div class="col-lg-12">
                <div class="row row-cols-xl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                    @foreach($students as $student)
                        <div class="col mt-4">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img src="{{ $student->avatar != null ? asset($student->avatar->url) : asset('assets/images/users/avatar-1.jpg') }}" alt="" class="avatar-md rounded-circle object-cover mt-n5 img-thumbnail border-light mx-auto d-block">
                                    <a
                                        target="_blank"
                                        href="{{ route('user-resume-preview.user', ['id' => $student->id]) }}">
                                        <h5 class="mt-2 mb-1">{{ $student->studentProfile->payload['firstName'] }} {{ $student->studentProfile->payload['lastName'] }}</h5>
                                    </a>
                                    <p
                                        class="text-muted mb-2" title="{{ $student->studentProfile->payload['email'] }}">{!! Str::limit($student->studentProfile->payload['email'], 20) !!}</p>
                                    <a
                                        target="_blank"
                                        href="{{ route('user-resume-preview.user', ['id' => $student->id]) }}"
                                        class="btn btn-soft-success w-100">{{ __('View Resume') }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    @if(! $students->count())
                        <div class="col-lg-12 py-4">
                            <x-admin.empty></x-admin.empty>
                        </div>
                    @endif

                    @if($students->hasPages())
                        <div class="col-lg-12 mt-4">
                            <div class="d-flex align-items-center justify-content-center">
                                {{ $students->onEachSide(0)->links() }}
                            </div>
                        </div>
                    @endif

                    <div class="text-center my-2" wire:loading>
                        <span class="text-primary"><i class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i>{{ __('Loading...') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
