<?php


class Type
{
    private string $name;
    private string $img;

    /**
     * Type constructor.
     * @param string $name
     * @param string $img
     */
    public function __construct(string $name, string $img)
    {
        $this->name = $name;
        $this->img = $img;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
    /**
     * @return string|string
     */
    public function getImg()
    {
        return $this->img;
    }








}