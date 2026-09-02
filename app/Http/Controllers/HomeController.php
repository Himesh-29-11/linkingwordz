<?php

namespace App\Http\Controllers;

use App\Support\Cms;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $audienceCards = Cms::homeSection('audience_cards');
        foreach ($audienceCards as &$card) {
            if (isset($card['href']) && ! str_starts_with($card['href'], 'http')) {
                $card['href'] = url($card['href']);
            }
        }
        unset($card);

        return view('home', [
            'featuredServices' => Cms::homeSection('featured_services'),
            'services' => Cms::servicesList(),
            'testimonials' => Cms::homeTestimonials(),
            'selectedWork' => Cms::selectedWork(),
            'insights' => Cms::homeInsights(),
            'audienceCards' => $audienceCards,
            'problems' => Cms::homeSection('problems'),
            'processSteps' => Cms::homeSection('process_steps'),
            'whyBlocks' => Cms::homeSection('why_blocks'),
        ]);
    }
}
