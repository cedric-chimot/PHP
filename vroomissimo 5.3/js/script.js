//lien par des variables aux diférentes parties du HTML
let userBox = document.querySelector('.header .header-2 .user-box');

//activation/désactivation de la box compte d'utilisateur
document.querySelector('#user-btn').onclick = () =>{
   userBox.classList.toggle('active');
   navbar.classList.remove('active');
}

let navbar = document.querySelector('.header .header-2 .navbar');

//gestion de l'affichage du menu burger en taille d'écran réduite
document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   userBox.classList.remove('active');
}

window.onscroll = () =>{
   userBox.classList.remove('active');
   navbar.classList.remove('active');

   //affichage de la navbar en scrollant de haut en bas
   if(window.scrollY > 60){
      document.querySelector('.header .header-2').classList.add('active');
   }else{
      document.querySelector('.header .header-2').classList.remove('active');
   }
}

window.onload = () => {
   //on va chercher toutes les étoiles
   const stars = document.querySelectorAll(".fa-star");

   //on va chercher l'input
   const note = document.querySelector("#note");

   //on fait une boucle sur les étoiles pour ajouter l'event listener
   for(star of stars) {
      //écouteur sur le survol
      star.addEventListener("mouseover", function() {
         resetStars();
         this.style.color = "black";
         this.classList.add("fa");
         this.classList.remove("fa-regular");
         //élément présent dans le DOM(de même niveau, balise soeur)
         let previousStar = this.previousElementSibling;

         while(previousStar){
            //l'étoile qui précède passe en jaune
            previousStar.style.color = "goldenrod";
            previousStar.classList.add("fa");
            previousStar.classList.remove("fa-regular");
            //on récupère l'étoile qui précède
            previousStar = previousStar.previousElementSibling;
         }
      });

      //event listener sur le click
      star.addEventListener("click", function(){
         note.value = this.dataset.value;
      });

      star.addEventListener("mouseout", function(){
         resetStars(note.value);
      });
   }

   /**
    * reset des étoiles en vérifiant la note dans l'input type "hidden"
    * @param {number} note
    */
   function resetStars(note = 0) {
      for(star of stars){
         if(star.dataset.value > note){
            star.style.color = "black";
            star.classList.add("fa-regular");
            star.classList.remove("fa");
         }else{
            star.style.color = "goldenrod";
            star.classList.add("fa");
            star.classList.remove("fa-regular");
         }
      }
   }

}