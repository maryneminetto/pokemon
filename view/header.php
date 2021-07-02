
<div class="bg-blue-900 flex justify-between items-center text-white p-4">
    <h1 class="text-4xl">Pokemon</h1>
    <div class="buttons">
        <?php
        if (isset($_SESSION['user'])){
            ?>
            <a href="../controller/disconnectController.php" class="btn">Disconnect</a>
            <a href="../view/pokemonTeam.php?team" class="btn">My Team</a>
            <?php
        }else{
            ?>
            <a href="connect.php" class="btn">Login</a>
            <?php
        }
        ?>
        <a href="../view/search.php" class="btn">Search</a>
        <a href="../controller/displayPokemonController.php?returnPage=0" class="btn">Home</a>
    </div>


