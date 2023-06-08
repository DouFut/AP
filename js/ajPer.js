<<<<<<< HEAD

    function ouvrirFormulaire() {
      // Créer une fenêtre modale pour le formulaire
      var modal = document.createElement("div");
      modal.className = "modal";

      // Créer le contenu du formulaire
      var formulaire = document.createElement("div");
      formulaire.className = "modal-content";
      formulaire.innerHTML = `
        <h2>Ajouter Personnel</h2>
        <div class="form">
        <form>
          <label>Nom:</label>
          <input type="text" name="nom" required><br>
          <label>Prémon:</label>
          <input type="text" name="prenom" required><br>
          <label>Email:</label>
          <input type="email" name="email" required><br>
          <label>Tel:</label>
          <input type="tel" name="telephone" required><br>
          <input type="submit" value="Enregistrer">
        </form>
        </div>
      `;

      // Ajouter le formulaire à la fenêtre modale
      modal.appendChild(formulaire);

      // Ajouter la fenêtre modale à la page
      document.body.appendChild(modal);

    // Empêcher le formulaire de se soumettre normalement
    formulaire.addEventListener("submit", function(event) {
        event.preventDefault();
    
        // Récupérer les valeurs du formulaire
        var nom = formulaire.querySelector("input[name='nom']").value;
        var prenom = formulaire.querySelector("input[name='prenom']").value;
        var email = formulaire.querySelector("input[name='email']").value;
        var tel = formulaire.querySelector("input[name='telephone']").value;
    
        // Effectuer une requête AJAX pour enregistrer les données dans la base de données
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "enregistrer_personnel.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              // La requête a été traitée avec succès, vous pouvez effectuer des actions supplémentaires si nécessaire
              console.log("Enregistrement réussi !");
            } else {
              // Il y a eu une erreur lors de la requête, vous pouvez gérer cette situation en conséquence
              console.error("Erreur lors de l'enregistrement : " + xhr.status);
            }
            // Fermer la fenêtre modale
            modal.remove();
          }
        };
        // Envoyer les données du formulaire dans la requête POST
        var data = "nom=" + encodeURIComponent(nom) + "&prenom=" + encodeURIComponent(prenom) + "&email=" + encodeURIComponent(email) + "&telephone=" + encodeURIComponent(tel);
        xhr.send(data);
      });
=======

    function ouvrirFormulaire() {
      // Créer une fenêtre modale pour le formulaire
      var modal = document.createElement("div");
      modal.className = "modal";

      // Créer le contenu du formulaire
      var formulaire = document.createElement("div");
      formulaire.className = "modal-content";
      formulaire.innerHTML = `
        <h2>Ajouter Personnel</h2>
        <div class="form">
        <form>
          <label>Nom:</label>
          <input type="text" name="nom" required><br>
          <label>Prémon:</label>
          <input type="text" name="nom" required><br>
          <label>Email:</label>
          <input type="email" name="email" required><br>
          <label>Tel:</label>
          <input type="tel" name="tel" required><br>
          <input type="submit" value="Enregistrer">
        </form>
        </div>
      `;

      // Ajouter le formulaire à la fenêtre modale
      modal.appendChild(formulaire);

      // Ajouter la fenêtre modale à la page
      document.body.appendChild(modal);

      // Empêcher le formulaire de se soumettre normalement
      formulaire.addEventListener("submit", function(event) {
        event.preventDefault();
        // Ajoutez ici le code pour enregistrer les informations dans la base de données
        // ...

        // Fermer la fenêtre modale
        modal.remove();
      });
>>>>>>> 1fba50313a5899629436303f2970b92f756ba68d
    }