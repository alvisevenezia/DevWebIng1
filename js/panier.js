function saveBasket(basket) {
    localStorage.setItem("basket", JSON.stringify(basket));
    // sauvegarde le panier dans le local storage
}

function getBasket() {
    let basket = localStorage.getItem("basket");
    // assigne à la variable basket l'objet JSON du panier qui est dans le local storage
    if (basket == null) {
        return [];
        //si il n'y plus rien dans le panier asigne un tableau vide
    } else {
        return JSON.parse(basket);
        // retourne la chaine de caractère jSON prise par le panier en objet javascript
    }
}

//fonction pour ajouter au panier le produit et sa quantité
function addBasket(product, quantity) {
    let basket = getBasket();
    let foundProduct = basket.find(p => p.id == product.id);
    //cherche le produit mis en parametre dans la chaine javascript basket
    // console.log(quantity);
    // console.log(product);

    if (foundProduct != undefined) {
        foundProduct.quantity += quantity;
        //si il ya deja le produit dans le panier on change juste la quantité
    } else {
        product.quantity = quantity;
        basket.push(product); // fonction pour le push dedans
        //si il n'existe pas dans le panier l'ajoute et sa quantité
    }
    saveBasket(basket); //sauvegarde le panier

}





function removeFromBasket(id) {
    console.log(id);
    let basket = getBasket(); // comme d'habitude
    basket = basket.filter(p => p.id != id); // trouve dans le panier le produit correspondant à l' id entré en paramètre et le supprime
    saveBasket(basket);
    window.location.reload(); //recharge la page pour afficher le produit supprimer
}

function changequantity(id, quantity) {
    let basket = getBasket();
    let foundProduct = basket.find(p => p.id == id); //cherche le produit
    var i = 0;
    // console.log(foundProduct);
    var requestURL = 'donnees/produits.json'; //asigne l'url de la requete au fichier produits json
    var request = new XMLHttpRequest(); //créer une nouvelle requette ajax
    request.open('GET', requestURL); //va chercher à l'aide d'une requête ajax les données du json
    request.responseType = 'json'; // la réponse de la requete est au format json
    request.send(); //envoi la requete 
    request.onload = function () { //chare la requete
        var superHeroes = request.response; // la var superhero prend pour valeur l'objet produit.json
        while (superHeroes[i].id != foundProduct.id) { //creer une boucle pour trouver dans la var supheroes le le produit correspondant à l'id
            i = i + 1;
        }
        // console.log(foundProduct.quantity);
        var w = foundProduct.quantity + quantity; // calcul avant la quantité de produits qui seront présentes dans le panier
        if (foundProduct != undefined && (superHeroes[i].stock > w)) { // si le produit est bien dans le panier et qu'il y a bien asser de stock
            foundProduct.quantity += quantity; //change la quantité pour la quantité donné
            // console.log(foundProduct.quantity);
            console.log(superHeroes[i].stock);
            if (foundProduct.quantity <= 0) { // si la quantité descend à zéro ou moins
                removeFromBasket(foundProduct.id); //supprime le produit du panier

            } else {
                saveBasket(basket);
            }
        }
    }
    window.location.reload();
}



//fonction pour afficher le panier
function panier() {

    let basket = getBasket();
    let div = document.getElementById('basketProduit'); //assigne la ou sera ecrit le panier dans panier.php grace à l'encr basketProduit
    let stringhtml = ""; // notre variable qui est une string

    for (let article of basket) // pour chaque produits du panier


    {
        stringhtml += // notre variable prend l'ecriture de ci-dessous pour chaque produits du panier

            `<div class="between_flex ligne_panier"><div class="center_align flex">
        <div id="blocimage">
        <img src="assets/img/${article.img}" alt="image" />
            
                </div>
            <div id="blocProduit">

         <p >${article.name}</p>
         <p >${article.taille}</p>
         <p >${article.price} €</p>

            </div></div>
            <div class="panier_buttons center_align">
            <div> </div>
            <div class="panier_buttons center_align">
            <div>
              <button class="button_panier"  onclick="changequantity(${article.id},-1)">-</button>
              <span class="produit-quantite" >${article.quantity}</span>
              <button class="button_panier" onclick="changequantity(${article.id},1)">+</button>
            </div>
            <div style="margin-top:5px">TOTAL : ${parseInt(article.quantity) * parseInt(article.price)}€</div>
            </div>
             <div id="delete-panier"><button class="remove_button_panier" onclick="removeFromBasket(${article.id})">x  supprimer du panier</button> 
             </div>
                </div>
                </div>
    
    `;

    }
    div.innerHTML = stringhtml; // insere dans le panier.php ce qu'il faut afficher
}


