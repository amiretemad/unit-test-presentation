<?php


namespace App\Traits;


trait FirstNameTrait
{

    /**
     * @var string
     */
    protected $firstname;

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     * @return FirstNameTrait
     * @throws \Exception
     */
    public function setFirstname(string $firstname): self
    {
        if (is_numeric($firstname)) {
            throw new \Exception('Firstname must be string');
        }

        $this->firstname = $firstname;

        return $this;
    }

}