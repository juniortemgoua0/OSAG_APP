class Main {

    constructor() {
        this.bindEvents()
        this.bindDataTable()
        this.bindUrlWithNavigation()
    }

    bindEvents() {
        $(document).ready(function() {
            $('.delete').click((e) => Main.delete(e.currentTarget.id))

            $('.edit').click((e) => Main.edit(e.currentTarget.id))



            $('#form-utilisateur').submit(function(event) {
                event.preventDefault();
                let formData = Main.formBindValue(event.target, "add-utilisateur");
                console.log(formData)
            })

            $('#form-produit').submit(function(event) {
                event.preventDefault()
                let formData = Main.formBindValue(event.target, "add-produit")
                console.log(formData)
            })

            $('#form-stock').submit(function(event) {
                event.preventDefault()
                let formData = Main.formBindValue(event.target, "add-stock")
                console.log(formData)
            })

            $('#form-magasin').submit(function(event) {
                event.preventDefault()
                let formData = Main.formBindValue(event.target, "add-magasin")
                console.log(formData)
            })

            $('#form-edit-magasin').submit(function(event) {
                event.preventDefault()
                let formData = Main.formBindValue(event.target, "edit-magasin")
                console.log(formData)
            })

            $('#form-edit-stock').submit(function(event) {
                event.preventDefault()
                let formData = Main.formBindValue(event.target, "edit-stock")
                console.log(formData)
            })

            $('#form-out-stock').submit(function(event) {
                event.preventDefault()
                let formData = Main.formBindValue(event.target, "add-outstock")
                console.log(formData)
            })

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
            window.history.replaceState({}, '', "index.php?page=dashboard")
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

    static edit(type_id) {
        let info = type_id.split("/");
        let id = info[0]
        let page= info[1]
        
        switch(type){
            case "product":
                break;
            case 'team':
                break;
        }
    }

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

    static formBindValue(form, formType) {
        let formData = {}
        let operation = formType.split('-')[0] // add ou edit 
        let type = formType.split('-')[1] // magasin , stock , utilisateur ou produit 
        console.log(operation, type)
        if (operation === "add") {
            switch (type) {
                case "utilisateur":
                    formData = {
                        nom: form.elements['nom'].value,
                        prenom: form.elements['prenom'].value,
                        email: form.elements['email'].value,
                        password: form.elements['password'].value,
                        fonction: form.elements['fonction'].value,
                        telephone: form.elements['telephone'].value,
                        cni: form.elements['cni'].value,
                        ville: form.elements['ville'].value,
                        type: type
                    }
                    break
                case "produit":
                    formData = {
                        designation: form.elements['designation'].value,
                        marque: form.elements['marque'].value,
                        prix: form.elements['prix'].value,
                        categorie: form.elements['categorie'].value,
                        image: form.elements['image'].value,
                        type: type
                    }
                    break
                case "stock":
                    formData = {
                        designation: form.elements['designation'].value,
                        quantite: form.elements['quantite'].value,
                        type: type
                    }
                    break
                case "magasin":
                    formData = {
                        designation: form.elements['designation'].value,
                        quantite: form.elements['quantite'].value,
                        type: type
                    }
                    break
                case "outstock":
                    formData = {
                        designation: form.elements['designation'].value,
                        quantite: form.elements['quantite'].value,
                        type: type
                    }
                    break
            }

            $.ajax({
                method: 'GET',
                url: 'app/insert.php',
                data: {
                    formData: formData
                }
            }).done(function(data) {
                if (data.includes('succes')) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Bien...',
                        text: data,
                        confirmButtonText: 'OK!',
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            const getPage = () => {
                                if (type === "magasin" || type === "stock") {
                                    return "stock"
                                } else if (type === "utilisateur") {
                                    return "team"
                                } else {
                                    return "product"
                                }
                            }
                            setTimeout(() => {
                                window.location.href = 'index.php?page=' + getPage()
                            }, 700)
                        }
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ooups...',
                        text: data,
                        confirmButtonText: 'OK!',
                    }).then(function(result) {})
                }

            })

        } else if (operation === "edit") {
            switch (type) {
                case "magasin":
                    formData = {
                        operation: form.elements['operation'].value,
                        quantite: form.elements['quantite'].value,
                        id: form.elements['id-produit'].value,
                        type: type
                    }
                    break
                case "stock":
                    formData = {
                        operation: form.elements['operation'].value,
                        quantite: form.elements['quantite'].value,
                        id: form.elements['id-produit'].value,
                        type: type
                    }
                    break
                default:
                    break
            }

            $.ajax({
                method: 'GET',
                url: 'app/update.php',
                data: {
                    formData: formData
                }
            }).done(function(data) {
                if (data.includes('succes')) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Bien...',
                        text: data,
                        confirmButtonText: 'OK!',
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            const getPage = () => {
                                if (type === "magasin" || type === "stock") {
                                    return "stock"
                                } else if (type === "utilisateur") {
                                    return "team"
                                } else {
                                    return "product"
                                }
                            }
                            setTimeout(() => {
                                window.location.href = 'index.php?page=' + getPage()
                            }, 700)
                        }
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Ooups...',
                        text: data,
                        confirmButtonText: 'OK!',
                    }).then(function(result) {})
                }

            })
        }

        return formData
    }

}

new Main()