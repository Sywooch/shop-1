DROP TABLE IF EXISTS `shop_admin`;

CREATE TABLE IF NOT EXISTS `shop_admin`
(
    `adminid` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
    `adminuser` VARCHAR(32) NOT NULL DEFAULT '' COMMENT '管理员账号',
    `adminpass` CHAR(32) NOT NULL DEFAULT '' COMMENT '管理员密码',
    `adminemail` VARCHAR(50) NOT NULL DEFAULT '' COMMENT '管理员邮箱',
    `logintime` INT UNSIGNED NOT NULL DEFAULT '0' COMMENT '登陆时间',
    `loginip` BIGINT NOT NULL DEFAULT '0' COMMENT '登陆ip',
    `creatime` INT UNSIGNED NOT NULL DEFAULT '0' COMMENT '创建时间',
    PRIMARY KEY(`adminid`),
    UNIQUE shop_admin_adminuser_adminpass(`adminuser`,`adminpass`)
)ENGINE =InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `shop_admin`(adminid,adminuser,adminpass,adminemail) VALUE (1,'root',md5('root'),'evil3344@sina.com');
INSERT INTO `shop_admin`(adminid,adminuser,adminpass,adminemail) VALUE (2,'admin',md5('admin'),'evil3344@sina.com');