function ouvrirModification(idpersonnel) {
    // Effectuer une requête AJAX pour récupérer les détails du personnel
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "idpersonnel.php?idpersonnel=" + idpersonnel, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var personnel = JSON.parse(xhr.responseText);
        afficherFormulaire(personnel);
      }
    };
    xhr.send();
  }
  
  function afficherFormulaire(personnel) {
    // Afficher le formulaire avec les détails du personnel à modifier
    var modal = document.createElement("div");
    modal.className = "modal";
  
    var formulaire = document.createElement("div");
    formulaire.className = "modal-content";
    formulaire.innerHTML = `
      <h2>Modifier Personnel</h2>
      <div class="form">
        <form>
          <!-- Champ pour les informations à modifier -->
          <label>Nom:</label>
          <input type="text" name="nom" value="${personnel.nom}" required><br>
          <label>Prenom:</label>
          <input type="text" name="prenom" value="${personnel.prenom}" required><br>
          <label>Email:</label>
          <input type="email" name="email" value="${personnel.email}" required><br>
          <label>Tel:</label>
          <input type="tel" name="telephone" value="${personnel.telephone}" required><br>
          <input type="submit" value="Enregistrer">
        </form>
      </div>
    `;
  
    modal.appendChild(formulaire);
    document.body.appendChild(modal);
  
    formulaire.addEventListener("submit", function(event) {
      event.preventDefault();
  
      // Afficher une fenêtre de dialogue de confirmation
      if (confirm("Êtes-vous sûr de vouloir enregistrer les modifications ?")) {
        // Récupérer les valeurs du formulaire
        var nom = document.querySelector("input[name=nom]").value;
        var prenom = document.querySelector("input[name=prenom]").value;
        var email = document.querySelector("input[name=email]").value;
        var telephone = document.querySelector("input[name=telephone]").value;
  
        // Envoyer les valeurs à la base de données (adapté selon votre approche)
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "modif_personnel.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
          if (xhr.readyState === 4 && xhr.status === 200) {
            // Réponse de la requête
            console.log(xhr.responseText);
            // Fermer la fenêtre modale
            modal.remove();
          }
        };
        xhr.send("idpersonnel=" + personnel.idpersonnel + "&nom=" + nom + "&prenom=" + prenom + "&email=" + email + "&telephone=" + telephone);
      }
    });
  }
  