<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $user=Auth::user();
      $roles= $user->getRoleNames();
      $menus = [
        'links' => [
          ['name' => 'liste des personnes', 'route' => 'personnes.index'],
          ['name' => 'maj des personnes', 'route' => 'personnes.maj'],
        ],
      ];
      $filteredLinks = []; 
      $filteredGroup = [
        'liens' => [],
      ];

      foreach ($menus['links'] as $menu) {
        $permission = Permission::where('name', $menu['route'])->where('guard_name', 'web')->first();
        if (Auth::user()->hasRole($roles->first()) && Auth::user()->hasPermissionTo($permission)) {
          $filteredGroup['liens'][] = $menu;
        }
      }
      if (!empty($filteredGroup['liens'])) {
        $filteredLinks[] = $filteredGroup;
      }
      //dd($filteredLinks);

    session(['filteredLinks' => $filteredLinks]);      
    return view('layouts.master',compact('filteredLinks'));
    }
}
