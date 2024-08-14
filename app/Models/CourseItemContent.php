<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseItemContent extends Model
{
    use HasFactory;

    protected $table = 'course_item_contents';
    protected $guarded = [];

    //use accessors
    //this will return arabic data if app language is arabic and english data if not 
    public function getNameAttribute()
    {
        if(app()->getLocale() == 'ar') 
        {
            return $this->name_ar;
        }
        else 
        {
            return $this->name_en;
        }
    }



    /** start relations **/
    public function course_item()
    {
        return $this->belongsTo(CourseItem::class, 'course_item_id');
    }
}
