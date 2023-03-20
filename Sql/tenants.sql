CREATE TABLE tenants (
  id INT PRIMARY KEY AUTO_INCREMENT,
  tenant_id INT NOT NULL,
  property_id INT NOT NULL,
  tenancy_start_date DATE NOT NULL,
  tenancy_end_date DATE NOT NULL,
  FOREIGN KEY (tenant_id) REFERENCES users(id),
  FOREIGN KEY (property_id) REFERENCES property(id)
);
