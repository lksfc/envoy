-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        5.7.9 - MySQL Community Server (GPL)
-- 服务器操作系统:                      Win64
-- HeidiSQL 版本:                  8.2.0.4675
-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `employees` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '雇员ID',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '姓名',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '邮箱',
  `telephone` varchar(50) NOT NULL DEFAULT '' COMMENT '手机号码',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `username` varchar(255) NOT NULL DEFAULT '' COMMENT '显示姓名',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '密码',
  `department_name` varchar(255) NOT NULL DEFAULT '' COMMENT '所属部门',
  PRIMARY KEY (`employee_id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=1515 DEFAULT CHARSET=utf8mb4 COMMENT='雇员信息';


INSERT INTO `employees` (`employee_id`, `name`, `email`, `telephone`, `status`, `username`, `password`, `department_name`) VALUES
	(1, '螃蟹壳 pangxieke', 'pangxieke@126.com', '', 1, '', '', '1'),
	(2, '李明 liming', 'iming@126.com', '', 1, '', '', '1');

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `username` varchar(255) NOT NULL COMMENT '登录名',
  `auth_key` varchar(32) NOT NULL COMMENT '密码加密密钥',
  `password_hash` varchar(255) NOT NULL COMMENT '密码',
  `password_reset_token` varchar(255) DEFAULT NULL COMMENT '重置密码token',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `status` smallint(6) NOT NULL DEFAULT '1' COMMENT '状态',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='后台管理员表';

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'I87aP851O_LzH30H42BGJKtAlgJvTQzC', '$2y$13$9L0WfHOg.VPFIdGRD2Q1BOuip9blAI4/mFQEKs7No/BcetDN0SZly', NULL, 'admin@pangxieke.com', 1, 1494836360, 1494836360);

CREATE TABLE IF NOT EXISTS `visitors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `employee_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '雇员ID',
  `location_id` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '访问的办公室',
  `user_name` varchar(255) NOT NULL DEFAULT '' COMMENT '来访姓名',
  `id_card` varchar(50) NOT NULL DEFAULT '' COMMENT '身份证号码',
  `company` varchar(255) NOT NULL DEFAULT '' COMMENT '来访公司',
  `num` tinyint(4) NOT NULL DEFAULT '1' COMMENT '来访人数',
  `type` tinyint(1) NOT NULL DEFAULT '1' COMMENT '来访类型',
  `email` varchar(255) NOT NULL DEFAULT '' COMMENT 'Email',
  `telephone` varchar(50) NOT NULL DEFAULT '' COMMENT '电话号码',
  `info` varchar(255) NOT NULL DEFAULT '' COMMENT '来访备注',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  `is_send_email` tinyint(1) NOT NULL DEFAULT '0' COMMENT '发送邮件通知，默认0未发送，1为已发送',
  `is_send_mobile` tinyint(1) NOT NULL DEFAULT '0' COMMENT '发送短信通知，默认0未发送，1为已发送',
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8mb4 COMMENT='访客表';

INSERT INTO `visitors` (`id`, `employee_id`, `location_id`, `user_name`, `id_card`, `company`, `num`, `type`, `email`, `telephone`, `info`, `created_at`, `updated_at`, `is_send_email`, `is_send_mobile`) VALUES
	(127, 1, 1, '张三', '4290019901234', '阿里巴巴', 1, 2, '', '13800138000', '这是测试', '2017-10-10 19:28:37', '2017-10-10 19:28:37', 1, 0),
	(128, 2, 1, 'test', '13800', '公司', 1, 1, '', '', '', '2017-10-10 19:37:12', '2017-10-10 19:37:12', 1, 0),
	(129, 1, 1, 'test', '号码', 'company', 1, 1, '', '', '', '2017-10-10 19:40:01', '2017-10-10 19:40:01', 1, 0),
	(130, 1, 1, 'test', '138000', '', 1, 1, '', '', '', '2017-10-10 19:49:38', '2017-10-10 19:49:38', 1, 0),
	(131, 1, 1, 'test', '13800', '', 1, 1, '', '', '', '2017-10-10 19:51:19', '2017-10-10 19:51:19', 1, 0);
