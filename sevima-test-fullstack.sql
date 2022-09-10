/*
 Navicat Premium Data Transfer

 Source Server         : local-xampp
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : sevima-test-fullstack

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 10/09/2022 19:27:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for m_user
-- ----------------------------
DROP TABLE IF EXISTS `m_user`;
CREATE TABLE `m_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `akses` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `last_login` datetime NULL DEFAULT NULL,
  `created_at` int NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `updated_at` int NULL DEFAULT NULL,
  `updated_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of m_user
-- ----------------------------
INSERT INTO `m_user` VALUES (1, 'admin', 'superadmin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '{\"comment\":\"true\",\"like\":\"true\",\"posting\":\"true\"}', '2022-09-10 14:09:40', NULL, NULL, 1, 1662811780);
INSERT INTO `m_user` VALUES (22, 'yusron', 'yusron@gmail.com', '52b851e6dffbc3b9cc8ccc36e34eceda', 'user', '{\"comment\":\"true\",\"like\":\"true\",\"posting\":\"true\"}', '2022-09-10 14:14:47', 1662741309, NULL, 22, 1662812087);
INSERT INTO `m_user` VALUES (23, 'icus', 'icus.yusron@gmail.com', '3492201c10fd013701c82415e658d71a', 'user', '{\"comment\":\"true\",\"like\":\"true\",\"posting\":\"true\"}', '2022-09-10 14:24:30', 1662741380, NULL, 23, 1662812670);
INSERT INTO `m_user` VALUES (24, 'fika', 'fika@gmail.com', '0bd1772b1f26b34d46a3fcaac56fbf6c', 'user', '{\"comment\":\"true\",\"like\":\"true\",\"posting\":\"true\"}', '2022-09-10 14:08:07', 1662741424, NULL, 24, 1662811687);
INSERT INTO `m_user` VALUES (25, 'andika', 'andika@gmail.com', '7e51eea5fa101ed4dade9ad3a7a072bb', 'user', '{\"comment\":\"true\",\"posting\":\"true\"}', '2022-09-10 06:12:21', 1662741489, NULL, 1, 1662804318);
INSERT INTO `m_user` VALUES (27, 'mika', 'mika@gmail.com', '07af613eea059030daaed3bde1fd1ce7', 'user', '{\"like\":false,\"posting\":false,\"comment\":false}', '2022-09-10 14:09:55', 1662811560, NULL, 27, 1662811795);

-- ----------------------------
-- Table structure for t_komentar
-- ----------------------------
DROP TABLE IF EXISTS `t_komentar`;
CREATE TABLE `t_komentar`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `posting_id` int NULL DEFAULT NULL,
  `komentar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_at` int NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_komentar
-- ----------------------------
INSERT INTO `t_komentar` VALUES (1, 1, 'Artikel yang sangat membantu', 1662811662, 27);
INSERT INTO `t_komentar` VALUES (2, 1, 'up', 1662811669, 27);
INSERT INTO `t_komentar` VALUES (3, 1, 'Keren sekali', 1662811702, 24);

-- ----------------------------
-- Table structure for t_like
-- ----------------------------
DROP TABLE IF EXISTS `t_like`;
CREATE TABLE `t_like`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `posting_id` int NULL DEFAULT NULL,
  `created_at` int NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_like
-- ----------------------------
INSERT INTO `t_like` VALUES (1, 1, 1662811647, 27);
INSERT INTO `t_like` VALUES (2, 1, 1662811704, 24);
INSERT INTO `t_like` VALUES (3, 3, 1662812647, 22);
INSERT INTO `t_like` VALUES (4, 1, 1662812651, 22);
INSERT INTO `t_like` VALUES (5, 1, 1662812684, 23);

-- ----------------------------
-- Table structure for t_posting
-- ----------------------------
DROP TABLE IF EXISTS `t_posting`;
CREATE TABLE `t_posting`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `caption` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` int NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  `likes` int NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_posting
-- ----------------------------
INSERT INTO `t_posting` VALUES (1, '<p><i>Go Language </i>merupakan kepanjangan dari bahasa pemrograman satu ini. Seperti kita tahu namanya diawali dengan Go, ya benar dia merupakan bahasa pemrograman yang dikelola oleh Google. Google tidak bekerja sendirian, melainkan bekerja sama dengan 3 orang tokoh handal pada tahun 2009. Robert Griesemer, Rob Pike dan Ken Thompson merupakan ketiga tokoh tersebut.</p>', 'golang-img.png', 1662811633, 27, 0);
INSERT INTO `t_posting` VALUES (2, '<p>Design Arsitektur</p>', 'Arsitektur_e-learning-Page-2_drawio.png', 1662812139, 22, 0);
INSERT INTO `t_posting` VALUES (3, '<p><strong>Arti kata pemandangan dalam Kamus Besar Bahasa Indonesia (KBBI)</strong> – Belakangan ini penggunaaan kata-kata dalam ucapan dan keterangan makin luas dan banyak menggunakan kata-kata yang jarang digunakan. Sehingga membuat kita kadang tidak tau maksud dari kata-kata tersebut. Seperti penggunaan kata pemandangan.</p><p>&nbsp;</p>', '82ae8a6ad18b15335801ec0d16e7e77e.jpg', 1662812370, 22, 0);

SET FOREIGN_KEY_CHECKS = 1;
