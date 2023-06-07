
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
    }