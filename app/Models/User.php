<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

 
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'phone_number',
        'identity_verified',
        'identity_verified_picture',
        'gender',
        'profile_picture',
        'about',
        'joueur',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    
    public $incrementing = false;
    protected $keyType = 'string'; // This tells Laravel that the primary key is a string (UUID)

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }



    public function getImage()
    {
        if ($this->profile_picture) {
            return url('storage/' . $this->profile_picture);
        }
        return "/assets/prof-silhouette.png";
    }


    // Listings created by the user
    public function listings()
    {
        return $this->hasMany(Listing::class);
    }

    // Listings the user has applied to
    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    
}
