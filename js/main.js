let collectionBtnNouvelle = document.querySelectorAll("input[type=button]");
console.log(collectionBtnNouvelle.length);
if (collectionBtnNouvelle)
{
    for (let btn of collectionBtnNouvelle){
            console.log(btn.id)
            btn.addEventListener('click',Ajax);
    }
}


function Ajax(evt) {
    //rechercher l'attribut "visible"
    let oAfficher = document.querySelector("div[visible='true']");
    
    //Celui qui vient d'être cliqué
    let oDiv = document.querySelector("div[data-id='"+evt.srcElement.id+"']");
    if(this.value == "fermer"){
        
        
        oDiv.setAttribute("visible", "false");
        oDiv.style.display = "none";
        
        this.value ="lire la suite ...";
    }else{
        this.value = "fermer";
        //ajouter un attribut
        oDiv.setAttribute("visible", "true")
        oDiv.style.display = "block";

    }
    
    
    if(oAfficher != null){
        oAfficher.setAttribute("visible", "false")
        oAfficher.style.display = "none";
        console.log(oAfficher.getAttribute("data-id"));
        let oButton =document.querySelector("input[id='"+oAfficher.getAttribute("data-id")+ "']");
        oButton.value ="lire la suite ...";
    }
    
    
    
   
    
    
    let maRequete = new XMLHttpRequest();    

    maRequete.onload = function () {
        
        if (maRequete.status >= 200 && maRequete.status < 400) {
            let oDataJSON = JSON.parse(maRequete.responseText);
            
            //console.log(evt.target.dataset.checked);
            // instructions ici
            creationHTML(oDataJSON, oDiv);  // paramètres à ajouter
        } else {
            console.log('La connexion est faite mais il y a une erreur');
        }
    }//fin de la fonction anonyme 

    maRequete.open('GET', 'http://localhost/2020-veille/wp-json/wp/v2/posts/' + evt.target.getAttribute("id") );     
    maRequete.send();

    maRequete.onerror = function () {
        console.log("erreur de connexion");
    }

    // instructions à ajouter

}
///////////////////////////////////////////////////////

function creationHTML(oDataJSON, oDiv){
    
    let monHtmlString = '';
    
    monHtmlString += '<h2>' + oDataJSON.title.rendered + '</h2>'
    monHtmlString += oDataJSON.content.rendered;
    
    oDiv.innerHTML = monHtmlString; 
}




