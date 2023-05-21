<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;

    protected $updated_at = null;
    protected $created_at = null;

    protected $fillable = [
        'type',
        'to_user',
        'from_user',
        'is_read',
        'created_date'
    ];
}
