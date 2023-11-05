import { App,Forfait,Caracteristique,Element } from '../js/class.js';
const form =document.getElementById('form-id');
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
    var d=app.Filter(tab_filter);
    console.log(d);
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