<?php


class User
{
    private string $firstName;
    private string $lastName;
    private string $email;
    private int $id;


    /**
     * User constructor.
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param int $id

     */
    public function __construct(string $firstName, string $lastName, string $email, int $id)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->id = $id;

    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


}