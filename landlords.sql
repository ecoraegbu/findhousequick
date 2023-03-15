CREATE TABLE landlords (
  id INT PRIMARY KEY AUTO_INCREMENT,
  landlord_id INT NOT NULL,
  property_count INT,
  FOREIGN KEY (landlord_id) REFERENCES users(id)
);
