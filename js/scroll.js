// // const sections = document.querySelectorAll('.section');
// // const navLinks = document.querySelectorAll('.nav-link');

// // window.addEventListener('scroll', () => {
// //   let current = "";

// //   sections.forEach(section => {
// //     const sectionTop = section.offsetTop - 100; // marge pour détection
// //     if (scrollY >= sectionTop) {
// //       current = section.getAttribute('id');
// //     }
// //   });

// //   navLinks.forEach(link => {
// //     link.classList.remove('active');
// //     if (link.getAttribute('href') === '#' + current) {
// //       link.classList.add('active');
// //     }
// //   });
// // });

// const sections = document.querySelectorAll('section');
// const navLinks = document.querySelectorAll('.link');
// const nav = document.querySelector('nav');

// window.addEventListener('scroll', () => {
//   let current = "";
//   const navHeight = nav.offsetHeight; // hauteur en px, peu importe l’unité CSS

//   sections.forEach(section => {
//     const sectionTop = section.offsetTop - navHeight; // correction automatique
//     if (scrollY >= sectionTop) {
//       current = section.getAttribute('id');
//     }
//   });

//   navLinks.forEach(link => {
//     link.classList.remove('active');
//     if (link.getAttribute('href') === '#' + current) {
//       link.classList.add('active');
//     }
//   });
// });


const sections = document.querySelectorAll("section");
const navLinks = document.querySelectorAll(".link");

// Crée un observateur d’intersection
const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach(entry => {
      const id = entry.target.getAttribute("id");
      const activeLink = document.querySelector(`.link[href="#${id}"]`);

      if (entry.isIntersecting) {
        // Supprime la classe active sur tous les liens
        navLinks.forEach(link => link.classList.remove("active"));
        // Active celui correspondant à la section visible
        if (activeLink) activeLink.classList.add("active");
      }
    });
  },
  {
    threshold: 0.75, // pourcentage de la section visible pour la détecter
  }
);

// Fonction pour rafraîchir les sections observées (utile si certaines sont masquées)
function refreshObserver() {
  observer.disconnect(); // Stoppe l’observation actuelle
  sections.forEach(section => {
    const style = getComputedStyle(section);
    if (style.display !== "none") {
      observer.observe(section); // Observe uniquement les visibles
    }
  });
}

// Démarre l’observation initiale
refreshObserver();

// Si tu modifies dynamiquement le display d’une section, rappelle refreshObserver()
// Exemple :
// document.querySelector('#menu').style.display = 'none';
// refreshObserver();