<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'city', 'private', 'image', 'items', 'date'
    ];

    protected $casts = [
        'items' => 'array'
    ];

    protected $date = ['date'];

    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
