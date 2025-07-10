<?php

namespace Webkul\Marketplace\Mail;

use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Webkul\Admin\Mail\Mailable;

class OrderCanceledNotification extends Mailable
{
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(public $sellerOrder) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            to: $this->sellerOrder->order->customer_email,
            cc: [
                new Address(
                    $this->sellerOrder->seller->email,
                    $this->sellerOrder->seller->name
                ),
                new Address(
                    core()->getAdminEmailDetails()['email'],
                    core()->getAdminEmailDetails()['name']
                ),
            ],
            subject: trans('marketplace::app.emails.seller.orders.canceled.subject'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'marketplace::emails.seller.orders.canceled',
        );
    }
}
