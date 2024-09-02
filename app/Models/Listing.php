<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class Listing extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'listings';
    protected $fillable = [
        'title',
        'description',
        'price',
        'address',
        'main_image',
        'roomates',
        'duration'
    ];

    protected static function boot()
    {
        parent::boot();

        // Automatically generate a UUID for the model.
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Uuid::uuid4(); // Correct usage of UUID
        });
    }

    /**
     * Get the value indicating whether the IDs are auto-incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

    /**
     * Get the data type of the auto-incrementing ID.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }
}
