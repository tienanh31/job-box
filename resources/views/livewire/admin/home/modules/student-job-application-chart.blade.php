<div>
    <div class="row">
        <div class="col-lg-6">
            <x-admin.chart
                id="studentAcceptedJobApplicationChart"
                :options="[
                    'chart' => [
                        'type' => 'bar'
                        ],
                    'series' => [
                        [
                            'name' => __('By Course'),
                            'data' => $acceptedStudentJobCounts
                        ]
                    ],
                    'xaxis' => [
                        'categories' => $acceptedStudentJobLabels
                    ],
                    'title' => [
                        'text' => __('Number Of Accepted Job Applications By Course'),
                    ],
                    'noData' => [
                        'text' => __('There is no data to display at the moment.')
                    ],
                ]"
            ></x-admin.chart>
        </div>

        <div class="col-lg-6">
            <x-admin.chart
                id="studentRejectedJobApplicationChart"
                :options="[
                    'chart' => [
                        'type' => 'bar'
                        ],
                    'series' => [
                        [
                            'name' => __('By Course'),
                            'data' => $rejectedStudentJobCounts
                        ]
                    ],
                    'xaxis' => [
                        'categories' => $rejectedStudentJobLabels
                        ],
                    'title' => [
                        'text' => __('Number Of Rejected Job Applications By Course'),
                    ],
                    'noData' => [
                        'text' => __('There is no data to display at the moment.')
                    ],
                ]"
            ></x-admin.chart>
        </div>
    </div>
</div>
