 let form = document.querySelector('#myform');

 var zonemail = document.getElementById('messagerC3');
    var zonePass = document.getElementById('messagerC5');

form.addEventListener('submit',function(e){
    
    
  
var erreur;

var input = document.getElementsByTagName("input");
for (var i= 0; i< input.length ; i++) {
    console.log(input[i]);
    if(input[i].value ==""){
        erreur= 'Tous les champs sont requis';

    }

}
if (erreur) {
    e.preventDefault();
    zonemail.innerHTML = erreur;
    zonePass.innerHTML = erreur;
   
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
    

   
    if(testEmail){
    zonemail.innerHTML = 'valide';
    zonemail.style.color='green'
   
}
else {
   zonemail.innerHTML = 'email invalide';
   zonemail.style.color='red'
   inputEmail.preventDefault();

}}  ;

// ecouter la modification du Password
form.Pass.addEventListener('keyup', function(){
    validPass(this);
 });
 const validPass= function(inputPass){
   
    let testPass =inputPass.value;
   
    
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