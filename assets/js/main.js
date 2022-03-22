class Main {

    constructor() {
        this.bindEvents()
        this.bindDataTable()
        this.bindUrlWithNavigation()
    }

    bindEvents() {
        $(document).ready(function() {
            $('.delete').click((e) => Main.delete(e.currentTarget.id))
        });
    }

    bindDataTable() {
        $(document).ready(function() {
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
        if (window.location.href.includes('page')) {
            Main.getNavigationUrl()
        } else {
            window.history.replaceState({}, '', "?page=dashboard")
        }
        const menuItems = document.querySelectorAll('.nav-item')
        console.log(menuItems)
        menuItems.forEach((item) => {
            item.addEventListener('click', (e) => {
                window.history.replaceState({}, '', "?page=" + e.currentTarget.id)
            }, false)
        })

        window.onpopstate = function(e) {
            Main.getNavigationUrl(pageUrl)
        }
    }

    static getNavigationUrl() {
        let currentUrl = window.location.href.split('/')
        let pageUrl = currentUrl[currentUrl.length - 1]
        if (pageUrl.includes('#')) {
            pageUrl = pageUrl.replace('#', '')
        }
        console.log(pageUrl)
        switch (pageUrl) {
            case 'index.php?page=dashboard':
                Main.dispachEventToNavigateUrl('pills-dashboard-tab')
                break
            case 'index.php?page=product':
                Main.dispachEventToNavigateUrl('pills-product-tab')
                break
            case 'index.php?page=stock':
                Main.dispachEventToNavigateUrl('pills-stock-tab')
                break
            case 'index.php?page=setting':
                Main.dispachEventToNavigateUrl('pills-setting-tab')
                break
            case 'index.php?page=message':
                Main.dispachEventToNavigateUrl('pills-message-tab')
                break
            case 'index.php?page=total-order':
                Main.dispachEventToNavigateUrl('pills-totalOrder-tab')
                break
            case 'index.php?page=analytics':
                Main.dispachEventToNavigateUrl('pills-analytics-tab')
                break
            case 'index.php?page=team':
                Main.dispachEventToNavigateUrl('pills-team-tab')
                break
        }
    }

    /**
     * 
     * @param {number} id  represente l'identifiant du produit en cours de suppression 
     * @param {string} type represente le type de stock sur lequel l'operation en entrain d'etre effectuer
     */
    static delete(type_id) {
        let info = type_id.split("/")
        let id = info[2]
        let type = info[1]
        let page = info[3]
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Etes vous sure?',
            text: "Vous ne pouvez pas revenir en arrière! ",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Oui, supprimer!',
            cancelButtonText: 'Non, Annuler!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'GET',
                    url: 'app/delete.php',
                    data: {
                        id: Number.parseInt(id),
                        type: type
                    }

                }).done(function(data) {
                    swalWithBootstrapButtons.fire(
                        'Supprimer!',
                        'Votre enregistrement a été supprimé.',
                        'success'
                    )
                    setTimeout(function() {
                        location.href = 'index.php?page=' + page
                    }, 2000)
                    alert(data)
                })

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