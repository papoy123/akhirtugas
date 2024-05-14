<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use Illuminate\View\View;

class PaketController extends Controller
{
     /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get artikels
        $paket = Paket::latest()->paginate(5);

        //render view with artikels
        return view('pakets.index', compact('paket'));
    }
}
