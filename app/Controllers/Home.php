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
        $totalSales         = $this->Spl->getSales();
        $totalHrga          = $this->Spl->getHrga();
        $totalPurchasing    = $this->Spl->getPurchasing();
        $totalAccounting    = $this->Spl->getAccounting();
        $totalAll2023          = $this->Spl->getAll2023();
        $totalAll2024          = $this->Spl->getAll2024();
        $data = [
            'title'         => 'Home',
            'sales'         => $totalSales,
            'hrga'          => $totalHrga,
            'purchasing'    => $totalPurchasing,
            'accounting'    => $totalAccounting,
            'total2023'     => $totalAll2023,
            'total2024'     => $totalAll2024,
        ];
        return view('home', $data);
    }
}
