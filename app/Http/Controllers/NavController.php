<?php

namespace App\Http\Controllers;

use App\Navs;
use Illuminate\Http\Request;

class NavController extends Controller
{
  public function index(){
      $navs=Navs::where('show_flag','1')->where('is_deleted','0')->get();
      return $navs;
  }
}
