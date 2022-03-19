class Main {
  constructor() {
    this.bindEvents()
  }

  bindEvents() {
    this.bindDataTable()
  }

  bindDataTable() {
    $(document).ready(function () {
      $(".table").dataTable({
        autoWidth: false,
        scrollX : true,
        language: {
          "decimal": "",
          "emptyTable": "Non disponible dans la table",
          "info": "Affichage de _START_ à _END_ entrées sur _TOTAL_",
          "infoEmpty": "Affichage de 0 à 0 sur 0 entrées",
          "infoFiltered": "(filtré à partir de _MAX_ entrées au total)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Affiche _MENU_ entrées",
          "loadingRecords": "Chargement...",
          "processing": "Traitement...",
          "search": "Recherche:",
          "zeroRecords": "Aucun enregistrements correspondants trouvés",
          "paginate": {
            "first": "Premier",
            "last": "Dernier",
            "next": "Suivant",
            "previous": "Précédent"
          },
          "aria": {
            "sortAscending": ": activer pour trier les colonnes par ordre croissant",
            "sortDescending": ": activer pour trier les colonnes par ordre décroissant"
          }
        }
      })
    });

  }


}

new Main()
