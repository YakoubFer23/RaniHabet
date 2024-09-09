<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;
use App\Models\Image;
use App\Models\Application;
use App\Notifications\ListingStatusChanged;
use App\Notifications\ListingDenied;

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
        'address',
        'city',
        'state',
        'price',
        'thumbnail',
        'type',
        'gender',
        'availability',
        'duration',
        'status',
        'user_id'
    ];

    protected static function boot()
    {
        parent::boot();

        // Automatically generate a UUID for the model.
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Uuid::uuid4(); // Correct usage of UUID
        });

        static::updated(function ($listing) {
            if ($listing->isDirty('status')) {
                // Status has changed, send an email notification
                if ($listing->status == 'Online') {
                    $listing->user->notify(new ListingStatusChanged($listing, $listing->user->firstname));
                }
            }
        });

        // Listen for the deleted event (after deletion)
        static::deleted(function ($listing) {
            // Perform tasks after deletion, such as logging or cleaning up
            $listing->user->notify(new ListingDenied($listing, $listing->user->firstname));
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

    public function getImage()
    {
        if ($this->thumbnail) {
            return url('storage/' . $this->thumbnail);
        }
        return "/assets/prof-silhouette.png";
    }

    public function listing_images()
    {
        return $this->hasMany(Image::class);
    }

     // Relationship with the user who created the listing
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with applications
    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
