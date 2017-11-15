<?php

namespace Mail\Model;

class EmailAddress
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string|null
     */
    private $name;

    public function __construct($email, string $name = null)
    {
        $this->email = $email;
        $this->name = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName():? string
    {
        return $this->name;
    }

    public function getValue(): string
    {
        if ($this->name === null) {
            return $this->email;
        }

        return sprintf('%s <%s>', $this->name, $this->email);
    }
}
