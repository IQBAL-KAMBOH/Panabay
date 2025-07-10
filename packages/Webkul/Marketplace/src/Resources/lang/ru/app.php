<?php

return [
    'admin' => [
        'configuration' => [
            'index' => [
                'marketplace' => [
                    'title' => 'Маркетплейс',
                    'info'  => 'Управление Маркетплейсом',

                    'module-info' => [
                        'title'       => 'Информация о Модуле',
                        'info'        => 'Предоставляет информацию о версии приложения.',
                        'app-version' => 'Версия приложения: v2.3.0',
                    ],

                    'general' => [
                        'admin-commission-percentage'  => 'Процент комиссии администратора',
                        'description'                  => 'Управляйте общими настройками маркетплейса, такими как статус, комиссия и т.д.',
                        'lines-in-street-address'      => 'Строки в уличном адресе',
                        'lines-in-street-address-info' => 'Установите количество строк в адресе. По умолчанию одна строка.',
                        'status'                       => 'Статус',
                        'title'                        => 'Общее',
                    ],

                    'product' => [
                        'approval-required'         => 'Требуется одобрение',
                        'description'               => 'Управляйте настройками продуктов маркетплейса, такими как одобрения, флаги и т.д.',
                        'enable-flag'               => 'Включить флаг',
                        'seller-can-assign-product' => 'Продавец может назначить продукт',
                        'seller-can-create-product' => 'Продавец может создать продукт',
                        'show-progress-bar'         => 'Показать индикатор прогресса',
                        'title'                     => 'Продукт',
                    ],

                    'seller' => [
                        'approval-required'           => 'Требуется одобрение',
                        'can-cancel-order'            => 'Может отменить заказ',
                        'can-create-invoice'          => 'Может создать счет',
                        'can-create-shipment'         => 'Может создать отправку',
                        'description'                 => 'Управляйте настройками продавца на рынке, такими как одобрение, флаги и т.д.',
                        'enable-flag'                 => 'Включить флаг',
                        'enable-minimum-order-amount' => 'Включить минимальную сумму заказа',
                        'enable-seller-flag'          => 'Включить флаг продавца',
                        'red-flag-limit'              => 'Лимит красного флага',
                        'red-flag-limit-info'         => 'Если продавец превысит этот лимит, на его профиле появится красный флаг.',
                        'show-red-flag'               => 'Показывать красный флаг на профиле при превышении лимита',
                        'title'                       => 'Продавец',
                    ],

                    'featured-sellers' => [
                        'limit-count' => 'Ограничение Количества',
                        'description' => 'Управляйте избранными продавцами на рынке.',
                        'status'      => 'Статус',
                        'title'       => 'Избранные Продавцы',

                        'popularity-criteria' => [
                            'all'              => 'Все',
                            'maximum-orders'   => 'Максимальное Количество Заказов',
                            'maximum-products' => 'Максимальное Количество Товаров',
                            'maximum-rating'   => 'Максимальный рейтинг',
                            'maximum-sale'     => 'Максимальная Продажа',
                            'title'            => 'Критерии Популярности',
                        ],
                    ],

                    'landing-page' => [
                        'banner-btn-title'    => 'Заголовок кнопки баннера',
                        'banner-description'  => 'Описание баннера',
                        'banner-image'        => 'Изображение баннера',
                        'banner-title'        => 'Заголовок баннера',
                        'business-hour'       => 'Часы Работы',
                        'community-count'     => 'Количество Участников',
                        'description'         => 'Настройте главную страницу Маркетплейса, добавив иконки, баннеры и описания для свежего вида.',
                        'feature-box1-desc'   => 'Описание Особенности 1',
                        'feature-box1-icon'   => 'Иконка Особенности 1',
                        'feature-box1-title'  => 'Заголовок Особенности 1',
                        'feature-box2-desc'   => 'Описание Особенности 2',
                        'feature-box2-icon'   => 'Иконка Особенности 2',
                        'feature-box2-title'  => 'Заголовок Особенности 2',
                        'feature-box3-desc'   => 'Описание Особенности 3',
                        'feature-box3-icon'   => 'Иконка Особенности 3',
                        'feature-box3-title'  => 'Заголовок Особенности 3',
                        'feature-box4-desc'   => 'Описание Особенности 4',
                        'feature-box4-icon'   => 'Иконка Особенности 4',
                        'feature-box4-title'  => 'Заголовок Особенности 4',
                        'feature-description' => 'Описание Особенности',
                        'feature-image'       => 'Изображение Особенности',
                        'feature-title'       => 'Заголовок Особенности',
                        'journey-description' => 'Описание Путешествия',
                        'journey-image'       => 'Изображение Путешествия',
                        'journey-step1-desc'  => 'Описание Шага 1 Путешествия',
                        'journey-step1-icon'  => 'Иконка Шага 1 Путешествия',
                        'journey-step1-title' => 'Заголовок Шага 1 Путешествия',
                        'journey-step2-desc'  => 'Описание Шага 2 Путешествия',
                        'journey-step2-icon'  => 'Иконка Шага 2 Путешествия',
                        'journey-step2-title' => 'Заголовок Шага 2 Путешествия',
                        'journey-step3-desc'  => 'Описание Шага 3 Путешествия',
                        'journey-step3-icon'  => 'Иконка Шага 3 Путешествия',
                        'journey-step3-title' => 'Заголовок Шага 3 Путешествия',
                        'journey-step4-desc'  => 'Описание Шага 4 Путешествия',
                        'journey-step4-icon'  => 'Иконка Шага 4 Путешествия',
                        'journey-step4-title' => 'Заголовок Шага 4 Путешествия',
                        'journey-step5-desc'  => 'Описание Шага 5 Путешествия',
                        'journey-step5-icon'  => 'Иконка Шага 5 Путешествия',
                        'journey-step5-title' => 'Заголовок Шага 5 Путешествия',
                        'journey-title'       => 'Заголовок Путешествия',
                        'payment-duration'    => 'Длительность Оплаты',
                        'serviceable-pincode' => 'Обслуживаемый Почтовый Индекс',
                        'title'               => 'Целевая Страница',
                    ],
                ],
            ],
        ],

        'acl' => [
            'assign-product'    => 'Назначить продукт',
            'communications'    => 'Коммуникации',
            'create'            => 'Создать',
            'delete'            => 'Удалить',
            'edit'              => 'Редактировать',
            'flag-reasons'      => 'Причины жалобы',
            'inventory-sources' => 'Источники инвентаря',
            'orders'            => 'Заказы',
            'pay'               => 'Оплатить',
            'payment-request'   => 'Запрос на оплату',
            'product-reviews'   => 'Отзывы о товарах',
            'products'          => 'Продукты',
            'reviews'           => 'Отзывы о продавце',
            'seller-categories' => 'Категории продавцов',
            'sellers'           => 'Продавцы',
            'title'             => 'Маркетплейс',
            'transactions'      => 'Транзакции',
            'view'              => 'Просмотр',
        ],

        'menu' => [
            'communications'    => 'Коммуникации',
            'flag-reasons'      => 'Причины флага',
            'inventory-sources' => 'Источники инвентаря',
            'orders'            => 'Заказы',
            'payment-requests'  => 'Запросы на оплату',
            'product-reviews'   => 'Отзывы о товаре',
            'products'          => 'Товары',
            'seller-categories' => 'Категории продавцов',
            'seller-reviews'    => 'Отзывы о продавце',
            'sellers'           => 'Продавцы',
            'title'             => 'Маркетплейс',
            'transactions'      => 'Транзакции',
        ],

        'sellers' => [
            'index' => [
                'add-btn'            => 'Добавить продавца',
                'delete-failed'      => 'Ошибка удаления продавца!',
                'delete-success'     => 'Продавец успешно удален.',
                'incomplete-profile' => 'У продавца неполный профиль!',
                'login-message'      => 'Вы вошли как :seller_name',
                'pending-orders'     => 'У продавца есть несколько ожидающих заказов',
                'title'              => 'Продавцы',
                'update-success'     => 'Продавец успешно обновлен!',

                'datagrid' => [
                    'add-product'     => 'Добавить',
                    'approved'        => 'Одобрено',
                    'assign-product'  => 'Назначить продукт',
                    'created-at'      => 'Создано',
                    'delete'          => 'Удалить',
                    'disapproved'     => 'Не одобрено',
                    'edit'            => 'Редактировать',
                    'email'           => 'Электронная почта',
                    'flags'           => 'Флаги',
                    'id'              => 'ID',
                    'login-as-seller' => 'Войти как продавец',
                    'seller-id'       => 'ID - :seller_id',
                    'seller-name'     => 'Имя продавца',
                    'shop-url'        => 'URL магазина',
                    'status'          => 'Статус',
                    'suspended'       => 'Приостановлен',
                    'total-flags'     => 'Общее количество флагов: :count',
                    'update-status'   => 'Обновить статус',
                ],

                'create'  => [
                    'address'        => 'Адрес',
                    'city'           => 'Город',
                    'country'        => 'Страна',
                    'email'          => 'Электронная почта',
                    'name'           => 'Имя',
                    'phone'          => 'Номер телефона',
                    'postcode'       => 'Почтовый индекс',
                    'save-btn'       => 'Сохранить',
                    'select'         => 'Выбрать',
                    'shop-title'     => 'Название магазина',
                    'shop-url'       => 'URL магазина',
                    'state'          => 'Штат',
                    'street-address' => 'Уличный адрес',
                    'success'        => 'Продавец успешно создан.',
                    'title'          => 'Создать продавца',
                ],
            ],

            'flags' => [
                'index' => [
                    'title' => 'Флаги продавца',

                    'datagrid' => [
                        'id'             => 'Идентификатор',
                        'customer-name'  => 'Имя клиента',
                        'customer-email' => 'Электронная почта клиента',
                        'date'           => 'Дата',
                        'reason'         => 'Причина',
                    ],
                ],
            ],

            'search' => [
                'back-btn'          => 'Назад',
                'image-placeholder' => 'Изображение товара',
                'no-result'         => 'Результат не найден!',
                'sku'               => 'Артикул - :sku',
                'title'             => 'Поиск товаров',
            ],

            'assign-product' => [
                'already-selling'     => 'Виконанець уже продає цей продукт',
                'assign-successfully' => 'Продукт успішно призначено продавцеві.',
                'back-btn'            => 'Назад',
                'condition'           => 'Стан',
                'description'         => 'Опис',
                'new'                 => 'Новий',
                'old'                 => 'Старий',
                'price'               => 'Ціна',
                'product-not-allowed' => 'Продавцю заборонено продавати продукти типу :type.',
                'quantities'          => 'Кількості',
                'save-btn'            => 'Зберегти',
                'select-condition'    => 'Виберіть стан',
                'title'               => 'Призначити продукт',

                'seller-details' => [
                    'additional-info' => 'Додаткова інформація',
                    'approved'        => 'Затверджено',
                    'disapproved'     => 'Відхилено',
                    'no-of-products'  => 'Кількість продуктів',
                    'status'          => 'Статус',
                    'suspended'       => 'Призупинено',
                    'title'           => 'Деталі продавця',
                ],

                'product-details' => [
                    'active'            => 'Активний',
                    'disable'           => 'Деактивувати',
                    'title'             => 'Деталі продукту',
                    'image-placeholder' => 'Зображення продукту',
                ],

                'images' => [
                    'info'  => 'Разрешение изображения должно быть 609px X 560px',
                    'title' => 'Изображения',
                ],

                'videos' => [
                    'error' => 'Видео не может быть больше :max килобайт. Пожалуйста, выберите файл меньшего размера.',
                    'info'  => 'Максимальный размер видео должен быть :size',
                    'title' => 'Видео',
                ],

                'configurable' => [
                    'delete-btn'        => 'Удалить',
                    'edit-btn'          => 'Редактировать',
                    'image-placeholder' => 'Изображение товара',
                    'qty'               => 'Количество - :qty',
                    'sku'               => 'Артикул - :sku',
                    'title'             => 'Вариации',

                    'edit' => [
                        'images'     => 'Изображения',
                        'price'      => 'Цена',
                        'quantities' => 'Количество',
                        'save-btn'   => 'Сохранить',
                    ],
                ],

                'downloadable' => [
                    'links' => [
                        'add-btn'     => 'Добавить ссылку',
                        'delete-btn'  => 'Удалить',
                        'edit-btn'    => 'Редактировать',
                        'empty-info'  => 'Чтобы создать ссылку на ходу.',
                        'empty-title' => 'Добавить ссылку',
                        'file'        => 'Файл : ',
                        'info'        => 'Товар с возможностью загрузки позволяет продавать цифровые товары, такие как электронные книги, программные приложения, музыку, игры и т. д.',
                        'sample-file' => 'Пример файла : ',
                        'sample-url'  => 'Пример URL : ',
                        'title'       => 'Ссылки на загрузку',
                        'url'         => 'URL : ',

                        'update-create' => [
                            'downloads'   => 'Загрузка разрешена',
                            'file'        => 'Файл',
                            'file-type'   => 'Тип файла',
                            'name'        => 'Название',
                            'price'       => 'Цена',
                            'sample'      => 'Пример',
                            'sample-type' => 'Тип примера',
                            'save-btn'    => 'Сохранить',
                            'title'       => 'Ссылка',
                            'url'         => 'URL',
                        ],
                    ],

                    'samples' => [
                        'add-btn'     => 'Добавить образец',
                        'delete-btn'  => 'Удалить',
                        'edit-btn'    => 'Редактировать',
                        'empty-info'  => 'Чтобы создать образец на ходу.',
                        'empty-title' => 'Добавить образец',
                        'file'        => 'Файл : ',
                        'info'        => 'Товар с возможностью загрузки позволяет продавать цифровые товары, такие как электронные книги, программные приложения, музыку, игры и т. д.',
                        'title'       => 'Образцы для загрузки',
                        'url'         => 'URL : ',

                        'update-create' => [
                            'file'      => 'Файл',
                            'file-type' => 'Тип файла',
                            'name'      => 'Название',
                            'save-btn'  => 'Сохранить',
                            'title'     => 'Ссылка',
                            'url'       => 'URL',
                        ],
                    ],
                ],
            ],

            'edit' => [
                'back-btn'       => 'Назад',
                'suspended'      => 'Приостановлен',
                'title'          => 'Редактировать продавца',
                'update-btn'     => 'Обновить продавца',
                'update-success' => 'Продавец успешно обновлен.',

                'shop' => [
                    'address'          => 'Адрес',
                    'city'             => 'Город',
                    'country'          => 'Страна',
                    'description'      => 'Описание',
                    'email'            => 'Электронная почта',
                    'name'             => 'Имя',
                    'phone-number'     => 'Номер телефона',
                    'postcode'         => 'Почтовый индекс',
                    'select'           => 'Выбор',
                    'shop-title'       => 'Название магазина',
                    'state'            => 'Область',
                    'street-address'   => 'Уличный адрес',
                    'title'            => 'Детали магазина',
                    'url'              => 'URL магазина',
                ],

                'profile' => [
                    'banner'       => 'Баннер профиля',
                    'banner-size'  => 'Размер баннера должен быть как 300px X 200px',
                    'logo'         => 'Логотип профиля',
                    'logo-size'    => 'Размер логотипа должен быть как 125px X 125px',
                    'social-links' => ':name Ссылка',
                    'title'        => 'Детали профиля',
                ],

                'allowed-product' => [
                    'title' => 'Разрешенные товары',
                ],

                'minimum-order-amount' => [
                    'title' => 'Минимальная сумма заказа',
                ],

                'google-analytics-id' => [
                    'title' => 'Идентификатор Google Analytics',
                ],

                'commission' => [
                    'percentage' => 'Процент',
                    'status'     => 'Статус',
                    'title'      => 'Комиссия продавца',
                ],

                'meta-info' => [
                    'meta-description' => 'Мета-описание',
                    'meta-keyword'     => 'Мета-ключевые слова',
                    'meta-title'       => 'Мета-заголовок',
                    'title'            => 'Мета-информация',
                ],

                'policy' => [
                    'privacy'  => 'Политика конфиденциальности',
                    'return'   => 'Политика возврата',
                    'shipping' => 'Политика доставки',
                    'title'    => 'Политики',
                ],

                'channels' => [
                    'title' => 'Канал',
                ],

                'users' => [
                    'email' => 'Электронная почта',
                    'id'    => 'ID',
                    'name'  => 'Имя',
                    'phone' => 'Телефон',
                    'title' => 'Пользователи',
                ],
            ],
        ],

        'products' => [
            'index' => [
                'add-btn'        => 'Добавить товары',
                'delete-success' => 'Товар успешно удален.',
                'title'          => 'Товары',
                'update-success' => 'Товар успешно обновлен.',

                'datagrid' => [
                    'approved'       => 'Одобрено',
                    'delete'         => 'Удалить',
                    'disapproved'    => 'Не одобрено',
                    'flags'          => 'Флаги',
                    'id'             => 'ID',
                    'is-owner'       => 'Является владельцем',
                    'no'             => 'Нет',
                    'out-of-stock'   => 'Нет в наличии',
                    'price'          => 'Цена',
                    'product-id'     => 'ID - :product_id',
                    'product-name'   => 'Название товара',
                    'product-number' => 'Номер товара',
                    'product-type'   => 'Тип товара',
                    'quantity'       => 'Количество',
                    'seller-name'    => 'Имя продавца',
                    'sku'            => 'Артикул',
                    'status'         => 'Статус',
                    'total-flags'    => 'Всего флагов: :count',
                    'total-quantity' => ':quantity Доступно',
                    'update-status'  => 'Обновить статус',
                    'yes'            => 'Да',
                ],
            ],

            'flags' => [
                'index' => [
                    'title' => 'Флаги Продукта',

                    'datagrid' => [
                        'customer-email' => 'Электронная почта клиента',
                        'customer-name'  => 'Имя клиента',
                        'date'           => 'Дата',
                        'id'             => 'ID',
                        'reason'         => 'Причина',
                    ],
                ],
            ],
        ],

        'product-reviews' => [
            'index' => [
                'review-details' => 'Детали отзыва',
                'title'          => 'Отзывы о продуктах',

                'datagrid' => [
                    'approved'      => 'Утверждено',
                    'comment'       => 'Комментарий',
                    'customer-name' => 'Имя клиента',
                    'date'          => 'Дата',
                    'disapproved'   => 'Не утверждено',
                    'id'            => 'Идентификатор',
                    'images'        => 'Изображения',
                    'pending'       => 'Ожидает утверждения',
                    'product'       => 'Продукт',
                    'product-name'  => 'Название продукта',
                    'rating'        => 'Рейтинг',
                    'review-id'     => 'ID отзыва - :review_id',
                    'shop-title'    => 'Название магазина',
                    'status'        => 'Статус',
                    'title'         => 'Заголовок',
                    'update-status' => 'Статус обновления',
                    'view'          => 'Посмотреть',
                ],
            ],

            'update-success' => 'Отзывы о продукте успешно обновлены',
            'delete-success' => 'Отзывы о продуктах успешно удалены.',
        ],

        'seller-reviews' => [
            'index' => [
                'title' => 'Отзывы о продавцах',

                'datagrid' => [
                    'approved'            => 'Одобрено',
                    'comment'             => 'Комментарий',
                    'customer-name'       => 'Имя клиента',
                    'date'                => 'Дата',
                    'delete'              => 'Удалить',
                    'disapproved'         => 'Отклонено',
                    'id'                  => 'ID',
                    'mass-delete-success' => 'Отзывы о продавцах успешно удалены.',
                    'mass-update-success' => 'Отзывы о продавцах успешно обновлены.',
                    'pending'             => 'В ожидании',
                    'rating'              => 'Рейтинг',
                    'review-id'           => 'ID - :review_id',
                    'review-title'        => 'Заголовок отзыва',
                    'seller-name'         => 'Имя продавца',
                    'shop-title'          => 'Название магазина',
                    'status'              => 'Статус',
                    'update-status'       => 'Обновить статус',
                ],
            ],

            'delete-success' => 'Отзыв о продавце успешно удалён.',
        ],

        'orders' => [
            'index' => [
                'title' => 'Заказы',

                'datagrid' => [
                    'canceled'        => 'Отменено',
                    'closed'          => 'Закрыто',
                    'commission'      => 'Комиссия',
                    'completed'       => 'Завершено',
                    'customer'        => 'Клиент',
                    'date'            => 'Дата',
                    'discount'        => 'Скидка',
                    'email'           => 'Эл. почта',
                    'fraud'           => 'Мошенничество',
                    'gross-amt'       => 'Общая сумма',
                    'id'              => 'ID',
                    'items'           => 'Товары',
                    'location'        => 'Местоположение',
                    'order-id'        => 'ID заказа - #:id',
                    'payment'         => 'Оплата',
                    'pending'         => 'В ожидании',
                    'pending-payment' => 'Ожидание оплаты',
                    'processing'      => 'Обработка',
                    'seller'          => 'Продавец',
                    'seller-earn'     => 'Заработок',
                    'shipment'        => 'Отгрузка',
                    'shop'            => 'Магазин',
                    'status'          => 'Статус',
                    'view'            => 'Просмотр',
                ],
            ],
        ],

        'transactions' => [
            'index' => [
                'title' => 'Транзакции',

                'datagrid' => [
                    'base-total'     => 'Основная сумма',
                    'comment'        => 'Комментарий',
                    'customer-name'  => 'Имя клиента',
                    'id'             => 'ID',
                    'seller-id'      => 'ID продавца',
                    'seller-name'    => 'Имя продавца',
                    'transaction-id' => 'ID транзакции',
                    'view'           => 'Посмотреть',
                ],
            ],

            'view' => [
                'commission'        => 'Комиссия',
                'created-on'        => 'создано :date,',
                'name'              => 'Имя',
                'payment-method'    => ':method Оплата',
                'price'             => 'Цена',
                'qty'               => 'Количество',
                'seller-total'      => 'Итого продавцу',
                'shipping-handling' => 'Доставка и обработка',
                'subtotal'          => 'Промежуточная сумма',
                'tax'               => 'Налог',
                'title'             => 'Транзакция #:transaction_id',
                'total'             => 'Общая сумма',
            ],
        ],

        'flag-reasons' => [
            'index' => [
                'create-btn'          => 'Создать Причину',
                'delete-success'      => 'Причина флага успешно удалена.',
                'mass-delete-success' => 'Причины флага успешно удалены.',
                'mass-update-success' => 'Причины флага успешно обновлены.',
                'title'               => 'Причины флага',

                'datagrid' => [
                    'delete'        => 'Удалить',
                    'edit'          => 'Редактировать',
                    'id'            => 'Идентификатор',
                    'name'          => 'Название',
                    'update-status' => 'Обновить статус',

                    'status' => [
                        'active'  => 'Активный',
                        'disable' => 'Отключить',
                        'title'   => 'Статус',
                    ],

                    'type' => [
                        'product' => 'Продукт',
                        'seller'  => 'Продавец',
                        'title'   => 'Тип',
                    ],
                ],
            ],

            'create' => [
                'admin'    => 'Администратор',
                'back-btn' => 'Назад',
                'general'  => 'Общее',
                'label'    => 'Метка',
                'product'  => 'Продукт',
                'save-btn' => 'Сохранить Причину',
                'seller'   => 'Продавец',
                'status'   => 'Статус',
                'title'    => 'Создать Причину',
                'type'     => 'Тип',
            ],

            'edit' => [
                'admin'    => 'Администратор',
                'back-btn' => 'Назад',
                'general'  => 'Общее',
                'label'    => 'Метка',
                'product'  => 'Продукт',
                'save-btn' => 'Сохранить Причину',
                'seller'   => 'Продавец',
                'status'   => 'Статус',
                'title'    => 'Редактировать Причину',
                'type'     => 'Тип',
            ],

            'create-success' => 'Причина флага успешно создана.',
            'update-success' => 'Причина флага успешно обновлена.',
        ],

        'seller-categories' => [
            'index' => [
                'create-btn'     => 'Назначить категорию',
                'create-success' => 'Категория успешно назначена.',
                'delete-failed'  => 'Ошибка удаления категории!',
                'delete-success' => 'Категория успешно удалена.',
                'title'          => 'Категории Продавцов',
                'update-success' => 'Категория успешно обновлена.',

                'datagrid' => [
                    'delete' => 'Удалить',
                    'edit'   => 'Редактировать',
                    'id'     => 'Идентификатор',
                    'name'   => 'Название',
                ],
            ],

            'create' => [
                'back-btn'      => 'Назад',
                'save-btn'      => 'Сохранить категорию',
                'select-seller' => 'Выбрать продавца',
                'seller'        => 'Продавец',
                'title'         => 'Назначить категорию',
            ],

            'edit' => [
                'back-btn'   => 'Назад',
                'seller'     => 'Продавец',
                'title'      => 'Редактировать категорию',
                'update-btn' => 'Обновить категорию',
            ],
        ],

        'payment-request' => [
            'index' => [
                'comment'              => 'Комментарий',
                'no-amount-remaining'  => 'Нет оставшейся суммы для оплаты!',
                'order-not-found'      => 'Заказ не найден!',
                'pay-btn'              => 'Оплатить сейчас',
                'pay-to-seller'        => 'Оплата продавцу',
                'payment-success'      => 'Продавец успешно оплачен!',
                'something-went-wrong' => 'Что-то пошло не так!',
                'title'                => 'Запрос на оплату',

                'datagrid' => [
                    'already-paid'          => 'Уже оплачено',
                    'canceled'              => 'Отменено',
                    'closed'                => 'Закрыто',
                    'completed'             => 'Завершено',
                    'customer-name'         => 'Имя клиента',
                    'date'                  => 'Дата',
                    'email'                 => 'Эл. почта',
                    'fraud'                 => 'Мошенничество',
                    'gross-amt'             => 'Общая сумма',
                    'id'                    => 'Идентификатор заказа',
                    'invoice-pending'       => 'Ожидание выставления счета',
                    'order-canceled'        => 'Заказ отменен',
                    'order-id'              => 'ID #:id',
                    'pay'                   => 'Оплатить',
                    'pending'               => 'В ожидании',
                    'pending_payment'       => 'Ожидание оплаты',
                    'processing'            => 'Обработка',
                    'refunded'              => 'Возвращено',
                    'remaining-total'       => 'Оставшаяся сумма',
                    'request-payment'       => 'Запрос на оплату',
                    'seller'                => 'Продавец',
                    'seller-total-invoiced' => 'Итого продавцу (выставлено)',
                    'shop'                  => 'Магазин',
                    'status'                => 'Статус',
                    'total-paid'            => 'Итого оплачено',
                    'view'                  => 'Посмотреть',
                ],
            ],
        ],

        'communications' => [
            'index' => [
                'block-seller'         => 'Заблокировать продавца',
                'block-success'        => 'Продавец успешно заблокирован!',
                'chat-history-cleared' => 'История чата успешно очищена!',
                'clear-chat-history'   => 'Очистить историю чата',
                'exit'                 => 'Выход',
                'message-failed'       => 'Не удалось отправить сообщение!',
                'message-sent'         => 'Сообщение успешно отправлено!',
                'no-message'           => 'Сообщений не найдено!',
                'search'               => 'Поиск',
                'search-message'       => 'Поиск сообщения',
                'seller-blocked'       => 'Вы заблокировали этого продавца. Вы не можете отправить сообщение этому продавцу.',
                'sellers'              => 'Продавцы',
                'title'                => 'Коммуникации',
                'type-message'         => 'Введите ваше сообщение здесь...',
                'unblock-seller'       => 'Разблокировать продавца',
                'unblock-success'      => 'Продавец успешно разблокирован!',
                'welcome-message'      => 'Добро пожаловать в коммуникацию на Маркетплейсе!',

                'filters' => [
                    'all-messages'      => 'Все сообщения',
                    'prev-fifteen-days' => 'Последние 15 дней',
                    'prev-seven-days'   => 'Последние 7 дней',
                    'prev-six-months'   => 'Последние 6 месяцев',
                    'prev-thirty-days'  => 'Последние 30 дней',
                ],
            ],
        ],

        'inventory-sources' => [
            'index' => [
                'title' => 'Источники Инвентаря',

                'datagrid' => [
                    'active'      => 'Активный',
                    'code'        => 'Код',
                    'id'          => 'Id',
                    'inactive'    => 'Неактивный',
                    'name'        => 'Название',
                    'seller-name' => 'Имя Продавца',
                    'shop-title'  => 'Название Магазина',
                    'status'      => 'Статус',
                ],

                'view' => [
                    'active'         => 'Активный',
                    'address'        => 'Адрес Источника',
                    'city'           => 'Город',
                    'code'           => 'Код',
                    'contact-email'  => 'Email',
                    'contact-fax'    => 'Факс',
                    'contact-info'   => 'Контактная Информация',
                    'contact-name'   => 'Имя',
                    'contact-number' => 'Контактный Номер',
                    'country'        => 'Страна',
                    'description'    => 'Описание',
                    'general-info'   => 'Общая Информация',
                    'inactive'       => 'Неактивный',
                    'latitude'       => 'Широта',
                    'longitude'      => 'Долгота',
                    'name'           => 'Название',
                    'postcode'       => 'Почтовый Код',
                    'priority'       => 'Приоритет',
                    'seller-info'    => 'Информация о Продавце',
                    'seller-name'    => 'Имя Продавца',
                    'settings'       => 'Настройки',
                    'shop-title'     => 'Название Магазина',
                    'state'          => 'Регион',
                    'street'         => 'Улица',
                    'title'          => 'Источник Инвентаря #:id',
                ],
            ],
        ],
    ],

    'commands' => [
        'install' => [
            'description' => 'Установите пакет Marketplace.',
            'migrate'     => 'Миграция всех таблиц в базу данных (это может занять некоторое время)...',
            'seed'        => 'Вставка данных в базу данных...',
            'publish'     => 'Публикация активов и конфигураций...',
            'cache'       => 'Очистка кэша...',
            'finish'      => 'Пакет Marketplace успешно установлен.',
        ],

        'version' => [
            'description' => 'Отображает текущую версию пакета Marketplace.',
            'comment'     => 'Версия Marketplace: :version',
        ],
    ],

    'emails' => [
        'dear'        => 'Уважаемый/ая :customer_name',
        'dear-admin'  => 'Уважаемый Администратор',
        'dear-seller' => 'Уважаемый продавец',

        'seller' => [
            'registration' => [
                'date'        => 'Дата регистрации:',
                'description' => 'Мы с радостью сообщаем вам о новой регистрации продавца на нашей платформе. Пожалуйста, найдите время, чтобы приветствовать продавца на нашей платформе.',
                'details'     => 'Вот детали:',
                'email'       => 'Адрес электронной почты:',
                'greeting'    => 'Надеюсь, что это сообщение найдет вас в хорошем настроении.',
                'name'        => 'Имя Продавца:',
                'shop'        => 'URL магазина:',
                'subject'     => 'Регистрация Нового Продавца',
            ],

            'forgot-password' => [
                'description'    => 'Вы получаете это письмо, потому что мы получили запрос на сброс пароля для вашей учетной записи.',
                'greeting'       => 'Забыли пароль!',
                'reset-password' => 'Сбросить пароль',
                'subject'        => 'Письмо о сбросе пароля',
            ],

            'welcome' => [
                'description' => 'Добро пожаловать на борт! Мы рады приветствовать вас в семье. Ваше присутствие как продавца добавляет огромную ценность нашей платформе, и мы с нетерпением ждем успешного сотрудничества.',
                'greeting'    => 'Добро пожаловать и спасибо за регистрацию!',
                'subject'     => 'Уведомление о Приветствии Продавца',
            ],

            'approval' => [
                'approved'    => 'Ваш запрос на статус продавца одобрен.',
                'disapproved' => 'Ваш запрос на статус продавца отклонен.',
                'greeting'    => 'Добро пожаловать и спасибо за регистрацию!',
                'subject'     => 'Уведомление об Утверждении Продавца',
            ],

            'update' => [
                'description' => 'Ваш профиль успешно обновлен.',
                'greeting'    => 'Надеюсь, что это сообщение найдет вас в хорошем настроении.',
                'subject'     => 'Уведомление об Обновлении Профиля Продавца',
            ],

            'good-bye' => [
                'description' => 'Работа с вами была удовольствием, и я искренне благодарен за вашу профессионализм, преданность и высокое качество ваших продуктов/услуг. Ваше стремление обеспечить удовлетворение клиента не осталось незамеченным и является ключевым фактором в нашем положительном опыте.',
                'greeting'    => 'Надеюсь, что это сообщение найдет вас в хорошем настроении.',
                'subject'     => 'Уведомление о Прощании Продавца',
            ],

            'product-approval' => [
                'approved'    => 'Ваш продукт :name одобрен.',
                'disapproved' => 'Ваш продукт :name отклонен.',
                'greeting'    => 'Добро пожаловать и спасибо за регистрацию у нас!',
                'subject'     => 'Уведомление о Подтверждении Продукта Продавца',
            ],

            'orders' => [
                'created' => [
                    'greeting' => 'У вас новый заказ :order_id размещен :created_at',
                    'subject'  => 'Подтверждение нового заказа',
                    'summary'  => 'Сводка заказа',
                    'title'    => 'Подтверждение заказа!',
                ],

                'canceled' => [
                    'greeting' => 'Заказ :order_id был отменен',
                    'subject'  => 'Подтверждение отмены заказа',
                    'summary'  => 'Сводка по заказу',
                    'title'    => 'Заказ отменен!',
                ],

                'billing-address'   => 'Адрес выставления счета',
                'contact'           => 'Контакт',
                'discount'          => 'Скидка',
                'grand-total'       => 'Общая сумма',
                'name'              => 'Имя',
                'payment'           => 'Оплата',
                'price'             => 'Цена',
                'qty'               => 'Количество',
                'shipping'          => 'Доставка',
                'shipping-address'  => 'Адрес доставки',
                'shipping-handling' => 'Доставка и обработка',
                'sku'               => 'Артикул',
                'subtotal'          => 'Промежуточная сумма',
                'tax'               => 'Налог',
            ],

            'payment-request' => [
                'greeting'  => 'Надеюсь, что это сообщение находит вас в порядке.',
                'paid'      => 'Привет.. Вы получили оплату за заказ :order_id.',
                'requested' => 'Продавец :seller_name запрошен к оплате заказа :order_id.',
                'subject'   => 'Уведомление о запросе оплаты от продавца',
            ],
        ],

        'contact-seller' => [
            'email'    => 'Электронная почта:- :email',
            'greeting' => 'Надеюсь, что это сообщение находит вас в порядке.',
            'info'     => 'Привет, у :name есть вопрос к вам. Пожалуйста, ознакомьтесь с деталями ниже.',
            'query'    => 'Вопрос: :query',
            'subject'  => 'Уведомление о контакте с продавцом',
            'topic'    => 'Тема: :subject',
        ],

        'report-product' => [
            'admin-msg'  => 'Здравствуйте, ":name" сообщил о проблеме с товаром ":product_name" продавца ":seller_name". Пожалуйста, ознакомьтесь с подробностями ниже.',
            'greeting'   => 'Надеюсь, это сообщение находит вас в добром здравии.',
            'reason'     => 'Причина:- :reason',
            'seller-msg' => 'Здравствуйте, ":name" сообщил о проблеме с вашим товаром ":product_name". Пожалуйста, ознакомьтесь с подробностями ниже.',
            'subject'    => 'Уведомление о проблеме с товаром',
        ],

        'report-seller' => [
            'admin-msg'  => 'Привет, :name подал жалобу на :seller_name. Пожалуйста, ознакомьтесь с деталями ниже.',
            'greeting'   => 'Надеюсь, что это сообщение находит вас в порядке.',
            'reason'     => 'Причина: :reason',
            'seller-msg' => 'Привет, :name подал жалобу на вас. Пожалуйста, ознакомьтесь с деталями ниже.',
            'subject'    => 'Уведомление о жалобе на продавца',
        ],
    ],

    'seeders' => [
        'configurations' => [
            'banner-title'        => 'Создайте учетную запись продавца Velocity',
            'banner-description'  => 'Velocity может быть отличной платформой для продажи ваших продуктов новым бизнесам в Индии. Следуя этим советам, вы можете настроить себя на успех как продавец Velocity!',
            'banner-btn-title'    => 'Открыть магазин',
            'feature-title'       => 'Почему продавцы любят продавать на Velocity?',
            'feature-description' => 'Продавцы любят высокоскоростные платформы, потому что они предлагают потенциал для увеличения продаж, лучшую видимость и эффективный опыт продаж, который может способствовать росту и успеху бизнеса.',
            'feature-box1-title'  => 'Увеличенные возможности продаж',
            'feature-box1-desc'   => 'Продавцы любят высокоскоростные платформы, потому что они предлагают потенциал для увеличения продаж, лучшую видимость и эффективный опыт продаж, который может способствовать росту и успеху бизнеса.',
            'feature-box2-title'  => 'Быстрая оборачиваемость',
            'feature-box2-desc'   => 'Продукты, как правило, продаются быстрее на высокоскоростных платформах, что приводит к быстрой оборачиваемости запасов и генерации дохода для продавцов.',
            'feature-box3-title'  => 'Повышенная видимость',
            'feature-box3-desc'   => 'Эти платформы предлагают большую видимость и экспозицию для продуктов продавцов, что приводит к большему количеству просмотров и потенциальных продаж.',
            'feature-box4-title'  => 'Эффективность и удобство',
            'feature-box4-desc'   => 'Высокоскоростные платформы часто имеют упрощенные процессы и инструменты, которые делают продажу более эффективной, экономя продавцам время и усилия на управление своими онлайн-бизнесами.',
            'journey-title'       => 'Начните свое путешествие на Velocity',
            'journey-description' => 'Начните продавать крупным клиентам по всему миру, круглосуточно.',
            'journey-step1-title' => 'Станьте продавцом',
            'journey-step1-desc'  => 'Настройте свой магазин, указав всю основную информацию.',
            'journey-step2-title' => 'Список продуктов',
            'journey-step2-desc'  => 'Разместите продукты в магазине, чтобы клиенты могли их просматривать и покупать.',
            'journey-step3-title' => 'Получение заказа',
            'journey-step3-desc'  => 'Получайте заказы от широкого круга клиентов по всему миру.',
            'journey-step4-title' => 'Доставка продукта',
            'journey-step4-desc'  => 'После доставки продукта и получения оплаты.',
            'journey-step5-title' => 'Оплата',
            'journey-step5-desc'  => 'Запрос на оплату, получение оплаты после вычета комиссии.',
        ],

        'flag-reasons' => [
            'damaged-product'           => 'Поврежденный товар',
            'damaged-product-sold'      => 'Поврежденный товар, проданный продавцом',
            'duplicate-product'         => 'Дубликат товара',
            'duplicate-product-sold'    => 'Дубликат товара, проданный продавцом',
            'missing-product-parts'     => 'Отсутствующие части товара',
            'over-price-product'        => 'Товар с завышенной ценой',
            'over-price-product-sold'   => 'Товар с завышенной ценой, проданный продавцом',
            'poor-product-quality'      => 'Плохое качество товара',
            'poor-product-quality-sold' => 'Товар плохого качества, проданный продавцом',
            'receive-wrong-product'     => 'Получен неверный товар',
            'wrong-product-sold'        => 'Неверный товар, проданный продавцом',
        ],
    ],

    'components' => [
        'seller' => [
            'datagrid' => [
                'export' => [
                    'csv'        => 'CSV',
                    'download'   => 'Скачать',
                    'export'     => 'Экспорт',
                    'no-records' => 'Нечего экспортировать',
                    'xls'        => 'XLS',
                    'xlsx'       => 'XLSX',
                ],
            ],

            'layouts' => [
                'header' => [
                    'home-page'  => 'Домашняя страница',
                    'logout'     => 'Выйти',
                    'my-profile' => 'Мой профиль',
                    'visit-shop' => 'Посетить магазин',

                    'mega-search' => [
                        'customers'                       => 'Клиенты',
                        'explore-all-customers'           => 'Исследовать всех клиентов',
                        'explore-all-matching-customers'  => 'Исследовать всех клиентов, соответствующих “:query” (:count)',
                        'explore-all-matching-orders'     => 'Исследовать все заказы, соответствующие “:query” (:count)',
                        'explore-all-matching-products'   => 'Исследовать все товары, соответствующие “:query” (:count)',
                        'explore-all-orders'              => 'Исследовать все заказы',
                        'explore-all-products'            => 'Исследовать все товары',
                        'orders'                          => 'Заказы',
                        'products'                        => 'Товары',
                        'sku'                             => 'SKU: :sku',
                        'title'                           => 'Мега-поиск',
                    ],
                ],

                'sidebar' => [
                    'collapse' => 'Свернуть',
                ],
            ],

            'media' => [
                'images' => [
                    'add-image-btn'     => 'Добавить изображение',
                    'allowed-types'     => 'png, jpeg, jpg',
                    'not-allowed-error' => 'Разрешены только файлы изображений (.jpeg, .jpg, .png, ..).',
                ],

                'videos' => [
                    'add-video-btn'     => 'Добавить видео',
                    'allowed-types'     => 'mp4, webm, mkv',
                    'not-allowed-error' => 'Разрешены только видеофайлы (.mp4, .mov, .ogg ..).',
                ],

                'documents' => [
                    'add-document-btn'  => 'Добавить документ',
                    'allowed-types'     => ':types',
                    'not-allowed-error' => 'Разрешены только файлы документов (:types ..).',
                ],

                'placeholders' => [
                    'csv'        => 'CSV',
                    'excel'      => 'Excel',
                    'front'      => 'Перед',
                    'next'       => 'Следующий',
                    'pdf'        => 'PDF',
                    'powerpoint' => 'PowerPoint',
                    'size'       => 'Размер',
                    'text'       => 'Текст',
                    'use-cases'  => 'Случаи использования',
                    'word'       => 'Word',
                    'zoom'       => 'Увеличение',
                ],
            ],
        ],
    ],

    'seller' => [
        'menu' => [
            'bookings'          => 'Бронирования',
            'communication'     => 'Коммуникация',
            'customers'         => 'Клиенты',
            'dashboard'         => 'Панель управления',
            'extensions'        => 'Расширения',
            'general'           => 'Общие',
            'inventory-sources' => 'Источники инвентаря',
            'manage-profile'    => 'Управление профилем',
            'orders'            => 'Заказы',
            'product-reviews'   => 'Отзывы о продуктах',
            'products'          => 'Продукты',
            'reporting'         => 'Отчеты',
            'roles'             => 'Роли',
            'sales'             => 'Продажи',
            'seller-reviews'    => 'Отзывы о продавцах',
            'settings'          => 'Настройки',
            'transaction'       => 'Транзакции',
            'users'             => 'Пользователи',
        ],

        'acl' => [
            'assign'            => 'Назначить',
            'bookings'          => 'Бронирования',
            'cancel'            => 'Отменить',
            'communication'     => 'Коммуникация',
            'create'            => 'Создать',
            'customers'         => 'Клиенты',
            'dashboard'         => 'Панель управления',
            'delete'            => 'Удалить',
            'edit'              => 'Редактировать',
            'extensions'        => 'Расширения',
            'general'           => 'Общее',
            'inventory-sources' => 'Источники инвентаря',
            'invoice'           => 'Счет',
            'orders'            => 'Заказы',
            'payment-request'   => 'Запрос на оплату',
            'print'             => 'Печать',
            'print-invoice'     => 'Печать счета',
            'product-reviews'   => 'Отзывы о продуктах',
            'products'          => 'Продукты',
            'reporting'         => 'Отчеты',
            'sales'             => 'Продажи',
            'seller-reviews'    => 'Отзывы продавцов',
            'settings'          => 'Настройки',
            'shipment'          => 'Доставка',
            'transactions'      => 'Транзакции',
            'view'              => 'Просмотр',
        ],

        'breadcrumb' => [
            'add-new-product'   => 'Добавить новый продукт',
            'assign'            => 'Назначить',
            'bookings'          => 'Бронирования',
            'communication'     => 'Коммуникация',
            'create'            => 'Создать',
            'customers'         => 'Клиенты',
            'dashboard'         => 'Панель управления',
            'edit'              => 'Редактировать',
            'extensions'        => 'Расширения',
            'general'           => 'Общие',
            'inventory-sources' => 'Источники инвентаря',
            'manage-profile'    => 'Управление профилем',
            'orders'            => 'Заказы',
            'product-reviews'   => 'Отзывы о продуктах',
            'products'          => 'Продукты',
            'reporting'         => 'Отчеты',
            'roles'             => 'Роли',
            'sales'             => 'Продажи',
            'seller-reviews'    => 'Отзывы о продавцах',
            'settings'          => 'Настройки',
            'title'             => 'Профиль',
            'transaction'       => 'Транзакции',
            'users'             => 'Пользователи',
            'view'              => 'Просмотр',
        ],

        'login' => [
            'bagisto'             => 'Bagisto',
            'button-title'        => 'Войти',
            'create-your-account' => 'Создайте свой аккаунт',
            'email'               => 'Электронная почта',
            'footer'              => '© Copyright 2010 - :current_year, Webkul Software (Зарегистрировано в Индии). Все права защищены.',
            'forgot-pass'         => 'Забыли пароль?',
            'form-login-text'     => 'Если у вас есть учетная запись, войдите с использованием своего адреса электронной почты.',
            'invalid-credentials' => 'Проверьте ваши учетные данные и повторите попытку.',
            'new-seller'          => 'Новый продавец?',
            'not-approved'        => 'Ваша активация ожидает утверждения администратора',
            'page-title'          => 'Вход продавца',
            'password'            => 'Пароль',
            'show-password'       => 'Показать пароль',
            'suspended-message'   => 'Ваша учетная запись была приостановлена. Свяжитесь с администратором для получения дополнительных сведений.',
            'title'               => 'Войти',
        ],

        'signup' => [
            'account-exists'   => 'У вас уже есть учетная запись?',
            'bagisto'          => 'Bagisto',
            'button-title'     => 'Зарегистрироваться',
            'confirm-pass'     => 'Подтвердите пароль',
            'email'            => 'Электронная почта',
            'footer'           => '© Copyright 2010 - :current_year, Webkul Software (Зарегистрировано в Индии). Все права защищены.',
            'form-signup-text' => 'Если вы новичок в нашем магазине, мы рады приветствовать вас в качестве участника.',
            'name'             => 'Имя',
            'page-title'       => 'Станьте продавцом',
            'password'         => 'Пароль',
            'sign-in-button'   => 'Войти',
            'success'          => 'Учетная запись успешно создана.',
            'url'              => 'URL магазина',
        ],

        'forgot-password' => [
            'already-sent'         => 'Мы уже отправили ссылку для сброса пароля на вашу электронную почту.',
            'back'                 => 'Вернуться к входу?',
            'bagisto'              => 'Bagisto',
            'email'                => 'Электронная почта',
            'email-not-exist'      => 'Мы не можем найти пользователя с этим адресом электронной почты.',
            'footer'               => '© Copyright 2010 - :current_year, Webkul Software (Зарегистрировано в Индии). Все права защищены.',
            'forgot-password-text' => 'Если вы забыли свой пароль, восстановите его, введя свой адрес электронной почты.',
            'page-title'           => 'Забыли пароль?',
            'reset-link-sent'      => 'Мы отправили вам ссылку для сброса пароля по электронной почте.',
            'sign-in-button'       => 'Войти',
            'submit'               => 'Сбросить пароль',
            'title'                => 'Восстановление пароля',
        ],

        'reset-password' => [
            'back-link-title'  => 'Вернуться к входу',
            'bagisto'          => 'Bagisto',
            'confirm-password' => 'Подтвердите пароль',
            'email'            => 'Зарегистрированный адрес электронной почты',
            'footer'           => '© Copyright 2010 - :current_year, Webkul Software (Зарегистрировано в Индии). Все права защищены.',
            'password'         => 'Пароль',
            'submit-btn-title' => 'Сбросить пароль',
            'title'            => 'Сброс пароля',
        ],

        'dashboard' => [
            'add-product'           => 'Добавить продукт',
            'avg-order-sell'        => 'Средний объем продаж за заказ',
            'category-info'         => 'Категории не найдены для выбранного интервала',
            'complete-profile-link' => 'Заполните профиль &rarr;',
            'completed-orders'      => 'Выполненные (:count)',
            'customer-info'         => 'Клиенты не найдены для выбранного интервала',
            'date-range'            => 'Диапазон дат',
            'empty-threshold'       => 'Пустой порог',
            'empty-threshold-desc'  => 'Нет доступных продуктов',
            'end-date'              => 'Дата окончания',
            'hi-comment'            => 'Быстрый обзор текущей ситуации в вашем магазине.',
            'hi-seller'             => 'Привет! :seller_name',
            'month'                 => 'В этом месяце',
            'no-category'           => 'Нет данных',
            'no-customer'           => 'Нет данных',
            'no-record-available'   => 'Нет доступных записей.',
            'order-count'           => ':total Заказов',
            'overall-details'       => 'Общие детали',
            'pending-orders'        => 'Ожидающие (:count)',
            'per-unit'              => ':price/Единица',
            'processing-orders'     => 'В процессе выполнения (:count)',
            'product-info'          => 'Добавьте связанные продукты в пути',
            'profile-score'         => 'Оценка профиля',
            'profile-score-desc'    => 'Максимизируйте свою видимость, сохраняя информацию профиля полной.',
            'qty-stock'             => ':qty в наличии',
            'refunded-orders'       => 'Возвращенные (:count)',
            'remaining-payout'      => 'Оставшийся выкуп',
            'start-date'            => 'Дата начала',
            'stock-threshold'       => 'Порог запасов',
            'title'                 => 'Панель управления',
            'today'                 => 'Сегодня',
            'top-categories'        => 'Лучшие категории',
            'top-customers'         => 'Клиент с наибольшими продажами',
            'top-products'          => 'Самые продаваемые товары',
            'total-customers'       => 'Общее количество клиентов',
            'total-orders'          => 'Общее количество заказов',
            'total-payout'          => 'Общий выкуп',
            'total-sale'            => 'Общая продажа: :total',
            'total-sales'           => 'Общий объем продаж',
            'view-all-btn'          => 'Посмотреть все',
            'visitor-count'         => 'Посетителей - :count',
            'week'                  => 'На этой неделе',
            'year'                  => 'В этом году',
        ],

        'orders' => [
            'index' => [
                'title' => 'Заказы',

                'datagrid' => [
                    'canceled'        => 'Отменено',
                    'closed'          => 'Закрыто',
                    'commission'      => 'Комиссия',
                    'completed'       => 'Завершено',
                    'customer'        => 'Клиент',
                    'date'            => 'Дата',
                    'discount'        => 'Скидка',
                    'email'           => 'Эл. почта',
                    'fraud'           => 'Мошенничество',
                    'gross-amt'       => 'Брутто сумма',
                    'id'              => 'Идентификатор',
                    'invoice-pending' => 'Ожидание выставления счета',
                    'items'           => 'Товары',
                    'location'        => 'Местоположение',
                    'order-id'        => 'ID - #:id',
                    'paid'            => 'Оплачено',
                    'payment'         => 'Оплата',
                    'payment-request' => 'Запрос оплаты',
                    'pending'         => 'В ожидании',
                    'pending-payment' => 'Ожидание оплаты',
                    'processing'      => 'Обработка',
                    'refunded'        => 'Возврат',
                    'requested'       => 'Запрошено',
                    'seller-earn'     => 'Заработок продавца',
                    'shipment'        => 'Отгрузка',
                    'status'          => 'Статус',
                    'transaction'     => 'Транзакция',
                    'view'            => 'Просмотр',
                ],

                'payment-req-success'  => 'Ваш запрос на оплату успешно отправлен',
                'something-went-wrong' => 'Что-то пошло не так',
            ],

            'view' => [
                'admin-commission'           => 'Комиссия администратора',
                'billing-address'            => 'Платежный адрес',
                'by-customer'                => 'От клиента - :name',
                'cancel-btn'                 => 'Отменить',
                'cancel-confirm-msg'         => 'Вы уверены, что хотите отменить этот заказ?',
                'cancel-error-msg'           => 'Заказ не может быть отменен',
                'cancel-success-msg'         => 'Заказ отменен',
                'canceled'                   => 'Отменено',
                'closed'                     => 'Закрыто',
                'completed'                  => 'Завершено',
                'discount'                   => 'Скидка',
                'fraud'                      => 'Мошенничество',
                'grand-total'                => 'Общая сумма',
                'info'                       => 'Информация',
                'item-canceled'              => 'Отменено (:qty_canceled)',
                'item-invoice'               => 'Выставлено счетов (:qty_invoiced)',
                'item-ordered'               => 'Заказано (:qty_ordered)',
                'item-refunded'              => 'Возвращено (:qty_refunded)',
                'item-shipped'               => 'Отгружено (:qty_shipped)',
                'item-status'                => 'Статус товара',
                'payment-method'             => 'Способ оплаты',
                'pending'                    => 'В ожидании',
                'pending_payment'            => 'Ожидание оплаты',
                'permission-error'           => 'У вас нет прав на отмену заказа',
                'place-on'                   => 'Дата размещения: :date',
                'price'                      => 'Цена',
                'price-excl-tax'             => 'Цена (без НДС)',
                'price-incl-tax'             => 'Цена (с НДС)',
                'processing'                 => 'Обработка',
                'product'                    => 'Товар',
                'shipping-address'           => 'Адрес доставки',
                'shipping-handling'          => 'Доставка и обработка',
                'shipping-handling-excl-tax' => 'Доставка и обработка (без НДС)',
                'shipping-handling-incl-tax' => 'Доставка и обработка (с НДС)',
                'shipping-method'            => 'Способ доставки',
                'sku'                        => 'SKU - :sku',
                'sub-total'                  => 'Промежуточная сумма',
                'sub-total-excl-tax'         => 'Промежуточный итог (без НДС)',
                'sub-total-incl-tax'         => 'Промежуточный итог (с НДС)',
                'tax'                        => 'Налог',
                'tax-amount'                 => 'Сумма налога',
                'tax-percent'                => 'Процент налога',
                'title'                      => 'Заказ #:order_id',
                'total'                      => 'Итого',
                'total-due'                  => 'Всего к оплате',
                'total-paid'                 => 'Всего оплачено',
                'total-refunded'             => 'Общая сумма возврата',
                'total-seller-amt'           => 'Общая сумма продавца',

                'invoices' => [
                    'bank-details'               => 'Банковские реквизиты',
                    'bill-to'                    => 'Счет на имя',
                    'contact'                    => 'Контакт',
                    'contact-number'             => 'Контактный номер',
                    'created-on'                 => 'создано: :date_time',
                    'date'                       => 'Дата счета',
                    'discount'                   => 'Скидка',
                    'excl-tax'                   => 'Без НДС:',
                    'grand-total'                => 'Общая сумма',
                    'individual-invoice'         => 'Счет #:invoice_id',
                    'invoice'                    => 'Счет',
                    'invoice-id'                 => 'ID счета',
                    'name'                       => 'Имя',
                    'order-date'                 => 'Дата заказа',
                    'order-id'                   => 'ID заказа',
                    'payment-method'             => 'Способ оплаты',
                    'payment-terms'              => 'Условия оплаты',
                    'price'                      => 'Цена',
                    'print'                      => 'Печать',
                    'product-name'               => 'Название продукта',
                    'qty'                        => 'Кол-во',
                    'ship-to'                    => 'Доставка на имя',
                    'shipping-handling'          => 'Доставка и обработка',
                    'shipping-handling-excl-tax' => 'Доставка и обработка (без НДС)',
                    'shipping-handling-incl-tax' => 'Доставка и обработка (с НДС)',
                    'shipping-method'            => 'Способ доставки',
                    'sku'                        => 'Артикул - :sku',
                    'subtotal'                   => 'Промежуточная сумма',
                    'sub-total-excl-tax'         => 'Промежуточная сумма (без НДС)',
                    'sub-total-incl-tax'         => 'Промежуточная сумма (с НДС)',
                    'tax'                        => 'Налог',
                    'tax-amount'                 => 'Сумма налога',
                    'title'                      => 'Счета',
                    'vat-number'                 => 'Номер НДС',
                ],

                'shipments' => [
                    'carrier-title'       => 'Название перевозчика',
                    'created-on'          => 'создана :date_time',
                    'individual-shipment' => 'Отправка #:track_number',
                    'inventory-source'    => 'Источник инвентаризации',
                    'name'                => 'Имя',
                    'qty'                 => 'Количество',
                    'sku'                 => 'Артикул - :sku',
                    'title'               => 'Отправки',
                    'tracking-number'     => 'Номер отслеживания',
                ],

                'refunds' => [
                    'adjustment-fee'             => 'Корректировка платы',
                    'adjustment-refund'          => 'Корректировка возврата',
                    'created-on'                 => 'создана :date_time',
                    'discount'                   => 'Скидка',
                    'grand-total'                => 'Общая сумма',
                    'individual-refund'          => 'Возврат #:refund_id',
                    'no-result-found'            => 'Мы не смогли найти записей.',
                    'price'                      => 'Цена',
                    'product-name'               => 'Наименование',
                    'qty'                        => 'Количество',
                    'shipping-handling'          => 'Доставка и обработка',
                    'shipping-handling-excl-tax' => 'Доставка и обработка (без НДС)',
                    'shipping-handling-incl-tax' => 'Доставка и обработка (с НДС)',
                    'sub-total-excl-tax'         => 'Промежуточный итог (без НДС)',
                    'sub-total-incl-tax'         => 'Промежуточный итог (с НДС)',
                    'sku'                        => 'Артикул - :sku',
                    'subtotal'                   => 'Промежуточная сумма',
                    'tax'                        => 'Налог',
                    'tax-amount'                 => 'Сумма налога',
                    'title'                      => 'Возвраты',
                ],
            ],

            'invoices' => [
                'create-btn'       => 'Счет',
                'invoice-success'  => 'Счет успешно создан',
                'permission-error' => 'У вас нет прав на создание счета для заказа',
                'price'            => 'Цена',
                'product-name'     => 'Наименование товара',
                'qty'              => 'Количество',
                'qty-error'        => 'Запрошенное количество недоступно',
                'sub-total'        => 'Счет <br> Промежуточная сумма',
                'title'            => 'Создать счет',
                'total'            => 'Итого',
            ],

            'shipments' => [
                'avl-qty'          => 'Доступно: :qty шт.',
                'carrier-title'    => 'Название перевозчика',
                'create-btn'       => 'Отправить',
                'ordered-qty'      => 'Заказанное количество',
                'permission-error' => 'У вас нет прав на создание отправки',
                'product-name'     => 'Наименование товара',
                'qty'              => 'Количество',
                'qty-error'        => 'Запрошенное количество недоступно',
                'shipment-success' => 'Отправка успешно создана',
                'shipped-qty'      => 'Отправленное количество',
                'sku'              => 'Артикул - :sku',
                'source'           => 'Источник заказанного товара',
                'title'            => 'Создать отправку',
                'tracking-id'      => 'Идентификатор отслеживания',
            ],
        ],

        'bookings' => [
            'index' => [
                'datagrid' => [
                    'created-date' => 'Дата создания',
                    'from'         => 'С',
                    'id'           => 'ID',
                    'order-id'     => 'ID заказа',
                    'qty'          => 'Количество',
                    'to'           => 'До',
                    'view'         => 'Просмотр',
                ],

                'title'    => 'Бронирования',
            ],

            'calendar' => [
                'booking-date'     => 'Дата бронирования',
                'booking-details'  => 'Детали бронирования',
                'canceled'         => 'Отменено',
                'closed'           => 'Закрыто',
                'done'             => 'Выполнено',
                'order-id'         => 'ID заказа',
                'pending'          => 'В ожидании',
                'price'            => 'Цена',
                'status'           => 'Статус',
                'time-slot'        => 'Временной интервал:',
                'view-details'     => 'Просмотреть детали',
            ],

            'title' => 'Бронирование продукта',
        ],

        'transactions' => [
            'index' => [
                'remaining-payout'       => 'Оставшийся выкуп',
                'title'                  => 'Транзакции',
                'total-payout'           => 'Общий выкуп',
                'total-seller-sale'      => 'Общая продажа (Продавец)',
                'total-admin-commission' => 'Общая комиссия (Администратор)',
                'total-sale-invoiced'    => 'Общая продажа (Счет)',

                'datagrid' => [
                    'comment'        => 'Комментарий',
                    'id'             => 'Идентификатор',
                    'total'          => 'Итого',
                    'transaction-id' => 'Идентификатор транзакции',
                ],
            ],

            'view' => [
                'commission'        => 'Комиссия',
                'created-on'        => 'создано :date,',
                'date'              => 'Дата',
                'id'                => 'Идентификатор транзакции',
                'method'            => 'Метод',
                'name'              => 'Имя',
                'payment-method'    => 'Оплата :method',
                'price'             => 'Цена',
                'print'             => 'Печать',
                'qty'               => 'Количество',
                'seller-total'      => 'Общая сумма продавца',
                'shipping-handling' => 'Доставка и обработка',
                'subtotal'          => 'Промежуточная сумма',
                'tax'               => 'Налог',
                'title'             => 'Транзакция',
                'total'             => 'Итого',
                'transaction-id'    => '№ транзакции: :transaction_id',
            ],
        ],

        'products' => [
            'index' => [
                'add-new-product' => 'Добавить новый продукт',
                'title'           => 'Продукты',

                'datagrid' => [
                    'active'         => 'Активный',
                    'approved'       => 'Утверждено',
                    'category'       => 'Категория',
                    'delete'         => 'Удалить',
                    'disable'        => 'Отключен',
                    'disapproved'    => 'Отклонено',
                    'edit'           => 'Редактировать',
                    'id'             => 'ID',
                    'image'          => 'Изображение',
                    'is-approved'    => 'Утверждено',
                    'name'           => 'Название',
                    'out-of-stock'   => 'Нет в наличии',
                    'price'          => 'Цена',
                    'product-number' => 'Номер продукта',
                    'product_id'     => 'ID - :product_id',
                    'sku'            => 'Артикул (SKU)',
                    'status'         => 'Статус',
                    'stock'          => 'Наличие',
                    'total-quantity' => ':quantity Доступно',
                    'type'           => 'Тип',
                ],
            ],

            'create' => [
                'attribute-family'          => 'Семейство атрибутов',
                'back'                      => 'Назад',
                'continue'                  => 'Продолжить',
                'create-new-product'        => 'Создать новые продукты',
                'create-your-new-product'   => 'Если продукт не существует, создайте свой новый продукт',
                'disable-product-message'   => 'Администратор отключил функцию создания или назначения продуктов.',
                'image-placeholder'         => 'Ваше изображение',
                'no-result'                 => 'Нет результатов',
                'not-allowed'               => 'Вам не разрешено создавать продукт',
                'or'                        => 'Или',
                'product-type'              => 'Тип продукта',
                'search-product'            => 'Поиск продуктов',
                'sell-admin-product-prices' => 'Продавайте продукты администратора по своим ценам.',
                'sell-as-yours'             => 'Продавать как свой',
                'sku'                       => 'Артикул (SKU)',
                'sub-title'                 => 'Вы можете добавить продукт двумя способами: либо из административной панели продукта, либо создать свой собственный.',
                'title'                     => 'Добавить новый продукт',
                'update-profile'            => 'Пожалуйста, обновите данные профиля',
            ],

            'edit' => [
                'back-btn'      => 'Назад',
                'preview'       => 'Предпросмотр',
                'remove'        => 'Удалить',
                'save-btn'      => 'Сохранить продукт',
                'title'         => 'Редактировать продукт',
                'channels'      => 'Каналы',
                'progress-info' => 'Улучшите привлекательность вашего продукта и произведите неизгладимое впечатление на клиентов, убедившись, что все детали продукта полные и точные!',

                'price' => [
                    'group' => [
                        'add-group-price'           => 'Добавить цену для группы',
                        'all-groups'                => 'Все группы',
                        'create-btn'                => 'Добавить новое',
                        'discount-group-price-info' => 'Для :qty шт. со скидкой :price',
                        'edit-btn'                  => 'Редактировать',
                        'empty-info'                => 'Специальная цена для клиентов, принадлежащих к определенной группе.',
                        'fixed-group-price-info'    => 'Для :qty шт. по фиксированной цене :price',
                        'title'                     => 'Цена для группы покупателей',

                        'create' => [
                            'all-groups'     => 'Все группы',
                            'create-title'   => 'Создать цену для группы покупателей',
                            'customer-group' => 'Группа покупателей',
                            'delete-btn'     => 'Удалить',
                            'discount'       => 'Скидка',
                            'fixed'          => 'Фиксированная',
                            'price'          => 'Цена',
                            'price-type'     => 'Тип цены',
                            'qty'            => 'Кол-во',
                            'save-btn'       => 'Сохранить',
                            'update-title'   => 'Обновить цену для группы покупателей',
                        ],
                    ],
                ],

                'inventories' => [
                    'pending-ordered-qty'      => 'Ожидаемое количество в заказе: :qty',
                    'pending-ordered-qty-info' => 'Ожидаемое количество в заказе будет вычтено из соответствующего источника инвентаризации после отправки. В случае отмены, ожидаемое количество будет доступно для продажи.',
                    'title'                    => 'Инвентаризация',
                ],

                'categories' => [
                    'title' => 'Категории',
                ],

                'images' => [
                    'info'  => 'Разрешение изображения должно быть 609px X 560px',
                    'title' => 'Изображения',
                ],

                'videos' => [
                    'error' => 'Видео не может быть больше :max килобайт. Пожалуйста, выберите файл меньшего размера.',
                    'info'  => 'Максимальный размер видео должен быть :size',
                    'title' => 'Видео',
                ],

                'links' => [
                    'related-products' => [
                        'empty-info' => 'Добавьте связанные товары на ходу.',
                        'info'       => 'Помимо продукта, который просматривает клиент, им предлагаются связанные продукты.',
                        'title'      => 'Связанные продукты',
                    ],

                    'up-sells' => [
                        'empty-info' => 'Добавьте дополнительные продукты для продажи в пути.',
                        'info'       => 'Клиенту предлагают продукты с допродажей, которые служат альтернативой продукту, который они просматривают.',
                        'title'      => 'Продукты с допродажей',
                    ],

                    'cross-sells' => [
                        'empty-info' => 'Добавьте кросс-продажи на ходу.',
                        'info'       => 'В непосредственной близости от корзины для покупок вы найдете продукты, позиционированные как продажи в комплекте, чтобы дополнить уже добавленные товары в корзину.',
                        'title'      => 'Продукты перекрестной продажи',
                    ],

                    'add-btn'           => 'Добавить продукт',
                    'delete'            => 'Удалить',
                    'empty-info'        => 'Чтобы добавить продукты :type, выполните действие.',
                    'empty-title'       => 'Добавить продукт',
                    'image-placeholder' => 'Изображение продукта',
                    'sku'               => 'Артикул (SKU) - :sku',
                ],

                'types' => [
                    'simple' => [
                        'customizable-options' => [
                            'add-btn'           => 'Добавить опцию',
                            'empty-info'        => 'Для создания настраиваемых опций на лету.',
                            'empty-title'       => 'Добавить опцию',
                            'info'              => 'Это настроит простой продукт.',
                            'title'             => 'Настраиваемый элемент',

                            'update-create' => [
                                'is-required'               => 'Обязательно',
                                'max-characters'            => 'Максимальное количество символов',
                                'name'                      => 'Название',
                                'no'                        => 'Нет',
                                'price'                     => 'Цена',
                                'save-btn'                  => 'Сохранить',
                                'supported-file-extensions' => 'Поддерживаемые расширения файлов',
                                'title'                     => 'Опция',
                                'type'                      => 'Тип',
                                'yes'                       => 'Да',
                            ],

                            'option' => [
                                'add-btn'     => 'Добавить опцию',
                                'delete'      => 'Удалить',
                                'delete-btn'  => 'Удалить',
                                'edit-btn'    => 'Редактировать',
                                'empty-info'  => 'Для создания различных комбинаций продуктов на лету.',
                                'empty-title' => 'Добавить опцию',

                                'types' => [
                                    'text' => [
                                        'title' => 'Текст',
                                    ],

                                    'textarea' => [
                                        'title' => 'Текстовое поле',
                                    ],

                                    'checkbox' => [
                                        'title' => 'Флажок',
                                    ],

                                    'radio' => [
                                        'title' => 'Радио',
                                    ],

                                    'select' => [
                                        'title' => 'Выбрать',
                                    ],

                                    'multiselect' => [
                                        'title' => 'Множественный выбор',
                                    ],

                                    'date' => [
                                        'title' => 'Дата',
                                    ],

                                    'datetime' => [
                                        'title' => 'Дата и время',
                                    ],

                                    'time' => [
                                        'title' => 'Время',
                                    ],

                                    'file' => [
                                        'title' => 'Файл',
                                    ],
                                ],

                                'items' => [
                                    'update-create' => [
                                        'label'    => 'Метка',
                                        'price'    => 'Цена',
                                        'save-btn' => 'Сохранить',
                                        'title'    => 'Опция',
                                    ],
                                ],
                            ],

                            'validations' => [
                                'associated-product' => 'Продукт уже связан с настраиваемым, групповым или пакетным продуктом.',
                            ],
                        ],
                    ],

                    'configurable' => [
                        'add-btn'           => 'Добавить вариант',
                        'delete-btn'        => 'Удалить',
                        'edit-btn'          => 'Редактировать',
                        'empty-info'        => 'Создание различных комбинаций продуктов.',
                        'empty-title'       => 'Добавить вариант',
                        'image-placeholder' => 'Изображение продукта',
                        'info'              => 'Продукты с вариациями зависят от всех возможных комбинаций атрибутов.',
                        'qty'               => ':qty шт.',
                        'sku'               => 'Артикул (SKU) - :sku',
                        'title'             => 'Варианты',

                        'create'  => [
                            'description'            => 'Описание',
                            'name'                   => 'Название',
                            'save-btn'               => 'Добавить',
                            'title'                  => 'Добавить вариант',
                            'variant-already-exists' => 'Этот вариант уже существует',
                        ],

                        'edit' => [
                            'disabled'         => 'Отключено',
                            'edit-info'        => 'Если вы хотите подробно обновить информацию о продукте, перейдите на',
                            'edit-link-title'  => 'Страницу информации о продукте',
                            'enabled'          => 'Включено',
                            'images'           => 'Изображения',
                            'name'             => 'Название',
                            'price'            => 'Цена',
                            'quantities'       => 'Количество',
                            'save-btn'         => 'Сохранить',
                            'sku'              => 'Артикул (SKU)',
                            'status'           => 'Статус',
                            'title'            => 'Продукт',
                            'weight'           => 'Вес',
                        ],

                        'mass-edit' => [
                            'add-images'          => 'Добавить изображения',
                            'apply-to-all-btn'    => 'Применить ко всем',
                            'apply-to-all-sku'    => 'Применить цену ко всем SKU.',
                            'edit-inventories'    => 'Редактировать запасы',
                            'edit-prices'         => 'Редактировать цены',
                            'price'               => 'Цена',
                            'remove-images'       => 'Удалить изображения',
                            'remove-variants'     => 'Удалить варианты',
                            'select-action'       => 'Выберите действие',
                            'select-variants'     => 'Выберите варианты',
                            'edit-name'           => 'Редактировать имя',
                            'name'                => 'Имя',
                            'edit-sku'            => 'Редактировать SKU',
                            'sku'                 => 'SKU',
                            'edit-weight'         => 'Редактировать вес',
                            'weight'              => 'Вес',
                            'edit-status'         => 'Редактировать статус',
                            'status'              => 'Статус',
                            'apply-to-all-name'   => 'Применить имя ко всем вариантам.',
                            'apply-to-all-weight' => 'Применить вес ко всем вариантам.',
                            'apply-to-all-status' => 'Применить статус ко всем вариантам.',
                        ],
                    ],

                    'grouped' => [
                        'add-btn'           => 'Добавить продукт',
                        'default-qty'       => 'Количество по умолчанию',
                        'delete'            => 'Удалить',
                        'empty-info'        => 'Создание различных комбинаций продуктов.',
                        'empty-title'       => 'Добавить продукт',
                        'image-placeholder' => 'Изображение продукта',
                        'info'              => 'Групповой продукт состоит из автономных товаров, представленных в виде набора, позволяя варьировать или координировать их по сезонам или темам. Каждый продукт можно купить как индивидуально, так и в составе группы.',
                        'sku'               => 'Артикул (SKU) - :sku',
                        'title'             => 'Групповые продукты',
                    ],

                    'bundle' => [
                        'add-btn'           => 'Добавить опцию',
                        'empty-info'        => 'Создание опций для комплекта.',
                        'empty-title'       => 'Добавить опцию',
                        'image-placeholder' => 'Изображение продукта',
                        'info'              => 'Комплектный продукт - это набор нескольких товаров или услуг, продаваемых вместе по специальной цене, обеспечивая ценность и удобство для клиентов.',
                        'title'             => 'Опции комплекта',

                        'update-create' => [
                            'checkbox'    => 'Флажок',
                            'is-required' => 'Обязательно',
                            'multiselect' => 'Множественный выбор',
                            'name'        => 'Заголовок',
                            'no'          => 'Нет',
                            'radio'       => 'Переключатель',
                            'save-btn'    => 'Сохранить',
                            'select'      => 'Выбор',
                            'title'       => 'Опция',
                            'type'        => 'Тип',
                            'yes'         => 'Да',
                        ],

                        'option' => [
                            'add-btn'     => 'Добавить продукт',
                            'default-qty' => 'Количество по умолчанию',
                            'delete'      => 'Удалить',
                            'delete-btn'  => 'Удалить',
                            'edit-btn'    => 'Редактировать',
                            'empty-info'  => 'Создание различных комбинаций продуктов.',
                            'empty-title' => 'Добавить продукт',
                            'sku'         => 'Артикул (SKU) - :sku',

                            'types' => [
                                'checkbox' => [
                                    'info'  => 'Задайте продукт по умолчанию с помощью флажка',
                                    'title' => 'Флажок',
                                ],

                                'multiselect' => [
                                    'info'  => 'Задайте продукт по умолчанию с помощью кнопки "множественный выбор"',
                                    'title' => 'Множественный выбор',
                                ],

                                'radio' => [
                                    'info'  => 'Задайте продукт по умолчанию с помощью переключателя',
                                    'title' => 'Переключатель',
                                ],

                                'select' => [
                                    'info'  => 'Задайте продукт по умолчанию с помощью кнопки "выбор"',
                                    'title' => 'Выбор',
                                ],
                            ],
                        ],
                    ],

                    'booking' => [
                        'available-from' => 'Доступно с',
                        'available-to'   => 'Доступно до',
                        'location'       => 'Местоположение',
                        'qty'            => 'Количество',
                        'title'          => 'Тип бронирования',

                        'available-every-week' => [
                            'no'    => 'Нет',
                            'title' => 'Доступно каждую неделю',
                            'yes'   => 'Да',
                        ],

                        'appointment' => [
                            'break-duration' => 'Перерыв между слотами (мин)',
                            'slot-duration'  => 'Продолжительность слота (мин)',

                            'same-slot-for-all-days' => [
                                'no'    => 'Нет',
                                'title' => 'Один и тот же слот для всех дней',
                                'yes'   => 'Да',
                            ],
                        ],

                        'default' => [
                            'add'              => 'Добавить',
                            'break-duration'   => 'Перерыв между слотами (мин)',
                            'close'            => 'Закрыть',
                            'description'      => 'Информация о бронировании',
                            'description-info' => 'Длительность будет создана и отображена в соответствии со слотами. Она будет уникальной для всех слотов и отображаться на витрине магазина',
                            'edit'             => 'Редактировать',
                            'many'             => 'Много бронирований на один день',
                            'one'              => 'Одно бронирование на много дней',
                            'open'             => 'Открыть',
                            'slot-add'         => 'Добавить слоты',
                            'slot-duration'    => 'Продолжительность слота (мин)',
                            'slot-title'       => 'Продолжительность времени слотов',
                            'title'            => 'По умолчанию',
                            'unavailable'      => 'Недоступно',

                            'modal'            => [
                                'slot' => [
                                    'add-title'  => 'Добавить слоты',
                                    'close'      => 'Закрыть',
                                    'day'        => 'День',
                                    'edit-title' => 'Редактировать слоты',
                                    'friday'     => 'Пятница',
                                    'from'       => 'С',
                                    'from-day'   => 'С дня',
                                    'from-time'  => 'С времени',
                                    'monday'     => 'Понедельник',
                                    'open'       => 'Открыть',
                                    'saturday'   => 'Суббота',
                                    'save'       => 'Сохранить',
                                    'select'     => 'Выбрать',
                                    'status'     => 'Статус',
                                    'sunday'     => 'Воскресенье',
                                    'thursday'   => 'Четверг',
                                    'to'         => 'До',
                                    'to-day'     => 'До дня',
                                    'to-time'    => 'До времени',
                                    'tuesday'    => 'Вторник',
                                    'wednesday'  => 'Среда',
                                    'week'       => ':day',
                                ],
                            ],
                        ],

                        'event' => [
                            'add'                => 'Добавить билеты',
                            'delete'             => 'Удалить',
                            'description'        => 'Описание',
                            'description-info'   => 'Билеты недоступны.',
                            'edit'               => 'Редактировать',
                            'name'               => 'Имя',
                            'price'              => 'Цена',
                            'qty'                => 'Количество',
                            'special-price'      => 'Специальная цена',
                            'special-price-from' => 'Специальная цена с',
                            'special-price-to'   => 'Специальная цена до',
                            'title'              => 'Билеты',
                            'valid-from'         => 'Действительно с',
                            'valid-until'        => 'Действительно до',

                            'modal'              => [
                                'edit' => 'Редактировать билеты',
                                'save' => 'Сохранить',
                            ],
                        ],

                        'empty-info' => [
                            'tickets' => [
                                'add' => 'Добавить билеты',
                            ],

                            'slots'   => [
                                'add'         => 'Добавить слоты',
                                'description' => 'Доступные слоты с продолжительностью времени.',
                            ],
                        ],

                        'rental' => [
                            'daily'                  => 'Ежедневно',
                            'daily-hourly'           => 'Ежедневно и почасово',
                            'daily-price'            => 'Ежедневная цена',
                            'hourly'                 => 'Почасово',
                            'hourly-price'           => 'Почасовая цена',
                            'title'                  => 'Тип аренды',

                            'same-slot-for-all-days' => [
                                'no'    => 'Нет',
                                'title' => 'Один и тот же слот для всех дней',
                                'yes'   => 'Да',
                            ],
                        ],

                        'slots' => [
                            'add'              => 'Добавить слоты',
                            'description-info' => 'Длительность будет создана и отображена в соответствии со слотами. Она будет уникальной для всех слотов и отображаться на витрине магазина',
                            'save'             => 'Сохранить',
                            'title'            => 'Продолжительность времени слотов',
                            'unavailable'      => 'Недоступно',

                            'action'           => [
                                'add' => 'Добавить',
                            ],

                            'modal'            => [
                                'slot' => [
                                    'friday'     => 'Пятница',
                                    'from'       => 'С',
                                    'monday'     => 'Понедельник',
                                    'saturday'   => 'Суббота',
                                    'sunday'     => 'Воскресенье',
                                    'thursday'   => 'Четверг',
                                    'to'         => 'До',
                                    'tuesday'    => 'Вторник',
                                    'wednesday'  => 'Среда',
                                ],
                            ],
                        ],

                        'table' => [
                            'break-duration'            => 'Перерыв между слотами (мин)',
                            'guest-capacity'            => 'Вместимость гостей',
                            'guest-limit'               => 'Лимит гостей за столом',
                            'prevent-scheduling-before' => 'Запретить планирование до',
                            'slot-duration'             => 'Продолжительность слота (мин)',

                            'charged-per' => [
                                'guest'  => 'Гость',
                                'table'  => 'Стол',
                                'title'  => 'Оплата за',
                            ],

                            'same-slot-for-all-days' => [
                                'no'    => 'Нет',
                                'title' => 'Один и тот же слот для всех дней',
                                'yes'   => 'Да',
                            ],
                        ],

                        'type' => [
                            'appointment' => 'Бронирование встречи',
                            'default'     => 'Бронирование по умолчанию',
                            'event'       => 'Бронирование мероприятия',
                            'many'        => 'Много',
                            'one'         => 'Один',
                            'rental'      => 'Аренда',
                            'table'       => 'Бронирование стола',
                            'title'       => 'Тип',
                        ],
                    ],

                    'downloadable' => [
                        'links' => [
                            'add-btn'     => 'Добавить ссылку',
                            'delete-btn'  => 'Удалить',
                            'edit-btn'    => 'Редактировать',
                            'empty-info'  => 'Создание ссылки.',
                            'empty-title' => 'Добавить ссылку',
                            'file'        => 'Файл : ',
                            'info'        => 'Продукт для загрузки позволяет продавать цифровые продукты, такие как электронные книги, программные приложения, музыку, игры и другие.',
                            'sample-file' => 'Пример файла : ',
                            'sample-url'  => 'Пример URL : ',
                            'title'       => 'Ссылки для загрузки',
                            'url'         => 'URL : ',

                            'update-create' => [
                                'downloads'   => 'Загрузка разрешена',
                                'file'        => 'Файл',
                                'file-type'   => 'Тип файла',
                                'name'        => 'Заголовок',
                                'price'       => 'Цена',
                                'sample'      => 'Пример',
                                'sample-type' => 'Тип примера',
                                'save-btn'    => 'Сохранить',
                                'title'       => 'Ссылка',
                                'url'         => 'URL',
                            ],
                        ],

                        'samples' => [
                            'add-btn'     => 'Добавить пример',
                            'delete-btn'  => 'Удалить',
                            'edit-btn'    => 'Редактировать',
                            'empty-info'  => 'Создание образца.',
                            'empty-title' => 'Добавить пример',
                            'file'        => 'Файл : ',
                            'info'        => 'Продукт для загрузки позволяет продавать цифровые продукты, такие как электронные книги, программные приложения, музыку, игры и другие.',
                            'title'       => 'Образцы для загрузки',
                            'url'         => 'URL : ',

                            'update-create' => [
                                'file'      => 'Файл',
                                'file-type' => 'Тип файла',
                                'name'      => 'Заголовок',
                                'save-btn'  => 'Сохранить',
                                'title'     => 'Ссылка',
                                'url'       => 'URL',
                            ],
                        ],
                    ],
                ],
            ],

            'create-success'           => 'Продукт успешно создан',
            'delete-failed'            => 'Не удалось удалить продукт',
            'delete-success'           => 'Продукт успешно удален',
            'product-type-not-allowed' => 'У вас нет разрешения продавать продукты типа :type',
            'saved-inventory-message'  => 'Продукт успешно сохранен',
            'update-success'           => 'Продукт успешно обновлен',

            'assign' => [
                'already-selling'     => 'Вы уже продаёте этот товар',
                'back-btn'            => 'Назад',
                'condition'           => 'Состояние',
                'create-success'      => 'Товар успешно назначен продавцу',
                'description'         => 'Описание',
                'image-size'          => 'Разрешение изображения должно быть 609px X 560px',
                'images'              => 'Изображения',
                'new'                 => 'Новый',
                'not-allowed'         => 'Вам не разрешено назначать этот продукт',
                'old'                 => 'Старый',
                'price'               => 'Цена',
                'product-not-allowed' => 'Вам не разрешено продавать товар типа :type',
                'quantities'          => 'Количество',
                'save-btn'            => 'Сохранить',
                'title'               => 'Назначить Товар',
                'update-success'      => 'Назначенный товар успешно обновлен',

                'product-details' => [
                    'active'            => 'Активный',
                    'approved'          => 'Одобрено',
                    'disable'           => 'Отключить',
                    'disapproved'       => 'Не одобрено',
                    'image-placeholder' => 'Изображение товара',
                    'title'             => 'Детали Товара',
                ],
            ],
        ],

        'product-reviews' => [
            'index' => [
                'title' => 'Отзывы о продуктах',

                'datagrid' => [
                    'approved'      => 'Одобрено',
                    'customer'      => 'Клиент',
                    'date'          => 'Дата',
                    'description'   => 'Описание',
                    'email'         => 'Электронная почта',
                    'pending'       => 'В ожидании',
                    'product'       => 'Продукт',
                    'rating'        => 'Рейтинг',
                    'status'        => 'Статус',
                    'title'         => 'Заголовок',
                    'unapproved'    => 'Не одобрено',
                    'update-status' => 'Статус обновления',
                ],
            ],

            'update-success' => 'Отзывы о продукте успешно обновлены',
            'delete-success' => 'Отзывы о продуктах успешно удалены.',
        ],

        'customers' => [
            'index' => [
                'title' => 'Клиенты',

                'datagrid' => [
                    'active'      => 'Активный',
                    'customer'    => 'Клиент',
                    'email'       => 'Электронная почта',
                    'gender'      => 'Пол',
                    'group'       => 'Группа',
                    'inactive'    => 'Неактивный',
                    'order-count' => 'Количество заказов',
                    'revenue'     => 'Доход',
                    'status'      => 'Статус',
                ],
            ],
        ],

        'profile' => [
            'index' => [
                'title'    => 'Управление профилем',
                'edit-btn' => 'Редактировать профиль',

                'general' => [
                    'email'      => 'Электронная почта',
                    'name'       => 'Имя',
                    'phone'      => 'Номер телефона',
                    'shop-slug'  => 'Слаг магазина',
                    'shop-title' => 'Название магазина',
                    'title'      => 'Общая информация',
                ],

                'about-store' => [
                    'title' => 'О магазине',
                ],

                'meta' => [
                    'meta-description' => 'Мета-описание',
                    'meta-keywords'    => 'Мета-ключевые слова',
                    'meta-title'       => 'Мета-заголовок',
                    'title'            => 'Мета-описание',
                ],

                'policy' => [
                    'privacy'  => 'Политика конфиденциальности',
                    'return'   => 'Политика возврата',
                    'shipping' => 'Политика доставки',
                    'title'    => 'Политики',
                ],

                'address' => [
                    'city'     => 'Город',
                    'country'  => 'Страна',
                    'postcode' => 'Почтовый индекс',
                    'state'    => 'Область',
                    'title'    => 'Адрес магазина',
                    'address'  => 'Адрес',
                ],

                'social' => [
                    'link'  => 'Ссылка :name',
                    'title' => 'Социальные ссылки',
                ],

                'minimum-order-amount' => [
                    'title'  => 'Минимальная сумма заказа',
                ],

                'google-analytics' => [
                    'id'    => 'Идентификатор Analytics',
                    'title' => 'Google Analytics',
                ],

                'shop-information' => [
                    'admin-commission'       => 'Комиссия администратора',
                    'admin-commission-value' => 'Комиссия администратора :rate% от общей суммы по счету',
                    'allowed-categories'     => 'Разрешенные категории',
                    'no-categories'          => 'Категории недоступны',
                    'allowed-product-types'  => 'Разрешенные типы продуктов',
                    'no-product-types'       => 'Типы продуктов недоступны',
                    'payment-methods'        => 'Способы оплаты',
                    'no-payment-methods'     => 'Способы оплаты недоступны',
                    'shipping-methods'       => 'Способы доставки',
                    'no-shipping-methods'    => 'Способы доставки недоступны',
                    'title'                  => 'Информация о магазине',
                ],
            ],

            'edit' => [
                'banner'              => 'Баннер',
                'banner-description'  => 'Загрузите баннер в соотношении 13:3, высота 375, безопасная зона 375x250, центр на мобильных устройствах',
                'delete-banner'       => 'Удалить баннер',
                'delete-logo'         => 'Удалить логотип',
                'logo'                => 'Логотип',
                'logo-description'    => 'Загрузите логотип в соотношении 1:1',
                'save-btn'            => 'Сохранить профиль',
                'title'               => 'Управление профилем',
                'upload-new-banner'   => 'Загрузить новый баннер',
                'upload-new-logo'     => 'Загрузить новый логотип',

                'general' => [
                    'email'      => 'Электронная почта',
                    'name'       => 'Имя',
                    'phone'      => 'Номер телефона',
                    'shop-slug'  => 'Слаг магазина',
                    'shop-title' => 'Название магазина',
                    'title'      => 'Общая информация',
                ],

                'about-store' => [
                    'title' => 'О магазине',
                ],

                'meta' => [
                    'meta-description' => 'Мета-описание',
                    'meta-keywords'    => 'Мета-ключевые слова',
                    'meta-title'       => 'Мета-заголовок',
                    'title'            => 'Мета-описание',
                ],

                'policy' => [
                    'privacy'  => 'Политика конфиденциальности',
                    'return'   => 'Политика возврата',
                    'shipping' => 'Политика доставки',
                    'title'    => 'Политики',
                ],

                'address' => [
                    'city'           => 'Город',
                    'country'        => 'Страна',
                    'postcode'       => 'Почтовый индекс',
                    'state'          => 'Область',
                    'title'          => 'Адрес магазина',
                    'select-country' => 'Выберите страну',
                    'select-state'   => 'Выберите область',
                    'street-address' => 'Уличный адрес',
                    'address'        => 'Адрес',
                ],

                'social' => [
                    'link'  => 'Ссылка :name',
                    'title' => 'Социальные ссылки',
                ],

                'minimum-order-amount' => [
                    'title'  => 'Минимальная сумма заказа',
                ],

                'google-analytics' => [
                    'id'    => 'Идентификатор Google Analytics',
                    'title' => 'Google Analytics',
                ],
            ],

            'update-success' => 'Ваш профиль успешно обновлен',
        ],

        'seller-reviews' => [
            'index' => [
                'title' => 'Отзывы о продавце',

                'datagrid' => [
                    'approved'    => 'Одобрено',
                    'customer'    => 'Клиент',
                    'date'        => 'Дата',
                    'description' => 'Описание',
                    'disapproved' => 'Отклонено',
                    'email'       => 'Электронная почта',
                    'pending'     => 'В ожидании',
                    'rating'      => 'Рейтинг',
                    'status'      => 'Статус',
                    'title'       => 'Заголовок',
                ],
            ],
        ],

        'settings' => [
            'general' => [
                'index' => [
                    'save-btn'           => 'Сохранить',
                    'title'              => 'Общие',
                    'unmatched-password' => 'Текущий пароль не совпадает',
                    'update-success'     => 'Общие настройки успешно обновлены',

                    'regional-setting' => [
                        'currency'      => 'Валюта',
                        'locale'        => 'Локаль',
                        'select-locale' => 'Выберите локаль',
                        'title'         => 'Региональные настройки',
                    ],

                    'password-setting' => [
                        'confirm-password' => 'Подтвердить пароль',
                        'current-password' => 'Текущий пароль',
                        'new-password'     => 'Новый пароль',
                        'title'            => 'Настройки пароля',
                    ],
                ],
            ],

            'roles' => [
                'index' => [
                    'create-btn' => 'Создать Роль',
                    'title'      => 'Роли',

                    'datagrid' => [
                        'all'             => 'Все',
                        'custom'          => 'Настраиваемый',
                        'delete'          => 'Удалить',
                        'edit'            => 'Редактировать',
                        'id'              => 'ID',
                        'name'            => 'Имя',
                        'permission-type' => 'Тип Разрешений',
                    ],
                ],

                'create' => [
                    'access-control' => 'Контроль Доступа',
                    'all'            => 'Все',
                    'back-btn'       => 'Назад',
                    'custom'         => 'Настраиваемый',
                    'description'    => 'Описание',
                    'general'        => 'Общие',
                    'name'           => 'Имя',
                    'permissions'    => 'Разрешения',
                    'save-btn'       => 'Сохранить Роль',
                    'title'          => 'Создать Роль',
                ],

                'edit' => [
                    'access-control' => 'Контроль Доступа',
                    'all'            => 'Все',
                    'back-btn'       => 'Назад',
                    'custom'         => 'Настраиваемый',
                    'description'    => 'Описание',
                    'general'        => 'Общие',
                    'name'           => 'Имя',
                    'permissions'    => 'Разрешения',
                    'save-btn'       => 'Сохранить Роль',
                    'title'          => 'Редактировать Роль',
                ],

                'being-used'        => 'Роль используется некоторыми продавцами',
                'create-success'    => 'Роль успешно создана',
                'delete-failed'     => 'Не удалось удалить роль',
                'delete-success'    => 'Роль успешно удалена',
                'last-delete-error' => 'Требуется хотя бы одна роль',
                'update-success'    => 'Роль успешно обновлена',
            ],

            'users' => [
                'index' => [
                    'create-btn'       => 'Создать пользователя',
                    'create-title'     => 'Создать пользователя',
                    'edit-title'       => 'Редактировать пользователя',
                    'email'            => 'Электронная почта',
                    'name'             => 'Имя',
                    'phone-number'     => 'Номер телефона',
                    'role'             => 'Роль',
                    'save-btn'         => 'Сохранить пользователя',
                    'select-role'      => 'Выберите роль',
                    'password'         => 'Пароль',
                    'confirm-password' => 'Подтвердите пароль',
                    'status'           => 'Статус',
                    'title'            => 'Пользователи',
                    'create-success'   => 'Пользователь успешно создан',
                    'update-success'   => 'Пользователь успешно обновлен',
                    'delete-success'   => 'Пользователь успешно удален',
                    'delete-failed'    => 'Не удалось удалить пользователя',

                    'datagrid' => [
                        'delete'     => 'Удалить',
                        'edit'       => 'Редактировать',
                        'email'      => 'Электронная почта',
                        'id'         => 'ID',
                        'id-value'   => 'ID - :id',
                        'name'       => 'Имя',
                        'permission' => 'Разрешение',
                        'phone'      => 'Телефон',

                        'status' => [
                            'title' => 'Статус',

                            'options' => [
                                'active'    => 'Активен',
                                'suspended' => 'Приостановлен',
                            ],
                        ],
                    ],
                ],
            ],

            'inventory-sources' => [
                'index' => [
                    'create-btn' => 'Создать источник инвентаризации',
                    'title'      => 'Источники инвентаря',

                    'datagrid' => [
                        'active'   => 'Активен',
                        'code'     => 'Код',
                        'delete'   => 'Удалить',
                        'edit'     => 'Редактировать',
                        'id'       => 'ID',
                        'inactive' => 'Неактивен',
                        'name'     => 'Название',
                        'priority' => 'Приоритет',
                        'status'   => 'Статус',
                    ],
                ],

                'create' => [
                    'add-title'      => 'Добавить источник инвентаря',
                    'address'        => 'Адрес источника',
                    'back-btn'       => 'Назад',
                    'city'           => 'Город',
                    'code'           => 'Код',
                    'contact-email'  => 'Email',
                    'contact-fax'    => 'Факс',
                    'contact-info'   => 'Контактная информация',
                    'contact-name'   => 'Имя',
                    'contact-number' => 'Номер телефона',
                    'country'        => 'Страна',
                    'description'    => 'Описание',
                    'general'        => 'Общие',
                    'latitude'       => 'Широта',
                    'longitude'      => 'Долгота',
                    'name'           => 'Название',
                    'postcode'       => 'Почтовый индекс',
                    'priority'       => 'Приоритет',
                    'save-btn'       => 'Сохранить источник инвентаря',
                    'select-country' => 'Выберите страну',
                    'select-state'   => 'Выберите область',
                    'settings'       => 'Настройки',
                    'state'          => 'Область',
                    'status'         => 'Статус',
                    'street'         => 'Улица',
                    'title'          => 'Источники инвентаря',
                ],

                'edit' => [
                    'back-btn'       => 'Назад',
                    'city'           => 'Город',
                    'code'           => 'Код',
                    'contact-email'  => 'Email',
                    'contact-fax'    => 'Факс',
                    'contact-info'   => 'Контактная информация',
                    'contact-name'   => 'Имя',
                    'contact-number' => 'Номер телефона',
                    'country'        => 'Страна',
                    'description'    => 'Описание',
                    'general'        => 'Общие',
                    'latitude'       => 'Широта',
                    'longitude'      => 'Долгота',
                    'name'           => 'Название',
                    'postcode'       => 'Почтовый индекс',
                    'priority'       => 'Приоритет',
                    'save-btn'       => 'Сохранить источник инвентаря',
                    'select-country' => 'Выберите страну',
                    'select-state'   => 'Выберите область',
                    'settings'       => 'Настройки',
                    'source-address' => 'Адрес источника',
                    'state'          => 'Область',
                    'status'         => 'Статус',
                    'street'         => 'Улица',
                    'title'          => 'Редактировать источники инвентаря',
                ],

                'create-success'    => 'Источник инвентаря успешно создан',
                'delete-failed'     => 'Ошибка при удалении источников инвентаря',
                'delete-success'    => 'Источники инвентаря успешно удалены',
                'last-delete-error' => 'По крайней мере, один источник инвентаря обязателен.',
                'update-success'    => 'Источники инвентаря успешно обновлены',
            ],
        ],

        'communication' => [
            'index' => [
                'admin'               => 'Администратор',
                'blocked-message'     => 'Вы заблокированы администратором',
                'message-failed'      => 'Не удалось отправить сообщение',
                'message-placeholder' => 'Введите ваше сообщение здесь...',
                'message-sent'        => 'Сообщение успешно отправлено',
                'no-message'          => 'Сообщений не найдено',
                'search-message'      => 'Поиск сообщения...',
                'title'               => 'Связь',

                'filters' => [
                    'all-messages'      => 'Все сообщения',
                    'prev-fifteen-days' => 'Последние 15 дней',
                    'prev-seven-days'   => 'Последние 7 дней',
                    'prev-six-months'   => 'Последние 6 месяцев',
                    'prev-thirty-days'  => 'Последние 30 дней',
                ],
            ],
        ],

        'reporting' => [
            'sales' => [
                'index' => [
                    'abandoned-carts'               => 'Заброшенные корзины',
                    'abandoned-products'            => 'Заброшенные продукты',
                    'abandoned-rate'                => 'Коэффициент заброшенности',
                    'abandoned-revenue'             => 'Заброшенная выручка',
                    'added-to-cart'                 => 'Добавлено в корзину',
                    'added-to-cart-info'            => 'Только :progress посетителей добавили продукты в корзину',
                    'all-channels'                  => 'Все каналы',
                    'average-order-value-over-time' => 'Средний объем заказа со временем',
                    'average-sales'                 => 'Средний объем продаж',
                    'commission'                    => 'Комиссия',
                    'commission-over-time'          => 'Комиссия с течением времени',
                    'count'                         => 'Количество',
                    'end-date'                      => 'Дата окончания',
                    'id'                            => 'Идентификатор',
                    'interval'                      => 'Интервал',
                    'name'                          => 'Название',
                    'orders'                        => 'Заказы',
                    'orders-over-time'              => 'Заказы со временем',
                    'payment-method'                => 'Способ оплаты',
                    'product-views'                 => 'Просмотры продуктов',
                    'product-views-info'            => 'Только :progress посетителей просматривали продукты',
                    'purchase-funnel'               => 'Воронка покупки',
                    'purchased'                     => 'Куплено',
                    'purchased-info'                => 'Только :progress посетителей совершили покупку',
                    'refunds'                       => 'Возвраты',
                    'refunds-over-time'             => 'Возвраты со временем',
                    'sales-over-time'               => 'Продажи со временем',
                    'start-date'                    => 'Дата начала',
                    'tax-collected'                 => 'Собрано налогов',
                    'tax-collected-over-time'       => 'Сбор налогов со временем',
                    'title'                         => 'Продажи',
                    'top-payment-methods'           => 'Лучшие методы оплаты',
                    'top-tax-categories'            => 'Лучшие категории налогов',
                    'total'                         => 'Итого',
                    'total-commission-paid'         => 'Общая выплаченная комиссия',
                    'total-orders'                  => 'Всего заказов',
                    'total-sales'                   => 'Всего продаж',
                    'total-visits'                  => 'Всего посещений',
                    'total-visits-info'             => 'Всего посетителей в магазине',
                    'view-details'                  => 'Посмотреть детали',
                ],
            ],

            'customers' => [
                'index' => [
                    'all-channels'                => 'Все каналы',
                    'count'                       => 'Количество',
                    'customers'                   => 'Клиенты',
                    'customers-over-time'         => 'Клиенты со временем',
                    'customers-traffic'           => 'Трафик клиентов',
                    'customers-with-most-orders'  => 'Клиенты с наибольшим количеством заказов',
                    'customers-with-most-reviews' => 'Клиенты с наибольшим количеством отзывов',
                    'customers-with-most-sales'   => 'Клиенты с наибольшим количеством продаж',
                    'email'                       => 'Электронная почта',
                    'end-date'                    => 'Дата окончания',
                    'id'                          => 'Идентификатор',
                    'interval'                    => 'Интервал',
                    'name'                        => 'Название',
                    'orders'                      => 'Заказы',
                    'reviews'                     => 'Отзывы',
                    'start-date'                  => 'Дата начала',
                    'title'                       => 'Клиенты',
                    'top-customer-groups'         => 'Лучшие группы клиентов',
                    'total'                       => 'Итого',
                    'total-customers'             => 'Всего клиентов',
                    'total-visitors'              => 'Всего посетителей',
                    'traffic-over-week'           => 'Трафик на протяжении недели',
                    'unique-visitors'             => 'Уникальные посетители',
                    'view-details'                => 'Посмотреть детали',
                ],
            ],

            'products' => [
                'index' => [
                    'all-channels'                     => 'Все каналы',
                    'channel'                          => 'Канал',
                    'end-date'                         => 'Дата окончания',
                    'id'                               => 'Идентификатор',
                    'interval'                         => 'Интервал',
                    'locale'                           => 'Язык',
                    'name'                             => 'Название',
                    'orders'                           => 'Заказы',
                    'price'                            => 'Цена',
                    'products-added-over-time'         => 'Продукты, добавленные со временем',
                    'products-with-most-reviews'       => 'Продукты с наибольшим количеством отзывов',
                    'products-with-most-visits'        => 'Продукты с наибольшим количеством посещений',
                    'quantities'                       => 'Количество',
                    'quantities-sold-over-time'        => 'Проданные количества со временем',
                    'revenue'                          => 'Доход',
                    'reviews'                          => 'Отзывы',
                    'start-date'                       => 'Дата начала',
                    'title'                            => 'Продукты',
                    'top-selling-products-by-quantity' => 'Самые продаваемые продукты по количеству',
                    'top-selling-products-by-revenue'  => 'Самые продаваемые продукты по доходу',
                    'total'                            => 'Итого',
                    'total-products-added-to-wishlist' => 'Продукты, добавленные в список желаний',
                    'total-sold-quantities'            => 'Всего проданных количеств',
                    'view-details'                     => 'Посмотреть детали',
                    'visits'                           => 'Посетители',
                ],
            ],

            'view' => [
                'all-channels'  => 'All Channels',
                'day'           => 'День',
                'end-date'      => 'Дата окончания',
                'export-csv'    => 'Экспорт в CSV',
                'export-xls'    => 'Экспорт в XLS',
                'month'         => 'Месяц',
                'not-available' => 'Нет доступных записей.',
                'start-date'    => 'Дата начала',
                'year'          => 'Год',
            ],

            'empty' => [
                'info'  => 'Нет данных для выбранного интервала',
                'title' => 'Данные недоступны',
            ],
        ],

        'extensions' => [
            'index' => [
                'disabled'  => 'Отключено',
                'enabled'   => 'Включено',
                'info'      => 'Создавайте, управляйте и масштабируйте свой интернет-магазин с помощью настраиваемых расширений Bagisto.',
                'no-result' => 'Здесь нет доступных расширений.',
                'title'     => 'Расширения',

                'filters' => [
                    'all-extensions' => 'Все расширения',
                    'bulk_upload'    => 'Массовая загрузка',
                    'gdpr'           => 'GDPR',
                    'marketplace'    => 'Маркетплейс',
                    'payment'        => 'Оплата',
                    'pos'            => 'POS',
                    'shipping'       => 'Доставка',
                ],
            ],
        ],
    ],

    'shop' => [
        'layout' => [
            'header' => [
                'seller-logo'     => 'Логотип продавца',
                'switch-to-store' => 'Переключиться на управление магазином',
            ],
        ],

        'checkout' => [
            'cart' => [
                'minimum-order-message' => 'Минимальная сумма заказа для :shop_title составляет',
                'product-not-available' => 'Продукт недоступен',
                'sold-by'               => 'Продано',
            ],
        ],

        'marketplace' => [
            'index' => [
                'days-payment'        => 'Дни* оплаты',
                'deals-in'            => 'Сделки в',
                'featured-seller'     => 'Наши рекомендованные продавцы',
                'online-business'     => 'Онлайн-бизнес',
                'reviews'             => ':count Отзывы',
                'seller-community'    => 'Сообщество продавцов',
                'serviceable-pincode' => 'Обслуживаемый почтовый индекс',
                'start-selling'       => 'Начните продавать с большими клиентами по всему миру, круглосуточно.',
                'step'                => 'Шаг :count',
                'visit-shop'          => 'Посетите магазин',
            ],
        ],

        'products' => [
            'add-to-cart'   => 'Добавить в корзину',
            'delivery-info' => 'Информация о доставке находится здесь',
            'hide'          => 'Скрыть',
            'more-info'     => 'Дополнительная информация',
            'seller-count'  => ':count еще продавец, продающий тот же продукт',
            'seller-info'   => 'Информация о продавце',
            'sold-by'       => 'Продается продавцом',
            'top-selling'   => 'Лидирующий по продажам',

            'flag' => [
                'alert'              => 'Оповещение',
                'already-reported'   => 'Вы уже сообщили об этом продукте',
                'create-success'     => 'Продукт успешно сообщён',
                'guest-alert'        => 'Вам нужно войти, чтобы сообщить об этом продукте',
                'not-allowed'        => 'Вы не можете сообщить об этом продукте без оформления заказа',
                'other-reason'       => 'Другая причина',
                'reason'             => 'Причина',
                'reason-placeholder' => 'Пожалуйста, укажите причину',
                'report-product'     => 'Сообщить о продукте',
                'select-reason'      => 'Выберите причину',
                'submit-btn'         => 'Отправить',
            ],
        ],

        'sellers' => [
            'profile' => [
                'not-approved'    => 'Продавец еще не одобрен',
                'products-count'  => 'Товары (:count)',
                'reviews-count'   => 'Отзывы (:count)',
                'search-text'     => 'Поиск товаров',

                'about' => [
                    'title'           => 'О нас',
                    'about-us'        => 'О нас',
                    'shipping-policy' => 'Политика доставки',
                    'privacy-policy'  => 'Политика конфиденциальности',
                    'return-policy'   => 'Политика возврата',
                ],

                'contact-form' => [
                    'title'          => 'Контакты',
                    'name'           => 'Имя',
                    'email'          => 'Электронная почта',
                    'subject'        => 'Тема',
                    'query'          => 'Запрос',
                    'submit-btn'     => 'Отправить',
                    'create-success' => 'Ваш запрос успешно отправлен',
                ],

                'share' => [
                    'title'     => 'Поделиться',
                    'share-on'  => 'Поделиться в',
                    'facebook'  => 'Facebook',
                    'linkedin'  => 'LinkedIn',
                    'twitter'   => 'Twitter',
                    'pinterest' => 'Pinterest',
                ],

                'report-form' => [
                    'alert'              => 'Оповещение',
                    'already-reported'   => 'Вы уже пожаловались на этого продавца',
                    'create-success'     => 'Продавец успешно пожалован',
                    'guest-alert'        => 'Вам нужно войти в систему, чтобы пожаловаться на продавца',
                    'not-allowed'        => 'Вы не можете пожаловаться на продавца без заказа',
                    'other-reason'       => 'Другая причина',
                    'reason'             => 'Причина',
                    'reason-placeholder' => 'Укажите причину',
                    'select-reason'      => 'Выберите причину',
                    'submit-btn'         => 'Отправить',
                    'title'              => 'Сообщить о проблеме',
                ],

                'reviews' => [
                    'alert'            => 'Оповещение',
                    'already-reviewed' => 'Вы уже оставили отзыв о этом продавце',
                    'comment'          => 'Комментарий',
                    'create-success'   => 'Продавец успешно оценен',
                    'customer-review'  => ':count Отзыв клиента',
                    'customer-reviews' => 'Отзывы клиентов',
                    'guest-alert'      => 'Для того чтобы пожаловаться на продавца, необходимо войти в систему',
                    'rating'           => 'Рейтинг',
                    'review-by'        => 'Отзыв от',
                    'submit-btn'       => 'Отправить',
                    'title'            => 'Заголовок',
                    'view-all'         => 'Просмотреть все отзывы',
                    'write-review'     => 'Написать отзыв',
                ],

                'products' => [
                    'no-result' => 'Товары отсутствуют',
                    'show'      => 'Показать',

                    'sort-by' => [
                        'title' => 'Сортировать по',

                        'options' => [
                            'cheapest-first'  => 'Сначала дешевые',
                            'expensive-first' => 'Сначала дорогие',
                            'from-a-z'        => 'От А до Я',
                            'from-z-a'        => 'От Я до А',
                            'latest-first'    => 'Сначала новые',
                            'oldest-first'    => 'Сначала старые',
                        ],
                    ],

                    'filters' => [
                        'clear-all'   => 'Очистить все',
                        'filter'      => 'Фильтр',
                        'filters'     => 'Фильтры:',
                        'price-range' => 'Ценовой диапазон',
                        'sort'        => 'Сортировать',
                    ],
                ],
            ],
        ],
    ],
];
