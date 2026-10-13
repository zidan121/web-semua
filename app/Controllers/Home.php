<?php

namespace App\Controllers;

use App\Models\SchoolModel;

class Home extends BaseController
{
    public function index(): string
    {
        $schools = (new SchoolModel())
            ->where('is_active', 1)
            ->orderBy('name', 'ASC')
            ->findAll();

        return view('platform_home', [
            'schools' => $schools,
        ]);
    }
}
