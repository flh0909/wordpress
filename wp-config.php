<?php
/**
 * WordPress基础配置文件。
 *
 * 本文件包含以下配置选项：MySQL设置、数据库表名前缀、密钥、
 * WordPress语言设定以及ABSPATH。如需更多信息，请访问
 * {@link http://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 * 编辑wp-config.php}Codex页面。MySQL设置具体信息请咨询您的空间提供商。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以手动复制这个文件，并重命名为“wp-config.php”，然后填入相关信息。
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
//define('DB_NAME', 'wordpress');

/** MySQL数据库用户名 */
//define('DB_USER', 'root');

/** MySQL数据库密码 */
//define('DB_PASSWORD', '123123');

/** MySQL主机 */
//define('DB_HOST', 'localhost');


include(dirname(__FILE__) . '/wp-config/mysql.php');

/** 创建数据表时默认的文字编码 */
define('WP_CACHE', true); //Added by WP-Cache Manager

define( 'WPCACHEHOME', '/Users/apple/Documents/project/github/japaninall/wordpress/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager

define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'G+jmx,N$R?zZ$k8ae$~~T_v6jWz>a;Eu-#2u-%1N.9D0+a>[p.T3?F9dF_lfR.L_');
define('SECURE_AUTH_KEY',  'vaJr?0k);)2D^8ghA%rD&&0:%7OegS5`0_gtbk^TN4D.{J7M-X06fhAjWe)!B}x)');
define('LOGGED_IN_KEY',    'CTq{RUP-j.j*m-MQI+A{`~QfDjGFCT@.O=l*HliRj$.Vv;5+[b.pf?mWQ!x8P2xa');
define('NONCE_KEY',        'JI!i+|n}DHbAeFRex<v9n[gW=_@sUV-W-C!RJ~W`Q[YIJr ,)HJh|j|sk:*V?$>Z');
define('AUTH_SALT',        '|eX_;O)^i![+UG&E*__X.DF/Ukyzq7WruC3:.(ovE5,0c&z@6Q&w061X^Wa`3DU=');
define('SECURE_AUTH_SALT', 'n@1e@HklDXxnTTLb7MZ;@.)BA)@;+j44ad{,:rxu!p7`N;X%z5r8Ci=7VDkdRG8 ');
define('LOGGED_IN_SALT',   'z)t{^r<8S7KN0Y~uAvF[G:0?[:GG`YpS*-G{bcL!CrByFT`qe|+EpjO.M-a(}7dk');
define('NONCE_SALT',       '~dSe#vD+[.D{B!-cR z|E9eR#_~oUhaD5FP<S&7F-}:=--Mc{g]9q+%5@-l75+yE');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');
