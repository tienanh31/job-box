<div>
    @include('admin.partials.page-title')

    <div class="row">
        <div class="col-lg-12">
            <livewire:admin.home.modules.statistics-component wire:key="statisticsComponent"></livewire:admin.home.modules.statistics-component>
        </div>

        <div class="col-lg-12">
            <livewire:admin.home.modules.job-chart wire:key="jobChartComponent"></livewire:admin.home.modules.job-chart>
        </div>

        <div class="col-lg-12">
            <livewire:admin.home.modules.application-chart wire:key="applicationChartComponent"></livewire:admin.home.modules.application-chart>
        </div>

        <div class="col-lg-12">
            <livewire:admin.home.modules.student-job-application-chart wire:key="studentJobApplicationChartComponent"></livewire:admin.home.modules.student-job-application-chart>
        </div>

        <div class="col-lg-12">
            <livewire:admin.home.modules.user-chart wire:key="userChartComponent"></livewire:admin.home.modules.user-chart>
        </div>

        <div class="col-lg-12">
            <livewire:admin.home.modules.company-chart wire:key="companyChartComponent"></livewire:admin.home.modules.company-chart>
        </div>

        <div class="col-lg-6">
            <livewire:admin.home.modules.authentication-log-chart wire:key="authenticationLogChartComponent"></livewire:admin.home.modules.authentication-log-chart>
        </div>

        <div class="col-lg-6">
            <livewire:admin.home.modules.trending-word-chart wire:key="trendingWordChartComponent"></livewire:admin.home.modules.trending-word-chart>
        </div>
    </div>
</div>
