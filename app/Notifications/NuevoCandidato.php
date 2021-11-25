<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NuevoCandidato extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($vacante, $id_vacante)
    {
        $this->vacante = $vacante;
        $this->id_vacante = $id_vacante;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Un candidato se ha suscrito a tu oferta de: '. $this->vacante)
                    ->action('Visita SearchJobs', url('/'))
                    ->line('Gracias por usar nuestra app');
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

    
    /**
     * storage notification to Database
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toDatabase($notifiable){
        return[
            'vacante' => $this->vacante,
            'id_vacante' => $this->id_vacante
        ];
    }
}
