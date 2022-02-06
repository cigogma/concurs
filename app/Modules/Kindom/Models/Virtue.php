<?php

namespace App\Modules\Kindom\Models;

use App\Modules\Kindom\Concerns\Knight as IKnight;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $knight_id
 * @property stirng $name
 * @property int $value
 */
class Virtue extends Model
{
    public $fillable = [
        'name',
        'value'
    ];

    public function knight()
    {
        $this->belongsTo(Knight::class);
    }
}
