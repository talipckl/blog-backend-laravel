<?php

namespace App\Listeners;

use App\Events\UserCreateBlogEvent;
use App\Models\Subscription;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class UserSendBlogListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserCreateBlogEvent $event)
    {
        $blog = $event->blog;
        $subscribers = Subscription::where('status', true)->get();

        foreach ($subscribers as $subscriber) {
            Mail::raw($blog->description, function ($message) use ($subscriber) {
                $message->to($subscriber->mail_address)->subject('Bu Blog Tam Sana Göre');
            });
        }

    }
}
