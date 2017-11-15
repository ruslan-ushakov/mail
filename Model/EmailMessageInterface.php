<?php

namespace Mail\Model;

interface EmailMessageInterface
{
    public function getSubject(): string;

    public function getBody(): string;

    public function getContentType(): string;
}
