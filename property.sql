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

