 let form = document.querySelector('#myform');
/* console.log(form.Pass.value);

 // Ecouter la soumissions du formulaire
  form.addEventListener('submit',function(e){
    e.preventDefault();
    champ_vide();
 });
  const champ_vide=function (vcha)
{
    var zonemail = document.getElementById('messagerI3');
    var zonenom = document.getElementById('messagerI1');
    var zonePrenom = document.getElementById('messagerI2');
    var zonePass1 = document.getElementById('messagerI6')
    var zonePass = document.getElementById('messagerI5');
    if (form.Email.value==""){
        zonemail.innerHTML = 'email invalide'; 
        
    }
    else if(form.Nom.value==""){
        zonenom.innerHTML = 'email invalide'; 
        vcha.preventDefault();
    }
    else if(form.Prenom.value==''){
        zonePrenom.innerHTML = 'email invalide'; 
        vcha.preventDefault();
    }
    else if(form.Pass.value==""){
        zonePass.innerHTML = 'email invalide'; 
        vcha.preventDefault();
    }
    else if(form.Password1.value==""){
        zonePass1.innerHTML = 'email invalide'; 
       
    }
    else{
        vcha.preventDefault();
    }


} 

  
 // ecouter la modification de l'email
 form.Email.addEventListener ('change', function(){
    validEmail(this);
 });
 const validEmail= function(inputEmail){
    let emailRegExp = new RegExp (
        '^[a-zA-Z0-9]+[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$', 'g'
    );
    let testEmail = emailRegExp.test(inputEmail.value);
    console.log(testEmail);
    var zonemail = document.getElementById('messagerI3');

   
    if(testEmail){
    zonemail.innerHTML = '';
   
}
else {
   zonemail.innerHTML = 'email invalide';
   inputEmail.preventDefault();

}}  ;
  // ecouter la modification du nom
 form.Nom.addEventListener('change', function(){
    validNom(this);
 });
 const validNom= function(inputNom){
    let NomRegExp = new RegExp (
        '^[A-Za-z\é\è\ê\-]+$', 
    );
    let testNom = NomRegExp.test(inputNom.value);
    console.log(testNom);
    var zonenom = document.getElementById('messagerI1');

    if(testNom){
       zonenom.innerHTML = '';
       
     }
    else {
        zonenom.innerHTML = 'Nom  invalide';
    }
 } ; 
  
  // ecouter la modification du Prenom
  form.Prenom.addEventListener('change', function(){
    validPrenom(this);
 });
 const validPrenom= function(inputPrenom){
    let PrenomRegExp = new RegExp (
        '^[A-Za-z\é\è\ê\-]+$', 
    );
    let testPrenom = PrenomRegExp.test(inputPrenom.value);
    console.log(testPrenom);
    var zonePrenom = document.getElementById('messagerI2');

    if(testPrenom){
       zonePrenom.innerHTML = '';
       
     }
    else {
        zonePrenom.innerHTML = 'Nom  invalide';
    }
 };  
 // ecouter la modification du Password
 form.Pass.addEventListener('change', function(){
    validPass(this);
 });
 const validPass= function(inputPass){
   
    let testPass =inputPass.value;
   
    var zonePass = document.getElementById('messagerI5');

    if(testPass.length> 5){
       zonePass.innerHTML = '';
       
     }
    else {
        zonePass.innerHTML = 'Mot de passe Court';
    }
 };  

  // ecouter la modification du Password
  form.Password1.addEventListener('change', function(){
    vald(this);
 });
 let inputPass=form.Pass;
 let inputPassword1=form.Password1;

 var input_1= (inputPass.value);
 var input_2= (inputPassword1.value);
 
 var zonePass1 = document.getElementById('messagerI6')
 var pass1 = form.Password1.value
 var pass2 = form.Pass.value
 console.log(input_1)
 console.log(input_2)
 
const vald=function (input1, input2){
    if(pass1==pass2){
        zonePass1.innerHTML = '';
    }
    else {
        zonePass1.innerHTML = 'Mot de passe correspond pas';
        
    }
   
    
  form.addEventListener('submit',function(e){
    e.preventDefault();
    champ_vide();
 });


 };  
  
  */
 form.addEventListener('submit',function(e){
    
    var zonemail = document.getElementById('messagerI3');
    var zonenom = document.getElementById('messagerI1');
    var zonePrenom = document.getElementById('messagerI2');
    var zonePass = document.getElementById('messagerI5');
    var zonePass1 = document.getElementById('messagerI6');
    var zonephoto = document.getElementById('messagerI7');
var erreur;

var input = document.getElementsByTagName("input");
for (var i= 0; i< input.length ; i++) {
    console.log(input[i]);
    if(!input[i].value){
        erreur= 'Tous les champs sont requis!!z';

    }

}
if (erreur) {
    e.preventDefault();
    zonemail.innerHTML = erreur;
    zonenom.innerHTML = erreur;
    zonePrenom.innerHTML = erreur;
    zonePass.innerHTML = erreur;
    zonePass1.innerHTML = erreur;
    zonephoto.innerHTML = erreur;
    return false;
} else {
    
    form.submit();
}

});
// ecouter la modification de l'email
form.Email.addEventListener ('keyup', function(){
    validEmail(this);
 });
 const validEmail= function(inputEmail){
    let emailRegExp = new RegExp (
        '^[a-zA-Z0-9]+[a-zA-Z0-9.-_]+[@]{1}[a-zA-Z0-9.-_]+[.]{1}[a-z]{2,10}$', 'g'
    );
    let testEmail = emailRegExp.test(inputEmail.value);
    console.log(testEmail);
    var zonemail = document.getElementById('messagerI3');

   
    if(testEmail){
    zonemail.innerHTML = '';
   
}
else {
   zonemail.innerHTML = 'email invalide';
   inputEmail.preventDefault();

}}  ;
 // ecouter la modification du nom
 form.Nom.addEventListener('keyup', function(){
    validNom(this);
 });
 const validNom= function(inputNom){
    let NomRegExp = new RegExp (
        '^[A-Za-z\é\è\ê\-]+$', 
    );
    let testNom = NomRegExp.test(inputNom.value);
    console.log(testNom);
    var zonenom = document.getElementById('messagerI1');

    if(testNom){
       zonenom.innerHTML = '';
       
     }
    else {
        zonenom.innerHTML = 'Nom  invalide';
        inputNom.preventDefault();
    }
 } ; 
  
  // ecouter la modification du Prenom
  form.Prenom.addEventListener('keyup', function(){
    validPrenom(this);
 });
 const validPrenom= function(inputPrenom){
    let PrenomRegExp = new RegExp (
        '^[A-Za-z\é\è\ê\-]+$', 
    );
    let testPrenom = PrenomRegExp.test(inputPrenom.value);
    console.log(testPrenom);
    var zonePrenom = document.getElementById('messagerI2');

    if(testPrenom){
       zonePrenom.innerHTML = '';
       
     }
    else {
        zonePrenom.innerHTML = 'Nom  invalide';
        inputPrenom.preventDefault();
    }
 };  
 // ecouter la modification du Password
 form.Pass.addEventListener('keyup', function(){
    validPass(this);
 });
 const validPass= function(inputPass){
   
    let testPass =inputPass.value;
   
    var zonePass = document.getElementById('messagerI5');

    if(testPass.length> 5){
       zonePass.innerHTML = 'valid';
       zonePass.style.color='green'
       
     }
    else {
        zonePass.innerHTML = 'Mot de passe Court';
        zonePass.style.color='red'
        inputPass.preventDefault();
    }
 };  

  // ecouter la modification du Password
  form.Password1.addEventListener('keyup', function(){
    vald(this);
 });



 var zonePass1 = document.getElementById('messagerI6');
 var pass1 = form.Password1;
 var pass2 = form.Pass;
 
 
const vald=function (passcotrl){
    if(pass2.value==pass1.value){
        zonePass1.innerHTML = 'valid';
        zonePass1.style.color='green'
    }
    else {
        zonePass1.innerHTML = 'Mot de passe correspond pas';
        zonePass1.style.color='red'
        passcotrl.preventDefault();
        
    }
   
    
}
function getfile(){
    document.getElementById('photo').click();
    document.getElementById('photo1').value=document.getElementById('photo').value
}


 