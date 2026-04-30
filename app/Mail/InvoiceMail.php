<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $pdf;

    /**
     * Create a new message instance.
     */
    public function __construct($data, $pdf)
    {
        $this->data = $data;
        $this->pdf = $pdf;
    }

    /**
     * Email subject
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Invoice',
        );
    }

    /**
     * Email body (Blade view)
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.invoice', // IMPORTANT
            with: [
                'data' => $this->data
            ]
        );
    }

    /**
     * Attach PDF
     */
    public function attachments(): array
    {
        return [
            Attachment::fromData(
                fn() => $this->pdf->output(),
                'invoice.pdf'
            )->withMime('application/pdf'),
        ];
    }
}