// affiche le recapitulatif du panier
function recapitulatif() {
    // la meme chose qq'avant
    let basket = getBasket();
    let div = document.getElementById('articleliste');
    let stringhtml = "";

    for (let article of basket)


    {
        stringhtml +=
            `
            <li> - 
            <span >${article.name} </span>
            <span >/ quantite: ${article.quantity} /</span>
            <span >${parseInt(article.quantity) * parseInt(article.price)}€</span>
            </li>
            `;

    }
    div.innerHTML = stringhtml;
}


// fonction pour créer le prix total
function getTotalPrice() {
    let basket = getBasket();
    let total = 0;
    for (let product of basket) {
        total += parseInt(product.quantity) * parseInt(product.price);
        // pour chaque produit calcule le prix de son prix * la quantité et l'ajoute a total
    }
    document.getElementById('prixHT').innerHTML = total;
    //renvoi dans panier.php la variable total
    return total;
}


var clicks = 1;

//fonction pour incrementer les stock dans la page vrai produits.php
function increment(stock) {

    if (stock > clicks) { //tant qu'il y a assez de stock
        clicks += 1; // augmente la variable de 1
        // console.log(clicks);
    } else {
        var xhr_object = null; // si on atteint la limite des stocks

        if (window.XMLHttpRequest) // Firefox 
            xhr_object = new XMLHttpRequest();
        // créer une nouvelle requete
        else if (window.ActiveXObject) // Internet Explorer 
            xhr_object = new ActiveXObject("Microsoft.XMLHTTP");
        else { // XMLHttpRequest non supporeé par le navigateur 
            alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
            return;
        }
        xhr_object.open("GET", location.href, false);
        //ouvre la requete
        xhr_object.send(null);
        if (xhr_object.readyState == 4) alert("Nous n'avons pas assez de produits en stock!");
        // renvoi dans la requete le message
    }


    document.getElementById("clicks").innerHTML = clicks;

};

function decrement() {
    if (clicks <= 1) {
        document.getElementById("clicks").innerHTML = clicks;
        // si on essaye de baisser la quantite du produit a ajouter en dessou de 1 c est impossible
    } else {
        clicks += -1;
        // console.log(clicks);
        // sinon baisse clique de 1
        document.getElementById("clicks").innerHTML = clicks;
    }
};


// function miniondestroy(dat) {
//     var req = new XMLHttpRequest();
//     data = JSON.stringify(dat);
//     console.log(data);
//     req.open("POST", requestURL);
//     req.setRequestHeader("Content-Type", "application/json");
//     req.send(data);
// }

//fonction qui ne fonctionne pas pour changer les stocks une fois un achat
function destroystock() {

    let basket = getBasket();
    var requestURL = 'donnees/produits.json';
    var request = new XMLHttpRequest();
    request.open('GET', requestURL);
    request.responseType = 'json';
    request.send();

    request.onload = function () {
        var superHeroes = request.response;
        //donnee a la variable super heroe l'objet produit.json
        for (let product of basket) { // pour chaque produit du panier
            for (var i = 0; i < superHeroes.length; i++) {
                if (product.id == superHeroes[i].id) {
                    // console.log(superHeroes[i].stock);
                    superHeroes[i].stock = superHeroes[i].stock - product.quantity; //change la quantité dans l'objet json 
                    // console.log(superHeroes[i].stock);
                    var data = JSON.stringify(superHeroes);
                    var xhr = new XMLHttpRequest();
                    xhr.open("POST", "../phpincl/apiConnect.php", !0);
                    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
                    xhr.send(data);

                }
            }

        }
    }
}


panier();
recapitulatif();
getTotalPrice();

