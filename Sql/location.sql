CREATE TABLE `location` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `property_id` INT NOT NULL,
  `latitude` DECIMAL(10,8) NOT NULL,
  `longitude` DECIMAL(11,8) NOT NULL,
  FOREIGN KEY (`property_id`) REFERENCES `properties`(`id`)
);