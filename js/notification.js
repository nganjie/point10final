import { launch_toast } from "./toast";
var form_cache =document.getElementById("form-cache");
var notif =document.getElementById("notif");
console.log("cela marche");
form_cache["query"].value="notification";
console.log(form_cache["query"].value)
var nb_commande =Number(notif.innerHTML);
setInterval(()=>{
    fetch(form_cache['chemin'].value+"../php/api.php",{
        method:"POST",
        body:new FormData(document.getElementById("form-cache"))
    }).then(res=>res.json())
    .then((data)=>{
        
        if(nb_commande!=Number(data.nb_commande))
        {
            notif.innerHTML=data.nb_commande
            nb_commande=Number(data.nb_commande);
            launch_toast("Nouvelle commande enregistrer","success")
            console.log(data);
        }
        
    })
},2000)
