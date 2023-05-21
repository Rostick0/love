<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skip extends Model
{
    use HasFactory;

    protected $updated_at = null;
    protected $created_at = null;

    protected $fillable = [
        'to_user',
        'from_user'
    ];
}
