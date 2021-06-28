<?php

include_once 'Pokemon.php';

include_once '../model/Type.php';
include_once '../model/Ability.php';
include_once '../model/Stat.php';


class PokemonRepo
{

    private array $array;
    private string $url;

    /**
     * PokemonRepo constructor.
     */
    public function __construct()
    {
        $this->url = "https://pokeapi.co/api/v2/pokemon/?limit=50";
    }

    /**
     * @return array
     */
    public function getArray(): array
    {
        return $this->array;
    }

    /**
     * @param array $array
     */
    public function setArray(array $array): void
    {
        $this->array = $array;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(int $offset): void
    {
        $this->url = "https://pokeapi.co/api/v2/pokemon/?offset=$offset&limit=12";
    }

    public function getPokemon(){
        $json_data = file_get_contents($this->getUrl());
        $json = json_decode($json_data, true);
        $json = array_slice($json, 3);
        $tab = [];
        foreach ($json as $pokemon) {
            foreach ($pokemon as $aPokemon) {
                $tab[] = $aPokemon['url'];
            }
        }
        return $tab;
    }

    public function createPokemon(): void
    {
        $aPokemon = $this->getPokemon();
        $pokedex = [];
        foreach ($aPokemon as $pokemon) {
            $json_data = file_get_contents($pokemon);
            $json = json_decode($json_data, true);
            $json = array_slice($json, 0);
            $pokedex[] = $this->getPokemonFromJson($json);
        }
        $this->setArray($pokedex);
    }

    public function getAPokemon($url)
    {
        $this->setArray([$this->getPokemonFromJson($this->getAData($url))]);
    }

    public function getAData($url)
    {
        return json_decode(file_get_contents($url), true);
    }

    private function getPokemonFromJson($json): Pokemon {
        $name = $json['name'];
        $logo = $json['sprites']['other']['dream_world']['front_default'];
        $imageOffi = $json['sprites']['other']['official-artwork']['front_default'];
        $order = $json['order'];
        $types = [];
        $id = $json['id'];
        $stats = [];
        $abilities = [];
        foreach ($json['types'] as $type) {
            $types[] = new Type($type['type']['name'], "../img/".$type['type']['name'].".png");
        }
        foreach($json['stats'] as $stat) {
            $stats[$stat['stat']['name']] = new Stat($stat['stat']['name'], $stat['base_stat']);
            $stats[$stat['stat']['name']]->setColor($stats[$stat['stat']['name']]->getValue());

        }
        foreach ($json['abilities'] as $ability){
            $ability = array_slice($ability, 0, 2);
            $abilityName = $ability['ability']['name'];
            $abilitiesEffect = $this->getAData($ability['ability']['url']);
            $abilityHidden = $ability['is_hidden'];
            foreach($abilitiesEffect['effect_entries'] as $effect) {
                if($effect['language']['name'] == 'en') {
                    $abilities[$abilityName] = new Ability($abilityName, $effect['effect'], $abilityHidden);
                }
            }

        }
        return new Pokemon($name, $logo, $imageOffi, $order, $types, $id, $stats, $abilities);
    }

    public function getPokemonWithName(){
        $json_data = file_get_contents($this->getUrl());
        $json = json_decode($json_data, true);
        $json = array_slice($json, 3);
        $tab = [];
        foreach ($json as $pokemon) {
            foreach ($pokemon as $aPokemon) {
                $tab[] = $aPokemon;
            }
        }
        return $tab;
    }


}