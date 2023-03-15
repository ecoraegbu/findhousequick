CREATE TABLE agents (
  id INT PRIMARY KEY AUTO_INCREMENT,
  agent_id INT NOT NULL,
  agency_name VARCHAR(255),
  agency_address VARCHAR(255),
  property_count INT,
  FOREIGN KEY (agent_id) REFERENCES users(id)
);
