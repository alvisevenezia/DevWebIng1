<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/Style.css">
    <title>Inscription</title>
</head>
<body>
    <header> 
        <nav class="navbar">
                <ul>
                    <div></div>
                    <li class="border" ><a href="./Femme.html">FEMME</a></li>
                    <li class="border" ><a href="./Homme.html">HOMME</a></li>
                    <li class="titre">VEPRI</li>
                    <li class="logo">\V</li> 
                    <li class="border"><a href="#">Panier</a></li>
                    <li class="border"><a  href="./connexion.html">Connexion</a></li>
                </ul>
        </nav>
    </header>
    <hr>
 
    <div class="compte">
        <h1 class="titre_compte">COMPTE</h1>     
       
        <form action="./php/inscriptionform.php" method="post" class="form-example">
            <p style=" padding: 20px 0px;">Création d'un compte</p>
                    <div class="checkbox" name="checkHomme">
                      <input type="checkbox" id="checkbox" name="check">
                      <label for="checkbox">Mr.</label>
                    </div>
                   
                    <div class="checkbox2">
                      <input type="checkbox" id="checkbox" name="checkFemme">
                      <label for="checkbox">Mme.</label>
                    </div>
                    <div class="identité">
                        <input class="prenom" type="text" placeholder="Prénom..." name="prenom" required>
                        <input class="nom" type="text" placeholder="Nom..." name="nom" required>
                        <input class="email" type="text" placeholder="E-mail..." name="email" required>
                        <input class="email" type="password" placeholder="Mot de passe..." name="password" required>
                        <input class="email" id="date" type="date" value="Date de Naissance..." name="date" required>
                        <input class="prenom" style="margin-top: 20px;" type="tel" placeholder="Tel..." name="tel" required>
                       
                        <div class="custom-select" required >
                            <select name="pays" aria-placeholder="Pays">
                                <option value="Pays">Pays</option>
                                <option value="France">France</option>
                                <option value="Afghanistan">Afghanistan </option>
                                <option value="Afrique_Centrale">Afrique_Centrale </option>
                                <option value="Afrique_du_sud">Afrique_du_Sud </option>
                                <option value="Albanie">Albanie </option>
                                <option value="Algerie">Algerie </option>
                                <option value="Allemagne">Allemagne </option>
                                <option value="Andorre">Andorre </option>
                                <option value="Angola">Angola </option>
                                <option value="Anguilla">Anguilla </option>
                                <option value="Arabie_Saoudite">Arabie_Saoudite </option>
                                <option value="Argentine">Argentine </option>
                                <option value="Armenie">Armenie </option>
                                <option value="Australie">Australie </option>
                                <option value="Autriche">Autriche </option>
                                <option value="Azerbaidjan">Azerbaidjan </option>
                                
                                <option value="Bahamas">Bahamas </option>
                                <option value="Bangladesh">Bangladesh </option>
                                <option value="Barbade">Barbade </option>
                                <option value="Bahrein">Bahrein </option>
                                <option value="Belgique">Belgique </option>
                                <option value="Belize">Belize </option>
                                <option value="Benin">Benin </option>
                                <option value="Bermudes">Bermudes </option>
                                <option value="Bielorussie">Bielorussie </option>
                                <option value="Bolivie">Bolivie </option>
                                <option value="Botswana">Botswana </option>
                                <option value="Bhoutan">Bhoutan </option>
                                <option value="Boznie_Herzegovine">Boznie_Herzegovine </option>
                                <option value="Bresil">Bresil </option>
                                <option value="Brunei">Brunei </option>
                                <option value="Bulgarie">Bulgarie </option>
                                <option value="Burkina_Faso">Burkina_Faso </option>
                                <option value="Burundi">Burundi </option>
                                
                                <option value="Caiman">Caiman </option>
                                <option value="Cambodge">Cambodge </option>
                                <option value="Cameroun">Cameroun </option>
                                <option value="Canada">Canada </option>
                                <option value="Canaries">Canaries </option>
                                <option value="Cap_vert">Cap_Vert </option>
                                <option value="Chili">Chili </option>
                                <option value="Chine">Chine </option>
                                <option value="Chypre">Chypre </option>
                                <option value="Colombie">Colombie </option>
                                <option value="Comores">Colombie </option>
                                <option value="Congo">Congo </option>
                                <option value="Congo_democratique">Congo_democratique </option>
                                <option value="Cook">Cook </option>
                                <option value="Coree_du_Nord">Coree_du_Nord </option>
                                <option value="Coree_du_Sud">Coree_du_Sud </option>
                                <option value="Costa_Rica">Costa_Rica </option>
                                <option value="Cote_d_Ivoire">Côte_d_Ivoire </option>
                                <option value="Croatie">Croatie </option>
                                <option value="Cuba">Cuba </option>
                                
                                <option value="Danemark">Danemark </option>
                                <option value="Djibouti">Djibouti </option>
                                <option value="Dominique">Dominique </option>
                                
                                <option value="Egypte">Egypte </option>
                                <option value="Emirats_Arabes_Unis">Emirats_Arabes_Unis </option>
                                <option value="Equateur">Equateur </option>
                                <option value="Erythree">Erythree </option>
                                <option value="Espagne">Espagne </option>
                                <option value="Estonie">Estonie </option>
                                <option value="Etats_Unis">Etats_Unis </option>
                                <option value="Ethiopie">Ethiopie </option>
                                
                                <option value="Falkland">Falkland </option>
                                <option value="Feroe">Feroe </option>
                                <option value="Fidji">Fidji </option>
                                <option value="Finlande">Finlande </option>
                                <option value="France">France </option>
                                
                                <option value="Gabon">Gabon </option>
                                <option value="Gambie">Gambie </option>
                                <option value="Georgie">Georgie </option>
                                <option value="Ghana">Ghana </option>
                                <option value="Gibraltar">Gibraltar </option>
                                <option value="Grece">Grece </option>
                                <option value="Grenade">Grenade </option>
                                <option value="Groenland">Groenland </option>
                                <option value="Guadeloupe">Guadeloupe </option>
                                <option value="Guam">Guam </option>
                                <option value="Guatemala">Guatemala</option>
                                <option value="Guernesey">Guernesey </option>
                                <option value="Guinee">Guinee </option>
                                <option value="Guinee_Bissau">Guinee_Bissau </option>
                                <option value="Guinee equatoriale">Guinee_Equatoriale </option>
                                <option value="Guyana">Guyana </option>
                                <option value="Guyane_Francaise ">Guyane_Francaise </option>
                                </select>
                        </div> 
                        <div class="checkbox3">
                            <input type="checkbox" id="checkbox2" name="check" required>
                            <label class="label" for="checkbox" required> J'ACCEPTE LES CONDITIONS GÉNÉRALES ET LA POLITIQUE DE CONFIDENTIALITÉ</label>
                        </div>
                       
                    </div>

                    <button class="valider2" type="submit">Valider</button>
                   
        </form>

        
        <div class="inscription_vendeur"><a href="./Homme.html">Inscription vendeur</a></div>
    </div>



</body>
</html>


</html>