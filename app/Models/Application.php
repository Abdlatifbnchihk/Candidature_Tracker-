<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'company',
        'position',
        'url',
        'status',
        'priority',
        'notes',
        'file_path',
        'applied_at',
    ];

    protected $casts = [
        'applied_at' => 'date',
        'deleted_at' => 'datetime',
    ];

    public const STATUS_LABELS = [
        'applied'        => 'Candidature envoyée',
        'phone_screen'   => 'Entretien téléphonique',
        'interview'      => 'Entretien',
        'technical_test' => 'Test technique',
        'offer'          => 'Offre reçue',
        'rejected'       => 'Refusée',
        'accepted'       => 'Acceptée',
    ];

    public const PRIORITY_LABELS = [
        'low'    => 'Faible',
        'medium' => 'Moyenne',
        'high'   => 'Haute',
    ];

    public const STATUS_COLORS = [
        'applied'        => 'bg-blue-100 text-blue-800',
        'phone_screen'   => 'bg-purple-100 text-purple-800',
        'interview'      => 'bg-yellow-100 text-yellow-800',
        'technical_test' => 'bg-orange-100 text-orange-800',
        'offer'          => 'bg-green-100 text-green-800',
        'rejected'       => 'bg-red-100 text-red-800',
        'accepted'       => 'bg-emerald-100 text-emerald-800',
    ];

    public const PRIORITY_COLORS = [
        'low'    => 'bg-gray-100 text-gray-700',
        'medium' => 'bg-blue-100 text-blue-700',
        'high'   => 'bg-red-100 text-red-700',
    ];

    public function getStatusLabelAttribute(): string
    {
        return self::STATUS_LABELS[$this->status] ?? $this->status;
    }

    public function getPriorityLabelAttribute(): string
    {
        return self::STATUS_LABELS[$this->status] ?? $this->priority;
    }

    public function getStatusColorLabelAttribute(): string
    {
        return self::STATUS_LABELS[$this->status] ?? 'bg-gray-100 text-gray-700';
    }

    public function getPriorityColorAttribute(): string
    {
        return self::STATUS_LABELS[$this->status] ?? 'bg-gray-100 text-gray-700';
    }


     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function interviews(): HasMany
    {
        return $this->hasMany(Interview::class)->orderBy('scheduled_at');
    }

    protected static function booted(): void
    {
        static::forceDeleting(function (Application $application) {
            if ($application->file_path) {
                \Illuminate\Support\Facades\Storage::disk('local')->delete($application->file_path);
            }
        });
    }
}
