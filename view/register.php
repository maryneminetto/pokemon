<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style.css">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <title>Pokemon | Connection</title>
</head>
<body>

<div class="flex flex-col justify-center items-center mt-52 ">
    <div class="flex flex-col justify-center items-center border border-blue-900 py-20 px-52 rounded-md bg-white">
        <h2 class=" text-xl text-center font-semibold uppercase mb-2 mt-4">Register</h2>
        <form action="../controller/registerController.php" method="post" class="flex flex-col justify-center items-center mt-4">
            <input type="text" name="firstName" placeholder="John" class="mb-2 py-2" required>
            <input type="text" name="lastName" placeholder="Doe" class="mb-2 py-2" required>
            <input type="email" name="userEmail" placeholder="john-doe@email.com" class="mb-2 py-2" required>
            <input type="password" name="userPassword" placeholder="pass" class="mb-2 py-2" required>
            <input type="submit" name="registerSubmit" class="btn-sub mt-2">
        </form>
        <a href="index.php" class="btn-blue" >Retour</a>
    </div>
</div>

</body>
</html>
