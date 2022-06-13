<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
    use HasFactory;

    protected $table = 'nodes';
    protected $fillable = ['name','parent_id'];

    public function children() {
        return $this->hasMany('App\Models\Tree','parent_id','id') ;
    }
}
