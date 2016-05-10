<?php

namespace Quickly_Blog;

use Illuminate\Database\Eloquent\Model;

use Conner\Tagging\Taggable;

class Tag extends Model
{
    //
    use Taggable;

    protected $table = 'tags';
}
