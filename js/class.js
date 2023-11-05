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
}
export class Forfait{
    constructor(tab){
        this.id=tab.id;
        this.nom=tab.nom;
        this.nb_go=tab.nb_go;
        this.taille=tab.taille;
        this.type=tab.type;
        this.prix=tab.prix;
        this.description=new Caracteristique(tab.description);
       // console.log(this.description.elments);

       // this.
    }
    isFilter(tab){
        var b = objLength(tab);
        var c =0;
        for(var option in tab)
        {
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
            }
            console.log("la valeur de c : "+c+" la valeur de b :"+b);
        if(c!=0&&c==b)
        return true;
        
        return false
        }
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
    }
    Filter(tab){
        return this.forfaits.filter((forfait)=>{
            //console.log(forfait);
            return forfait.isFilter(tab)});
    }
}
function objLength(obj){
    var i=0;
    for(var props in obj){
        i++;
    }
    return i;
}