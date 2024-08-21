<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;use HasFactory;

    protected $table = 'subscriptions';
    protected $guarded = [];



    /** start relations **/
    public function course_item()
    {
        return $this->belongsTo(CourseItem::class, 'course_item_id');
    }



    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
