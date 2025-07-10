<?php

return [
    'admin' => [
        'configuration' => [
            'index' => [
                'marketplace' => [
                    'title' => 'Mercat',
                    'info'  => 'Gestiona el Mercat',

                    'module-info' => [
                        'title'       => 'Informació del Mòdul',
                        'info'        => 'Proporciona informació relacionada amb la versió de l\'aplicació.',
                        'app-version' => 'Versió de l\'Aplicació:- v2.3.0',
                    ],

                    'general' => [
                        'admin-commission-percentage'  => 'Percentatge de Comissió de l\'Administrador',
                        'description'                  => 'Gestiona la configuració general del Mercat com l\'estat, la comissió, etc.',
                        'lines-in-street-address'      => 'Línies a l\'Adreça del Carrer',
                        'lines-in-street-address-info' => 'Estableix el nombre de línies a l\'adreça del carrer. Per defecte és una línia.',
                        'status'                       => 'Estat',
                        'title'                        => 'General',
                    ],

                    'product' => [
                        'approval-required'         => 'Aprovació Requerida',
                        'description'               => 'Gestiona la configuració dels productes del Mercat com l\'aprovació, les banderes, etc.',
                        'enable-flag'               => 'Habilitar Bandera',
                        'seller-can-assign-product' => 'El Venedor Pot Assignar Producte',
                        'seller-can-create-product' => 'El Venedor Pot Crear Producte',
                        'show-progress-bar'         => 'Mostrar Barra de Progrés',
                        'title'                     => 'Producte',
                    ],

                    'seller' => [
                        'approval-required'           => 'Aprovació Requerida',
                        'can-cancel-order'            => 'Pot Cancel·lar Comanda',
                        'can-create-invoice'          => 'Pot Crear Factura',
                        'can-create-shipment'         => 'Pot Crear Enviament',
                        'description'                 => 'Gestiona la configuració dels venedors del Mercat com l\'aprovació, les banderes, etc.',
                        'enable-flag'                 => 'Habilitar Bandera',
                        'enable-minimum-order-amount' => 'Habilitar Import Mínim de Comanda',
                        'enable-seller-flag'          => 'Habilitar Bandera de Venedor',
                        'red-flag-limit'              => 'Límit de Bandera Vermella',
                        'red-flag-limit-info'         => 'Si el venedor supera aquest límit, es mostrarà una bandera vermella al perfil del venedor.',
                        'show-red-flag'               => 'Mostrar bandera vermella al perfil si se supera el límit',
                        'title'                       => 'Venedor',
                    ],

                    'featured-sellers' => [
                        'limit-count' => 'Límit de Quantitat',
                        'description' => 'Gestiona els venedors destacats del Mercat.',
                        'status'      => 'Estat',
                        'title'       => 'Venedors Destacats',

                        'popularity-criteria' => [
                            'all'              => 'Tots',
                            'maximum-orders'   => 'Màxim de Comandes',
                            'maximum-products' => 'Màxim de Productes',
                            'maximum-rating'   => 'Màxima Valoració',
                            'maximum-sale'     => 'Màxima Venda',
                            'title'            => 'Criteris de Popularitat',
                        ],
                    ],

                    'landing-page' => [
                        'banner-btn-title'    => 'Títol del Botó del Banner',
                        'banner-description'  => 'Descripció del Banner',
                        'banner-image'        => 'Imatge del Banner',
                        'banner-title'        => 'Títol del Banner',
                        'business-hour'       => 'Horari Comercial',
                        'community-count'     => 'Comptador de Comunitat',
                        'description'         => 'Personalitza la pàgina d\'inici del Mercat, afegint icones, banners i descripcions per a un aspecte fresc.',
                        'feature-box1-desc'   => 'Descripció de la Caixa de Característiques 1',
                        'feature-box1-icon'   => 'Icona de la Caixa de Característiques 1',
                        'feature-box1-title'  => 'Títol de la Caixa de Característiques 1',
                        'feature-box2-desc'   => 'Descripció de la Caixa de Característiques 2',
                        'feature-box2-icon'   => 'Icona de la Caixa de Característiques 2',
                        'feature-box2-title'  => 'Títol de la Caixa de Característiques 2',
                        'feature-box3-desc'   => 'Descripció de la Caixa de Característiques 3',
                        'feature-box3-icon'   => 'Icona de la Caixa de Característiques 3',
                        'feature-box3-title'  => 'Títol de la Caixa de Característiques 3',
                        'feature-box4-desc'   => 'Descripció de la Caixa de Característiques 4',
                        'feature-box4-icon'   => 'Icona de la Caixa de Característiques 4',
                        'feature-box4-title'  => 'Títol de la Caixa de Característiques 4',
                        'feature-description' => 'Descripció de les Característiques',
                        'feature-image'       => 'Imatge de les Característiques',
                        'feature-title'       => 'Títol de les Característiques',
                        'journey-description' => 'Descripció del Viatge',
                        'journey-image'       => 'Imatge del Viatge',
                        'journey-step1-desc'  => 'Descripció del Pas 1 del Viatge',
                        'journey-step1-icon'  => 'Icona del Pas 1 del Viatge',
                        'journey-step1-title' => 'Títol del Pas 1 del Viatge',
                        'journey-step2-desc'  => 'Descripció del Pas 2 del Viatge',
                        'journey-step2-icon'  => 'Icona del Pas 2 del Viatge',
                        'journey-step2-title' => 'Títol del Pas 2 del Viatge',
                        'journey-step3-desc'  => 'Descripció del Pas 3 del Viatge',
                        'journey-step3-icon'  => 'Icona del Pas 3 del Viatge',
                        'journey-step3-title' => 'Títol del Pas 3 del Viatge',
                        'journey-step4-desc'  => 'Descripció del Pas 4 del Viatge',
                        'journey-step4-icon'  => 'Icona del Pas 4 del Viatge',
                        'journey-step4-title' => 'Títol del Pas 4 del Viatge',
                        'journey-step5-desc'  => 'Descripció del Pas 5 del Viatge',
                        'journey-step5-icon'  => 'Icona del Pas 5 del Viatge',
                        'journey-step5-title' => 'Títol del Pas 5 del Viatge',
                        'journey-title'       => 'Títol del Viatge',
                        'payment-duration'    => 'Durada del Pagament',
                        'serviceable-pincode' => 'Codi Postal Serveix',
                        'title'               => 'Pàgina d\'Inici',
                    ],
                ],
            ],
        ],

        'acl' => [
            'assign-product'    => 'Assignar Producte',
            'communications'    => 'Comunicacions',
            'create'            => 'Crear',
            'delete'            => 'Eliminar',
            'edit'              => 'Editar',
            'flag-reasons'      => 'Raons de Bandera',
            'inventory-sources' => 'Fonts d\'Inventari',
            'orders'            => 'Comandes',
            'pay'               => 'Pagar',
            'payment-request'   => 'Sol·licitud de Pagament',
            'product-reviews'   => 'Ressenyes de Productes',
            'products'          => 'Productes',
            'reviews'           => 'Ressenyes de Venedors',
            'seller-categories' => 'Categories de Venedors',
            'sellers'           => 'Venedors',
            'title'             => 'Mercat',
            'transactions'      => 'Transaccions',
            'view'              => 'Veure',
        ],

        'menu' => [
            'communications'    => 'Comunicacions',
            'flag-reasons'      => 'Raons de Bandera',
            'inventory-sources' => 'Fonts d\'Inventari',
            'orders'            => 'Comandes',
            'payment-requests'  => 'Sol·licituds de Pagament',
            'product-reviews'   => 'Ressenyes de Productes',
            'products'          => 'Productes',
            'seller-categories' => 'Categories de Venedors',
            'seller-reviews'    => 'Ressenyes de Venedors',
            'sellers'           => 'Venedors',
            'title'             => 'Mercat',
            'transactions'      => 'Transaccions',
        ],

        'sellers' => [
            'index' => [
                'add-btn'            => 'Afegeix Venedors',
                'delete-failed'      => 'La supressió del venedor ha fallat!',
                'delete-success'     => 'Venedor eliminat correctament.',
                'incomplete-profile' => 'El venedor té el perfil incomplet!',
                'login-message'      => 'Has iniciat sessió com :seller_name',
                'pending-orders'     => 'El venedor té algunes comandes pendents',
                'title'              => 'Venedors',
                'update-success'     => 'Venedor actualitzat correctament!',

                'datagrid' => [
                    'add-product'     => 'Assignar',
                    'approved'        => 'Aprovat',
                    'assign-product'  => 'Assignar Producte',
                    'created-at'      => 'Creat El',
                    'delete'          => 'Eliminar',
                    'disapproved'     => 'Desaprovat',
                    'edit'            => 'Editar',
                    'email'           => 'Correu Electrònic',
                    'flags'           => 'Banderes',
                    'id'              => 'Id',
                    'login-as-seller' => 'Inicia sessió com a Venedor',
                    'seller-id'       => 'ID - :seller_id',
                    'seller-name'     => 'Nom del Venedor',
                    'shop-url'        => 'URL de la Botiga',
                    'status'          => 'Estat',
                    'suspended'       => 'Suspès',
                    'total-flags'     => 'Total de Banderes: :count',
                    'update-status'   => 'Actualitza Estat',
                ],

                'create'  => [
                    'address'        => 'Adreça',
                    'street-address' => 'Adreça del Carrer',
                    'city'           => 'Ciutat',
                    'country'        => 'País',
                    'email'          => 'Correu Electrònic',
                    'name'           => 'Nom',
                    'phone'          => 'Número de Telèfon',
                    'postcode'       => 'Codi Postal',
                    'save-btn'       => 'Desa',
                    'select'         => 'Selecciona',
                    'shop-title'     => 'Títol de la Botiga',
                    'shop-url'       => 'URL de la Botiga',
                    'state'          => 'Estat',
                    'success'        => 'Venedor creat correctament.',
                    'title'          => 'Crea Venedor',
                ],
            ],

            'flags' => [
                'index' => [
                    'title' => 'Banderes del Venedor',

                    'datagrid' => [
                        'customer-email' => 'Correu Electrònic del Client',
                        'customer-name'  => 'Nom del Client',
                        'date'           => 'Data',
                        'id'             => 'Id',
                        'reason'         => 'Raó',
                    ],
                ],
            ],

            'search' => [
                'back-btn'          => 'Enrere',
                'image-placeholder' => 'Imatge del Producte',
                'no-result'         => 'No s\'ha trobat cap resultat!',
                'sku'               => 'SKU - :sku',
                'title'             => 'Cerca de Productes',
            ],

            'assign-product' => [
                'already-selling'     => 'El venedor ja està venent aquest producte',
                'assign-successfully' => 'Producte assignat correctament al venedor.',
                'back-btn'            => 'Enrere',
                'condition'           => 'Condició',
                'description'         => 'Descripció',
                'new'                 => 'Nou',
                'old'                 => 'Usat',
                'price'               => 'Preu',
                'product-not-allowed' => 'El venedor no té permís per vendre productes de tipus :type.',
                'quantities'          => 'Quantitats',
                'save-btn'            => 'Desa',
                'select-condition'    => 'Selecciona Condició',
                'title'               => 'Assignar Producte',

                'seller-details' => [
                    'additional-info' => 'Informació Addicional',
                    'approved'        => 'Aprovat',
                    'disapproved'     => 'Desaprovat',
                    'no-of-products'  => 'Núm. de Productes',
                    'status'          => 'Estat',
                    'suspended'       => 'Suspès',
                    'title'           => 'Detalls del Venedor',
                ],

                'product-details' => [
                    'active'            => 'Actiu',
                    'disable'           => 'Desactiva',
                    'title'             => 'Detalls del Producte',
                    'image-placeholder' => 'Imatge del Producte',
                ],

                'images' => [
                    'info'  => 'La resolució de la imatge hauria de ser com 609px X 560px',
                    'title' => 'Imatges',
                ],

                'videos' => [
                    'error' => 'El vídeo no pot superar els :max kilobytes. Si us plau, tria un fitxer més petit.',
                    'info'  => 'La mida màxima del vídeo hauria de ser com :size',
                    'title' => 'Vídeos',
                ],

                'configurable' => [
                    'delete-btn'        => 'Elimina',
                    'edit-btn'          => 'Edita',
                    'image-placeholder' => 'Imatge del Producte',
                    'qty'               => 'Quantitat - :qty',
                    'sku'               => 'SKU - :sku',
                    'title'             => 'Variacions',

                    'edit' => [
                        'images'     => 'Imatges',
                        'price'      => 'Preu',
                        'quantities' => 'Quantitats',
                        'save-btn'   => 'Desa',
                    ],
                ],

                'downloadable' => [
                    'links' => [
                        'add-btn'     => 'Afegeix Enllaç',
                        'delete-btn'  => 'Elimina',
                        'edit-btn'    => 'Edita',
                        'empty-info'  => 'Per crear un enllaç ràpidament.',
                        'empty-title' => 'Afegeix Enllaç',
                        'file'        => 'Fitxer : ',
                        'info'        => 'El tipus de producte descarregable permet vendre productes digitals, com ara llibres electrònics, aplicacions de programari, música, jocs, etc.',
                        'sample-file' => 'Fitxer de Mostra : ',
                        'sample-url'  => 'URL de Mostra : ',
                        'title'       => 'Enllaços Descarregables',
                        'url'         => 'URL : ',

                        'update-create' => [
                            'downloads'   => 'Descàrregues Permeses',
                            'file'        => 'Fitxer',
                            'file-type'   => 'Tipus de Fitxer',
                            'name'        => 'Títol',
                            'price'       => 'Preu',
                            'sample'      => 'Mostra',
                            'sample-type' => 'Tipus de Mostra',
                            'save-btn'    => 'Desa',
                            'title'       => 'Enllaç',
                            'url'         => 'URL',
                        ],
                    ],

                    'samples' => [
                        'add-btn'     => 'Afegeix Mostra',
                        'delete-btn'  => 'Elimina',
                        'edit-btn'    => 'Edita',
                        'empty-info'  => 'Per crear una mostra ràpidament.',
                        'empty-title' => 'Afegeix Mostra',
                        'file'        => 'Fitxer : ',
                        'info'        => 'El tipus de producte descarregable permet vendre productes digitals, com ara llibres electrònics, aplicacions de programari, música, jocs, etc.',
                        'title'       => 'Mostres Descarregables',
                        'url'         => 'URL : ',

                        'update-create' => [
                            'file'        => 'Fitxer',
                            'file-type'   => 'Tipus de Fitxer',
                            'name'        => 'Títol',
                            'save-btn'    => 'Desa',
                            'title'       => 'Enllaç',
                            'url'         => 'URL',
                        ],
                    ],
                ],
            ],

            'edit' => [
                'back-btn'       => 'Enrere',
                'title'          => 'Edita Venedor',
                'update-btn'     => 'Actualitza Venedor',
                'suspended'      => 'Suspès',
                'update-success' => 'Venedor actualitzat correctament.',

                'shop' => [
                    'address'          => 'Adreça',
                    'street-address'   => 'Adreça del Carrer',
                    'city'             => 'Ciutat',
                    'country'          => 'País',
                    'description'      => 'Descripció',
                    'email'            => 'Correu Electrònic',
                    'name'             => 'Nom',
                    'phone-number'     => 'Número de Telèfon',
                    'postcode'         => 'Codi Postal',
                    'select'           => 'Selecciona',
                    'shop-title'       => 'Títol de la Botiga',
                    'state'            => 'Estat',
                    'title'            => 'Detalls de la Botiga',
                    'url'              => 'URL de la Botiga',
                ],

                'profile' => [
                    'banner'         => 'Banner del Perfil',
                    'banner-size'    => 'La mida del banner hauria de ser com 300px X 200px',
                    'logo'           => 'Logo del Perfil',
                    'logo-size'      => 'La mida del logo hauria de ser com 125px X 125px',
                    'social-links'   => 'Enllaç de :name',
                    'title'          => 'Detalls del Perfil',
                ],

                'allowed-product' => [
                    'title'  => 'Producte Permès',
                ],

                'minimum-order-amount' => [
                    'title'  => 'Import Mínim de Comanda',
                ],

                'google-analytics-id' => [
                    'title'  => 'ID de Google Analytics',
                ],

                'commission' => [
                    'percentage' => 'Percentatge',
                    'status'     => 'Estat',
                    'title'      => 'Comissió del Venedor',
                ],

                'meta-info' => [
                    'meta-description' => 'Meta Descripció',
                    'meta-keyword'     => 'Meta Paraula Clau',
                    'meta-title'       => 'Meta Títol',
                    'title'            => 'Informació Meta',
                ],

                'policy' => [
                    'privacy'  => 'Política de Privacitat',
                    'return'   => 'Política de Devolucions',
                    'shipping' => 'Política d\'Enviament',
                    'title'    => 'Polítiques',
                ],

                'channels' => [
                    'title' => 'Canal',
                ],

                'users' => [
                    'email' => 'Correu Electrònic',
                    'id'    => 'Id',
                    'name'  => 'Nom',
                    'phone' => 'Telèfon',
                    'title' => 'Usuaris',
                ],
            ],
        ],

        'products' => [
            'index' => [
                'add-btn'        => 'Afegeix Productes',
                'delete-success' => 'Producte eliminat correctament.',
                'title'          => 'Productes',
                'update-success' => 'Producte actualitzat correctament.',

                'datagrid' => [
                    'approved'       => 'Aprovat',
                    'delete'         => 'Eliminar',
                    'disapproved'    => 'Desaprovat',
                    'flags'          => 'Banderes',
                    'id'             => 'Id',
                    'is-owner'       => 'És Propietari',
                    'no'             => 'No',
                    'out-of-stock'   => 'Sense Estoc',
                    'price'          => 'Preu',
                    'product-id'     => 'ID - :product_id',
                    'product-name'   => 'Nom del Producte',
                    'product-number' => 'Número de Producte',
                    'product-type'   => 'Tipus de Producte',
                    'quantity'       => 'Quantitat',
                    'seller-name'    => 'Nom del Venedor',
                    'sku'            => 'SKU',
                    'status'         => 'Estat',
                    'total-flags'    => 'Total de Banderes: :count',
                    'total-quantity' => ':quantity Disponibles',
                    'update-status'  => 'Actualitza Estat',
                    'yes'            => 'Sí',
                ],
            ],

            'flags' => [
                'index' => [
                    'title' => 'Banderes del Producte',

                    'datagrid' => [
                        'customer-email' => 'Correu Electrònic del Client',
                        'customer-name'  => 'Nom del Client',
                        'date'           => 'Data',
                        'id'             => 'Id',
                        'reason'         => 'Raó',
                    ],
                ],
            ],
        ],

        'product-reviews' => [
            'index' => [
                'review-details' => 'Detalls de la Ressenya',
                'title'          => 'Ressenyes de Productes',

                'datagrid' => [
                    'approved'      => 'Aprovat',
                    'comment'       => 'Comentari',
                    'customer-name' => 'Nom del Client',
                    'date'          => 'Data',
                    'disapproved'   => 'Desaprovat',
                    'id'            => 'Id',
                    'images'        => 'Imatges',
                    'pending'       => 'Pendent',
                    'product'       => 'Producte',
                    'product-name'  => 'Nom del Producte',
                    'rating'        => 'Valoració',
                    'review-id'     => 'ID - :review_id',
                    'shop-title'    => 'Títol de la Botiga',
                    'status'        => 'Estat',
                    'title'         => 'Títol',
                    'view'          => 'Veure',
                    'update-status' => 'Actualitza Estat',
                ],
            ],

            'update-success' => 'Ressenyes de productes actualitzades correctament.',
            'delete-success' => 'Ressenyes de productes eliminades correctament.',
        ],

        'seller-reviews' => [
            'index' => [
                'title' => 'Ressenyes del Venedor',

                'datagrid' => [
                    'approved'            => 'Aprovat',
                    'comment'             => 'Comentari',
                    'customer-name'       => 'Nom del Client',
                    'date'                => 'Data',
                    'delete'              => 'Eliminar',
                    'disapproved'         => 'Desaprovat',
                    'id'                  => 'Id',
                    'mass-delete-success' => 'Ressenyes del venedor eliminades correctament.',
                    'mass-update-success' => 'Ressenyes del venedor actualitzades correctament.',
                    'pending'             => 'Pendent',
                    'rating'              => 'Valoració',
                    'review-id'           => 'ID - :review_id',
                    'review-title'        => 'Títol de la Ressenya',
                    'seller-name'         => 'Nom del Venedor',
                    'shop-title'          => 'Títol de la Botiga',
                    'status'              => 'Estat',
                    'update-status'       => 'Actualitza Estat',
                ],
            ],

            'delete-success' => 'Ressenya del venedor eliminada correctament.',
        ],

        'orders' => [
            'index' => [
                'title' => 'Comandes',

                'datagrid' => [
                    'canceled'        => 'Cancel·lat',
                    'closed'          => 'Tancat',
                    'commission'      => 'Comissió',
                    'completed'       => 'Completat',
                    'customer'        => 'Client',
                    'date'            => 'Data',
                    'discount'        => 'Descompte',
                    'email'           => 'Correu Electrònic',
                    'fraud'           => 'Fraude',
                    'gross-amt'       => 'Import Brut',
                    'id'              => 'Id',
                    'items'           => 'Articles',
                    'location'        => 'Ubicació',
                    'order-id'        => 'ID - #:id',
                    'payment'         => 'Pagament',
                    'pending'         => 'Pendent',
                    'pending-payment' => 'Pagament Pendent',
                    'processing'      => 'Processant',
                    'seller'          => 'Venedor',
                    'seller-earn'     => 'Guany',
                    'shipment'        => 'Enviament',
                    'shop'            => 'Botiga',
                    'status'          => 'Estat',
                    'view'            => 'Veure',
                ],
            ],
        ],

        'transactions' => [
            'index' => [
                'title' => 'Transaccions',

                'datagrid' => [
                    'base-total'     => 'Total Base',
                    'comment'        => 'Comentari',
                    'customer-name'  => 'Nom del Client',
                    'id'             => 'Id',
                    'seller-id'      => 'Id del Venedor',
                    'seller-name'    => 'Nom del Venedor',
                    'transaction-id' => 'Id de la Transacció',
                    'view'           => 'Veure',
                ],
            ],

            'view' => [
                'commission'        => 'Comissió',
                'created-on'        => 'creat el :date,',
                'name'              => 'Nom',
                'payment-method'    => 'Pagament :method',
                'price'             => 'Preu',
                'qty'               => 'Quantitat',
                'seller-total'      => 'Total del Venedor',
                'shipping-handling' => 'Enviament i Maneig',
                'subtotal'          => 'Subtotal',
                'tax'               => 'Impost',
                'title'             => 'Transaccions #:transaction_id',
                'total'             => 'Total',
            ],
        ],

        'flag-reasons' => [
            'index' => [
                'create-btn'          => 'Crea Raó',
                'delete-success'      => 'Raó de Bandera eliminada correctament.',
                'mass-delete-success' => 'Raons de Bandera eliminades correctament.',
                'mass-update-success' => 'Raons de Bandera actualitzades correctament.',
                'title'               => 'Raons de Bandera',

                'datagrid' => [
                    'delete'        => 'Eliminar',
                    'edit'          => 'Editar',
                    'id'            => 'Id',
                    'name'          => 'Nom',
                    'update-status' => 'Actualitza Estat',

                    'status' => [
                        'active'  => 'Actiu',
                        'disable' => 'Desactiva',
                        'title'   => 'Estat',
                    ],

                    'type' => [
                        'product' => 'Producte',
                        'seller'  => 'Venedor',
                        'title'   => 'Tipus',
                    ],
                ],
            ],

            'create' => [
                'admin'    => 'Administrador',
                'back-btn' => 'Enrere',
                'general'  => 'General',
                'label'    => 'Etiqueta',
                'product'  => 'Producte',
                'save-btn' => 'Desa Raó',
                'seller'   => 'Venedor',
                'status'   => 'Estat',
                'title'    => 'Crea Raó',
                'type'     => 'Tipus',
            ],

            'edit' => [
                'admin'    => 'Administrador',
                'back-btn' => 'Enrere',
                'general'  => 'General',
                'label'    => 'Etiqueta',
                'product'  => 'Producte',
                'save-btn' => 'Desa Raó',
                'seller'   => 'Venedor',
                'status'   => 'Estat',
                'title'    => 'Edita Raó',
                'type'     => 'Tipus',
            ],

            'create-success' => 'Raó de Bandera creada correctament.',
            'update-success' => 'Raó de Bandera actualitzada correctament.',
        ],

        'seller-categories' => [
            'index' => [
                'create-btn'     => 'Assignar Categoria',
                'create-success' => 'Categoria assignada correctament.',
                'delete-failed'  => 'La supressió de la raó de la bandera del venedor ha fallat!',
                'delete-success' => 'Categoria eliminada correctament.',
                'title'          => 'Categories del Venedor',
                'update-success' => 'Categoria actualitzada correctament.',

                'datagrid' => [
                    'delete' => 'Eliminar',
                    'edit'   => 'Editar',
                    'id'     => 'Id',
                    'name'   => 'Nom',
                ],
            ],

            'create' => [
                'back-btn'      => 'Enrere',
                'save-btn'      => 'Desa Categoria',
                'select-seller' => 'Selecciona Venedor',
                'seller'        => 'Venedor',
                'title'         => 'Assignar Categoria',
            ],

            'edit' => [
                'back-btn'   => 'Enrere',
                'seller'     => 'Venedor',
                'title'      => 'Editar Categoria',
                'update-btn' => 'Actualitza Categoria',
            ],
        ],

        'payment-request' => [
            'index' => [
                'comment'              => 'Comentari',
                'no-amount-remaining'  => 'No queda cap import per pagar!',
                'order-not-found'      => 'Comanda no trobada!',
                'pay-btn'              => 'Paga Ara',
                'pay-to-seller'        => 'Pagament al Venedor',
                'payment-success'      => 'El venedor ha estat pagat correctament!',
                'something-went-wrong' => 'Alguna cosa ha anat malament!',
                'title'                => 'Sol·licitud de Pagament',

                'datagrid' => [
                    'already-paid'          => 'Ja Pagat',
                    'canceled'              => 'Cancel·lat',
                    'closed'                => 'Tancat',
                    'completed'             => 'Completat',
                    'customer-name'         => 'Nom del Client',
                    'date'                  => 'Data',
                    'email'                 => 'Correu Electrònic',
                    'fraud'                 => 'Fraude',
                    'gross-amt'             => 'Import Brut',
                    'id'                    => 'Id de la Comanda',
                    'invoice-pending'       => 'Factura Pendent',
                    'order-canceled'        => 'Comanda Cancel·lada',
                    'order-id'              => 'Id #:id',
                    'pay'                   => 'Pagar',
                    'pending'               => 'Pendent',
                    'pending-payment'       => 'Pagament Pendent',
                    'processing'            => 'Processant',
                    'refunded'              => 'Reemborsat',
                    'remaining-total'       => 'Total Restant',
                    'request-payment'       => 'Sol·licitar Pagament',
                    'seller'                => 'Venedor',
                    'seller-total-invoiced' => 'Total Facturat pel Venedor',
                    'shop'                  => 'Botiga',
                    'status'                => 'Estat',
                    'total-paid'            => 'Total Pagat',
                    'view'                  => 'Veure',
                ],
            ],
        ],

        'communications' => [
            'index' => [
                'block-seller'         => 'Bloqueja Venedor',
                'block-success'        => 'Venedor Bloquejat Correctament!',
                'chat-history-cleared' => 'Historial de Xat Esborrat Correctament!',
                'clear-chat-history'   => 'Esborra Historial de Xat',
                'exit'                 => 'Sortir',
                'message-failed'       => 'L\'enviament del missatge ha fallat!',
                'message-sent'         => 'Missatge enviat correctament!',
                'no-message'           => 'No s\'ha trobat cap missatge!',
                'search'               => 'Cerca',
                'search-message'       => 'Cerca Missatge',
                'seller-blocked'       => 'Has bloquejat aquest venedor. No pots enviar missatges a aquest venedor.',
                'sellers'              => 'Venedors',
                'title'                => 'Comunicacions',
                'type-message'         => 'Escriu el teu missatge aquí...',
                'unblock-seller'       => 'Desbloqueja Venedor',
                'unblock-success'      => 'Venedor Desbloquejat Correctament!',
                'welcome-message'      => 'Benvingut a la Comunicació del Mercat!',

                'filters' => [
                    'all-messages'      => 'Tots els Missatges',
                    'prev-fifteen-days' => 'Últims 15 Dies',
                    'prev-seven-days'   => 'Últims 7 Dies',
                    'prev-six-months'   => 'Últims 6 Mesos',
                    'prev-thirty-days'  => 'Últims 30 Dies',
                ],
            ],
        ],

        'inventory-sources' => [
            'index' => [
                'title' => 'Fonts d’Inventari',

                'datagrid' => [
                    'active'      => 'Actiu',
                    'code'        => 'Codi',
                    'id'          => 'Id',
                    'inactive'    => 'Inactiu',
                    'name'        => 'Nom',
                    'seller-name' => 'Nom del venedor',
                    'shop-title'  => 'Títol de la botiga',
                    'status'      => 'Estat',
                ],

                'view' => [
                    'active'         => 'Actiu',
                    'address'        => 'Adreça de la font',
                    'city'           => 'Ciutat',
                    'code'           => 'Codi',
                    'contact-email'  => 'Correu electrònic',
                    'contact-fax'    => 'Fax',
                    'contact-info'   => 'Informació de contacte',
                    'contact-name'   => 'Nom',
                    'contact-number' => 'Telèfon de contacte',
                    'country'        => 'País',
                    'description'    => 'Descripció',
                    'general-info'   => 'Informació general',
                    'inactive'       => 'Inactiu',
                    'latitude'       => 'Latitud',
                    'longitude'      => 'Longitud',
                    'name'           => 'Nom',
                    'postcode'       => 'Codi postal',
                    'priority'       => 'Prioritat',
                    'seller-info'    => 'Informació del venedor',
                    'seller-name'    => 'Nom del venedor',
                    'settings'       => 'Configuració',
                    'shop-title'     => 'Títol de la botiga',
                    'state'          => 'Província',
                    'street'         => 'Carrer',
                    'title'          => 'Font d’inventari núm. :id',
                ],
            ],
        ],
    ],

    'commands' => [
        'install' => [
            'description' => 'Instal·la el paquet Marketplace.',
            'migrate'     => 'Migrant totes les taules a la base de dades (això pot trigar una mica)...',
            'seed'        => 'S’estan inserint dades a la base de dades...',
            'publish'     => 'Publicant recursos i configuracions...',
            'cache'       => 'S’està netejant la memòria cau...',
            'finish'      => 'El paquet Marketplace s’ha instal·lat correctament.',
        ],

        'version' => [
            'description' => 'Mostra la versió actual del paquet Marketplace.',
            'comment'     => 'Versió de Marketplace: :version',
        ],
    ],

    'emails' => [
        'dear'        => 'Benvolgut/da :customer_name',
        'dear-admin'  => 'Benvolgut/da administrador/a',
        'dear-seller' => 'Benvolgut/da venedor/a',

        'seller' => [
            'registration' => [
                'date'        => 'Data de registre:',
                'description' => 'Estem encantats d’informar-te sobre un nou registre de venedor a la nostra plataforma. Si us plau, pren-te un moment per donar-li la benvinguda.',
                'details'     => 'Aquí tens els detalls:',
                'email'       => 'Adreça electrònica:',
                'greeting'    => 'Espero que aquest missatge et trobi bé.',
                'name'        => 'Nom del venedor:',
                'shop'        => 'URL de la botiga:',
                'subject'     => 'Nou registre de venedor',
            ],

            'forgot-password' => [
                'description'    => 'Has rebut aquest correu electrònic perquè hem rebut una sol·licitud de restabliment de contrasenya per al teu compte.',
                'greeting'       => 'Has oblidat la contrasenya!',
                'reset-password' => 'Restablir la contrasenya',
                'subject'        => 'Correu per restablir la contrasenya',
            ],

            'welcome' => [
                'description' => 'Benvingut/da a bord! Estem encantats que t’unisquis a la nostra família. La teva presència com a venedor/a aporta un gran valor a la nostra plataforma, i esperem una col·laboració exitosa.',
                'greeting'    => 'Benvingut/da i gràcies per registrar-te amb nosaltres!',
                'subject'     => 'Notificació de benvinguda al venedor',
            ],

            'approval' => [
                'approved'    => 'la teva sol·licitud per convertir-te en venedor/a ha estat acceptada.',
                'disapproved' => 'la teva sol·licitud per convertir-te en venedor/a ha estat rebutjada.',
                'greeting'    => 'Benvingut/da i gràcies per registrar-te amb nosaltres!',
                'subject'     => 'Notificació d’aprovació del venedor',
            ],

            'update' => [
                'description' => 'el teu perfil s’ha actualitzat correctament.',
                'greeting'    => 'Espero que aquest missatge et trobi bé.',
                'subject'     => 'Notificació d’actualització del perfil del venedor',
            ],

            'good-bye' => [
                'description' => 'Ha estat un plaer treballar amb tu, i estem molt agraïts per la teva professionalitat, dedicació i la gran qualitat dels teus productes/serveis. El teu compromís amb la satisfacció del client no ha passat desapercebut i ha estat clau per a la nostra experiència positiva.',
                'greeting'    => 'Confio que aquest missatge et trobi bé.',
                'subject'     => 'Notificació d’acomiadament del venedor',
            ],

            'product-approval' => [
                'approved'    => 'El teu producte :name ha estat aprovat.',
                'disapproved' => 'El teu producte :name ha estat rebutjat.',
                'greeting'    => 'Benvingut/da i gràcies per registrar-te amb nosaltres!',
                'subject'     => 'Notificació d’aprovació del producte del venedor',
            ],

            'orders' => [
                'created' => [
                    'greeting' => 'Tens una nova comanda :order_id realitzada el :created_at',
                    'subject'  => 'Confirmació de nova comanda',
                    'summary'  => 'Resum de la comanda',
                    'title'    => 'Confirmació de comanda!',
                ],

                'canceled' => [
                    'greeting' => 'La comanda :order_id ha estat cancel·lada',
                    'subject'  => 'Confirmació de cancel·lació de comanda',
                    'summary'  => 'Resum de la comanda',
                    'title'    => 'Cancel·lació de comanda!',
                ],

                'billing-address'   => 'Adreça de facturació',
                'contact'           => 'Contacte',
                'discount'          => 'Descompte',
                'grand-total'       => 'Total general',
                'name'              => 'Nom',
                'payment'           => 'Pagament',
                'price'             => 'Preu',
                'qty'               => 'Quantitat',
                'shipping'          => 'Enviament',
                'shipping-address'  => 'Adreça d’enviament',
                'shipping-handling' => 'Gestió de l’enviament',
                'sku'               => 'SKU',
                'subtotal'          => 'Subtotal',
                'tax'               => 'Impost',
            ],

            'payment-request' => [
                'greeting'  => 'Confio que aquest missatge et trobi bé.',
                'paid'      => 'Hola.. Has rebut el pagament per la comanda :order_id.',
                'requested' => 'El venedor :seller_name ha sol·licitat el pagament de la comanda :order_id.',
                'subject'   => 'Notificació de sol·licitud de pagament del venedor',
            ],
        ],

        'contact-seller' => [
            'email'    => 'Correu electrònic:- :email',
            'greeting' => 'Espero que aquest missatge et trobi bé.',
            'info'     => 'Hola, :name té una pregunta per a tu. Si us plau, revisa els detalls següents.',
            'query'    => 'Consulta:- :query',
            'subject'  => 'Notificació de contacte amb el venedor',
            'topic'    => 'Assumpte:- :subject',
        ],

        'report-product' => [
            'admin-msg'  => 'Hola, ":name" ha informat d’un problema amb el producte ":product_name" del venedor ":seller_name". Si us plau, revisa els detalls següents.',
            'greeting'   => 'Confio que aquest missatge et trobi bé.',
            'reason'     => 'Motiu:- :reason',
            'seller-msg' => 'Hola, ":name" ha informat d’un problema amb el teu producte ":product_name". Si us plau, revisa els detalls següents.',
            'subject'    => 'Notificació d’informe de producte',
        ],

        'report-seller' => [
            'admin-msg'  => 'Hola, :name ha informat d’un problema amb :seller_name. Si us plau, revisa els detalls següents.',
            'greeting'   => 'Confio que aquest missatge et trobi bé.',
            'reason'     => 'Motiu:- :reason',
            'seller-msg' => 'Hola, :name ha informat d’un problema relacionat amb tu. Si us plau, revisa els detalls següents.',
            'subject'    => 'Notificació d’informe de venedor',
        ],
    ],

    'seeders' => [
        'configurations' => [
            'banner-title'        => 'Crea un compte de venedor a Velocity',
            'banner-description'  => 'Velocity pot ser una gran plataforma per vendre els teus productes a empreses modernes de l’Índia. Seguint aquests consells, pots preparar-te per tenir èxit com a venedor a Velocity!',
            'banner-btn-title'    => 'Obre la botiga',
            'feature-title'       => 'Per què els venedors estimen vendre a Velocity?',
            'feature-description' => 'Els venedors estimen les plataformes d’alta velocitat perquè ofereixen potencial d’augmentar les vendes, millor exposició i una experiència de venda eficient que pot contribuir al creixement i l’èxit empresarial.',
            'feature-box1-title'  => 'Oportunitats de Venda Augmentades',
            'feature-box1-desc'   => 'Els venedors estimen les plataformes d’alta velocitat perquè ofereixen potencial d’augmentar les vendes, millor exposició i una experiència de venda eficient que pot contribuir al creixement i l’èxit empresarial.',
            'feature-box2-title'  => 'Temps de Resposta més Ràpid',
            'feature-box2-desc'   => 'Els productes tendeixen a vendre’s més ràpidament en plataformes d’alta velocitat, generant un gir d’estoc més ràpid i ingressos per als venedors.',
            'feature-box3-title'  => 'Visibilitat Millorada',
            'feature-box3-desc'   => 'Aquestes plataformes ofereixen més visibilitat i exposició per als productes dels venedors, resultant en més visualitzacions i possibles vendes.',
            'feature-box4-title'  => 'Eficiència i Comoditat',
            'feature-box4-desc'   => 'Les plataformes d’alta velocitat sovint tenen processos i eines optimitzades que fan la venda més eficient, estalviant temps i esforç als venedors en la gestió dels seus negocis en línia.',
            'journey-title'       => 'Comença el teu camí a Velocity',
            'journey-description' => 'Comença a vendre a grans clients d’arreu del món, les 24 hores del dia.',
            'journey-step1-title' => 'Converteix-te en Venedor',
            'journey-step1-desc'  => 'Configura la teva botiga amb tota la informació bàsica.',
            'journey-step2-title' => 'Llista Productes',
            'journey-step2-desc'  => 'Llista els productes a la botiga perquè els clients els vegin i els comprin.',
            'journey-step3-title' => 'Rep Comandes',
            'journey-step3-desc'  => 'Rep comandes d’una àmplia gamma de clients d’arreu del món.',
            'journey-step4-title' => 'Lliurament del Producte',
            'journey-step4-desc'  => 'Un cop el producte és lliurat i s’ha rebut el pagament.',
            'journey-step5-title' => 'Pagament',
            'journey-step5-desc'  => 'Sol·licitud de pagament: rep el pagament després de la comissió.',
        ],

        'flag-reasons' => [
            'damaged-product'           => 'Producte danyat',
            'damaged-product-sold'      => 'Producte danyat venut pel venedor',
            'duplicate-product'         => 'Producte duplicat',
            'duplicate-product-sold'    => 'Producte duplicat venut pel venedor',
            'missing-product-parts'     => 'Falten parts del producte',
            'over-price-product'        => 'Producte amb preu excessiu',
            'over-price-product-sold'   => 'Producte amb preu excessiu venut pel venedor',
            'poor-product-quality'      => 'Qualitat del producte deficient',
            'poor-product-quality-sold' => 'Producte de qualitat deficient venut pel venedor',
            'receive-wrong-product'     => 'Producte incorrecte rebut',
            'wrong-product-sold'        => 'Producte incorrecte venut pel venedor',
        ],
    ],

    'components' => [
        'seller' => [
            'datagrid' => [
                'export' => [
                    'csv'        => 'CSV',
                    'download'   => 'Descarrega',
                    'export'     => 'Exporta',
                    'no-records' => 'Res a exportar',
                    'xls'        => 'XLS',
                    'xlsx'       => 'XLSX',
                ],
            ],

            'layouts' => [
                'header' => [
                    'home-page'  => 'Pàgina d’inici',
                    'logout'     => 'Tanca sessió',
                    'my-profile' => 'El meu perfil',
                    'visit-shop' => 'Visita la botiga',

                    'mega-search' => [
                        'customers'                      => 'Clients',
                        'explore-all-customers'          => 'Explora tots els clients',
                        'explore-all-matching-customers' => 'Explora tots els clients que coincideixen amb “:query” (:count)',
                        'explore-all-matching-orders'    => 'Explora totes les comandes que coincideixen amb “:query” (:count)',
                        'explore-all-matching-products'  => 'Explora tots els productes que coincideixen amb “:query” (:count)',
                        'explore-all-orders'             => 'Explora totes les comandes',
                        'explore-all-products'           => 'Explora tots els productes',
                        'orders'                         => 'Comandes',
                        'products'                       => 'Productes',
                        'sku'                            => 'SKU: :sku',
                        'title'                          => 'Cerca Avançada',
                    ],
                ],

                'sidebar' => [
                    'collapse' => 'Redueix',
                ],
            ],

            'media' => [
                'images' => [
                    'add-image-btn'     => 'Afegeix imatge',
                    'allowed-types'     => 'png, jpeg, jpg',
                    'not-allowed-error' => 'Només es permeten fitxers d’imatge (.jpeg, .jpg, .png, ...).',
                ],

                'videos' => [
                    'add-video-btn'     => 'Afegeix vídeo',
                    'allowed-types'     => 'mp4, webm, mkv',
                    'not-allowed-error' => 'Només es permeten fitxers de vídeo (.mp4, .mov, .ogg, ...).',
                ],

                'documents' => [
                    'add-document-btn'  => 'Afegeix document',
                    'allowed-types'     => ':types',
                    'not-allowed-error' => 'Només es permeten fitxers de document (:types ...).',
                ],

                'placeholders' => [
                    'csv'        => 'CSV',
                    'excel'      => 'Excel',
                    'front'      => 'Frontal',
                    'next'       => 'Següent',
                    'pdf'        => 'PDF',
                    'powerpoint' => 'PowerPoint',
                    'size'       => 'Mida',
                    'text'       => 'Text',
                    'use-cases'  => 'Casos d’ús',
                    'word'       => 'Word',
                    'zoom'       => 'Zoom',
                ],
            ],
        ],
    ],

    'seller' => [
        'menu' => [
            'bookings'          => 'Reserves',
            'communication'     => 'Comunicació',
            'customers'         => 'Clients',
            'dashboard'         => 'Tauler',
            'extensions'        => 'Extensions',
            'general'           => 'General',
            'inventory-sources' => 'Fonts d’inventari',
            'manage-profile'    => 'Gestiona el perfil',
            'orders'            => 'Comandes',
            'product-reviews'   => 'Ressenyes de productes',
            'products'          => 'Productes',
            'reporting'         => 'Informes',
            'roles'             => 'Rols',
            'sales'             => 'Vendes',
            'seller-reviews'    => 'Ressenyes del venedor',
            'settings'          => 'Configuració',
            'transaction'       => 'Transacció',
            'users'             => 'Usuaris',
        ],

        'acl' => [
            'assign'            => 'Assignar',
            'bookings'          => 'Reserves',
            'cancel'            => 'Cancel·lar',
            'communication'     => 'Comunicació',
            'create'            => 'Crear',
            'customers'         => 'Clients',
            'dashboard'         => 'Tauler',
            'delete'            => 'Eliminar',
            'edit'              => 'Editar',
            'extensions'        => 'Extensions',
            'general'           => 'General',
            'inventory-sources' => 'Fonts d’inventari',
            'invoice'           => 'Factura',
            'orders'            => 'Comandes',
            'payment-request'   => 'Sol·licitud de pagament',
            'print'             => 'Imprimir',
            'print-invoice'     => 'Imprimir factura',
            'product-reviews'   => 'Ressenyes de productes',
            'products'          => 'Productes',
            'reporting'         => 'Informes',
            'sales'             => 'Vendes',
            'seller-reviews'    => 'Ressenyes del venedor',
            'settings'          => 'Configuració',
            'shipment'          => 'Enviament',
            'transactions'      => 'Transaccions',
            'view'              => 'Veure',
        ],

        'breadcrumb' => [
            'add-new-product'   => 'Afegir nou producte',
            'assign'            => 'Assignar',
            'bookings'          => 'Reserves',
            'communication'     => 'Comunicació',
            'create'            => 'Crear',
            'customers'         => 'Clients',
            'dashboard'         => 'Tauler de control',
            'edit'              => 'Editar',
            'extensions'        => 'Extensions',
            'general'           => 'General',
            'inventory-sources' => 'Fonts d’inventari',
            'manage-profile'    => 'Gestionar perfil',
            'orders'            => 'Comandes',
            'product-reviews'   => 'Ressenyes de productes',
            'products'          => 'Productes',
            'reporting'         => 'Informes',
            'roles'             => 'Rols',
            'sales'             => 'Vendes',
            'seller-reviews'    => 'Ressenyes del venedor',
            'settings'          => 'Configuració',
            'title'             => 'Perfil',
            'transaction'       => 'Transacció',
            'users'             => 'Usuaris',
            'view'              => 'Veure',
        ],

        'login' => [
            'bagisto'             => 'Bagisto',
            'button-title'        => 'Iniciar sessió',
            'create-your-account' => 'Crea el teu compte',
            'email'               => 'Correu electrònic',
            'footer'              => '© Copyright 2010 - :current_year, Webkul Software (registrat a l’Índia). Tots els drets reservats.',
            'forgot-pass'         => 'Has oblidat la contrasenya?',
            'form-login-text'     => 'Si tens un compte, inicia sessió amb la teva adreça de correu electrònic.',
            'invalid-credentials' => 'Si us plau, comprova les teves credencials i intenta-ho de nou.',
            'new-seller'          => 'Nou venedor?',
            'not-approved'        => 'La teva activació necessita l’aprovació de l’administrador',
            'page-title'          => 'Inici de sessió del venedor',
            'password'            => 'Contrasenya',
            'show-password'       => 'Mostrar contrasenya',
            'suspended-message'   => 'El teu compte ha estat suspès. Contacta amb l’administrador per a qualsevol consulta.',
            'title'               => 'Iniciar sessió',
        ],

        'signup' => [
            'account-exists'   => 'Ja tens un compte?',
            'bagisto'          => 'Bagisto',
            'button-title'     => 'Registrar',
            'confirm-pass'     => 'Confirma la contrasenya',
            'email'            => 'Correu electrònic',
            'footer'           => '© Copyright 2010 - :current_year, Webkul Software (registrat a l’Índia). Tots els drets reservats.',
            'form-signup-text' => 'Si ets nou a la nostra botiga, ens alegra tenir-te com a membre.',
            'name'             => 'Nom',
            'page-title'       => 'Fes-te venedor',
            'password'         => 'Contrasenya',
            'sign-in-button'   => 'Iniciar sessió',
            'success'          => 'Compte creat correctament.',
            'url'              => 'URL de la botiga',
        ],

        'forgot-password' => [
            'already-sent'         => 'Ja hem enviat l’enllaç per restablir la contrasenya.',
            'back'                 => 'Tornar a iniciar sessió?',
            'bagisto'              => 'Bagisto',
            'email'                => 'Correu electrònic',
            'email-not-exist'      => 'No podem trobar cap usuari amb aquesta adreça de correu electrònic.',
            'footer'               => '© Copyright 2010 - :current_year, Webkul Software (registrat a l’Índia). Tots els drets reservats.',
            'forgot-password-text' => 'Si has oblidat la contrasenya, recupera-la introduint la teva adreça de correu electrònic.',
            'page-title'           => 'Has oblidat la contrasenya?',
            'reset-link-sent'      => 'Hem enviat l’enllaç per restablir la contrasenya.',
            'sign-in-button'       => 'Iniciar sessió',
            'submit'               => 'Restablir contrasenya',
            'title'                => 'Recupera la contrasenya',
        ],

        'reset-password' => [
            'back-link-title'  => 'Tornar a Iniciar Sessió',
            'bagisto'          => 'Bagisto',
            'confirm-password' => 'Confirma la Contrasenya',
            'email'            => 'Correu Electrònic Registrat',
            'footer'           => '© Copyright 2010 - :current_year, Webkul Software (registrat a l’Índia). Tots els drets reservats.',
            'password'         => 'Contrasenya',
            'submit-btn-title' => 'Restablir Contrasenya',
            'title'            => 'Restablir Contrasenya',
        ],

        'dashboard' => [
            'add-product'           => 'Afegir Producte',
            'avg-order-sell'        => 'Venda Mitjana per Comanda',
            'category-info'         => 'No s’ha trobat cap categoria per a l’interval seleccionat',
            'complete-profile-link' => 'Completa el teu perfil &rarr;',
            'completed-orders'      => 'Comandes Completes (:count)',
            'customer-info'         => 'No s’ha trobat cap client per a l’interval seleccionat',
            'date-range'            => 'Interval de Dates',
            'empty-threshold'       => 'Límit de Vacances',
            'empty-threshold-desc'  => 'No hi ha cap producte disponible',
            'end-date'              => 'Data Final',
            'hi-comment'            => 'Revisa ràpidament què està passant a la teva botiga.',
            'hi-seller'             => 'Hola! :seller_name',
            'month'                 => 'Aquest Mes',
            'no-category'           => 'No hi ha Dades Disponibles',
            'no-customer'           => 'No hi ha Dades Disponibles',
            'no-record-available'   => 'No hi ha Registres Disponibles.',
            'order-count'           => ':total Comandes',
            'overall-details'       => 'Detalls Generals',
            'pending-orders'        => 'Pendents (:count)',
            'per-unit'              => ':price/Unitat',
            'processing-orders'     => 'En Processament (:count)',
            'product-info'          => 'Afegeix productes relacionats sobre la marxa',
            'profile-score'         => 'Puntuació del Perfil',
            'profile-score-desc'    => 'Maximitza la teva visibilitat mantenint la informació del teu perfil completa.',
            'qty-stock'             => ':qty en estoc',
            'refunded-orders'       => 'Reemborsades (:count)',
            'remaining-payout'      => 'Pagament Restant',
            'start-date'            => 'Data d’Inici',
            'stock-threshold'       => 'Límit d’Estoc',
            'title'                 => 'Panell de Control',
            'today'                 => 'Avui',
            'top-categories'        => 'Categories Principals',
            'top-customers'         => 'Client amb més vendes',
            'top-products'          => 'Productes més venuts',
            'total-customers'       => 'Total de Clients',
            'total-orders'          => 'Total de Comandes',
            'total-payout'          => 'Pagament Total',
            'total-sale'            => ':total Venda',
            'total-sales'           => 'Vendes Totals',
            'view-all-btn'          => 'Veure-ho Tot',
            'visitor-count'         => 'Visitant - :count',
            'week'                  => 'Aquesta Setmana',
            'year'                  => 'Aquest Any',
        ],

        'orders' => [
            'index' => [
                'title' => 'Comandes',

                'datagrid' => [
                    'canceled'        => 'Cancelada',
                    'closed'          => 'Tancada',
                    'commission'      => 'Comissió',
                    'completed'       => 'Completada',
                    'customer'        => 'Client',
                    'date'            => 'Data',
                    'discount'        => 'Descompte',
                    'email'           => 'Correu electrònic',
                    'fraud'           => 'Frau',
                    'gross-amt'       => 'Import Brut',
                    'id'              => 'ID',
                    'invoice-pending' => 'Factura pendent',
                    'items'           => 'Articles',
                    'location'        => 'Ubicació',
                    'order-id'        => 'ID - #:id',
                    'paid'            => 'Pagat',
                    'payment'         => 'Pagament',
                    'payment-request' => 'Sol·licitud de Pagament',
                    'pending'         => 'Pendent',
                    'pending-payment' => 'Pagament pendent',
                    'processing'      => 'En Processament',
                    'refunded'        => 'Reemborsada',
                    'requested'       => 'Sol·licitada',
                    'seller-earn'     => 'Guany del venedor',
                    'shipment'        => 'Enviament',
                    'status'          => 'Estat',
                    'transaction'     => 'Transacció',
                    'view'            => 'Veure',
                ],

                'payment-req-success'  => 'La teva sol·licitud de pagament s’ha enviat correctament',
                'something-went-wrong' => 'Alguna cosa ha anat malament!',
            ],

            'view' => [
                'admin-commission'           => 'Comissió de l’administrador',
                'billing-address'            => 'Adreça de facturació',
                'by-customer'                => 'Per client - :name',
                'cancel-btn'                 => 'Cancel·lar',
                'cancel-confirm-msg'         => 'Segur que vols cancel·lar aquesta comanda?',
                'cancel-error-msg'           => 'No es pot cancel·lar la comanda',
                'cancel-success-msg'         => 'La comanda ha estat cancel·lada',
                'canceled'                   => 'Cancel·lada',
                'closed'                     => 'Tancada',
                'completed'                  => 'Completada',
                'discount'                   => 'Descompte',
                'fraud'                      => 'Frau',
                'grand-total'                => 'Total general',
                'info'                       => 'Informació',
                'item-canceled'              => 'Cancel·lat (:qty_canceled)',
                'item-invoice'               => 'Facturat (:qty_invoiced)',
                'item-ordered'               => 'Ordenat (:qty_ordered)',
                'item-refunded'              => 'Reemborsat (:qty_refunded)',
                'item-shipped'               => 'Enviat (:qty_shipped)',
                'item-status'                => 'Estat de l’article',
                'payment-method'             => 'Mètode de pagament',
                'pending'                    => 'Pendent',
                'pending_payment'            => 'Pagament pendent',
                'permission-error'           => 'No tens permís per cancel·lar la comanda',
                'place-on'                   => 'Fet el : :date',
                'price'                      => 'Preu',
                'price-excl-tax'             => 'Preu (sense IVA)',
                'price-incl-tax'             => 'Preu (amb IVA)',
                'processing'                 => 'En processament',
                'product'                    => 'Producte',
                'shipping-address'           => 'Adreça d’enviament',
                'shipping-handling'          => 'Enviament i manipulació',
                'shipping-handling-excl-tax' => 'Enviament i manipulació (sense IVA)',
                'shipping-handling-incl-tax' => 'Enviament i manipulació (amb IVA)',
                'shipping-method'            => 'Mètode d’enviament',
                'sku'                        => 'SKU - :sku',
                'sub-total'                  => 'Subtotal',
                'sub-total-excl-tax'         => 'Subtotal (sense IVA)',
                'sub-total-incl-tax'         => 'Subtotal (amb IVA)',
                'tax'                        => 'Impost',
                'tax-amount'                 => 'Import de l’impost',
                'tax-percent'                => 'Percentatge d’impost',
                'title'                      => 'Comanda #:order_id',
                'total'                      => 'Total',
                'total-due'                  => 'Total pendent',
                'total-paid'                 => 'Total pagat',
                'total-refunded'             => 'Total reemborsat',
                'total-seller-amt'           => 'Import total del venedor',

                'invoices' => [
                    'bank-details'                => 'Dades bancàries',
                    'bill-to'                     => 'Factura a',
                    'contact'                     => 'Contacte',
                    'contact-number'              => 'Número de contacte',
                    'created-on'                  => 'Creat el: :date_time',
                    'date'                        => 'Data de la factura',
                    'discount'                    => 'Descompte',
                    'excl-tax'                    => 'Sense IVA:',
                    'grand-total'                 => 'Total general',
                    'individual-invoice'          => 'Factura #:invoice_id',
                    'invoice'                     => 'Factura',
                    'invoice-id'                  => 'ID de la factura',
                    'name'                        => 'Nom',
                    'order-date'                  => 'Data de la comanda',
                    'order-id'                    => 'ID de la comanda',
                    'payment-method'              => 'Mètode de pagament',
                    'payment-terms'               => 'Terminis de pagament',
                    'price'                       => 'Preu',
                    'print'                       => 'Imprimir',
                    'product-name'                => 'Nom del producte',
                    'qty'                         => 'Quantitat',
                    'ship-to'                     => 'Enviar a',
                    'shipping-handling'           => 'Enviament i manipulació',
                    'shipping-handling-excl-tax'  => 'Enviament i manipulació (sense IVA)',
                    'shipping-handling-incl-tax'  => 'Enviament i manipulació (amb IVA)',
                    'shipping-method'             => 'Mètode d’enviament',
                    'sku'                         => 'SKU - :sku',
                    'subtotal'                    => 'Subtotal',
                    'sub-total-excl-tax'          => 'Subtotal (sense IVA)',
                    'sub-total-incl-tax'          => 'Subtotal (amb IVA)',
                    'tax'                         => 'Impost',
                    'tax-amount'                  => 'Import de l’impost',
                    'title'                       => 'Factures',
                    'vat-number'                  => 'Número d’IVA',
                ],

                'shipments' => [
                    'carrier-title'       => 'Transportista',
                    'created-on'          => 'Creat el :date_time',
                    'individual-shipment' => 'Enviament #:track_number',
                    'inventory-source'    => 'Font d’inventari',
                    'name'                => 'Nom',
                    'qty'                 => 'Quantitat',
                    'sku'                 => 'SKU - :sku',
                    'title'               => 'Enviaments',
                    'tracking-number'     => 'Número de seguiment',
                ],

                'refunds' => [
                    'adjustment-fee'              => 'Taxa d’ajust',
                    'adjustment-refund'           => 'Reemborsament d’ajust',
                    'created-on'                  => 'Creat el :date_time',
                    'discount'                    => 'Descompte',
                    'grand-total'                 => 'Total general',
                    'individual-refund'           => 'Reemborsament #:refund_id',
                    'no-result-found'             => 'No s’han trobat registres.',
                    'price'                       => 'Preu',
                    'product-name'                => 'Nom',
                    'qty'                         => 'Quantitat',
                    'shipping-handling'           => 'Enviament i manipulació',
                    'shipping-handling-excl-tax'  => 'Enviament i manipulació (sense IVA)',
                    'shipping-handling-incl-tax'  => 'Enviament i manipulació (amb IVA)',
                    'sku'                         => 'SKU - :sku',
                    'subtotal'                    => 'Subtotal',
                    'sub-total-excl-tax'          => 'Subtotal (sense IVA)',
                    'sub-total-incl-tax'          => 'Subtotal (amb IVA)',
                    'tax'                         => 'Impost',
                    'tax-amount'                  => 'Import de l’impost',
                    'title'                       => 'Reemborsaments',
                ],
            ],

            'invoices' => [
                'create-btn'       => 'Invoice',
                'invoice-success'  => 'Invoice created successfully',
                'permission-error' => 'You do not have permission to create order invoice',
                'price'            => 'Price',
                'product-name'     => 'Product Name',
                'qty'              => 'Qty',
                'qty-error'        => 'Requested quantity is not available',
                'sub-total'        => 'Invoice <br> Subtotal',
                'title'            => 'Create Invoice',
                'total'            => 'Total',
            ],

            'shipments' => [
                'avl-qty'          => 'Avail.- :qty Qty',
                'carrier-title'    => 'Carrier Title',
                'create-btn'       => 'Ship',
                'ordered-qty'      => 'Ordered Qty',
                'permission-error' => 'You do not have permission to create shipment',
                'product-name'     => 'Product Name',
                'qty'              => 'Qty',
                'qty-error'        => 'Requested quantity is not available',
                'shipment-success' => 'Shipment created successfully',
                'shipped-qty'      => 'Shipped Qty',
                'sku'              => 'SKU - :sku',
                'source'           => 'Product Ordered Source',
                'title'            => 'Create Shipment',
                'tracking-id'      => 'Tracking ID',
            ],
        ],

        'bookings' => [
            'index' => [
                'datagrid' => [
                    'created-date' => 'Created Date',
                    'from'         => 'From',
                    'id'           => 'ID',
                    'order-id'     => 'Order ID',
                    'qty'          => 'QTY',
                    'to'           => 'To',
                    'view'         => 'View',
                ],

                'title' => 'Bookings',
            ],

            'calendar' => [
                'booking-date'    => 'Booking Date',
                'booking-details' => 'Booking Details',
                'canceled'        => 'Canceled',
                'closed'          => 'Closed',
                'done'            => 'Done',
                'order-id'        => 'Order Id',
                'pending'         => 'Pending',
                'price'           => 'Price',
                'status'          => 'Status',
                'time-slot'       => 'Time Slot:',
                'view-details'    => 'View Details',
            ],

            'title' => 'Bookings Product',
        ],

        'transactions' => [
            'index' => [
                'remaining-payout'       => 'Remaining Payout',
                'title'                  => 'Transactions',
                'total-payout'           => 'Total Payout',
                'total-seller-sale'      => 'Total Sale (Seller)',
                'total-admin-commission' => 'Total Commission (Admin)',
                'total-sale-invoiced'    => 'Total Sale (Invoiced)',

                'datagrid' => [
                    'comment'        => 'Comment',
                    'id'             => 'Id',
                    'total'          => 'Total',
                    'transaction-id' => 'Transaction Id',
                ],
            ],

            'view' => [
                'commission'        => 'Commission',
                'created-on'        => 'created on :date,',
                'date'              => 'Date',
                'id'                => 'Transaction Id',
                'method'            => 'Method',
                'name'              => 'Name',
                'payment-method'    => ':method Payment',
                'price'             => 'Price',
                'print'             => 'Print',
                'qty'               => 'Qty',
                'seller-total'      => 'Seller Total',
                'shipping-handling' => 'Shipping & Handling',
                'subtotal'          => 'Subtotal',
                'tax'               => 'Tax',
                'title'             => 'Transaction',
                'total'             => 'Total',
                'transaction-id'    => 'Transaction #:transaction_id',
            ],
        ],

        'products' => [
            'index' => [
                'add-new-product'   => 'Afegeix Nou Producte',
                'title'             => 'Productes',

                'datagrid' => [
                    'active'         => 'Actiu',
                    'approved'       => 'Aprovat',
                    'category'       => 'Categoria',
                    'delete'         => 'Eliminar',
                    'disable'        => 'Desactiva',
                    'disapproved'    => 'Desaprovat',
                    'edit'           => 'Editar',
                    'id'             => 'ID',
                    'image'          => 'Imatge',
                    'is-approved'    => 'Està Aprovat',
                    'name'           => 'Nom',
                    'out-of-stock'   => 'Sense Estoc',
                    'price'          => 'Preu',
                    'product-number' => 'Número de Producte',
                    'product_id'     => 'ID - :product_id',
                    'sku'            => 'SKU',
                    'status'         => 'Estat',
                    'stock'          => 'Estoc',
                    'total-quantity' => ':quantity Disponibles',
                    'type'           => 'Tipus',
                ],
            ],

            'create' => [
                'attribute-family'          => 'Família d’Atributs',
                'back'                      => 'Enrere',
                'continue'                  => 'Continua',
                'create-new-product'        => 'Crea Nous Productes',
                'create-your-new-product'   => 'Si el producte no existeix, crea el teu nou producte',
                'disable-product-message'   => 'L’administrador ha desactivat la funcionalitat per crear o assignar productes.',
                'image-placeholder'         => 'La Teva Imatge',
                'no-result'                 => 'Cap Resultat',
                'not-allowed'               => 'No tens permís per crear productes',
                'or'                        => 'O',
                'product-type'              => 'Tipus de Producte',
                'search-product'            => 'Cerca Productes',
                'sell-admin-product-prices' => 'Vendre productes de l’administrador als teus preus.',
                'sell-as-yours'             => 'Vendre com a Teu',
                'sku'                       => 'SKU',
                'sub-title'                 => 'Pots afegir productes de 2 maneres, ja sigui des del producte de l’administrador o creant el teu propi.',
                'title'                     => 'Afegeix Nou Producte',
                'update-profile'            => 'Si us plau, actualitza els detalls del teu perfil',
            ],

            'edit' => [
                'remove'        => 'Eliminar',
                'save-btn'      => 'Desa Producte',
                'back-btn'      => 'Enrere',
                'preview'       => 'Previsualitza',
                'title'         => 'Edita Producte',
                'channels'      => 'Canals',
                'progress-info' => 'Millora l\'atractiu del teu producte i deixa una impressió duradora als clients assegurant-te que tots els detalls del producte estiguin complets i siguin precisos!',

                'price' => [
                    'group' => [
                        'add-group-price'           => 'Afegeix Preu per Grup',
                        'all-groups'                => 'Tots els Grups',
                        'create-btn'                => 'Afegeix Nou',
                        'discount-group-price-info' => 'Per :qty Quantitat amb descompte de :price',
                        'edit-btn'                  => 'Edita',
                        'empty-info'                => 'Preus especials per a clients que pertanyen a un grup específic.',
                        'fixed-group-price-info'    => 'Per :qty Quantitat a un preu fix de :price',
                        'title'                     => 'Preu per Grup de Clients',

                        'create' => [
                            'all-groups'     => 'Tots els Grups',
                            'create-title'   => 'Crea Preu per Grup de Clients',
                            'customer-group' => 'Grup de Clients',
                            'delete-btn'     => 'Elimina',
                            'discount'       => 'Descompte',
                            'fixed'          => 'Fix',
                            'price'          => 'Preu',
                            'price-type'     => 'Tipus de Preu',
                            'qty'            => 'Quantitat',
                            'save-btn'       => 'Desa',
                            'update-title'   => 'Actualitza Preu per Grup de Clients',
                        ],
                    ],
                ],

                'inventories' => [
                    'pending-ordered-qty'      => 'Quantitat Ordenada Pendent: :qty',
                    'pending-ordered-qty-info' => 'La quantitat pendent ordenada es deduirà de la font d\'inventari corresponent després de l\'enviament. En cas de cancel·lació, la quantitat pendent estarà disponible per a la venda.',
                    'title'                    => 'Inventaris',
                ],

                'categories' => [
                    'title' => 'Categories',
                ],

                'images' => [
                    'info'  => 'La resolució de la imatge hauria de ser com 609px X 560px',
                    'title' => 'Imatges',
                ],

                'videos' => [
                    'error' => 'El vídeo no pot superar els :max kilobytes. Si us plau, tria un fitxer més petit.',
                    'info'  => 'La mida màxima del vídeo hauria de ser com :size',
                    'title' => 'Vídeos',
                ],

                'links' => [
                    'related-products' => [
                        'empty-info' => 'Afegeix productes relacionats sobre la marxa.',
                        'info'       => 'A més del producte que el client està veient, se li presenten productes relacionats.',
                        'title'      => 'Productes Relacionats',
                    ],

                    'up-sells' => [
                        'empty-info' => 'Afegeix productes de venda superior sobre la marxa.',
                        'info'       => 'Al client se li presenten productes de venda superior, que serveixen com a alternativa premium o de més qualitat al producte que està veient actualment.',
                        'title'      => 'Productes de Venda Superior',
                    ],

                    'cross-sells' => [
                        'empty-info' => 'Afegeix productes de venda creuada sobre la marxa.',
                        'info'       => 'Adjacents al carretó de la compra, trobaràs aquests productes "compra impulsiva" posicionats com a vendes creuades per complementar els articles ja afegits al teu carretó.',
                        'title'      => 'Productes de Venda Creuada',
                    ],

                    'add-btn'           => 'Afegeix Producte',
                    'delete'            => 'Elimina',
                    'empty-info'        => 'Per afegir productes de tipus :type sobre la marxa.',
                    'empty-title'       => 'Afegeix Producte',
                    'image-placeholder' => 'Imatge del Producte',
                    'sku'               => 'SKU - :sku',
                ],

                'types' => [
                    'simple' => [
                        'customizable-options' => [
                            'add-btn'           => 'Afegeix Opció',
                            'empty-info'        => 'Per crear opcions personalitzables sobre la marxa.',
                            'empty-title'       => 'Afegeix Opció',
                            'info'              => 'Això personalitzarà el producte simple.',
                            'title'             => 'Element Personalitzable',

                            'update-create' => [
                                'is-required'               => 'És Requerit',
                                'max-characters'            => 'Màxim de Caràcters',
                                'name'                      => 'Títol',
                                'no'                        => 'No',
                                'price'                     => 'Preu',
                                'save-btn'                  => 'Desa',
                                'supported-file-extensions' => 'Extensions de Fitxer Suportades',
                                'title'                     => 'Opció',
                                'type'                      => 'Tipus',
                                'yes'                       => 'Sí',
                            ],

                            'option' => [
                                'add-btn'     => 'Afegeix Opció',
                                'delete'      => 'Elimina',
                                'delete-btn'  => 'Elimina',
                                'edit-btn'    => 'Edita',
                                'empty-info'  => 'Per crear diverses combinacions de producte sobre la marxa.',
                                'empty-title' => 'Afegeix Opció',

                                'types' => [
                                    'text' => [
                                        'title' => 'Text',
                                    ],

                                    'textarea' => [
                                        'title' => 'Àrea de Text',
                                    ],

                                    'checkbox' => [
                                        'title' => 'Casella de Verificació',
                                    ],

                                    'radio' => [
                                        'title' => 'Botó de Ràdio',
                                    ],

                                    'select' => [
                                        'title' => 'Selecciona',
                                    ],

                                    'multiselect' => [
                                        'title' => 'Selecció Múltiple',
                                    ],

                                    'date' => [
                                        'title' => 'Data',
                                    ],

                                    'datetime' => [
                                        'title' => 'Data i Hora',
                                    ],

                                    'time' => [
                                        'title' => 'Hora',
                                    ],

                                    'file' => [
                                        'title' => 'Fitxer',
                                    ],
                                ],

                                'items' => [
                                    'update-create' => [
                                        'label'    => 'Etiqueta',
                                        'price'    => 'Preu',
                                        'save-btn' => 'Desa',
                                        'title'    => 'Opció',
                                    ],
                                ],
                            ],

                            'validations' => [
                                'associated-product' => 'El producte ja està associat amb un producte configurable, agrupat o de paquet.',
                            ],
                        ],
                    ],

                    'configurable' => [
                        'add-btn'           => 'Afegeix Variant',
                        'delete-btn'        => 'Elimina',
                        'edit-btn'          => 'Edita',
                        'empty-info'        => 'Per crear diverses combinacions de producte sobre la marxa.',
                        'empty-title'       => 'Afegeix Variant',
                        'image-placeholder' => 'Imatge del Producte',
                        'info'              => 'Els productes de variació depenen de totes les combinacions possibles d\'atributs.',
                        'qty'               => ':qty Quantitat',
                        'sku'               => 'SKU - :sku',
                        'title'             => 'Variacions',

                        'create'  => [
                            'description'            => 'Descripció',
                            'name'                   => 'Nom',
                            'save-btn'               => 'Afegeix',
                            'title'                  => 'Afegeix Variant',
                            'variant-already-exists' => 'Aquesta variant ja existeix',
                        ],

                        'edit' => [
                            'disabled'        => 'Desactivat',
                            'edit-info'       => 'Si vols actualitzar la informació del producte en detall, ves a la',
                            'edit-link-title' => 'Pàgina de Detalls del Producte',
                            'enabled'         => 'Activat',
                            'images'          => 'Imatges',
                            'name'            => 'Nom',
                            'price'           => 'Preu',
                            'quantities'      => 'Quantitats',
                            'save-btn'        => 'Desa',
                            'sku'             => 'SKU',
                            'status'          => 'Estat',
                            'title'           => 'Producte',
                            'weight'          => 'Pes',
                        ],

                        'mass-edit' => [
                            'add-images'          => 'Afegeix Imatges',
                            'apply-to-all-btn'    => 'Aplica a Tots',
                            'apply-to-all-sku'    => 'Aplica un preu a tots els SKU.',
                            'edit-inventories'    => 'Edita Inventaris',
                            'edit-prices'         => 'Edita Preus',
                            'price'               => 'Preu',
                            'remove-images'       => 'Elimina Imatges',
                            'remove-variants'     => 'Elimina Variants',
                            'select-action'       => 'Selecciona Acció',
                            'select-variants'     => 'Selecciona Variants',
                            'edit-name'           => 'Edita Nom',
                            'name'                => 'Nom',
                            'edit-sku'            => 'Edita SKU',
                            'sku'                 => 'SKU',
                            'edit-weight'         => 'Edita Pes',
                            'weight'              => 'Pes',
                            'edit-status'         => 'Edita Estat',
                            'status'              => 'Estat',
                            'apply-to-all-name'   => 'Aplica un nom a totes les variants.',
                            'apply-to-all-weight' => 'Aplica un pes a totes les variants.',
                            'apply-to-all-status' => 'Aplica un estat a totes les variants.',
                        ],
                    ],

                    'grouped' => [
                        'add-btn'           => 'Afegir producte',
                        'default-qty'       => 'Quantitat per defecte',
                        'delete'            => 'Eliminar',
                        'empty-info'        => 'Per crear diverses combinacions de productes al mateix temps.',
                        'empty-title'       => 'Afegir producte',
                        'image-placeholder' => 'Imatge del producte',
                        'info'              => 'Un producte agrupat està compost per articles independents presentats com un conjunt, permetent variacions o coordinació per temporada o tema. Cada producte es pot comprar individualment o com a part del grup.',
                        'sku'               => 'SKU - :sku',
                        'title'             => 'Productes agrupats',
                    ],

                    'bundle' => [
                        'add-btn'           => 'Afegir opció',
                        'empty-info'        => 'Per crear opcions de paquet al mateix temps.',
                        'empty-title'       => 'Afegir opció',
                        'image-placeholder' => 'Imatge del producte',
                        'info'              => 'Un producte paquet és un conjunt de múltiples articles o serveis venuts junts a un preu especial, proporcionant valor i comoditat als clients.',
                        'title'             => 'Elements del paquet',

                        'update-create' => [
                            'checkbox'    => 'Casella de selecció',
                            'is-required' => 'És obligatori',
                            'multiselect' => 'Selecció múltiple',
                            'name'        => 'Títol',
                            'no'          => 'No',
                            'radio'       => 'Botó d\'opció',
                            'save-btn'    => 'Guardar',
                            'select'      => 'Seleccionar',
                            'title'       => 'Opció',
                            'type'        => 'Tipus',
                            'yes'         => 'Sí',
                        ],

                        'option' => [
                            'add-btn'     => 'Afegir producte',
                            'default-qty' => 'Quantitat per defecte',
                            'delete'      => 'Eliminar',
                            'delete-btn'  => 'Eliminar',
                            'edit-btn'    => 'Editar',
                            'empty-info'  => 'Per crear diverses combinacions de productes al mateix temps.',
                            'empty-title' => 'Afegir producte',
                            'sku'         => 'SKU - :sku',

                            'types' => [
                                'checkbox' => [
                                    'info'  => 'Estableix el producte per defecte utilitzant una casella de selecció',
                                    'title' => 'Casella de selecció',
                                ],

                                'multiselect' => [
                                    'info'  => 'Estableix el producte per defecte utilitzant un botó de selecció múltiple',
                                    'title' => 'Selecció múltiple',
                                ],

                                'radio' => [
                                    'info'  => 'Estableix el producte per defecte utilitzant un botó d\'opció',
                                    'title' => 'Botó d\'opció',
                                ],

                                'select' => [
                                    'info'  => 'Estableix el producte per defecte utilitzant un menú desplegable',
                                    'title' => 'Seleccionar',
                                ],
                            ],
                        ],
                    ],

                    'booking' => [
                        'available-from' => 'Disponible des de',
                        'available-to'   => 'Disponible fins a',
                        'location'       => 'Ubicació',
                        'qty'            => 'Quantitat',
                        'title'          => 'Tipus de reserva',

                        'available-every-week' => [
                            'no'    => 'No',
                            'title' => 'Disponible cada setmana',
                            'yes'   => 'Sí',
                        ],

                        'appointment' => [
                            'break-duration' => 'Temps de descans entre franges (minuts)',
                            'slot-duration'  => 'Durada de la franja (minuts)',

                            'same-slot-for-all-days' => [
                                'no'    => 'No',
                                'title' => 'Mateixa franja per a tots els dies',
                                'yes'   => 'Sí',
                            ],
                        ],

                        'default' => [
                            'add'              => 'Afegir',
                            'break-duration'   => 'Temps de descans entre franges (minuts)',
                            'close'            => 'Tancar',
                            'description'      => 'Informació de la reserva',
                            'description-info' => 'Segons les franges, es crearà i mostrarà la durada del temps. La durada serà única per a totes les franges i visible a la botiga.',
                            'edit'             => 'Editar',
                            'many'             => 'Moltes reserves per a un dia',
                            'one'              => 'Una reserva per a molts dies',
                            'open'             => 'Obert',
                            'slot-add'         => 'Afegir franges',
                            'slot-duration'    => 'Durada de la franja (minuts)',
                            'slot-title'       => 'Durada de les franges',
                            'title'            => 'Per defecte',
                            'unavailable'      => 'No disponible',

                            'modal' => [
                                'slot' => [
                                    'add-title'  => 'Afegir franges',
                                    'close'      => 'Tancar',
                                    'day'        => 'Dia',
                                    'edit-title' => 'Editar franges',
                                    'friday'     => 'Divendres',
                                    'from'       => 'Des de',
                                    'from-day'   => 'Des del dia',
                                    'from-time'  => 'Des de l\'hora',
                                    'monday'     => 'Dilluns',
                                    'open'       => 'Obert',
                                    'saturday'   => 'Dissabte',
                                    'save'       => 'Desar',
                                    'select'     => 'Seleccionar',
                                    'status'     => 'Estat',
                                    'sunday'     => 'Diumenge',
                                    'thursday'   => 'Dijous',
                                    'to'         => 'Fins a',
                                    'to-day'     => 'Fins al dia',
                                    'to-time'    => 'Fins a l\'hora',
                                    'tuesday'    => 'Dimarts',
                                    'wednesday'  => 'Dimecres',
                                    'week'       => ':day',
                                ],
                            ],
                        ],

                        'event' => [
                            'add'                => 'Afegir entrades',
                            'delete'             => 'Eliminar',
                            'description'        => 'Descripció',
                            'description-info'   => 'No hi ha entrades disponibles.',
                            'edit'               => 'Editar',
                            'name'               => 'Nom',
                            'price'              => 'Preu',
                            'qty'                => 'Quantitat',
                            'special-price'      => 'Preu especial',
                            'special-price-from' => 'Preu especial des de',
                            'special-price-to'   => 'Preu especial fins a',
                            'title'              => 'Entrades',
                            'valid-from'         => 'Vàlid des de',
                            'valid-until'        => 'Vàlid fins a',

                            'modal' => [
                                'edit' => 'Editar entrades',
                                'save' => 'Desar',
                            ],
                        ],

                        'empty-info' => [
                            'tickets' => [
                                'add' => 'Afegir entrades',
                            ],

                            'slots'   => [
                                'add'         => 'Afegir franges',
                                'description' => 'Franges disponibles amb durada.',
                            ],
                        ],

                        'rental' => [
                            'daily'        => 'Diari',
                            'daily-hourly' => 'Ambdós (Diari i per hora)',
                            'daily-price'  => 'Preu diari',
                            'hourly'       => 'Per hora',
                            'hourly-price' => 'Preu per hora',
                            'title'        => 'Tipus de lloguer',

                            'same-slot-for-all-days' => [
                                'no'    => 'No',
                                'title' => 'Mateixa franja per a tots els dies',
                                'yes'   => 'Sí',
                            ],
                        ],

                        'slots' => [
                            'add'              => 'Afegir franges',
                            'description-info' => 'Segons les franges, es crearà i mostrarà la durada del temps. La durada serà única per a totes les franges i visible a la botiga.',
                            'save'             => 'Desar',
                            'title'            => 'Durada de les franges',
                            'unavailable'      => 'No disponible',

                            'action' => [
                                'add' => 'Afegir',
                            ],

                            'modal' => [
                                'slot' => [
                                    'friday'    => 'Divendres',
                                    'from'      => 'Des de',
                                    'monday'    => 'Dilluns',
                                    'saturday'  => 'Dissabte',
                                    'sunday'    => 'Diumenge',
                                    'thursday'  => 'Dijous',
                                    'to'        => 'Fins a',
                                    'tuesday'   => 'Dimarts',
                                    'wednesday' => 'Dimecres',
                                ],
                            ],
                        ],

                        'table' => [
                            'break-duration'            => 'Temps de descans entre franges (minuts)',
                            'guest-capacity'            => 'Capacitat de convidats',
                            'guest-limit'               => 'Límit de convidats per taula',
                            'prevent-scheduling-before' => 'Evitar programar abans de',
                            'slot-duration'             => 'Durada de la franja (minuts)',

                            'charged-per'               => [
                                'guest'  => 'Convidat',
                                'table'  => 'Taula',
                                'title'  => 'Cobrat per',
                            ],

                            'same-slot-for-all-days'    => [
                                'no'    => 'No',
                                'title' => 'Mateixa franja per a tots els dies',
                                'yes'   => 'Sí',
                            ],
                        ],

                        'type' => [
                            'appointment' => 'Reserva per cita',
                            'default'     => 'Reserva per defecte',
                            'event'       => 'Reserva per esdeveniment',
                            'many'        => 'Moltes',
                            'one'         => 'Una',
                            'rental'      => 'Reserva de lloguer',
                            'table'       => 'Reserva de taula',
                            'title'       => 'Tipus',
                        ],
                    ],

                    'downloadable' => [
                        'links' => [
                            'add-btn'     => 'Afegir enllaç',
                            'delete-btn'  => 'Eliminar',
                            'edit-btn'    => 'Editar',
                            'empty-info'  => 'Per crear un enllaç ràpidament.',
                            'empty-title' => 'Afegir enllaç',
                            'file'        => 'Fitxer : ',
                            'info'        => 'El tipus de producte descarregable permet vendre productes digitals, com llibres electrònics, aplicacions de programari, música, jocs, etc.',
                            'sample-file' => 'Fitxer de mostra : ',
                            'sample-url'  => 'URL de mostra : ',
                            'title'       => 'Enllaços descarregables',
                            'url'         => 'URL : ',

                            'update-create' => [
                                'downloads'   => 'Descarregues permeses',
                                'file'        => 'Fitxer',
                                'file-type'   => 'Tipus de fitxer',
                                'name'        => 'Títol',
                                'price'       => 'Preu',
                                'sample'      => 'Mostra',
                                'sample-type' => 'Tipus de mostra',
                                'save-btn'    => 'Desar',
                                'title'       => 'Enllaç',
                                'url'         => 'URL',
                            ],
                        ],

                        'samples' => [
                            'add-btn'     => 'Afegir mostra',
                            'delete-btn'  => 'Eliminar',
                            'edit-btn'    => 'Editar',
                            'empty-info'  => 'Per crear una mostra ràpidament.',
                            'empty-title' => 'Afegir mostra',
                            'file'        => 'Fitxer : ',
                            'info'        => 'El tipus de producte descarregable permet vendre productes digitals, com llibres electrònics, aplicacions de programari, música, jocs, etc.',
                            'title'       => 'Mostres descarregables',
                            'url'         => 'URL : ',

                            'update-create' => [
                                'file'      => 'Fitxer',
                                'file-type' => 'Tipus de fitxer',
                                'name'      => 'Títol',
                                'save-btn'  => 'Desar',
                                'title'     => 'Enllaç',
                                'url'       => 'URL',
                            ],
                        ],
                    ],
                ],
            ],

            'create-success'           => 'Producte creat correctament',
            'delete-failed'            => 'La supressió del producte ha fallat',
            'delete-success'           => 'Producte eliminat correctament',
            'product-type-not-allowed' => 'No tens permís per vendre productes de tipus :type',
            'saved-inventory-message'  => 'Producte desat correctament',
            'update-success'           => 'Producte actualitzat correctament',

            'assign' => [
                'already-selling'     => 'Ja estàs venent aquest producte',
                'back-btn'            => 'Enrere',
                'condition'           => 'Condició',
                'create-success'      => 'Producte assignat correctament al venedor',
                'description'         => 'Descripció',
                'image-size'          => 'La resolució de la imatge ha de ser de 609px X 560px',
                'images'              => 'Imatges',
                'new'                 => 'Nou',
                'not-allowed'         => 'No tens permís per assignar aquest producte',
                'old'                 => 'Vell',
                'price'               => 'Preu',
                'product-not-allowed' => 'No tens permís per vendre productes de tipus :type',
                'quantities'          => 'Quantitats',
                'save-btn'            => 'Desar',
                'title'               => 'Assignar Producte',
                'update-success'      => 'Producte assignat actualitzat correctament',

                'product-details' => [
                    'active'            => 'Actiu',
                    'approved'          => 'Aprovat',
                    'disable'           => 'Desactivar',
                    'disapproved'       => 'Desaprovats',
                    'image-placeholder' => 'Imatge del Producte',
                    'title'             => 'Detalls del Producte',
                ],
            ],
        ],

        'product-reviews' => [
            'index' => [
                'title' => 'Ressenyes de Productes',

                'datagrid' => [
                    'approved'      => 'Aprovat',
                    'customer'      => 'Client',
                    'date'          => 'Data',
                    'description'   => 'Descripció',
                    'disapproved'   => 'Desaprovats',
                    'email'         => 'Correu electrònic',
                    'pending'       => 'Pendent',
                    'product'       => 'Producte',
                    'rating'        => 'Valoració',
                    'status'        => 'Estat',
                    'title'         => 'Títol',
                    'update-status' => 'Actualitzar Estat',
                ],
            ],

            'update-success' => 'Les ressenyes del producte s\'han actualitzat correctament.',
            'delete-success' => 'Les ressenyes del producte s\'han eliminat correctament.',
        ],

        'customers' => [
            'index' => [
                'title' => 'Clients',

                'datagrid' => [
                    'active'      => 'Actiu',
                    'customer'    => 'Client',
                    'email'       => 'Correu electrònic',
                    'gender'      => 'Gènere',
                    'group'       => 'Grup',
                    'inactive'    => 'Inactiu',
                    'order-count' => 'Nombre de comandes',
                    'revenue'     => 'Ingressos',
                    'status'      => 'Estat',
                ],
            ],
        ],

        'profile' => [
            'index' => [
                'title'    => 'Gestionar Perfil',
                'edit-btn' => 'Editar Perfil',

                'general' => [
                    'email'      => 'Correu electrònic',
                    'name'       => 'Nom',
                    'phone'      => 'Número de telèfon',
                    'shop-slug'  => 'Slug de la botiga',
                    'shop-title' => 'Nom de la botiga',
                    'title'      => 'Informació General',
                ],

                'about-store' => [
                    'title' => 'Sobre la Botiga',
                ],

                'meta' => [
                    'meta-description' => 'Meta Descripció',
                    'meta-keywords'    => 'Meta Paraules clau',
                    'meta-title'       => 'Meta Títol',
                    'title'            => 'Meta Descripció',
                ],

                'policy' => [
                    'privacy'  => 'Política de Privacitat',
                    'return'   => 'Política de Devolucions',
                    'shipping' => 'Política d\'Enviament',
                    'title'    => 'Polítiques',
                ],

                'address' => [
                    'city'     => 'Ciutat',
                    'country'  => 'País',
                    'postcode' => 'Codi Postal',
                    'state'    => 'Regió',
                    'title'    => 'Adreça de la Botiga',
                    'address'  => 'Adreça',
                ],

                'social' => [
                    'link'  => 'Enllaç de :name',
                    'title' => 'Enllaços Socials',
                ],

                'minimum-order-amount' => [
                    'title'  => 'Import Mínim de Comanda',
                ],

                'google-analytics' => [
                    'id'    => 'ID d\'Analytics',
                    'title' => 'Google Analytics',
                ],

                'shop-information' => [
                    'admin-commission'       => 'Comissió de l\'Administrador',
                    'admin-commission-value' => 'Comissió de l\'Administrador del :rate% de l\'import total facturat',
                    'allowed-categories'     => 'Categories permeses',
                    'no-categories'          => 'No hi ha categories disponibles',
                    'allowed-product-types'  => 'Tipus de productes permesos',
                    'no-product-types'       => 'No hi ha tipus de producte disponibles',
                    'payment-methods'        => 'Mètodes de pagament',
                    'no-payment-methods'     => 'No hi ha mètodes de pagament disponibles',
                    'shipping-methods'       => 'Mètodes d\'enviament',
                    'no-shipping-methods'    => 'No hi ha mètodes d\'enviament disponibles',
                    'title'                  => 'Informació de la Botiga',
                ],
            ],

            'edit' => [
                'banner'              => 'Banner',
                'banner-description'  => 'Puja el banner amb una proporció de 13:3, alçada 375, zona segura 375x250, centrat a mòbil',
                'delete-banner'       => 'Eliminar Banner',
                'delete-logo'         => 'Eliminar Logotip',
                'logo'                => 'Logotip',
                'logo-description'    => 'Puja el logotip amb una proporció de 1:1',
                'save-btn'            => 'Desa Perfil',
                'title'               => 'Gestionar Perfil',
                'upload-new-banner'   => 'Pujar Nou Banner',
                'upload-new-logo'     => 'Pujar Nou Logotip',

                'general' => [
                    'email'      => 'Correu electrònic',
                    'name'       => 'Nom',
                    'phone'      => 'Número de telèfon',
                    'shop-slug'  => 'Slug de la botiga',
                    'shop-title' => 'Nom de la botiga',
                    'title'      => 'Informació General',
                ],

                'about-store' => [
                    'title' => 'Sobre la Botiga',
                ],

                'meta' => [
                    'meta-description' => 'Meta Descripció',
                    'meta-keywords'    => 'Meta paraules clau',
                    'meta-title'       => 'Meta Títol',
                    'title'            => 'Meta Descripció',
                ],

                'policy' => [
                    'privacy'  => 'Política de Privacitat',
                    'return'   => 'Política de Devolucions',
                    'shipping' => 'Política d\'Enviament',
                    'title'    => 'Polítiques',
                ],

                'address' => [
                    'city'           => 'Ciutat',
                    'country'        => 'País',
                    'postcode'       => 'Codi Postal',
                    'state'          => 'Regió',
                    'title'          => 'Adreça de la Botiga',
                    'select-country' => 'Selecciona País',
                    'select-state'   => 'Selecciona Regió',
                    'street-address' => 'Adreça',
                    'address'        => 'Adreça',
                ],

                'social' => [
                    'link'  => 'Enllaç de :name',
                    'title' => 'Enllaços Socials',
                ],

                'minimum-order-amount' => [
                    'title'  => 'Import Mínim de Comanda',
                ],

                'google-analytics' => [
                    'id'    => 'ID de Google Analytics',
                    'title' => 'Google Analytics',
                ],
            ],

            'update-success' => 'El teu perfil s\'ha actualitzat correctament',
        ],

        'seller-reviews' => [
            'index' => [
                'title' => 'Valoracions del venedor',

                'datagrid' => [
                    'approved'    => 'Aprovat',
                    'customer'    => 'Client',
                    'date'        => 'Data',
                    'description' => 'Descripció',
                    'disapproved' => 'No aprovat',
                    'email'       => 'Correu electrònic',
                    'pending'     => 'Pendent',
                    'rating'      => 'Puntuació',
                    'status'      => 'Estat',
                    'title'       => 'Títol',
                ],
            ],
        ],

        'settings' => [
            'general' => [
                'index' => [
                    'save-btn'           => 'Desa',
                    'title'              => 'General',
                    'unmatched-password' => 'La contrasenya actual no coincideix',
                    'update-success'     => 'La configuració general s\'ha actualitzat correctament',

                    'regional-setting' => [
                        'currency'      => 'Moneda',
                        'locale'        => 'Configuració regional',
                        'select-locale' => 'Selecciona configuració regional',
                        'title'         => 'Configuració regional',
                    ],

                    'password-setting' => [
                        'confirm-password' => 'Confirma la contrasenya',
                        'current-password' => 'Contrasenya actual',
                        'new-password'     => 'Nova contrasenya',
                        'title'            => 'Configuració de la contrasenya',
                    ],
                ],
            ],

            'roles' => [
                'index' => [
                    'create-btn' => 'Crea rol',
                    'title'      => 'Rols',

                    'datagrid' => [
                        'all'             => 'Tots',
                        'custom'          => 'Personalitzat',
                        'delete'          => 'Elimina',
                        'edit'            => 'Edita',
                        'id'              => 'Id',
                        'name'            => 'Nom',
                        'permission-type' => 'Tipus de permís',
                    ],
                ],

                'create' => [
                    'access-control' => 'Control d\'accés',
                    'all'            => 'Tots',
                    'back-btn'       => 'Enrere',
                    'custom'         => 'Personalitzat',
                    'description'    => 'Descripció',
                    'general'        => 'General',
                    'name'           => 'Nom',
                    'permissions'    => 'Permisos',
                    'save-btn'       => 'Desa rol',
                    'title'          => 'Crea rol',
                ],

                'edit' => [
                    'access-control' => 'Control d\'accés',
                    'all'            => 'Tots',
                    'back-btn'       => 'Enrere',
                    'custom'         => 'Personalitzat',
                    'description'    => 'Descripció',
                    'general'        => 'General',
                    'name'           => 'Nom',
                    'permissions'    => 'Permisos',
                    'save-btn'       => 'Desa rol',
                    'title'          => 'Edita rol',
                ],

                'being-used'        => 'El rol està sent usat per algun venedor',
                'create-success'    => 'Rol creat correctament',
                'delete-failed'     => 'No s\'ha pogut eliminar el rol',
                'delete-success'    => 'Rol eliminat correctament',
                'last-delete-error' => 'Cal tenir almenys un rol',
                'update-success'    => 'Rol actualitzat correctament',
            ],

            'users' => [
                'index' => [
                    'create-btn'       => 'Crea usuari',
                    'create-title'     => 'Crea usuari',
                    'edit-title'       => 'Edita usuari',
                    'email'            => 'Correu electrònic',
                    'name'             => 'Nom',
                    'phone-number'     => 'Telèfon',
                    'role'             => 'Rol',
                    'save-btn'         => 'Desa usuari',
                    'select-role'      => 'Selecciona rol',
                    'password'         => 'Contrasenya',
                    'confirm-password' => 'Confirma la contrasenya',
                    'status'           => 'Estat',
                    'title'            => 'Usuaris',
                    'create-success'   => 'Usuari creat correctament',
                    'update-success'   => 'Usuari actualitzat correctament',
                    'delete-success'   => 'Usuari eliminat correctament',
                    'delete-failed'    => 'No s\'ha pogut eliminar l\'usuari',

                    'datagrid' => [
                        'delete'     => 'Elimina',
                        'edit'       => 'Edita',
                        'email'      => 'Correu electrònic',
                        'id'         => 'Id',
                        'id-value'   => 'ID - :id',
                        'name'       => 'Nom',
                        'permission' => 'Permís',
                        'phone'      => 'Telèfon',

                        'status' => [
                            'title' => 'Estat',

                            'options' => [
                                'active'    => 'Actiu',
                                'suspended' => 'Suspès',
                            ],
                        ],
                    ],
                ],
            ],

            'inventory-sources' => [
                'index' => [
                    'create-btn' => 'Crea font d\'inventari',
                    'title'      => 'Fonts d\'inventari',

                    'datagrid' => [
                        'active'   => 'Actiu',
                        'code'     => 'Codi',
                        'delete'   => 'Elimina',
                        'edit'     => 'Edita',
                        'id'       => 'ID',
                        'inactive' => 'Inactiu',
                        'name'     => 'Nom',
                        'priority' => 'Prioritat',
                        'status'   => 'Estat',
                    ],
                ],

                'create' => [
                    'add-title'      => 'Afegeix font d\'inventari',
                    'address'        => 'Adreça de la font',
                    'back-btn'       => 'Enrere',
                    'city'           => 'Ciutat',
                    'code'           => 'Codi',
                    'contact-email'  => 'Correu electrònic',
                    'contact-fax'    => 'Fax',
                    'contact-info'   => 'Informació de contacte',
                    'contact-name'   => 'Nom',
                    'contact-number' => 'Número de contacte',
                    'country'        => 'País',
                    'description'    => 'Descripció',
                    'general'        => 'General',
                    'latitude'       => 'Latitud',
                    'longitude'      => 'Longitud',
                    'name'           => 'Nom',
                    'postcode'       => 'Codi postal',
                    'priority'       => 'Prioritat',
                    'save-btn'       => 'Desa fonts d\'inventari',
                    'select-country' => 'Selecciona país',
                    'select-state'   => 'Selecciona regió',
                    'settings'       => 'Configuració',
                    'state'          => 'Regió',
                    'status'         => 'Estat',
                    'street'         => 'Carrer',
                    'title'          => 'Fonts d\'inventari',
                ],

                'edit' => [
                    'back-btn'       => 'Enrere',
                    'city'           => 'Ciutat',
                    'code'           => 'Codi',
                    'contact-email'  => 'Correu electrònic',
                    'contact-fax'    => 'Fax',
                    'contact-info'   => 'Informació de contacte',
                    'contact-name'   => 'Nom',
                    'contact-number' => 'Número de contacte',
                    'country'        => 'País',
                    'description'    => 'Descripció',
                    'general'        => 'General',
                    'latitude'       => 'Latitud',
                    'longitude'      => 'Longitud',
                    'name'           => 'Nom',
                    'postcode'       => 'Codi postal',
                    'priority'       => 'Prioritat',
                    'save-btn'       => 'Desa fonts d\'inventari',
                    'select-country' => 'Selecciona país',
                    'select-state'   => 'Selecciona regió',
                    'settings'       => 'Configuració',
                    'source-address' => 'Adreça de la font',
                    'state'          => 'Regió',
                    'status'         => 'Estat',
                    'street'         => 'Carrer',
                    'title'          => 'Edita fonts d\'inventari',
                ],

                'create-success'    => 'Font d\'inventari creada correctament',
                'delete-failed'     => 'No s\'ha pogut eliminar la font d\'inventari',
                'delete-success'    => 'Font d\'inventari eliminada correctament',
                'last-delete-error' => 'No es pot eliminar l\'última font d\'inventari',
                'update-success'    => 'Font d\'inventari actualitzada correctament',
            ],
        ],

        'communication' => [
            'index' => [
                'admin'               => 'Admin',
                'blocked-message'     => 'You are blocked by admin',
                'message-failed'      => 'Message sending failed',
                'message-placeholder' => 'Type your message here...',
                'message-sent'        => 'Message sent successfully',
                'no-message'          => 'No Message Found',
                'search-message'      => 'Search Message...',
                'title'               => 'Communication',

                'filters' => [
                    'all-messages'      => 'All Messages',
                    'prev-fifteen-days' => 'Previous 15 Days',
                    'prev-seven-days'   => 'Previous 7 Days',
                    'prev-six-months'   => 'Previous 6 Months',
                    'prev-thirty-days'  => 'Previous 30 Days',
                ],
            ],
        ],

        'reporting' => [
            'sales' => [
                'index' => [
                    'abandoned-carts'                => 'Abandoned Carts',
                    'abandoned-products'             => 'Abandoned Products',
                    'abandoned-rate'                 => 'Abandoned Rate',
                    'abandoned-revenue'              => 'Abandoned Revenue',
                    'added-to-cart'                  => 'Added to Cart',
                    'added-to-cart-info'             => 'Only :progress visitors added products to cart',
                    'all-channels'                   => 'All Channels',
                    'average-order-value-over-time'  => 'Average Order Value Over Time',
                    'average-sales'                  => 'Average Order Value',
                    'commission'                     => 'Commission',
                    'commission-over-time'           => 'Commission Over Time',
                    'count'                          => 'Count',
                    'end-date'                       => 'End Date',
                    'id'                             => 'Id',
                    'interval'                       => 'Interval',
                    'name'                           => 'Name',
                    'orders'                         => 'Orders',
                    'orders-over-time'               => 'Orders Over Time',
                    'payment-method'                 => 'Payment Method',
                    'product-views'                  => 'Product Views',
                    'product-views-info'             => 'Only :progress visitors view products',
                    'purchase-funnel'                => 'Purchase Funnel',
                    'purchased'                      => 'Purchased',
                    'purchased-info'                 => 'Only :progress visitors do the purchasing',
                    'refunds'                        => 'Refunds',
                    'refunds-over-time'              => 'Refunds Over Time',
                    'sales-over-time'                => 'Sales Over Time',
                    'start-date'                     => 'Start Date',
                    'tax-collected'                  => 'Tax Collected',
                    'tax-collected-over-time'        => 'Tax Collected Over Time',
                    'title'                          => 'Sales',
                    'top-payment-methods'            => 'Top Payment Methods',
                    'top-tax-categories'             => 'Top Tax Categories',
                    'total'                          => 'Total',
                    'total-commission-paid'          => 'Total Commission Paid',
                    'total-orders'                   => 'Total Orders',
                    'total-sales'                    => 'Total Sales',
                    'total-visits'                   => 'Total visits',
                    'total-visits-info'              => 'Total visitors on store',
                    'view-details'                   => 'View Details',
                ],
            ],

            'customers' => [
                'index' => [
                    'all-channels'                => 'All Channels',
                    'count'                       => 'Count',
                    'customers'                   => 'Customers',
                    'customers-over-time'         => 'Customers Over Time',
                    'customers-traffic'           => 'Customers Traffic',
                    'customers-with-most-orders'  => 'Customers With Most Orders',
                    'customers-with-most-reviews' => 'Customers With Most Reviews',
                    'customers-with-most-sales'   => 'Customers With Most Sales',
                    'email'                       => 'Email',
                    'end-date'                    => 'End Date',
                    'id'                          => 'Id',
                    'interval'                    => 'Interval',
                    'name'                        => 'Name',
                    'orders'                      => 'Orders',
                    'reviews'                     => 'Reviews',
                    'start-date'                  => 'Start Date',
                    'title'                       => 'Customers',
                    'top-customer-groups'         => 'Top Customer Groups',
                    'total'                       => 'Total',
                    'total-customers'             => 'Total Customers',
                    'total-visitors'              => 'Total Visitors',
                    'traffic-over-week'           => 'Traffic Over Week',
                    'unique-visitors'             => 'Unique Visitors',
                    'view-details'                => 'View Details',
                ],
            ],

            'products' => [
                'index' => [
                    'all-channels'                      => 'All Channels',
                    'channel'                           => 'Channel',
                    'end-date'                          => 'End Date',
                    'id'                                => 'Id',
                    'interval'                          => 'Interval',
                    'locale'                            => 'Locale',
                    'name'                              => 'Name',
                    'orders'                            => 'Orders',
                    'price'                             => 'Price',
                    'products-added-over-time'          => 'Products Added Over Time',
                    'products-with-most-reviews'        => 'Products With Most Reviews',
                    'products-with-most-visits'         => 'Products With Most Visits',
                    'quantities'                        => 'Quantities',
                    'quantities-sold-over-time'         => 'Quantities Sold Over Time',
                    'revenue'                           => 'Revenue',
                    'reviews'                           => 'Reviews',
                    'start-date'                        => 'Start Date',
                    'title'                             => 'Products',
                    'top-selling-products-by-quantity'  => 'Top Selling Products By Quantity',
                    'top-selling-products-by-revenue'   => 'Top Selling Products By Revenue',
                    'total'                             => 'Total',
                    'total-products-added-to-wishlist'  => 'Products Added To Wishlist',
                    'total-sold-quantities'             => 'Sold Products Quantity',
                    'view-details'                      => 'View Details',
                    'visits'                            => 'Visits',
                ],
            ],

            'view' => [
                'all-channels'  => 'All Channels',
                'day'           => 'Day',
                'end-date'      => 'End Date',
                'export-csv'    => 'Export CSV',
                'export-xls'    => 'Export XLS',
                'month'         => 'Month',
                'not-available' => 'No Records Available.',
                'start-date'    => 'Start Date',
                'year'          => 'Year',
            ],

            'empty' => [
                'info'  => 'No data available for selected interval',
                'title' => 'No Data Available',
            ],
        ],

        'extensions' => [
            'index' => [
                'disabled'  => 'Disabled',
                'enabled'   => 'Enabled',
                'info'      => 'Build, manage, and scale your online store with Bagisto’s customizable eCommerce extensions.',
                'no-result' => 'No extensions available here.',
                'title'     => 'Extensions',

                'filters' => [
                    'all-extensions' => 'All Extensions',
                    'bulk_upload'    => 'Bulk Upload',
                    'gdpr'           => 'GDPR',
                    'marketplace'    => 'Marketplace',
                    'payment'        => 'Payment',
                    'pos'            => 'POS',
                    'shipping'       => 'Shipping',
                ],
            ],
        ],
    ],

    'shop' => [
        'layout' => [
            'header' => [
                'seller-logo'     => 'Seller Logo',
                'switch-to-store' => 'Switch to manage store',
            ],
        ],

        'checkout' => [
            'cart' => [
                'minimum-order-message' => 'Minimum order amount for :shop_title is',
                'product-not-available' => 'Product is not available',
                'sold-by'               => 'Sold By',
            ],
        ],

        'marketplace' => [
            'index' => [
                'days-payment'        => 'Days* Payment',
                'deals-in'            => 'Deals In',
                'featured-seller'     => 'Our Featured Sellers',
                'online-business'     => 'Online Business',
                'reviews'             => ':count Reviews',
                'seller-community'    => 'Seller Community',
                'serviceable-pincode' => 'Serviceable Pincode',
                'start-selling'       => 'Start selling with large customer around the world, round the clock.',
                'step'                => 'Step :count',
                'visit-shop'          => 'Visit Shop',
            ],
        ],

        'products' => [
            'add-to-cart'   => 'Add to Cart',
            'delivery-info' => 'Delivery Information comes here',
            'hide'          => 'Hide',
            'more-info'     => 'More Information',
            'seller-count'  => ':count more seller selling same product',
            'seller-info'   => 'Seller Information',
            'sold-by'       => 'Sold By',
            'top-selling'   => 'Top Selling',

            'flag' => [
                'alert'              => 'Alert',
                'already-reported'   => 'You have already reported this product',
                'create-success'     => 'Product Reported successfully',
                'guest-alert'        => 'You need to login to report this product',
                'not-allowed'        => 'You cannot report this product without placing an order',
                'other-reason'       => 'Other Reason',
                'reason'             => 'Reason',
                'reason-placeholder' => 'Please specify the reason',
                'report-product'     => 'Report Product',
                'select-reason'      => 'Select Reason',
                'submit-btn'         => 'Submit',
            ],
        ],

        'sellers' => [
            'profile' => [
                'not-approved'    => 'Seller is not approved yet',
                'products-count'  => 'Products (:count)',
                'reviews-count'   => 'Reviews (:count)',
                'search-text'     => 'Search for Products',

                'about' => [
                    'title'           => 'About',
                    'about-us'        => 'About Us',
                    'shipping-policy' => 'Shipping Policy',
                    'privacy-policy'  => 'Privacy Policy',
                    'return-policy'   => 'Return Policy',
                ],

                'contact-form' => [
                    'title'          => 'Contact',
                    'name'           => 'Name',
                    'email'          => 'Email',
                    'subject'        => 'Subject',
                    'query'          => 'Query',
                    'submit-btn'     => 'Submit',
                    'create-success' => 'Your query has been submitted successfully',
                ],

                'share' => [
                    'title'     => 'Share',
                    'share-on'  => 'Share On',
                    'facebook'  => 'facebook',
                    'linkedin'  => 'linked in',
                    'twitter'   => 'twitter',
                    'pinterest' => 'pinterest',
                ],

                'report-form' => [
                    'alert'              => 'Alert',
                    'already-reported'   => 'You have already reported this seller',
                    'create-success'     => 'Seller reported successfully',
                    'guest-alert'        => 'You need to login to report the seller.',
                    'not-allowed'        => 'You cannot report this seller without placing an order',
                    'other-reason'       => 'Other Reason',
                    'reason'             => 'Reason',
                    'reason-placeholder' => 'Please specify the reason',
                    'select-reason'      => 'Select Reason',
                    'submit-btn'         => 'Submit',
                    'title'              => 'Report Issue',
                ],

                'reviews' => [
                    'alert'            => 'Alert',
                    'already-reviewed' => 'You have already reviewed this seller',
                    'comment'          => 'Comment',
                    'create-success'   => 'Seller Reviewed successfully',
                    'customer-review'  => ':count Customer Review',
                    'customer-reviews' => 'Customer Reviews',
                    'guest-alert'      => 'You need to login to report the seller',
                    'rating'           => 'Rating',
                    'review-by'        => 'Review By',
                    'submit-btn'       => 'Submit',
                    'title'            => 'Title',
                    'view-all'         => 'View All Reviews',
                    'write-review'     => 'Write a Review',
                ],

                'products' => [
                    'no-result' => 'No products available here',
                    'show'      => 'Show',

                    'sort-by' => [
                        'title' => 'Sort By',

                        'options' => [
                            'cheapest-first'  => 'Cheapest First',
                            'expensive-first' => 'Expensive First',
                            'from-a-z'        => 'From A-Z',
                            'from-z-a'        => 'From Z-A',
                            'latest-first'    => 'Newest First',
                            'oldest-first'    => 'Oldest First',
                        ],
                    ],

                    'filters' => [
                        'clear-all'   => 'Clear All',
                        'filter'      => 'Filter',
                        'filters'     => 'Filters:',
                        'price-range' => 'Price Range',
                        'sort'        => 'Sort',
                    ],
                ],
            ],
        ],
    ],
];
