<?php require_once 'view_begin.php' ?>
<link rel="stylesheet" href="/content/css/login.css">

<header> 
            <!-- formulaire pour se connecter -->
            <form action="/?controller=login&action=login" method="POST" id="logForm">
                <div id="container">
                    <div class="logElement">
                        <p class="log"> Adresse e-mail ou mobile</p>
                        <input type="text" name="login" id="login" required>
                    </div>
                    <div class="logElement">
                        <p class="log"> Mot de passe</p>
                        <input type="password" name="pass" id="pass" required>
                    </div>
                    <input type="submit" value="Connexion" class="log" id="submit">
                </div>
            </form>
            
</header>

<div id="text">
    <h2> Inscription </h2>
    <h3>C'est gratuit (et ça le restera toujours)</h3>
</div>

<!-- formulaire pour créer un compte -->
<form action="/?controller=login&action=sign" method="post" id="registration">
    <div id="principal">
        <div class="flex">
            <input type="text" name="fname" id="fname" placeholder="Prénom" required>
            <input type="text" name="lname" id="lname" placeholder="Nom de famille" required>
        </div>
        <div class="line">
            <input id="loginRegister" name="login" type="text" placeholder="Numéro de mobile ou email" required> 
        </div>

        <div class="line">
            <input type="text" name="conflogin" id="confLoginRegister" placeholder="Confimer numéro de mobile ou email" required>
            <span id="errConfLogin" class="error">Invalide</span>
        </div>

        <div class="line">
            <input type="password" name="pass" id="passRegister" placeholder="Nouveau mot de passe" required>
            <span id="errPass" class="error">Minimum 8 carac</span>
        </div>

        <div id="birth" class="line">   
            <h3>Date de naissance</h3>
            <select name="day" id="day" required>
                <?php for ($i=1; $i<=31;$i++) : ?>
                    <option value="<?=$i?>"><?=$i?></option>
                <?php endfor ?>
            </select>
                      
            <select name="month" id="month" required>
                <?php for($i=1; $i<=12;$i++): ?>
                    <option value="<?=$i?>"><?=$i?></option>
                <?php endfor ?>
            </select>

            <select name="year" id="year" required>
                <?php for ($i=1920; $i<=2008;$i++) : ?>
                    <option value="<?=$i?>"><?=$i?></option>
                <?php endfor ?>
            </select>
        </div>

        
        <div id="genderContainer" class="flex">
            <div><input type="radio" name="gender" class="gender" value="F" required> <p>Femme </p> </div>
            <div><input type="radio" name="gender" class="gender" value="M" required> <p>Homme</p></div>
        </div>
        
        <p id="mention">
        En cliquant sur Inscription, vous acceptez nos <strong>Conditions</strong> et indiquez que vous avez lu notre <strong>Politique</strong> 
        d'utilisation des donnée, y compris notre <strong>Utilisation des cookies</strong>. Vous pourrez recevoir des notifications 
        par texto de la part de Facebook et pouvez vous désabonner à tout moment. 
        </p>

        <div id="send">
            <input type="submit" value="Inscription">
        </div>
    </div>

     
</form>




<script src="/content/js/check.js"></script>

<?php require_once 'view_end.php' ?>
