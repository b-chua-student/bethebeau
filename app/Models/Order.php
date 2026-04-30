<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Order extends Model
{
    use HasFactory, Searchable;

    const UPDATED_AT = null; // disable Laravel's auto updated_at
    const CREATED_AT = null; // disable Laravel's auto updated_at

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'user_id',
        'email',
        'shipped_to',
        'status',
        'total_price',
        'ordered_at',
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
        'ordered_at'  => 'datetime',
        'updated_at'  => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) \Illuminate\Support\Str::uuid();
        });
    }

    public function toSearchableArray(): array
    {
        return [
            'email'       => $this->email,
            'shipped_to'  => $this->shipped_to,
            'status'      => $this->status,
            'ordered_at'  => $this->ordered_at,
            'total_price' => (float) $this->total_price,
            'name'        => $this->user?->first_name . ' ' . $this->user?->last_name,
            'ordered_at'  => $this->ordered_at,
        ];
    }
}
