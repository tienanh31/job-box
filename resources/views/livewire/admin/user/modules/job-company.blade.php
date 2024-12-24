<div>
    <div>
        <x-admin.chart
            id="jobOfCompanyChart"
            :options="[
            'series' => [
                $acceptedJob ?? 0,
                $rejectedJob ?? 0,
            ],
            'chart' => [
                'type' => 'pie'
                ],
            'labels' => [
                __('Accepted'),
                __('Rejected'),
            ],
            'title' => [
                'text' => __('Number Of Accepted/Rejected Jobs'),
            ],
            'noData' => [
                'text' => __('There is no data to display at the moment.')
            ],
        ]"
        ></x-admin.chart>
    </div>
</div>
