<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use Illuminate\Support\Facades\Auth;
use App\Tools\GooglemapTool;

class PlaceController extends Controller
{
    public function index() {
      return view('watch.place')->with(['places' => Place::get()]);
    }

    public function place_detail(Place $place) {
      $address = $place->address1.$place->address2.$place->address3.$place->address4;
      // 自宅との距離
      $user = Auth::user();
      $myaddress = $user->address1.$user->address2.$user->address3.$user->address4;
      $a = new GooglemapTool;
      $dist = $a->getDistance($address, $myaddress);

      return view('watch.place_detail')->with(['place' => $place,
                                                'address' => $address,
                                                'dist' => $dist]);
    }
}
