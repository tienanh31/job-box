<div>
    <x-admin.chart
        id="userChart"
        :options='[
            "series" => [
                [
                    "name" => __("Current Year Users"),
                    "data" => $currentYearUsers
                ],
                [
                    "name" => __("Previous Year Users"),
                    "data" => $previousYearUsers
                ],
            ],
            "chart" => [
                "type" => "area",
            ],
            "dataLabels" => [
                "enabled" => false,
            ],
            "xaxis" => [
                "categories" => $labels
            ],
             "title" => [
                "text" => __("Compare The Number Of Users With The Previous Year"),
            ],
            "noData" => [
                "text" => __("There is no data to display at the moment.")
            ],
        ]'
    ></x-admin.chart>
</div>
