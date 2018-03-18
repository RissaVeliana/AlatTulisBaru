<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class ApiController extends Controller
{
    public function listdata()
    {
    	return Barang::all();
    }
}
