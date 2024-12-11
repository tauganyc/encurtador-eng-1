<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = ['route_id', 'date', 'clicks'];


    public function route()
    {
        return $this->belongsTo(Route::class);
    }

    public function getReport($id, $date_start, $date_end)
    {
        return $this->where('route_id', $id)
            ->where('date', '>=', $date_start)
            ->where('date', '<=', $date_end)
            ->orderBy('date', 'desc')
            ->get();
    }
}
