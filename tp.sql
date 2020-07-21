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
-- Table structure for sys_item
-- ----------------------------
DROP TABLE IF EXISTS `sys_item`;
CREATE TABLE `sys_item`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '系统各种配置项',
  `item_val` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '系统各种配置值',
  `item_type` tinyint(1) NULL DEFAULT 1 COMMENT '1:后台配置，2：前端配置',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_item
-- ----------------------------
INSERT INTO `sys_item` VALUES (1, 'sys_back_name', 'youliraom管理系统后台', 1);

SET FOREIGN_KEY_CHECKS = 1;


