<?php 

// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'pyroepfq_admin';
$DATABASE_PASS = '1king69472';
$DATABASE_NAME = 'pyroepfq_game_db';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$websiteTitle = "Website Title";

// Run this in MySQL
/* 

CREATE DATABASE `game_db`;

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `score` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `score`) VALUES
(1, 'test', '$2y$10$ArJldocFgWg.HcN34.U2XeltIX..Vaw0Y8RFQnUMSJcg7IHZGrJBa', 'test@test.com', 0);

*/
?>