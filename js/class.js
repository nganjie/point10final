export class Element{
    constructor(tab){
        //console.log(tab);
        this.categorie=tab[0];
        this.valeur=tab[1];
      // console.log(this.categorie);
       // console.log(this.valeur);
    }
    categorie(){
        return this.categorie;
    }
    valeur(){
        return this.valeur;
    }
    Template(){
        return `<p><span style="">${this.categorie}</span> : <span style="color:blue">${this.valeur}</span></p>`;
    }
}
export class Caracteristique{
    elments=[];
    constructor(description){
        var r=description.slice(0,description.lastIndexOf(";")-1);
        //console.log(r);
        //console.log('')

        var tab=r.split(";")
        //console.log(tab)
        //tab =tab.slice(tab.indexOf("$")+1,tab.length);
        for(var i=0;i<tab.length;i++)
        {
            var elt=tab[i];
            //console.log(tab[i])
            elt=elt.slice(elt.indexOf("$")+1,elt.length);
            elt =elt.split(":");
            //console.log(elt);
            //this.elments[i]=new Element(elt);
            this.elments.push(new Element(elt));
        }
    }
    Template(){
        var t='';
        for(var element in this.elments)
        {
           // console.log(element);
            t+=this.elments[element].Template();
        }
        return t;
    }
}
export class Forfait{
    constructor(tab){
        this.id=Number(tab.id);
        this.nom=tab.nom;
        this.nb_go=Number(tab.nb_go);
        this.taille=tab.taille;
        this.type=tab.type;
        this.prix=Number(tab.prix);
        this.description=new Caracteristique(tab.description);
       // console.log(this.description.elments);

       // this.
    }
    isFilter(tab){
        var b = objLength(tab);
        var c =0;
        console.log(tab);
        for(var option in tab)
        {
            //if(tab["nb_go"]==this.nb_go)
            //console.log(tab["nb_go"]+" et "+this.nb_go)
            if(option=="prix")
            {
                if(this.prix==tab[option])
                c++;
            }else if(option=="taille"){
                if(String(this.taille).toLowerCase==String(tab[option]).toLowerCase)
                c++;
            }else if(option=="nom"){
                if(String(this.nom).toLowerCase==String(tab[option]).toLowerCase)
                c++;
            }else if(option=="nb_go")
            {
                
                if(this.nb_go=tab[option])
                c++;
            }
            //console.log("la valeur de c : "+c+" la valeur de b :"+b);
       
    }
    //console.log("la valeur de c : "+c+" la valeur de b :"+b);
    if(c!=0&&c==b)
    return true;
    
    return false
    }
    Template()
    {
        //var t='';
        return `  <a href="${this.nom}" class="bundle_item">
        <div class="bundle_item_content">
          <div class="image">
            <img src="/point10final/public/../media/images/blue.png" alt="" />
          </div>
          <div class="bundle_description">
            <p class="plan"><span style="color:#41f1b6">${this.nom}</span></p>
            ${this.description.Template()}
          </div>
          <div>
            <span class="bundle_name">${this.prix}</span>
          </div>
        </div>
      </a>`;
    }

}
export class App{
    forfaits=[];
    constructor(tab){

        for(var i=0;i<tab.length;i++)
        {
           // console.log(tab[i]);
            this.forfaits.push(new Forfait(tab[i]));
        }
        //this.forfaits=Object.groupBy(this.forfaits,(forfait)=> forfait.nom);
    }
    Filter(tab){
        return this.forfaits.filter((forfait)=>{
            //console.log(forfait);
            return forfait.isFilter(tab)});
    }
    Template()
    {
        var t=``;
        var nom="";
        var fr=Object.groupBy(this.forfaits,(forfait)=> forfait.nom);
       // fr=fr.reverse();
       
        for(var f in fr)
        {
            t+=`<div>`;
            
            t+=`<h3>Catégorie ${f}</h3>`;
            t+=`<div class="sjow_bundle_wrapper">`;
            console.log(fr[f])
            for(var eltf in fr[f])
            {
                console.log(fr[f][eltf])
                t+=fr[f][eltf].Template();
            }
            t+=`</div>`;
            t+=`</div>`;
        }
       // t+=`</div>`;
        return t;
    }
    TemplateSlider()
    {
        //<div class="slide slide-5"></div>
        var t=``;
        var nom="";
        var fr=Object.groupBy(this.forfaits,(forfait)=> forfait.nom);
       // fr=fr.reverse();
       
        for(var f in fr)
        {
           // t+=`<div>`;
            
            //t+=`<h3>Catégorie ${f}</h3>`;
            t+=`<div class="slide slide-5">`;
            console.log(fr[f])
            for(var eltf in fr[f])
            {
                console.log(fr[f][eltf])
                t+=fr[f][eltf].Template();
            }
            t+=`</div>`;
           // t+=`</div>`;
        }
       // t+=`</div>`;
        return t;
    }
}
function objLength(obj){
    var i=0;
    for(var props in obj){
        i++;
    }
    return i;
}