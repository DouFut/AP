function afficherAbsences(idpersonnel) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var absences = JSON.parse(xhr.responseText);
      afficherFormulaireAbsences(absences); // Appel de la fonction pour afficher le formulaire
    }
  };
  xhr.open("GET", "obtenir_absences.php?idpersonnel=" + idpersonnel, true);
  xhr.send();
}

function afficherFormulaireAbsences(absences) {
  var formulaireAbsences = document.getElementById("formulaireAbsences");
  formulaireAbsences.innerHTML = ""; // Réinitialisation du contenu de l'élément
  
  // Création du formulaire et des éléments de saisie des dates
  var formulaireHTML = "<form>";
  formulaireHTML += "<label for='dateDebut'>Date de début:</label>";
  formulaireHTML += "<input type='date' id='dateDebut' name='dateDebut'>";
  formulaireHTML += "<label for='dateFin'>Date de fin:</label>";
  formulaireHTML += "<input type='date' id='dateFin' name='dateFin'>";
  formulaireHTML += "<button type='button' onclick='enregistrerAbsences()'>Enregistrer</button>";
  formulaireHTML += "</form>";

  formulaireAbsences.innerHTML = formulaireHTML;
}


