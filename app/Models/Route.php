<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Route extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['slug', 'url', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
