<?php

namespace App\Notebook;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //

    public function updateSlug()
    {
        $this->slug = str_slug($this->title).'-'.$this->id;
        $this->save();
    }
}
