<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WhoWeAreDetail extends Model
{
    use HasFactory;

    protected $table = 'who_we_are_details';
    protected $guarded = [];

    //use accessors
    //this will return arabic data if app language is arabic and english data if not 
    public function getDetailsAttribute()
    {
        if(app()->getLocale() == 'ar') 
        {
            return $this->details_ar;
        }
        else 
        {
            return $this->details_en;
        }
    }
}
