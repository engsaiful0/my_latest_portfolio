<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Testimonial;
use App\Models\Subscriber;

class AdminController extends Controller
{
    public function dashboard()
    {
        $portfolios = Portfolio::count();
        $testimonials = Testimonial::count();
        $subscribers = Subscriber::count();
        $activeSubscribers = Subscriber::where('is_active', true)->count();
        
        return view('admin.dashboard', compact('portfolios', 'testimonials', 'subscribers', 'activeSubscribers'));
    }
}
