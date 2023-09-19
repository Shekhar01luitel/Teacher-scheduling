<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassName extends Model
{
    use HasFactory;
    protected $table = 'class_names';
    protected $fillable = ['class'];

    public function sections()
    {
        // return $this->hasMany(CustomSection::class, 'class_id');
        // return $this->hasMany(RelationClassSection::class, 'class_id');
        return $this->belongsToMany(Section::class, 'relation_class_sections', 'class_id');
    }
}

