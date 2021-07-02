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
        $this->url = "https://pokeapi.co/api/v2/pokemon/?offset=0&limit=12";
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

    public function getPokemon()
    {
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

    private function getPokemonFromJson($json): Pokemon
    {
        $name = $json['name'];
        $logo = $json['sprites']['other']['dream_world']['front_default'];
        $imageOffi = $json['sprites']['other']['official-artwork']['front_default'];
        $order = $json['order'];
        $types = [];
        $id = $json['id'];
        $stats = [];
        $abilities = [];
        $pdo = new PDO('mysql:host=localhost;dbname=exo_connection', 'root', '');
        $queryPokemon = $pdo->prepare('SELECT * FROM PokemonList WHERE name = :name');
        $queryPokemon->execute(array(':name' => $name));
        $rowPokemon = $queryPokemon->fetch(PDO::FETCH_OBJ);
        foreach ($json['types'] as $type) {
            $queryType = $pdo->prepare('SELECT * FROM Type WHERE name = :name');
            $queryType->execute(array(':name' => $type['type']['name']));
            $row = $queryType->fetch(PDO::FETCH_OBJ);

            if ($row == '') {
                $queryInsertType = $pdo->prepare('INSERT INTO Type(name, imgPath) VALUES(:typeName, :imgPath)');
                $queryInsertType->execute(array(':typeName' => $type['type']['name'], ':imgPath' => "../img/" . $type['type']['name'] . ".png"));
            }

            $queryHasType = $pdo->prepare('INSERT INTO hasType(id_pokemon, id_type) VALUES (:idPkmn, :idType)');
            $queryHasType->execute(array(':idPkmn' => $rowPokemon->id, ':idType' => $row->id));


            $types[] = new Type($type['type']['name'], "../img/" . $type['type']['name'] . ".png");
        }

        foreach ($json['stats'] as $stat) {
            $stats[$stat['stat']['name']] = new Stat($stat['stat']['name'], $stat['base_stat']);
            $stats[$stat['stat']['name']]->setColor($stats[$stat['stat']['name']]->getValue());
        }

        $queryPokemon = $pdo->prepare('SELECT * FROM PokemonList WHERE name = :name');
        $queryPokemon->execute(array(':name' => $name));
        $row = $queryPokemon->fetch(PDO::FETCH_OBJ);
        if ($row == '') {
            $queryPokemon = $pdo->prepare('INSERT INTO PokemonList(name, pokedexNumber, pathLogo, pathImage, hp, attack, defense, specialAttack, specialDefense, speed, firstType, secondType) VALUES(:name, :pokedexNumber, :pathLogo, :pathImg, :hp, :attack, :defense, :specialAttack, :specialDefense, :speed, :firstType, :secondType)');

            $queryPokemon->execute(array(':name' => $name,
                    ':pokedexNumber' => $order,
                    ':pathLogo' => $logo,
                    ':pathImg' => $imageOffi,
                    ':hp' => $stats['hp']->getValue(),
                    ':attack' => $stats['attack']->getValue(),
                    ':defense' => $stats['defense']->getValue(),
                    ':specialAttack' => $stats['special-attack']->getValue(),
                    ':specialDefense' => $stats['special-defense']->getValue(),
                    ':speed' => $stats['speed']->getValue())
            );
        }


        foreach ($json['abilities'] as $ability) {
            $ability = array_slice($ability, 0, 2);
            $abilityName = $ability['ability']['name'];
            $abilitiesEffect = $this->getAData($ability['ability']['url']);
            $abilityHidden = $ability['is_hidden'];
            foreach ($abilitiesEffect['effect_entries'] as $effect) {
                if ($effect['language']['name'] == 'en') {

                    $queryType = $pdo->prepare('SELECT * FROM Ability WHERE name = :name');
                    $queryType->execute(array(':name' => $abilityName));
                    $row = $queryType->fetch(PDO::FETCH_OBJ);

                    if ($row == '') {
                        $queryInsertAbility = $pdo->prepare('INSERT INTO Ability(name, effect, is_hidden) VALUES(:abilityName, :effect, :is_hidden)');
                        $queryInsertAbility->execute(array(
                            ':abilityName' => $abilityName,
                            ':effect' => $effect['effect'],
                            ':is_hidden' => $abilityHidden));
                    }
                    $queryHasAbility = $pdo->prepare('INSERT INTO hasAbility(id_pokemon, id_ability) VALUES (:idPkmn, :idAbility)');
                    $queryHasAbility->execute(array(':idPkmn' => $rowPokemon->id, ':idAbility' => $row->id));

                    $abilities[$abilityName] = new Ability($abilityName, $effect['effect'], $abilityHidden);
                }
            }
        }
        return new Pokemon($name, $logo, $imageOffi, $order, $types, $id, $stats, $abilities);
    }

    public function getPokemonWithName()
    {
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