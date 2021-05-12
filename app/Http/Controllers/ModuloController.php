<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modulos;

class ModuloController extends Controller
{
    public function index()
    {
        $menus = Modulos::where('parent_id', '=', 0)->get();
        $allMenus = Modulos::pluck('title', 'id')->all();
        return view('modulo.menuTreeview', compact('menus', 'allMenus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];
        Modulos::create($input);
        return back()->with('success', 'Menu added successfully.');
    }

    public function show()
    {
        $menus = Modulos::where('parent_id', '=', 0)->get();
        return view('modulo.dynamicMenu', compact('menus'));
    }

    public function recursiveJsonMenu()
    {
        $arraymodules = [];
        $modulos = Modulos::all();

        foreach ($modulos as $module) {
            $arraymodules[$module->parent_id][] = $module;
        }

        $dynamicMenu = $this->getMenuTreee($arraymodules);
        return $dynamicMenu;
    }
    private function getMenuTreee($modules, $parent = 0)
    {
        $menuTree = [];
        foreach ($modules[$parent] as $page) {
            $newMenu = new \stdClass();
            $newMenu->id = $page['id'];
            $newMenu->title = $page['title'];
            // check if there are children for this item
            if (isset($modules[$page['id']])) {
                $newMenu->children = $this->getMenuTreee($modules, $page['id']);
            }
            $menuTree[] = $newMenu;
        }
        return $menuTree;
    }
}
