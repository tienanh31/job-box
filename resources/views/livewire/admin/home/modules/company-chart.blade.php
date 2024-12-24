<div>
    <x-admin.chart
        id="companyChart"
        :options="[
            'chart' => [
                'type' => 'bar'
                ],
            'series' => [
                [
                    'name' => __('Number Of Job Postings'),
                    'data' => $jobCounts
                ]
            ],
            'xaxis' => [
                'categories' => $companyNames
                ],
            'title' => [
                'text' => __('Top 10 Companies With The Highest Number Of Job Postings')
            ],
            'noData' => [
                'text' => __('There is no data to display at the moment.')
            ],
        ]"
    ></x-admin.chart>
</div>
