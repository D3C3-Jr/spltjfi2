<?php

namespace App\Controllers;

use App\Models\SplModel;

class Home extends BaseController
{

    protected $Spl;
    public function __construct()
    {
        $this->Spl = new SplModel();
    }


    public function index(): string
    {
        $totalSales = $this->Spl->getSales();
        $data = [
            'title' => 'Home',
            'sales'  => $totalSales,
        ];
        return view('home', $data);
    }
}
