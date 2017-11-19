CREATE TABLE zdm_admin(
  `id` BIGINT NOT NULL DEFAULT 0 COMMENT '主键id',
  `name` VARCHAR(64) NOT NULL DEFAULT '' COMMENT '管理员姓名',
  `nickname` VARCHAR(64) NOT NULL DEFAULT '' COMMENT '管理员昵称',
  `status` TINYINT NOT NULL DEFAULT 1 COMMENT '管理员状态 0 - 正常 1 - 待审核 2 - 禁用 3 - 审核不通过 4 - 删除',
  `role`  TINYINT NOT NULL DEFAULT 1 COMMENT '管理员角色 1 - 超级管理员 2 - 普通管理员',
  `password` CHAR(32) NOT NULL DEFAULT '' COMMENT '管理员密码',
  `mail` VARCHAR(64) NOT NULL DEFAULT '' COMMENT '管理员邮箱',
  `salt` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '管理员私钥',
  `phone` VARCHAR(15) NOT NULL DEFAULT '' COMMENT '管理员手机号',
  `create_time` BIGINT NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT '管理员创建时间',
  `create_ip` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '创建IP',
  `last_login_ip` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '上一次登录IP',
  `last_login_time` BIGINT NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT '上一次登录时间',
  `db_time` BIGINT NOT NULL DEFAULT CURRENT_TIME() COMMENT '数据上一次被更新时间，业务无关',
  PRIMARY KEY `admin_id` (id),
  UNIQUE KEY  `admin_mail` (`mail`),
  UNIQUE KEY  `admin_phone` (`phone`)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员信息表';