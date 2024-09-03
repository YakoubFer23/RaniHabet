<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'listing_id'];

    // Relationship with user who applied
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with listing applied to
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }
}
