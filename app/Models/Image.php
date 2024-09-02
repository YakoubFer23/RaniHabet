<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Listing;

class Image extends Model
{
    use HasFactory;

    protected $table = 'listing_images';
    protected $fillable = ['listing_id', 'image_path'];

    // Relationship with Listing
    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    public function getSecImage()
    {
        if ($this->image_path) {
            return url('storage/' . $this->image_path);
        }
        return "/assets/prof-silhouette.png";
    }
}
