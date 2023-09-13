<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AdminController;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        if ($user['role'] == 'admin') {
            return (new AdminController())->AdminDashboard();
        } elseif ($user['role'] == 'teacher') {
            return (new AgentController())->AgentDashboard();
        } elseif ($user['role'] == 'user') {
            return (new AgentController())->UserDashboard();
        } else {
            // Handle unrecognized roles here, e.g., redirect to a generic dashboard or show an error page.
            return view('welcome'); // Assuming 'home' is a valid route for the default dashboard.
        }
    }
}
