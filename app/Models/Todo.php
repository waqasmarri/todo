<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory;

    public function getDeadlineAttribute($value)
    {
        return Carbon::parse($value)->timezone(session('timezone'))->format('g:i:s A, d F, Y ');
    }
}
