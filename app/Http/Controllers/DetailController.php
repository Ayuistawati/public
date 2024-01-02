<?php

// app/Http/Controllers/IndexController.php

namespace App\Http\Controllers;

class DetailController extends Controller
{
    public function detailMaster()
    {
        return view('detailmaster');
    }

    public function detailTransaksi()
    {
        return view('detailtransaksi');
    }
}
