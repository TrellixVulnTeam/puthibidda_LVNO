<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Uxcontainer;
use App\Models\Uxpanel;
use App\Models\Uxcard;
use App\Models\Uxmenu;
use App\Models\Uxhandler;

class UxController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth', ['only'=>'create']);
  }

  public function getUxContents($id){
    $handler = Uxhandler::where('psucode', $id)->first();
    // $panels = $handler->panels()->pluck('class');
    // $cards = $handler->cards()->pluck('class');
    // dd($handler->containers);
    $cards = $handler->cards;
    $activeCards= array();
    foreach($cards as $card){
      $activeCards[$card->class]=$card->pivot->active;
    }
    $panels = $handler->panels;
    $activePanels= array();
    foreach($panels as $panel){
      $activePanels[$panel->class]=$panel->pivot->active;
    }

    $containers = $handler->containers;
    $activeContainers= array();
    foreach($containers as $container){
      $activeContainers[$container->class]=$container->pivot->active;
    }
    return response()->json([
      'cards' => $activeCards,
      'panels'=> $activePanels,
      'containers'=>$activeContainers
    ]);
  }
  public function getUxMenus($lang){
    $menus = Uxmenu::select('menu_id',$lang)->get();
    $activeMenus= array();
    foreach($menus as $menu){
      $activeMenus[$menu->menu_id]=$menu->$lang;
    }
    return $activeMenus;
  }

}
