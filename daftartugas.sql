/*
Navicat MySQL Data Transfer

Source Server         : LOCALHOST
Source Server Version : 100427
Source Host           : localhost:3306
Source Database       : daftartugas

Target Server Type    : MYSQL
Target Server Version : 100427
File Encoding         : 65001

Date: 2024-07-18 17:46:07
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tugas
-- ----------------------------
DROP TABLE IF EXISTS `tugas`;
CREATE TABLE `tugas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of tugas
-- ----------------------------
INSERT INTO `tugas` VALUES ('1', 'Tugas 1', '0');
INSERT INTO `tugas` VALUES ('2', 'Tugas 2', '0');
INSERT INTO `tugas` VALUES ('4', 'Tugas 3', '1');
SET FOREIGN_KEY_CHECKS=1;
