<?php


class Pokemon
{

    private string $name;
    private string $img;
    private string $img2;
    private int $number;
    private array $type;
    private int $id;
    private array $stats;
    private array $abilities;

    /**
     * Pokemon constructor.
     * @param string $name
     * @param string $img
     * @param string $img2
     * @param int $number
     * @param array $type
     * @param int $id
     * @param array $stats
     * @param array $abilities
     */
    public function __construct(string $name, string $img, string $img2, int $number, array $type, int $id, array $stats, array $abilities)
    {
        $this->name = $name;
        $this->img = $img;
        $this->img2 = $img2;
        $this->number = $number;
        $this->type = $type;
        $this->id = $id;
        $this->stats = $stats;
        $this->abilities = $abilities;
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
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @return string
     */
    public function getImg2(): string
    {
        return $this->img2;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return array
     */
    public function getType(): array
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return array
     */
    public function getStats(): array
    {
        return $this->stats;
    }

    /**
     * @return array
     */
    public function getAbilities(): array
    {
        return $this->abilities;
    }







}