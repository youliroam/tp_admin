/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50728
 Source Host           : localhost:3306
 Source Schema         : tp

 Target Server Type    : MySQL
 Target Server Version : 50728
 File Encoding         : 65001

 Date: 21/07/2020 14:37:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for sys_menu
-- ----------------------------
DROP TABLE IF EXISTS `sys_menu`;
CREATE TABLE `sys_menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `level` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `sort` int(11) NOT NULL DEFAULT 1,
  `create_time` bigint(20) NOT NULL DEFAULT 0,
  `update_time` bigint(20) NOT NULL DEFAULT 0,
  `delete_time` bigint(20) NOT NULL DEFAULT 0,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_menu
-- ----------------------------
INSERT INTO `sys_menu` VALUES (1, '系统设置', '', '', 0, 1, 1, 4, 2020708165235, 0, 0, '');
INSERT INTO `sys_menu` VALUES (2, '文章管理', '', '', 0, 1, 1, 2, 2020708165235, 0, 0, '');
INSERT INTO `sys_menu` VALUES (3, '管理员密码设置', '/admin/account/password', '', 1, 2, 1, 1, 2020708165235, 0, 0, '');
INSERT INTO `sys_menu` VALUES (4, '图片管理', '', '', 0, 1, 1, 3, 2020708165235, 0, 0, '');
INSERT INTO `sys_menu` VALUES (5, '前端设置', '', '', 1, 2, 1, 1, 2020708165235, 0, 0, '');
INSERT INTO `sys_menu` VALUES (6, '文章列表', '', '', 2, 2, 1, 1, 2020708165235, 0, 0, '');
INSERT INTO `sys_menu` VALUES (7, '文章分类管理', '', '', 2, 2, 1, 1, 2020708165235, 0, 0, '');
INSERT INTO `sys_menu` VALUES (8, '首页', '/admin/home/home', '', 0, 1, 1, 1, 2020708165235, 0, 0, '');
INSERT INTO `sys_menu` VALUES (9, '后台设置', '', '', 1, 2, 1, 1, 2020708165235, 0, 0, '');
INSERT INTO `sys_menu` VALUES (10, '基础设置', '/admin/system/index', '', 9, 3, 1, 1, 2020708165235, 0, 0, '');
INSERT INTO `sys_menu` VALUES (11, '权限管理', '', '', 0, 1, 1, 1, 2020708165235, 0, 0, '');
INSERT INTO `sys_menu` VALUES (12, '角色管理', '/admin/role/index', NULL, 11, 2, 1, 1, 2020708165235, 0, 0, '');
INSERT INTO `sys_menu` VALUES (13, '用户管理', '/admin/user/index', NULL, 11, 2, 1, 1, 2020708165235, 0, 0, '');

SET FOREIGN_KEY_CHECKS = 1;






SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for u_admin
-- ----------------------------
DROP TABLE IF EXISTS `u_admin`;
CREATE TABLE `u_admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `login_laster_time` bigint(20) NULL DEFAULT NULL,
  `ip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of u_admin
-- ----------------------------
INSERT INTO `u_admin` VALUES (1, 'youli', 'e10adc3949ba59abbe56e057f20f883e', 20200722144320, '127.0.0.1');

SET FOREIGN_KEY_CHECKS = 1;



CREATE TABLE `article_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态：1，正常；0，删除',
  `level` tinyint(255) NOT NULL DEFAULT '1' COMMENT '级别，1为第一级，2为第二级，，，',
  `sort` int(11) DEFAULT '0' COMMENT '从大到小排序，越大越在前',
  `remark` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '备注',
  `create_time` bigint(20) NOT NULL COMMENT '创建时间',
  `update_time` bigint(255) DEFAULT NULL COMMENT '更新时间',
  `delete_time` bigint(255) DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;



CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '标题',
  `article_menu_id` int(255) DEFAULT NULL COMMENT '文章分类id',
  `content` text CHARACTER SET utf8 COMMENT '正文',
  `view` int(11) NOT NULL DEFAULT '0' COMMENT '访问量',
  `author` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '作者',
  `sort` int(255) DEFAULT '0' COMMENT '排序，越大越在前',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态：1，正常，0，删除',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `update_time` timestamp NULL DEFAULT NULL COMMENT '修改时间',
  `delete_time` timestamp NULL DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;


CREATE TABLE `sys_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `login_laster_time` bigint(20) DEFAULT NULL,
  `ip` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '状态：1，正常；0，删除',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `create_time` bigint(20) NOT NULL COMMENT '创建时间',
  `update_time` bigint(20) DEFAULT NULL COMMENT '修改时间',
  `delete_time` bigint(20) DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;



