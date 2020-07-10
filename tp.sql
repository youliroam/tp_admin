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

 Date: 10/07/2020 19:28:17
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
  `icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `level` int(11) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `sort` int(11) NOT NULL DEFAULT 1,
  `create_time` bigint(20) NOT NULL DEFAULT 0,
  `update_time` bigint(20) NOT NULL DEFAULT 0,
  `delete_time` bigint(20) NOT NULL DEFAULT 0,
  `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_menu
-- ----------------------------
INSERT INTO `sys_menu` VALUES (1, '系统设置', '', 0, 1, 1, 4, 2020708165235, 0, 0, '');
INSERT INTO `sys_menu` VALUES (2, '文章管理', '', 0, 1, 1, 2, 2020708165235, 0, 0, '');
INSERT INTO `sys_menu` VALUES (3, '基本设置', '', 1, 2, 1, 1, 2020708165235, 0, 0, '');
INSERT INTO `sys_menu` VALUES (4, '图片管理', '', 0, 1, 1, 3, 2020708165235, 0, 0, '');
INSERT INTO `sys_menu` VALUES (5, '前端设置', '', 1, 2, 1, 1, 2020708165235, 0, 0, '');
INSERT INTO `sys_menu` VALUES (6, '文章列表', '', 2, 2, 1, 1, 2020708165235, 0, 0, '');
INSERT INTO `sys_menu` VALUES (7, '文章分类管理', '', 2, 2, 1, 1, 2020708165235, 0, 0, '');
INSERT INTO `sys_menu` VALUES (8, '首页', '', 0, 1, 1, 1, 2020708165235, 0, 0, '');

-- ----------------------------
-- Table structure for u_admin
-- ----------------------------
DROP TABLE IF EXISTS `u_admin`;
CREATE TABLE `u_admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `login_laster_time` datetime(0) NULL DEFAULT NULL,
  `ip` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
