CREATE TABLE agents (
  id INT PRIMARY KEY AUTO_INCREMENT,
  agent_id INT NOT NULL,
  agency_name VARCHAR(255),
  agency_address VARCHAR(255),
  property_count INT,
  FOREIGN KEY (agent_id) REFERENCES users(id)
);
CREATE TABLE landlords (
  id INT PRIMARY KEY AUTO_INCREMENT,
  landlord_id INT NOT NULL,
  property_count INT,
  FOREIGN KEY (landlord_id) REFERENCES users(id)
);
CREATE TABLE property (
  id INT PRIMARY KEY AUTO_INCREMENT,
  address VARCHAR(255) NOT NULL,
  city VARCHAR(100) NOT NULL,
  state VARCHAR(100) NOT NULL,
  lga VARCHAR(100) NOT NULL,
  type VARCHAR(50) NOT NULL,
  status VARCHAR(50) NOT NULL,
  purpose VARCHAR(50) NOT NULL,
  price DECIMAL(15,2) NOT NULL,
  description TEXT NOT NULL,
  bedrooms INT NOT NULL,
  bathrooms INT NOT NULL,
  toilets INT NOT NULL,
  images JSON,
  is_available BOOLEAN NOT NULL DEFAULT true,
  landlord_id INT,
  agent_id INT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (landlord_id) REFERENCES users(id),
  FOREIGN KEY (agent_id) REFERENCES users(id)
);
CREATE TABLE tenants (
  id INT PRIMARY KEY AUTO_INCREMENT,
  tenant_id INT NOT NULL,
  property_id INT NOT NULL,
  tenancy_start_date DATE NOT NULL,
  tenancy_end_date DATE NOT NULL,
  FOREIGN KEY (tenant_id) REFERENCES users(id),
  FOREIGN KEY (property_id) REFERENCES property(id)
);
CREATE TABLE user_details (
  id INT PRIMARY KEY AUTO_INCREMENT,
  user_id INT NOT NULL,
  first_name TEXT NOT NULL,
  middle_name TEXT DEFAULT NULL,
  last_name TEXT NOT NULL,
  phone VARCHAR(255) DEFAULT NULL,
  address VARCHAR(255) DEFAULT NULL,
  age INT DEFAULT NULL,
  sex enum('male','female') DEFAULT NULL,
  marital_status enum('single','married','divorced') DEFAULT NULL,
  employment_status enum('employed','unemployed','self-employed') DEFAULT NULL,
  state TEXT NOT NULL,
  lgas TEXT NOT NULL,
  religion TEXT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (user_id) REFERENCES users(id)
);
CREATE TABLE IF NOT EXISTS `users` (
  id INT NOT NULL AUTO_INCREMENT,
  email TEXT NOT NULL,
  password TEXT NOT NULL,
  salt TEXT NOT NULL,
  joined DATETIME NOT NULL,
  role TEXT NOT NULL,
  password_reset TEXT DEFAULT NULL,
  reset_token_expiration INT DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reset_token_expiration_index` (`reset_token_expiration`)
);