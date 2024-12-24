<div>
    <div class="table-responsive">
        <table class="table mb-0">
            <tbody>
            <tr>
                <td class="fw-medium">{{ __('Number Of Employee') }}</td>
                <td>{{ $companyProfile->payload['numberOfEmployee'] }} +</td>
            </tr>
            <tr>
                <td class="fw-medium">{{ __('Headquarters') }}</td>
                <td>{{ $companyProfile->payload['headquarters'] }}</td>
            </tr>
            <tr>
                <td class="fw-medium">{{ __('Founded in') }}</td>
                <td>{{ $companyProfile->payload['founded'] }}</td>
            </tr>
            <tr>
                <td class="fw-medium">{{ __('Phone') }}</td>
                <td>{{ $companyProfile->payload['phone'] }}</td>
            </tr>
            <tr>
                <td class="fw-medium">{{ __('Email') }}</td>
                <td>{{ $companyProfile->payload['email'] }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
