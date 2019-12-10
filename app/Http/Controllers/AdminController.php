<?php

namespace App\Http\Controllers;

use App\Menu;
use App\SubMenu;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index()
    {
        $menu = Menu::with('subMenus')->get();
        return view('admin.index', ['menu' => $menu]);
    }

    public function editActive(Request $request)
    {
        if (!is_null($request->menuType) && !is_null($request->id) && !is_null($request->value))
        {
            if ($request->menuType == 'submenu')
            {

                $model = SubMenu::find($request->id);
                $model->active = (int)$request->value;
                $save = $model->save();
                if ($save)
                    return response()->json(['success' => 'Sub Menú <strong>' . $model->name . '</strong> actualizado con éxito'], 200);
            }
            elseif ($request->menuType == 'menu')
            {
                $model = Menu::find($request->id);
                $model->active = (int)$request->value;
                $save = $model->save();
                if ($save)
                    return response()->json(['success' => 'Menú <strong>' . $model->name . '</strong> actualizado con éxito'], 200);
            }
        }


    }


}
