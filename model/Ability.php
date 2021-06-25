<?php


class Ability
{

    private string $name;
    private string $effect;
    private bool $hidden;

    /**
     * Ability constructor.
     * @param string $name
     * @param string $effect
     * @param bool $hidden
     */
    public function __construct(string $name, string $effect, bool $hidden)
    {
        $this->name = $name;
        $this->effect = $effect;
        $this->hidden = $hidden;
    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEffect(): string
    {
        return $this->effect;
    }

    /**
     * @return bool
     */
    public function isHidden(): bool
    {
        return $this->hidden;
    }


}