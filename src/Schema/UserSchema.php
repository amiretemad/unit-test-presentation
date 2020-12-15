<?php


namespace App\Schema;


use App\Traits\FirstNameTrait;

class UserSchema
{

    use FirstNameTrait;

    /**
     * @var string
     */
    protected $lastname;

    /**
     * @var int
     */
    protected $status = 0;

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * @return UserSchema
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return UserSchema
     */
    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

}