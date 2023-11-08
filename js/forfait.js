import { App,Forfait,Caracteristique,Element } from '../js/class.js';
const form =document.getElementById('form-id');
var boundle =document.getElementById('bundle-forfait');
var carousel=document.getElementById('carousel-forfait');
var tab_filter=[];
tab_filter["nom"]="BLUE NOUS";
tab_filter['nb_go']=50;
console.log(form);
console.log("un monde de fou ici")
fetch("php/api.php",{
    method:"POST",
    body:new FormData(document.getElementById("form-id"))
}).then(res =>res.json())
.then((data)=>{
    //console.log(data);
    var b =data[1];
    //console.log(b);
    var app =new App(data);
    var slider =app.TemplateSlider();
    boundle.innerHTML=app.Template();
    carousel.innerHTML=slider;
    console.log(slider);
    var d=app.Filter(tab_filter);
    d=Object.groupBy(d,(forfait)=> forfait.nom);
    console.log(typeof(d));
    for(var r in d)
    {
        console.log(r);
        console.log(d[r])
    }
    const objet = {
        nom: "Jean",
        âge: 25,
      };
      for (const key of Object.keys(objet)) {
        console.log(key, objet[key]);
      }
    /*d.forEach((v,k)=>{
        console.log(k);
    })*/
  /*  data.map((value)=>{
        var desc=value.description.split(";");
        //console.log(desc)
        var id=desc[0];
        id=id.slice(id.indexOf("$")+1,id.length)
        
        
        console.log(d);
        //console.log(id);
    })*/
    //document.querySelector(".updatemsgadmin").innerHTML = data;
})