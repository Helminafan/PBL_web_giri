<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function redirectUser()
    {
        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        if (auth()->user()->hasRole('mojopanggung')) {
            return redirect()->route('mojopanggung.dashboard');
        }

        if (auth()->user()->hasRole('giri')) {
            return redirect()->route('kelgiri.dashboard');
        }
        
<<<<<<< HEAD

        if (auth()->user()->hasRole('boyolangu')) {
            return redirect()->route('mojopanggung.dashboard');
        }

        if (auth()->user()->hasRole('grogol')) {
            return redirect()->route('kelgiri.dashboard');
        }

        if (auth()->user()->hasRole('penataban')) {
            return redirect()->route('admin.dashboard');
        }

        if (auth()->user()->hasRole('jambesari')) {
            return redirect()->route('jambesari.dashboard');
=======
        if (auth()->user()->hasRole('penataban')) {
            return redirect()->route('penataban.dashboard');
>>>>>>> anis
        }
        if (auth()->user()->hasRole('penataban')) {
            return redirect()->route('penataban.dashboard');
        }
    }
}
