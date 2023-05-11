<?php

namespace App\Http\Controllers;

use App\Actions\TenantDataAction;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{

    public function tenantIndex(): Response
    {
        $data = TenantDataAction::run();
        return Inertia::render('Welcome', $data);
    }


    public function index(): Response
    {
        return Inertia::render('Welcome', [
            'app_url' => env('APP_URL')
        ]);
    }
}
