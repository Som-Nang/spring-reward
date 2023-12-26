/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 80035 (8.0.35-0ubuntu0.22.04.1)
 Source Host           : localhost:3306
 Source Schema         : spring-reward

 Target Server Type    : MySQL
 Target Server Version : 80035 (8.0.35-0ubuntu0.22.04.1)
 File Encoding         : 65001

 Date: 26/12/2023 16:20:44
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tblprize
-- ----------------------------
DROP TABLE IF EXISTS `tblprize`;
CREATE TABLE `tblprize`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `prizeName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `prizePic` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tblprize
-- ----------------------------
INSERT INTO `tblprize` VALUES (1, 'Iphone', './image/2.jpg', 2);
INSERT INTO `tblprize` VALUES (6, 'Bag', './image/3.jpg', 4);
INSERT INTO `tblprize` VALUES (7, 'Power Bank', './image/4.jpg', 5);

-- ----------------------------
-- Table structure for tbluser
-- ----------------------------
DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE `tbluser`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `staffID` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `dept` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 58 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbluser
-- ----------------------------
INSERT INTO `tbluser` VALUES (1, 'B2019', 'Sok Mesa', 'PP', 'SALE', './image/profile1.png');
INSERT INTO `tbluser` VALUES (2, 'B2012', 'Long Sitha', 'KP', 'SALE', './image/profile2.png');
INSERT INTO `tbluser` VALUES (3, 'B2013', 'Jame Kit', 'KK', 'SALE', './image/profile5.jpg');
INSERT INTO `tbluser` VALUES (4, 'B2018', 'Pov Vy', 'PP', 'SALE', './image/profile4.jpg');
INSERT INTO `tbluser` VALUES (5, 'B2011', 'Chea Mease', 'PS', 'SALE', './image/profile5.jpg');
INSERT INTO `tbluser` VALUES (6, 'B2024', 'Vong Buntha', 'pp', 'SALE', './image/profile6.jpg');
INSERT INTO `tbluser` VALUES (7, 'B2013', 'Dara Mease', 'pp', 'SALE', './image/profile7.jpg');
INSERT INTO `tbluser` VALUES (8, 'B2032', 'Jea Vuthy', 'pp', 'SALE', './image/profile8.jpg');
INSERT INTO `tbluser` VALUES (9, 'B2015', 'Song Rithy', 'pp', 'SALE', './image/profile9.jpg');

-- ----------------------------
-- Table structure for tblwinner
-- ----------------------------
DROP TABLE IF EXISTS `tblwinner`;
CREATE TABLE `tblwinner`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` int NOT NULL,
  `prizeid` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `userId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 385 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tblwinner
-- ----------------------------
INSERT INTO `tblwinner` VALUES (380, 7, 6);
INSERT INTO `tblwinner` VALUES (381, 5, 6);
INSERT INTO `tblwinner` VALUES (382, 6, 6);
INSERT INTO `tblwinner` VALUES (383, 4, 6);
INSERT INTO `tblwinner` VALUES (384, 3, 6);

SET FOREIGN_KEY_CHECKS = 1;
