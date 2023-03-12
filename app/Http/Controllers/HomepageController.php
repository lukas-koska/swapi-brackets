<?php

namespace App\Http\Controllers;

use App\Repositories\NewsRepository;
use Illuminate\View\View;

class HomepageController extends Controller
{
    protected NewsRepository $newsRepository;

    /**
     * Create a new controller instance.
     */
    public function __construct(
        NewsRepository $newsRepository
    ) {
        $this->newsRepository = $newsRepository;
    }

    /**
     * Show the HOMEPAGE
     */
    public function show(): View
    {
        $this->newsRepository->getTodayNews();
        return view('homepage', [
            'news' => $this->newsRepository->getTodayNews()
        ]);
    }
}