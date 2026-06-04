<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Interview extends Model
{
    use HasFactory;

    protected $fillable = [
        'application_id',
        'type',
        'scheduled_at',
        'notes',
        'result',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    // ─── Labels FR ───────────────────────────────────────────────

    public const TYPE_LABELS = [
        'phone'     => 'Téléphonique',
        'video'     => 'Visioconférence',
        'onsite'    => 'Présentiel',
        'technical' => 'Technique',
        'hr'        => 'RH',
    ];

    public const RESULT_LABELS = [
        'pending'   => 'En attente',
        'passed'    => 'Réussi',
        'failed'    => 'Échoué',
        'cancelled' => 'Annulé',
    ];

    public const RESULT_COLORS = [
        'pending'   => 'bg-gray-100 text-gray-700',
        'passed'    => 'bg-green-100 text-green-800',
        'failed'    => 'bg-red-100 text-red-800',
        'cancelled' => 'bg-yellow-100 text-yellow-800',
    ];

    public function getTypeLabelAttribute(): string
    {
        return self::TYPE_LABELS[$this->type] ?? $this->type;
    }

    public function getResultLabelAttribute(): string
    {
        return self::RESULT_LABELS[$this->result] ?? $this->result;
    }

    public function getResultColorAttribute(): string
    {
        return self::RESULT_COLORS[$this->result] ?? 'bg-gray-100 text-gray-700';
    }

    // ─── Relationships ────────────────────────────────────────────

    public function application(): BelongsTo
    {
        return $this->belongsTo(Application::class);
    }
}