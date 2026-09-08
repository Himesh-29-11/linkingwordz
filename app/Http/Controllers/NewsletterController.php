<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function subscribe(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        $email = mb_strtolower(trim($data['email']));

        $subscriber = NewsletterSubscriber::query()->firstOrCreate(
            ['email' => $email],
            ['status' => 'active']
        );

        if ($subscriber->status !== 'active') {
            $subscriber->update(['status' => 'active']);
        }

        $message = $subscriber->wasRecentlyCreated
            ? 'Thanks for subscribing!'
            : 'You are already on the list.';

        return response()->json([
            'ok' => true,
            'message' => $message,
        ]);
    }
}
