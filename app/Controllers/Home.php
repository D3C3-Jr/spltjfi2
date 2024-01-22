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
        $totalHrga = $this->Spl->getHrga();
        $totalPurchasing = $this->Spl->getPurchasing();
        $totalAccounting = $this->Spl->getAccounting();
        $data = [
            'title' => 'Home',
            'sales'  => $totalSales,
            'hrga'  => $totalHrga,
            'purchasing'  => $totalPurchasing,
            'accounting'  => $totalAccounting,
        ];
        return view('home', $data);
    }
}
