function suppressionPersonnel(idpersonnel) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cet enregistrement ?")) {
      // Envoi de la demande de suppression en utilisant AJAX
      var xhr = new XMLHttpRequest();
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            alert(xhr.responseText); // Affiche la réponse du serveur
            // Actualiser la liste du personnel après suppression
            // (facultatif - vous pouvez choisir de rafraîchir la page ou mettre à jour la liste par d'autres moyens)
          } else {
            alert("Une erreur s'est produite lors de la suppression de l'enregistrement.");
          }
        }
      };
      xhr.open("GET", "supprimer_personnel.php?idpersonnel=" + idpersonnel, true);
      xhr.send();
    }
  }
  