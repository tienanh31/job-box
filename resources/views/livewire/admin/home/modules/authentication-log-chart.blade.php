<div>
    <x-admin.chart
        id="authenticationLogChart"
        :options="[
            'chart' => [
                'type' => 'bar'
                ],
            'series' => [
                [
                    'name' => __('By Quantity'),
                    'data' => $authenticationLogs
                ]
            ],
            'xaxis' => [
                'categories' => $labels
                ],
            'title' => [
                'text' => __('Number Of Users Accessing The System')
            ],
            'noData' => [
                'text' => __('There is no data to display at the moment.')
            ],
        ]"
    ></x-admin.chart>
</div>
