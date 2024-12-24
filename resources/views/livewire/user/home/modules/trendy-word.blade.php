<div>
    @if(count($trendingWords))
        <ul class="treding-keywords list-inline mb-0 mt-3 fs-13">
            <li class="list-inline-item text-danger fw-semibold"><i class="mdi mdi-tag-multiple-outline align-middle"></i> {{ __('Trending Keywords:') }}</li>
            @foreach($trendingWords as $word)
                <li class="list-inline-item">
                    <x-link
                        :to="route('job-list.user')">
                        {{ $word->name }} @if(! $loop->last) , @endif</x-link>
                </li>
            @endforeach
        </ul>
    @endif
</div>
