<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'mlink' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'mlinkdataadmin' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'mlAV1220' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Q[JYynXtWtO* #o=p9$^YMFEXZsuYZ[P|@1cClt(0njT|lYbY@iFwLdMf^ &4^xr' );
define( 'SECURE_AUTH_KEY',  'm(AJ|f<COhI|>WXW;qf(bl[`6R=j/9!QRF&|-`Q0KfbV(&},Vz vdOLn>fI[4;p$' );
define( 'LOGGED_IN_KEY',    '+? 89Fs)}!2 LB^lqx.GYFO{`-8RVS6,KA+NYUH(W~kry%;Lyg^xrapm<$nv9-.W' );
define( 'NONCE_KEY',        '&( movlp{0`>]@?6sN[K|8=N*]k>TBc}0G XeT$%%?kjMiSBVEieYbe>&U/qD.M=' );
define( 'AUTH_SALT',        '#NOM?^{hHXMl.1VrswU2}R=;/15-1>J3OZ.u@vb^~qKkoiVe5*gG.:K2[fwSGTUx' );
define( 'SECURE_AUTH_SALT', '1V0Um1H!%8mlDG),`OMTEnaT+#-zurI`23!M:4+8d<B%XLsXReRT8G4R9P5e!ZFf' );
define( 'LOGGED_IN_SALT',   'a{m;Td?d@iEV=_fX0>r^frN4]^CnP8v~:?GBngIc%Pgh2yw7Y^Yr;k.+aHqQz1,n' );
define( 'NONCE_SALT',       'BA[BM(*mJ9ht4)H|mbz*6a$$cJRVk2X]^CAN7ZM-`6vb3Z/t5trS-N*TwlYg1BFU' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'ml_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
