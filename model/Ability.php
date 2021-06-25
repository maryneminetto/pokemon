<?php


class Ability
{

    private string $name;
    private string $effect;

    /**
     * Ability constructor.
     * @param string $name
     * @param string $effect
     */
    public function __construct(string $name, string $effect)
    {
        $this->name = $name;
        $this->effect = $effect;
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




}