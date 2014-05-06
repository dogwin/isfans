<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$setting['menus']=array (
  0 => 
  array (
    'menu_id' => '1',
    'class_name' => 'systemset',
    'method_name' => 'index',
    'menu_name' => '系统',
    'menu_parent' => '0',
    'sub_menus' => 
    array (
      0 => 
      array (
        'menu_id' => '2',
        'class_name' => 'systemset',
        'method_name' => 'index',
        'menu_name' => '后台首页',
        'menu_parent' => '1',
        'sub_menus' => 
        array (
          0 => 
          array (
            'menu_id' => '3',
            'class_name' => 'systemset',
            'method_name' => 'index',
            'menu_name' => '后台首页',
            'menu_parent' => '2',
          ),
        ),
      ),
      1 => 
      array (
        'menu_id' => '4',
        'class_name' => 'setting',
        'method_name' => 'site',
        'menu_name' => '系统设置',
        'menu_parent' => '1',
        'sub_menus' => 
        array (
          0 => 
          array (
            'menu_id' => '5',
            'class_name' => 'setting',
            'method_name' => 'site',
            'menu_name' => '接口设置',
            'menu_parent' => '4',
          ),
          1 => 
          array (
            'menu_id' => '6',
            'class_name' => 'setting',
            'method_name' => 'backend',
            'menu_name' => '后台设置',
            'menu_parent' => '4',
          ),
          2 => 
          array (
            'menu_id' => '7',
            'class_name' => 'systemset',
            'method_name' => 'password',
            'menu_name' => '修改密码',
            'menu_parent' => '4',
          ),
          3 => 
          array (
            'menu_id' => '8',
            'class_name' => 'systemset',
            'method_name' => 'cache',
            'menu_name' => '更新后台缓存',
            'menu_parent' => '4',
          ),
          4 => 
          array (
            'menu_id' => '27',
            'class_name' => 'systemset',
            'method_name' => 'clearcache',
            'menu_name' => '清除数据缓存',
            'menu_parent' => '4',
          ),
          5 => 
          array (
            'menu_id' => '28',
            'class_name' => 'pagesetting',
            'method_name' => 'index',
            'menu_name' => '一级页面设置',
            'menu_parent' => '4',
          ),
        		6 =>
        		array (
        				'menu_id' => '29',
        				'class_name' => 'systemset',
        				'method_name' => 'menus',
        				'menu_name' => '菜单管理',
        				'menu_parent' => '4',
        		),
        ),
      ),
      2 => 
      array (
        'menu_id' => '14',
        'class_name' => 'role',
        'method_name' => 'view',
        'menu_name' => '权限管理',
        'menu_parent' => '1',
        'sub_menus' => 
        array (
          0 => 
          array (
            'menu_id' => '15',
            'class_name' => 'role',
            'method_name' => 'view',
            'menu_name' => '角色管理',
            'menu_parent' => '14',
          ),
          1 => 
          array (
            'menu_id' => '16',
            'class_name' => 'user',
            'method_name' => 'view',
            'menu_name' => '管理员管理',
            'menu_parent' => '14',
          ),
        ),
      ),
      3 => 
      array (
        'menu_id' => '25',
        'class_name' => 'member',
        'method_name' => 'home',
        'menu_name' => '会员管理',
        'menu_parent' => '1',
        'sub_menus' => 
        array (
          0 => 
          array (
            'menu_id' => '29',
            'class_name' => 'member_enter',
            'method_name' => 'view',
            'menu_name' => '企业管理',
            'menu_parent' => '25',
          ),
          1 => 
          array (
            'menu_id' => '26',
            'class_name' => 'member',
            'method_name' => 'view',
            'menu_name' => '会员管理',
            'menu_parent' => '25',
          ),
          2 => 
          array (
            'menu_id' => '41',
            'class_name' => 'member_push',
            'method_name' => 'view',
            'menu_name' => '企业推送',
            'menu_parent' => '25',
          ),
        ),
      ),
      4 => 
      array (
        'menu_id' => '31',
        'class_name' => 'area',
        'method_name' => 'view',
        'menu_name' => '地区管理',
        'menu_parent' => '1',
        'sub_menus' => 
        array (
          0 => 
          array (
            'menu_id' => '32',
            'class_name' => 'area_city',
            'method_name' => 'view',
            'menu_name' => '城市管理',
            'menu_parent' => '31',
          ),
          1 => 
          array (
            'menu_id' => '33',
            'class_name' => 'area_province',
            'method_name' => 'view',
            'menu_name' => '省份管理',
            'menu_parent' => '31',
          ),
          2 => 
          array (
            'menu_id' => '34',
            'class_name' => 'area_country',
            'method_name' => 'view',
            'menu_name' => '国家管理',
            'menu_parent' => '31',
          ),
        ),
      ),
      5 => 
      array (
        'menu_id' => '35',
        'class_name' => 'category',
        'method_name' => 'view',
        'menu_name' => '分类管理',
        'menu_parent' => '1',
        'sub_menus' => 
        array (
          0 => 
          array (
            'menu_id' => '36',
            'class_name' => 'category',
            'method_name' => 'view',
            'menu_name' => '帖子分类管理',
            'menu_parent' => '35',
          ),
          1 => 
          array (
            'menu_id' => '37',
            'class_name' => 'sort_category',
            'method_name' => 'view',
            'menu_name' => '排布分类管理',
            'menu_parent' => '35',
          ),
        ),
      ),
      6 => 
      array (
        'menu_id' => '38',
        'class_name' => 'posts',
        'method_name' => 'view',
        'menu_name' => '帖子管理',
        'menu_parent' => '1',
        'sub_menus' => 
        array (
          0 => 
          array (
            'menu_id' => '39',
            'class_name' => 'posts',
            'method_name' => 'view',
            'menu_name' => '帖子管理',
            'menu_parent' => '38',
          ),
          1 => 
          array (
            'menu_id' => '40',
            'class_name' => 'post_report',
            'method_name' => 'view',
            'menu_name' => '帖子举报管理',
            'menu_parent' => '38',
          ),
        ),
      ),
    ),
  ),
);