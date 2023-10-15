<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelationClassSection extends Model
{
    protected $fillable  = ['id','class_id', 'section_id'];
    use HasFactory;

    public function RelationData()
    {
        return $this->belongsTo(ClassName::class, 'class_id')->belongsTo(Section::class, 'section_id')->with();
    }
}
