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

    public function createRoute($user_id, $url)
    {
        $slug = substr(md5(uniqid()), 0, 6);
        return $this->create([
            'user_id' => $user_id,
            'url' => $url,
            'slug' => $slug,
        ]);
    }

}
