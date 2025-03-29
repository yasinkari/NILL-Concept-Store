<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\Order;
use App\Models\Tracking;

class AdminController extends Controller
{
    // Show the admin login form
    public function showLoginForm()
    {
        return view('auth.admin_login');
    }

    // Handle admin login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // Check if the authenticated user is an admin
            if (Auth::user()->user_role === 'admin') {
                return redirect()->intended(route('admin.dashboard'))->withSuccess('You have successfully logged in as admin.');
            } else {
                // If not admin, logout and redirect back with error
                Auth::logout();
                return redirect()->route('admin.login')->withErrors(['email' => 'You do not have admin privileges.']);
            }
        }

        return redirect()->route('admin.login')->withErrors(['email' => 'Invalid credentials.']);
    }

    // Handle admin logout
    public function logout()
    {
        Auth::logout(); // Logs out the current user
        return redirect()->route('admin.login')->with('success', 'Logged out successfully.');
    }

    //ATAS JANGAN USIK

    // Show the admin dashboard
    public function dashboard()
    {
        // Get orders with completed status from tracking
        $completedOrderIds = Tracking::where('order_status', 'completed')
            ->pluck('orderID');
        
        $totalSales = Order::whereIn('orderID', $completedOrderIds)
            ->sum('total_amount');
        
        $totalOrders = Order::count();
        $totalProducts = Product::count(); // Count total products
        $latestOrders = Order::with('user')->latest()->take(5)->get(); // Fetch the latest 5 orders
    
        // Sales data for chart visualization
        $salesData = Order::selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');
    
        // Get the sales months for chart labels
        $salesMonths = $salesData->keys()->map(function ($month) {
            return date("F", mktime(0, 0, 0, $month, 1));
        });
    
        return view('admin.admin_dashboard', compact(
            'totalSales',
            'totalProducts',
            'totalOrders',
            'latestOrders',
            'salesData',
            'salesMonths'
        ));
    }


 }

    

