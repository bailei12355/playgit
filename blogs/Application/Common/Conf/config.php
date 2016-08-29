<?php
return array(
	//'配置项'=>'配置值'
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'blog_js',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '123123',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'blog_',    // 数据库表前缀

    //模版引擎配置
    // 'TMPL_L_DELIM'          =>  '<{',  
    // 'TMPL_R_DELIM'          =>  '}>',  
    //静态后缀
    // 'URL_HTML_SUFFIX'       =>'html',
    //设置 URL
    'URL_MODEL'             => 1,

    //模版文件的后缀
    // 'TMPL_TEMPLATE_SUFFIX'=>'.html',

    //默认错误跳转对应的模板文件
    // 'TMPL_ACTION_ERROR' => 'Public:jump',
    //默认成功跳转对应的模板文件
    // 'TMPL_ACTION_SUCCESS' => 'Public:jump',
    // 'SHOW_PAGE_TRACE' => true, 
    // 'DB_SQL_LOG' => true
    // session('[start]');
);