import { App,Forfait,Caracteristique,Element } from '../js/class.js';
import { search_choices,objLength,sliderPrice,sliderQte } from '../js/range_slider.js';
var select_choix =document.querySelector('.categorie');
console.log(search_choices);
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
    boundle.innerHTML=app.Template(app.forfaits);
    //carousel.innerHTML=slider;
    //console.log(slider);
 
    sliderQte.onChange((values) => {

      var d=app.Template(app.Filter(search_choices));
      boundle.innerHTML=d;
      //console.log("un autre ici")
      //console.log(d)
    });
    sliderPrice.onChange((values) => {

      //search_choices["prix_min"] = values[0];
      //search_choices["prix_max"] = values[1];

      var d=app.Template(app.Filter(search_choices));
      boundle.innerHTML=d;
      //console.log(app.Filter(search_choices))
     // console.log(d)
    });
    select_choix.addEventListener("change",()=>{
      console.log("un bon départ pour ici");
      console.log(search_choices);
      var d=app.Template(app.Filter(search_choices));
      boundle.innerHTML=d;
      console.log(app.Filter(search_choices));

    })
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