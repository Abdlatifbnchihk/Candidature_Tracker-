<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{
    //

    public const TYPE_LABELS = [
        'phone' => 'Téléphonique',
        'video' => 'Visioconférence',
        'onsite' => 'Présentiel',
        'technical' => 'Technique',
        'hr' => 'RH',
    ];
}
