/*
 Navicat Premium Data Transfer

 Source Server         : LOCALHOST
 Source Server Type    : MySQL
 Source Server Version : 80037
 Source Host           : localhost:3306
 Source Schema         : webstay_db

 Target Server Type    : MySQL
 Target Server Version : 80037
 File Encoding         : 65001

 Date: 17/09/2024 18:13:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL,
  PRIMARY KEY (`admin_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (1, 'Administrator', 'Admin', 'admin');

-- ----------------------------
-- Table structure for apartments
-- ----------------------------
DROP TABLE IF EXISTS `apartments`;
CREATE TABLE `apartments`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NULL DEFAULT NULL,
  `type` varchar(50) NULL DEFAULT NULL,
  `rent_max` int NULL DEFAULT NULL,
  `rent_min` int NULL DEFAULT NULL,
  `capacity_max` int NULL DEFAULT NULL,
  `capacity_min` int NULL DEFAULT NULL,
  `utility` varchar(10) NULL DEFAULT NULL,
  `contract` varchar(10) NULL DEFAULT NULL,
  `duration` varchar(10) NULL DEFAULT NULL,
  `curfew` varchar(10) NULL DEFAULT NULL,
  `pet` varchar(20) NULL DEFAULT NULL,
  `smoking` varchar(20) NULL DEFAULT NULL,
  `parking` varchar(20) NULL DEFAULT NULL,
  `visitors` varchar(20) NULL DEFAULT NULL,
  `image_dir` varchar(255) NULL DEFAULT NULL,
  `gmap` longtext NULL,
  `rooms` varchar(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of apartments
-- ----------------------------
INSERT INTO `apartments` VALUES (1, 'Santiago Apartment', 'Studio', 6000, 4000, 6, 4, 'yes', 'no', 'no', 'yes', 'allowed', 'not allowed', 'allowed', 'allowed', './admin/images/santiago.jpg', 'https://www.google.com/maps/place/Santiago+Apartment/@15.4422261,120.9436705,71m/data=!3m1!1e3!4m12!1m5!8m4!1e4!2s100359915353745499890!3m1!1e1!3m5!1s0x339727007e300e6f:0xbd7314554234340a!8m2!3d15.4422375!4d120.9437344!16s%2Fg%2F11w92dlw_g?entry=ttu&g_ep=EgoyMDI0MDkxMS4wIKXMDSoASAFQAw%3D%3D', 'santiago');
INSERT INTO `apartments` VALUES (2, 'Rodrigo Hirmino Dormitory', 'Studio', 5000, 5000, 5, 5, 'yes', 'yes', '6 months', 'yes', 'allowed', 'not allowed', 'allowed', 'allowed', './admin/images/rodrigo.jpg', 'https://www.google.com/maps/place/Rodrigo+Hirmino+Dormitory/@15.443294,120.9440089,45m/data=!3m1!1e3!4m6!3m5!1s0x339727006ee5e9ab:0x817f960d258c2798!8m2!3d15.4433375!4d120.9440156!16s%2Fg%2F11ln_t5tt_?entry=ttu&g_ep=EgoyMDI0MDkxMS4wIKXMDSoASAFQAw%3D%3D', 'rodrigo');
INSERT INTO `apartments` VALUES (3, 'Jaiden Apartment Complex', 'Studio', 6000, 4000, 6, 4, 'yes', 'no', 'no', 'no', 'not allowed', 'not allowed', 'allowed', 'allowed', './admin/images/jaiden.jpg', 'https://google.com/maps/place/Jaiden+Apartment+Complex/@15.4433524,120.9440186,85m/data=!3m1!1e3!4m12!1m5!8m4!1e4!2s100359915353745499890!3m1!1e1!3m5!1s0x339727007d78fbc7:0x3636c90bb69ef46f!8m2!3d15.4433125!4d120.9441719!16s%2Fg%2F11ln_rg0d5?entry=ttu&g_ep=EgoyMDI0MDkxMS4wIKXMDSoASAFQAw%3D%3D', 'jaiden');
INSERT INTO `apartments` VALUES (4, 'Dysept Apartment', 'Bed Spacer', 6000, 6000, 4, 4, 'yes', 'yes', '6 months', 'yes', 'not allowed', 'allowed', 'allowed', 'not allowed', './admin/images/dysept.jpg', 'https://www.google.com/maps/place/Dysept+Apartment/@15.4455301,120.9444436,100m/data=!3m1!1e3!4m6!3m5!1s0x339727003de01431:0xb8fa63d7876713ba!8m2!3d15.4455875!4d120.9444219!16s%2Fg%2F11ln_q087r?entry=ttu&g_ep=EgoyMDI0MDkxMS4wIKXMDSoASAFQAw%3D%3D', 'dysept');

-- ----------------------------
-- Table structure for book_form
-- ----------------------------
DROP TABLE IF EXISTS `book_form`;
CREATE TABLE `book_form`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `guests` int NOT NULL,
  `arrivals` date NOT NULL,
  `leaving` date NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of book_form
-- ----------------------------

-- ----------------------------
-- Table structure for guest
-- ----------------------------
DROP TABLE IF EXISTS `guest`;
CREATE TABLE `guest`  (
  `guest_id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contactno` varchar(13) NOT NULL,
  PRIMARY KEY (`guest_id`) USING BTREE
) ENGINE = InnoDB ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of guest
-- ----------------------------

-- ----------------------------
-- Table structure for reservations
-- ----------------------------
DROP TABLE IF EXISTS `reservations`;
CREATE TABLE `reservations`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NULL DEFAULT NULL,
  `email` varchar(255) NULL DEFAULT NULL,
  `phone` varchar(255) NULL DEFAULT NULL,
  `address` varchar(255) NULL DEFAULT NULL,
  `check_in` date NULL DEFAULT NULL,
  `check_out` date NULL DEFAULT NULL,
  `no_of_person` int NULL DEFAULT NULL,
  `apartment` varchar(50) NULL DEFAULT NULL,
  `room_no` int NULL DEFAULT NULL,
  `proof_of_payment` longtext NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `date_issued` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of reservations
-- ----------------------------

-- ----------------------------
-- Table structure for room
-- ----------------------------
DROP TABLE IF EXISTS `room`;
CREATE TABLE `room`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `room_type` varchar(50) NOT NULL,
  `apartment` varchar(100) NULL DEFAULT NULL,
  `room_no` int NULL DEFAULT NULL,
  `details` varchar(255) NULL DEFAULT NULL,
  `bedrooms` int NULL DEFAULT NULL,
  `price` int NOT NULL,
  `image_dir` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'available',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of room
-- ----------------------------

-- ----------------------------
-- Table structure for tblregistration
-- ----------------------------
DROP TABLE IF EXISTS `tblregistration`;
CREATE TABLE `tblregistration`  (
  `registerid` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userpassword` varchar(255) NOT NULL,
  PRIMARY KEY (`registerid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tblregistration
-- ----------------------------
INSERT INTO `tblregistration` VALUES (1, 'tonnie', 'mercurio', 'darren@gmail.com', 'paswroddddddd');

-- ----------------------------
-- Table structure for transaction
-- ----------------------------
DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction`  (
  `transaction_id` int NOT NULL AUTO_INCREMENT,
  `guest_id` int NOT NULL,
  `room_id` int NOT NULL,
  `room_no` int NOT NULL,
  `extra_bed` int NOT NULL,
  `status` varchar(20) NOT NULL,
  `days` int NOT NULL,
  `checkin` date NOT NULL,
  `checkin_time` time NOT NULL,
  `checkout` date NOT NULL,
  `checkout_time` time NOT NULL,
  `bill` varchar(10) NOT NULL,
  PRIMARY KEY (`transaction_id`) USING BTREE
) ENGINE = InnoDB ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaction
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
