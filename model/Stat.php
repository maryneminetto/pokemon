<?php


class Stat
{

    private string $name;
    private string $value;
    private string $color;

    /**
     * Stat constructor.
     * @param string $name
     * @param string $value
     */
    public function __construct(string $name, string $value)
    {
        $this->name = $name;
        $this->value = $value;
        $this->color = 'black';
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @param string $color
     */
    public function setColor(string $value): void
    {
        if($value<40){
            $this->color = 'bg-red-600';
        }elseif ($value<=70 && $value>=40){
            $this->color = 'bg-yellow-600';
        }elseif ($value<=90 && $value>=70){
            $this->color = 'bg-yellow-400';
        }elseif ($value<=120 && $value>=90){
            $this->color = 'bg-green-400';
        }elseif ($value<=150 && $value>=120){
            $this->color = 'bg-indigo-500';
        }else {
            $this->color = 'bg-indigo-900';
        }

    }





}