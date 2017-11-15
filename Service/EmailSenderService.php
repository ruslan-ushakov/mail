<?php

namespace Mail\Service;

use Mail\Model\EmailAddress;
use Mail\Model\EmailMessageInterface;
use Mail\Exception\SendMessageException;

class EmailSenderService
{
    /**
     * @param EmailMessageInterface $message
     * @param EmailAddress $recipient
     * @param EmailAddress|null $sender
     *
     * @void
     *
     * @throws \Mail\Exception\SendMessageException
     */
    public function send(EmailMessageInterface $message, EmailAddress $recipient, EmailAddress $sender = null): void
    {
        $wasSent = mail(
            $recipient->getValue(),
            $message->getSubject(),
            $message->getBody(),
            $this->createHeaders($message, $sender)
        );

        if (!$wasSent) {
            throw new SendMessageException("Message failed to send");
        }
    }

    private function createHeaders(EmailMessageInterface $message, ?EmailAddress $emailAddressFrom = null): string
    {
        $headers = [];
        if ($emailAddressFrom) {
            $headers[] = "From: {$emailAddressFrom->getValue()}";
        }
        $headers[] = $message->getContentType();

        return implode(PHP_EOL, $headers);
    }
}
