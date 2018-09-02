<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ModeratorNotification extends Notification
{
    use Queueable;

   public $id;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $subject = sprintf('Опубликована вакансия на сайте %s!', config('app.name'));
        $greeting = sprintf('Здравствуй, %s!', $notifiable->name);
        $line = sprintf('На сайте опубликована новая вакансия под id: %s', $this->id);

        return (new MailMessage)
            ->subject($subject)
            ->greeting($greeting)
            ->line($line)
            ->action('Перейти на сайт', url('/'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
