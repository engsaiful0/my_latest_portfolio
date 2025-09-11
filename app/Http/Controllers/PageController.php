<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageController extends Controller
{
    /**
     * Display the Privacy Policy page.
     */
    public function privacy()
    {
        return view('pages.privacy');
    }

    /**
     * Display the Terms of Service page.
     */
    public function terms()
    {
        return view('pages.terms');
    }

    /**
     * Display the FAQ page.
     */
    public function faq()
    {
        return view('pages.faq');
    }

    /**
     * Download CV/Resume
     */
    public function downloadCV()
    {
        $filePath = public_path('assets/Professional_CV_Resume_of_saiful.pdf');
        
        if (!file_exists($filePath)) {
            abort(404, 'CV file not found');
        }
        
        return response()->download($filePath, 'Saiful_Islam_CV_Resume.pdf', [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="Saiful_Islam_CV_Resume.pdf"'
        ]);
    }
}
