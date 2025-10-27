document.getElementById("form").addEventListener("submit", function(e) {
  e.preventDefault();

  const surname = document.getElementById("prenom").value.trim();
  const name = document.getElementById("nom").value.trim();
  const sujet = document.getElementById("sujet").value.trim();
  const message = document.getElementById("message").value.trim();
  const phoneNumber = "237688046369";
  const text = `Je suis ${surname} ${name}, %0A%0A Concernant le ${sujet}, %0A%0A${message}`;
  const whatsappURL = `https://wa.me/${phoneNumber}?text=${text}`; 
  // "%0A" = saut de ligne dans une URL

  window.open(whatsappURL, "_blank");
});