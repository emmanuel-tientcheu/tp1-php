/* code php : script.js
**********************************************
* Auteur : TIENTCHEU TCHOKOUATOU EMMANUEL
* E-mail : <tientcheutchokouatoue@gmail.com>
***********************************************
* Date de création : 13-11-2022
* Dernière modification : 19-11-2022
***********************************************
* Historique des modifications 
* 13-11-2022 : controle si l'utilisateur a bien
               saisie le meme mot de passe deux
               fois et rend le bouton de 
               soumission diabled ou un disabled
**********************************************/

let contain_mdp = "";
let contain_confirm = "";

let validation_btn = document.getElementById("submit");
validation_btn.disabled = true;

let mdp_input = document.getElementById("mdp");
let confirm_input = document.getElementById("valid");

controle = ()=>{
    if(contain_mdp == contain_confirm  && contain_mdp.length > 0 && contain_confirm.length > 0){
        validation_btn.disabled = false;
    }
    if(contain_mdp != contain_confirm){
        validation_btn.disabled = true;
    }
}

mdp_input.addEventListener('keyup' , (e)=>{
    contain_mdp = e.target.value;
    controle();
});

confirm_input.addEventListener('keyup', (e)=>{
    contain_confirm = e.target.value;
    controle();
})
