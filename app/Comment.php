<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['name', 'email','text','parent_id'];

     public function child()
    {
        return $this->hasMany(self::class, 'parent_id','id');
    }

    public function children()
    {
        return $this->child()->with('children');
    }


}
