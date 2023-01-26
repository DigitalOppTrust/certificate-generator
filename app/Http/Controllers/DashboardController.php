<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function show()
    {
        $user = auth()->user();

        $certificates = $user->certificates()->get()->toArray();

        return Inertia::render('Dashboard', [
            'certificates' => $certificates
        ]);
    }
}
