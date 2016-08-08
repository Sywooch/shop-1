DROP TABLE IF EXISTS `shop_admin`;
CREATE TABLE IF NOT EXISTS `shop_admin`
(
    `adminid` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
    `adminuser` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '管理员账号',
    `adminpass` CHAR(32) NOT NULL DEFAULT '' COMMENT '管理员密码',
    `adminemail` VARCHAR(50) NOT NULL DEFAULT '' COMMENT '管理员邮箱',
    `logintime` INT UNSIGNED NOT NULL DEFAULT '0' COMMENT '登陆时间',
    `loginip` BIGINT NOT NULL DEFAULT '0' COMMENT '登陆ip',
    `createtime` INT UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
    PRIMARY KEY(`adminid`),
    UNIQUE shop_admin_adminuser_adminpass(`adminuser`,`adminpass`)
)ENGINE =InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `shop_admin`(adminid,adminuser,adminpass,adminemail) VALUE (1,'root',md5('root'),'evil3344@sina.com');
INSERT INTO `shop_admin`(adminid,adminuser,adminpass,adminemail) VALUE (2,'admin',md5('admin'),'evil3344@sina.com');

DROP TABLE IF EXISTS `shop_user`;
CREATE TABLE IF NOT EXISTS `shop_user`
(
    `userid` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
    `username` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '用户名',
    `userpass` CHAR(32) NOT NULL DEFAULT '' COMMENT '用户密码',
    `useremail` VARCHAR(50) NOT NULL DEFAULT '' COMMENT '用户邮箱',
    `createtime` INT UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
    UNIQUE shop_user_username_userpass(`username`,`userpass`),
    UNIQUE shop_user_useremail_userpass(`useremail`,`userpass`),
    PRIMARY KEY(`userid`)
)ENGINE = InnoDB DEFAULT CHARSET=utf8

INSERT INTO `shop_user`(userid,username,userpass,useremail) VALUE(1,'test',md5('test'),'evil3344@sina.com')


DROP TABLE IF EXISTS `shop_profile`;
CREATE TABLE IF NOT EXISTS `shop_profile`
(
    `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
    `truename` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '真实姓名',
    `age` TINYINT UNSIGNED NOT NULL DEFAULT '0' COMMENT '年龄',
    `sex` ENUM('0','1','2') NOT NULL DEFAULT '0' COMMENT '性别',
    `birthday` DATE NOT NULL DEFAULT '2016-01-01' COMMENT '生日',
    `nickname` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '昵称',
    `company` VARCHAR(100) NOT NULL DEFAULT '' COMMENT '公司',
    `userid` BIGINT UNSIGNED NOT NULL DEFAULT '0' COMMENT '用户id',
    `createtime` INT NOT NULL DEFAULT '0' COMMENT '创建时间',
    PRIMARY KEY(`id`),
    UNIQUE shop_profile_userid(`userid`)
)ENGINE = InnoDB DEFAULT CHARSET=utf8