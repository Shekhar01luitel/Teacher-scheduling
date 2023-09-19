<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomSection extends Model
{
    use HasFactory;
    protected $table = 'custom_sections';

    public function className()
    {
        return $this->belongsTo(ClassName::class, 'class_id');
    }
}
