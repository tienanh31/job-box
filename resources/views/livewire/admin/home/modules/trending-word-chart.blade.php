<div>
    <x-admin.chart
        id="trendingWordChart"
        :options="[
            'series' => $wordsCount,
            'chart' => [
                'type' => 'pie'
                ],
            'labels' => $name,
            'title' => [
                'text' => __('Outstanding Keyword Statistics')
            ],
            'noData' => [
                'text' => __('There is no data to display at the moment.')
            ]
        ]"
    ></x-admin.chart>
</div>
