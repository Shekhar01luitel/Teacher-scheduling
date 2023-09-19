<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassName extends Model
{
    use HasFactory;
    protected $table = 'class_names';
    protected $fillable = ['class'];
    public function customSections()
    {
        return $this->hasMany(CustomSection::class, 'class_id');
    }
}

