<?php

namespace App\Models;

use App\Enums\ImageType;
use App\Traits\GetYearResult;
use App\Traits\Label;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use AuthenticationLoggable;
    use HasRoles;
    use Label;
    use GetYearResult;
    use CanResetPassword;

    protected $fillable = [
        'email',
        'is_root',
        'password',
        'provider_id',
        'auth_type',
        'email_verified_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function avatar(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable')
            ->where('type', '=', ImageType::Avatar);
    }

    public function applications(): BelongsToMany
    {
        return $this->belongsToMany(Job::class, 'applications', 'student_id', 'job_id')
            ->withPivot(['presentation', 'status'])
            ->withTimestamps();
    }

    public function wishlists(): BelongsToMany
    {
        return $this->belongsToMany(Job::class, 'wishlists', 'student_id', 'job_id')
            ->withTimestamps();
    }

    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class, 'company_id');
    }

    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    public function studentProfile(): MorphOne
    {
        return $this->morphOne(Profile::class, 'profileable')
            ->where('type', 'Student');
    }

    public function companyProfile(): MorphOne
    {
        return $this->morphOne(Profile::class, 'profileable')
            ->where('type', 'Company');
    }

    public function educations(): HasMany
    {
        return $this->hasMany(Education::class, 'student_id');
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class, 'student_id');
    }

    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class, 'student_id');
    }

    public function awards(): HasMany
    {
        return $this->hasMany(Award::class, 'student_id');
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class, 'student_id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'student_id');
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'student_id');
    }

    public function socialActivities(): HasMany
    {
        return $this->hasMany(SocialActivity::class, 'student_id');
    }

    public function skills(): MorphMany
    {
        return $this->morphMany(Skill::class, 'skillable');
    }

    public function twoFactorAuthentication(): HasOne
    {
        return $this->hasOne(TwoFactorAuthentication::class, 'user_id');
    }

    public function scopeGroupByMonth(Builder $query): array
    {
        $currentYear = date('Y');
        $previousYear = $currentYear - 1;

        $currentYearResults = $this->getYearResults($query, $currentYear);
        $previousYearResults = $this->getYearResults($query, $previousYear);

        $labels = $this->getLabels($currentYearResults, $previousYearResults);
        $currentYearUsers = $this->getUserCounts($currentYearResults);
        $previousYearUsers = $this->getUserCounts($previousYearResults);

        return compact('labels', 'currentYearUsers', 'previousYearUsers');
    }

    private function getUserCounts(Collection $results): array
    {
        return $results->pluck('count')->toArray();
    }
}
