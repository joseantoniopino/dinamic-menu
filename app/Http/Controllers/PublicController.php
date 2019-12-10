<?php

namespace App\Http\Controllers;

use App\Menu;
use App\SubMenu;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $menu = $this->getActiveMenu();
        /*dd($menu);*/
        return view('public.index', ['menu' => $menu]);
    }

    private function getActiveMenu()
    {
        return Menu::where('active', true)->with('getActiveSubMenus')->get()->toArray();
    }
}
