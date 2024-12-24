<div>
    <x-admin.chart
        id="jobChart"
        :options='[
            "series" => [
                [
                    "name" => __("Current Year Jobs"),
                    "data" => $currentYearJobs
                ],
                [
                    "name" => __("Previous Year Jobs"),
                    "data" => $previousYearJobs
                ],
            ],
            "dataLabels" => [
                "enabled" => false,
            ],
            "xaxis" => [
                "categories" => $labels
            ],
            "chart" => [
                "type" => "area",
            ],
            "title" => [
                "text" => __("Compare The Number Of Jobs Posted With The Previous Year"),
            ],
            "noData" => [
                "text" => __("There is no data to display at the moment.")
            ],
        ]'
    ></x-admin.chart>
</div>
