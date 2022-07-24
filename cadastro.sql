/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : cadastro

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 24/07/2022 12:21:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for carros
-- ----------------------------
DROP TABLE IF EXISTS `carros`;
CREATE TABLE `carros`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCarros` int(255) NULL DEFAULT NULL,
  `modelo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ano` int(11) NULL DEFAULT NULL,
  `placa` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cor` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of carros
-- ----------------------------
INSERT INTO `carros` VALUES (7, 1, 'onix', 2014, 'pgu6865', 'azul');
INSERT INTO `carros` VALUES (8, 1, 'civic', 2020, 'ppp0590', 'cinza');
INSERT INTO `carros` VALUES (9, 1, 'celta', 2015, 'ppp0280', 'preto');
INSERT INTO `carros` VALUES (10, 1, 'gol', 2012, 'pgu6984', 'branco');
INSERT INTO `carros` VALUES (11, 1, 'hb2', 2014, 'pgo5051', 'Cinza');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT ' ',
  `nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sobrenome` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `telefone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `data` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'Guilherme', 'Faustino', 'guilhermemendes.info@gmail.com', '974892b874ac2721ba57cd8ee9a87c83', '8181593175', '2022-07-21 19:50:00.000000');
INSERT INTO `user` VALUES (2, 'Rafael', 'Silvino', 'rafael@rafael.com', 'a448ce6579df0c9c4185788a5f41a662', '8181593175', '2022-07-21 20:56:02.000000');

SET FOREIGN_KEY_CHECKS = 1;
