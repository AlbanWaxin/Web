<h1>Page d'enregistrement</h1>
<form action="/doctors/register" method="post" >
    
    <label for="name" class = "form-label">Nom</label>
    <input type="text" id="name" name="name" class = "form-controll d-flex flex-column">

    <label for="email" class = "form-label">Email</label>
    <input type="text" id="email" name="email" class = "form-controll d-flex flex-column">

    <label for="password" class = "form-label">Mot de passe</label>
    <input type="password" id="password" name="password" class = "form-controll mb-3 d-flex flex-column" >

    <label for="confirm_password" class = "form-label">Confirmer le mot de passe</label>
    <input type="password" id="confirm_password" name="confirm_password" class = "form-controll mb-3 d-flex flex-column" >

    <label for="gender" class = "form-label">Genre</label>
    <select name="gender" id="gender-select">    
    <option value="">--Please choose an option--</option>
    <option value="H">Homme</option>
    <option value="F">Femme</option>
    </select>
    </br>
    <label for="specialist" class = "form-label">Spécialité</label>
    <select name="specialist" id="specilist">
    <option value="">--Please choose an option--</option>
    <option value="Cardiology">Cardiologue</option>
    <option value="General">Généraliste</option>
    <option value="Neurology">Neurologue</option>
    <option value="Pédiatric">Pédiatre</option>
    <option value="Oncology">Oncologie</option>
    </select>
    </br>

    <input type="submit" value="S'enregistrer" class = "btn btn-primary btn-sm">

    <div class="error-message">
        <?php
            //var_dump($data);
            if(isset($data['email_error'])) {
                echo $data['email_error'];
            }
            if(isset($data['password_error'])) {
                echo $data['password_error'];
            }
            ?>
    </div>
</form>

