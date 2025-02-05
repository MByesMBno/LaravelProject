<?php

namespace App\Http\Controllers;

use App\Models\aroma;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function allData(){
        return view("Shop", ["data"=>aroma::all()]);
    }

}
