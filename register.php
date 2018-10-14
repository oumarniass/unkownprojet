<?php require "inc/header.php";?>
<?php require "inc/db.php";?>


<?php
    if(isset($_POST['submit']))
    {
        
            if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/',$_POST['username']))
            {
                echo "Votre pseudo n'est pas valide"."<br>";
            }
            else
            {
                $req = $pdo->prepare("SELECT id from users where username = ?");
                $req->execute([$_POST['username']]);
                $user = $req->fetch();
                if($user)
                {
                    die("Cette nom d'utilissateurs existe deja"."<br>");
                }
            }
            if (empty($_POST['email']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
             
                echo "Email non valide"."<br>";

            }
            else
            {
                $req = $pdo->prepare("SELECT id from users where email = ?");
                $req->execute([$_POST['email']]);
                $user = $req->fetch();
                if($user)
                {
                     die("Cette email est deja pris veillez en choisir un autre "."<br>");
                }
            if(empty($_POST['password1']) || $_POST['password'] !=empty($_POST['password2']))
            {
                 die("Les mots de passe ne corresponds pas"."<br>");

            }

                $req = $pdo->prepare("INSERT INTO users SET username = ?, password = ?, email = ?");

                $password_crypter = password_hash($_POST['password'],PASSWORD_BCRYPT);

                $req->execute([$_POST['username'],$_POST['email'],$password_crypter]);

                die("Votre compte a ete ajouter avec succes");



            }
    
?>


<?php


     }

?>
<form action="register.php" method="POST" class="container">
    <div class="form-group">
    <label>pseudo</label>
    <input type="text" name="username" class="form-control">
    </div>
    <div class="form-group">
    <label>email</label>
    <input type="email" name="email" class="form-control">
    </div>
    <div class="form-group">
    <input type="password" name="password1" class="form-control" placeholder="password">
    </div>
    <div class="form-group">
    <input type="password" name="password2" class="form-control" placeholder="password">
    </div>
        <div class="form-group">
    <input type="submit" class="btn btn-success" value="S'inscrire" name="submit">
        </div>
    
</form>
