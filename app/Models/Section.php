<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable=['sections'];
    use HasFactory;

    public function classes()
    {
        // return $this->hasMany(CustomSection::class, 'class_id');
        // return $this->hasMany(RelationClassSection::class, 'section_id');
        return $this->belongsToMany(ClassName::class, 'relation_class_sections', 'class_id');
    }
}
