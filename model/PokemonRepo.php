<?php

include_once 'Pokemon.php';

include_once '../model/Type.php';
include_once '../model/Ability.php';


class PokemonRepo
{

    private array $array;
    private string $url;

    /**
     * PokemonRepo constructor.
     * @param string $url
     */
    public function __construct()
    {
        $this->url = "https://pokeapi.co/api/v2/pokemon/?offset=0&limit=30";

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
    public function setUrl(string $url): void
    {
        $this->url = $url;
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
                $json = array_slice($json, 3);
                $name = $json['name'];
                $logo = $json['sprites']['front_default'];
                $imageOffi = $json['sprites']['other']['official-artwork']['front_default'];
                $order = $json['order'];
                $types = [];
                $id = $json['id'];
                $stats = [];
                $abilities = [];
                foreach ($json['types'] as $type) {
                    $types[] = new Type($type['type']['name']);
                }
                foreach($json['stats'] as $stat) {
                    $stats[$stat['stat']['name']] = $stat['base_stat'];
                }
                foreach ($json['abilities'] as $ability){
                    $ability = array_slice($ability, 0, 2);
                    $abilityName = $ability['ability']['name'];
                    $abilitiesEffect = $this->getAData($ability['ability']['url']);
                    foreach($abilitiesEffect['effect_entries'] as $effect) {
                        if($effect['language']['name'] == 'en') {
                            $abilities[$abilityName] = new Ability($abilityName, $effect['effect']);
                        }
                    }

                }
                $pokedex[] = new Pokemon($name, $logo, $imageOffi, $order, $types, $id, $stats, $abilities);
                $this->setArray($pokedex);
            }

        }

        public function getAData($url)
        {
            $json_data = file_get_contents($url);
            $json = json_decode($json_data, true);
            return $json;
        }



        public function getAPokemon($url)
        {
            $json = $this->getAData($url);
            $name = $json['name'];
            $logo = $json['sprites']['other']['dream_world']['front_default'];
            $imageOffi = $json['sprites']['other']['official-artwork']['front_default'];
            $order = $json['order'];
            $types = [];
            $id = $json['id'];
            $stats = [];
            $abilities = [];
            foreach ($json['types'] as $type) {
                $types[] = new Type($type['type']['name']);
            }
            foreach($json['stats'] as $stat) {
                $stats[$stat['stat']['name']] = $stat['base_stat'];
            }
            foreach ($json['abilities'] as $ability){
                $ability = array_slice($ability, 0, 2);
                $abilityName = $ability['ability']['name'];
                $abilitiesEffect = $this->getAData($ability['ability']['url']);
                foreach($abilitiesEffect['effect_entries'] as $effect) {
                    if($effect['language']['name'] == 'en') {
                        $abilities[$abilityName] = new Ability($abilityName, $effect['effect']);
                    }
                }

            }
            $this->setArray([new Pokemon($name, $logo, $imageOffi, $order, $types, $id, $stats, $abilities)]);

        }

    }