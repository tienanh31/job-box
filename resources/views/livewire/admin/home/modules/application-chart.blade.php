<div>
    <div class="row">
        <div class="col-lg-6">
            <x-admin.chart
                id="applyJobAcceptedChart"
                :options="[
                    'chart' => [
                        'type' => 'bar'
                        ],
                    'series' => [
                        [
                            'name' => __('By Year'),
                            'data' => $acceptedData
                        ]
                    ],
                    'xaxis' => [
                        'categories' => $acceptedLabels
                    ],
                    'title' => [
                        'text' => __('Number Of Accepted Job Applications By Year'),
                    ],
                    'noData' => [
                        'text' => __('There is no data to display at the moment.')
                    ]
                ]"
            ></x-admin.chart>
        </div>

        <div class="col-lg-6">
            <x-admin.chart
                id="applyJobRejectedChart"
                :options="[
                    'chart' => [
                        'type' => 'bar'
                        ],
                    'series' => [
                        [
                            'name' => __('By Year'),
                            'data' => $rejectedData,
                        ]
                    ],
                    'xaxis' => [
                        'categories' => $rejectedLabels,
                        ],
                    'title' => [
                        'text' => __('Number Of Rejected Job Applications By Year'),
                    ],
                    'noData' => [
                        'text' => __('There is no data to display at the moment.')
                    ],
                ]"
            ></x-admin.chart>
        </div>
    </div>
</div>
