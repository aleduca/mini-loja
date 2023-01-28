/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Camera', 'camera', 10000.00, 'https://m.media-amazon.com/images/I/71RNoOXKUML._AC_SL1500_.jpg', 'Minha geladeira', '2023-01-25 09:47:19', '2023-01-25 09:47:19');
INSERT INTO `products` (`id`, `name`, `slug`, `price`, `image`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Teclado', 'teclado', 100.00, 'https://m.media-amazon.com/images/I/61vn934qarL._AC_SL1500_.jpg', 'meu teclado', '2023-01-25 09:48:38', '2023-01-25 09:48:38');
INSERT INTO `products` (`id`, `name`, `slug`, `price`, `image`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Mouse', 'mouse', 50.00, 'https://m.media-amazon.com/images/I/61U5bt3ScVL._AC_SL1500_.jpg', 'meu mouse', '2023-01-25 09:48:38', '2023-01-25 09:48:38');
INSERT INTO `products` (`id`, `name`, `slug`, `price`, `image`, `description`, `created_at`, `updated_at`) VALUES
(4, 'Monitor', 'monitor', 5000.00, 'https://m.media-amazon.com/images/I/61x+y81kdaL._AC_SL1000_.jpg', 'meu monitor', '2023-01-25 09:48:38', '2023-01-25 09:48:38'),
(6, 'Notebook ideapad', 'notebook-ideapad', 4500.00, 'https://m.media-amazon.com/images/I/615TJBAXXbL._AC_SL1500_.jpg', 'notebook ideapad', '2023-01-25 12:20:31', '2023-01-25 12:20:31'),
(7, 'Caderno Clássico', 'caderno-classico', 174.00, 'https://m.media-amazon.com/images/I/716IezyRylL._AC_SL1500_.jpg', 'caderno classico', '2023-01-25 12:21:53', '2023-01-25 12:21:53'),
(8, 'Mario Kart 8', 'mario-kart-8', 324.00, 'https://m.media-amazon.com/images/I/81mqZx5X1XL._AC_SL1500_.jpg', 'Mario kart 8', '2023-01-25 12:22:51', '2023-01-25 12:22:51'),
(9, 'Macbook Pro', 'macbook-pro', 20000.00, 'https://m.media-amazon.com/images/I/61aUBxqc5PL._AC_SL1500_.jpg', 'macbook pro', '2023-01-25 12:26:42', '2023-01-25 12:26:42');

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Alexandre', 'Cardoso', 'xandecar@hotmail.com', '$2y$10$dq2UwNUHVA3W7eU1TX6DveJcrYw6TU7DVC6X33KMfSxbN1wCIH/V2', '2023-01-25 10:15:08', '2023-01-25 10:15:08');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;