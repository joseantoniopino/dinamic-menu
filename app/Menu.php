<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    /**
     * @return HasMany
     */
    public function getActiveSubMenus(){
        return $this->hasMany(SubMenu::class)->where('active', true);
    }

    public function subMenus()
    {
        return $this->hasMany(SubMenu::class);
    }
}
