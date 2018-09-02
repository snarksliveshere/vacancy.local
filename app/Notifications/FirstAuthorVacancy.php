<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class FirstAuthorVacancy extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        $subject = sprintf('Публикация вакансии на сайте %s!', config('app.name'));
        $greeting = sprintf('Приветствую, %s!', $notifiable->name);

        return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greeting)
                    ->line('Приветствую! Вы опубликовали свою первую вакансию')
                    ->action('Перейти на сайт', url('/'))
                    ->line('Так как это ваша первая вакансия, то мы поставили ее на модерацию. ');
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
