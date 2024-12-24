<div>
    <x-admin.chart
        id="jobOfCompanyByMonthly"
        :options="[
            'chart' => [
                'type' => 'bar'
            ],
            'series' => [
               [
                    'name' => __('By Month'),
                    'data' => $data
               ]
            ],
            'xaxis' => [
                'categories' => $labels
            ],
            'title' => [
                'text' => __('Number Of Monthly Jobs In The Current Year'),
            ],
            'noData' => [
                'text' => __('There is no data to display at the moment.')
            ]
        ]"
    ></x-admin.chart>
</div>
