<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubMenu extends Model
{
    /**
     * @return BelongsTo
     */
    public function Menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
