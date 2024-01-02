<?php

// app/Http/Controllers/IndexController.php

namespace App\Http\Controllers;

class BerandaController extends Controller
{
    public function mainIndex()
    {
        return view('beranda');
    }
}
