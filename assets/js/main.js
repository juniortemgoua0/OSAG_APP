class Main {

  constructor() {
    this.bindEvents()
    this.bindDataTable()
    // this.bindUrlWithNavigation()
  }


  bindEvents() {
    $(document).ready(function () {
      $('.delete').click(Main.deleteProduct)
    });
  }

  bindDataTable() {
    $(document).ready(function () {
      $(".table").dataTable({
        autoWidth: false,
        scrollX: true,
        language: {
          "decimal": "",
          "emptyTable": "Non disponible dans la table",
          "info": "Affichage de _START_ à _END_ entrées sur _TOTAL_",
          "infoEmpty": "Affichage de 0 à 0 sur 0 entrées",
          "infoFiltered": "(filtré à partir de _MAX_ entrées au total)",
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

  bindUrlWithNavigation() {
    window.history.replaceState({}, '', "/dashboard")
    const menuItems = document.querySelectorAll('.nav-item')
    console.log(menuItems)
    menuItems.forEach((item) => {
      item.addEventListener('click', (e) => {
        window.history.replaceState({}, '', "/" + e.currentTarget.id)
      }, false)
    })

    window.onpopstate = function (e) {
      console.log(window.location.href)
      let currentUrl = window.location.href.split('/')
      let pageUrl = currentUrl[currentUrl.length - 1]
      if (pageUrl.includes('#')) {
        pageUrl = pageUrl.replace('#', '')
      }
      console.log(pageUrl)
      switch (pageUrl) {
        case 'dashboard':
          Main.dispachEventToNavigateUrl('pills-dashboard-tab')
          break
        case 'product' :
          Main.dispachEventToNavigateUrl('pills-product-tab')
          break
        case 'stock' :
          Main.dispachEventToNavigateUrl('pills-stock-tab')
          break
        case 'setting' :
          Main.dispachEventToNavigateUrl('pills-setting-tab')
          break
        case 'message' :
          Main.dispachEventToNavigateUrl('pills-message-tab')
          break
        case 'total-order' :
          Main.dispachEventToNavigateUrl('pills-totalOrder-tab')
          break
        case 'analytics' :
          Main.dispachEventToNavigateUrl('pills-analytics-tab')
          break
        case 'team' :
          Main.dispachEventToNavigateUrl('pills-team-tab')
          break
      }
    }
  }

  static deleteProduct() {
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
      title: 'Etes vous sure?',
      text: "Vous ne pouvez pas revenir en arrière!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Oui, supprimer!',
      cancelButtonText: 'Non, Annuler!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        swalWithBootstrapButtons.fire(
          'Supprimer!',
          'Votre enregistrement a été supprimé.',
          'success'
        )
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Annuler',
          'Votre enregistrement est sauve :)',
          'error'
        )
      }
    })
  }

  static dispachEventToNavigateUrl(id) {
    let evt = document.createEvent("MouseEvents");
    evt.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
    document.querySelector('#' + id).dispatchEvent(evt);
  }

}

new Main()
