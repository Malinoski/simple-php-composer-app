<?php
final class Email
{
    private $email;
    
    private function __construct($email)
    {
        $this->ensureIsValidEmail($email);
        $this->email = $email;
    }
    
    public function __toString()
    {
        return $this->email;
    }
    
    public static function fromString($email)
    {
        // Calling contructor (ensureIsValidEmail or launch exception) 
        // and return toString (the string email)
        return new self($email);
    }
    
    private function ensureIsValidEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid email address',
                    $email
                    )
                );
        }
    }
}