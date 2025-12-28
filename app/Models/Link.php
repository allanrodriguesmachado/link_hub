<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Link extends Model
{
    use HasFactory, Notifiable;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'url',
        'sort'
    ];


    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($model) {
           $model->sort = static::max('sort') + 1;
        });
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
