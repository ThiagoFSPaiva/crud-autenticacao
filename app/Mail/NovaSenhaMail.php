<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NovaSenhaMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * A nova senha a ser enviada no e-mail.
     *
     * @var string
     */
    public $novaSenha;

    /**
     * Cria uma nova instância da classe.
     *
     * @param string $novaSenha
     * @return void
     *
     *
     *
     *
     */


    public function __construct($novaSenha)
    {
        $this->novaSenha = $novaSenha;
    }

    public function build()
    {
        return $this->view('emails.nova-senha');
    }
    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Nova Senha Mail',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'emails.nova-senha',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
