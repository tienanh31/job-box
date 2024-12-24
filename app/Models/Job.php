<?php

namespace App\Models;

use App\Traits\GetYearResult;
use App\Traits\Label;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use SoftDeletes;
    use Label;
    use GetYearResult;

    protected $table = 'jobs';

    protected $fillable = [
        'name',
        'description',
        'position',
        'experience',
        'vacancy',
        'deadline_for_filing',
        'type',
        'min_salary',
        'max_salary',
        'status',
        'company_id',
        'category_id',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(User::class, 'company_id');
    }

    public function wishlists(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'wishlists', 'job_id', 'student_id')
            ->withTimestamps();
    }

    public function applications(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'applications', 'job_id', 'student_id')
            ->withPivot(['presentation', 'status'])
            ->withTimestamps();
    }

    protected static function boot(): void
    {
        parent::boot();

        static::deleting(function ($job) {
            if ($job->isForceDeleting()) {
                $job->addresses()->delete();
                $job->wishlists()->detach();
                $job->applications()->detach();
            }
        });
    }

    public function scopeGroupByMonth(Builder $query): array
    {
        $currentYear = date('Y');
        $previousYear = $currentYear - 1;

        $currentYearResults = $this->getYearResults($query, $currentYear);
        $previousYearResults = $this->getYearResults($query, $previousYear);

        $labels = $this->getLabels($currentYearResults, $previousYearResults);
        $currentYearJobs = $this->getJobCounts($currentYearResults);
        $previousYearJobs = $this->getJobCounts($previousYearResults);

        return compact('labels', 'currentYearJobs', 'previousYearJobs');
    }

    private function getJobCounts(Collection $results): array
    {
        return $results->pluck('count')->toArray();
    }

    public static function getJobsLimit(string $searchTerm)
    {
        return Job::where(function ($query) use ($searchTerm) {
            $query->where('name', 'like', '%' . $searchTerm . '%')
                ->orWhere('description', 'like', '%' . $searchTerm . '%');
        })
            ->where('status', 'show')
            ->orderByDesc('created_at')
            ->limit(5)
            ->get();
    }
}
