/*
Navicat MySQL Data Transfer

Source Server         : xampp
Source Server Version : 100417
Source Host           : localhost:3306
Source Database       : todolist

Target Server Type    : MYSQL
Target Server Version : 100417
File Encoding         : 65001

Date: 2021-12-22 22:26:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for todolist
-- ----------------------------
DROP TABLE IF EXISTS `todolist`;
CREATE TABLE `todolist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '',
  `doen` varchar(1) NOT NULL DEFAULT '0' COMMENT '1完成',
  `at_create` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `at_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of todolist
-- ----------------------------
INSERT INTO `todolist` VALUES ('2', '1236', '0', '2021-12-22 19:16:09', '2021-12-22 19:16:09');
INSERT INTO `todolist` VALUES ('5', '12453123', '0', '2021-12-22 22:23:03', '2021-12-22 22:23:03');
INSERT INTO `todolist` VALUES ('7', '654/8', '0', '2021-12-22 22:23:00', '2021-12-22 22:23:00');
INSERT INTO `todolist` VALUES ('10', '111', '0', null, '2021-12-22 20:52:03');
INSERT INTO `todolist` VALUES ('11', '258', '0', null, '2021-12-22 20:52:07');

-- ----------------------------
-- Table structure for todolist_copy
-- ----------------------------
DROP TABLE IF EXISTS `todolist_copy`;
CREATE TABLE `todolist_copy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '',
  `doen` varchar(1) NOT NULL DEFAULT '0' COMMENT '1完成',
  `at_create` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `at_update` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of todolist_copy
-- ----------------------------
INSERT INTO `todolist_copy` VALUES ('2', '1236', '0', '2021-12-22 19:16:09', '2021-12-22 19:16:09');
INSERT INTO `todolist_copy` VALUES ('3', '1236', '1', '2021-12-22 17:22:28', '2021-12-22 17:22:28');
INSERT INTO `todolist_copy` VALUES ('4', '1245', '1', '2021-12-22 17:23:16', '2021-12-22 17:23:16');
INSERT INTO `todolist_copy` VALUES ('5', '1245', '1', '2021-12-22 17:23:10', '2021-12-22 17:23:10');
INSERT INTO `todolist_copy` VALUES ('6', '9876', '0', null, '2021-12-22 15:29:30');
INSERT INTO `todolist_copy` VALUES ('7', '654/8', '1', '2021-12-22 18:58:45', '2021-12-22 18:58:45');
SET FOREIGN_KEY_CHECKS=1;
