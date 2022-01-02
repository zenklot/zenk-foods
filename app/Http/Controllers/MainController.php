<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        return view('main.index',[
            'title' => "ZenkFood",
            'active' => "home"
        ]);
    }

    public function menu(){

        if(request('sort') == 'foods'){
            $searchActive = 'foods';
        }else if(request('sort') == 'drinks'){
            $searchActive = 'drinks';
        }else{
            $searchActive = 'seller';
        };

        return view('main.menu',[
            'title' => "ZenkFood | Menu",
            'active' => "menu",
            'menus' => Menu::latest()->filter(request(['search', 'sort']))->paginate(6)->withQueryString(),
            'searchActive' => $searchActive,
        ]);
    }
}