CREATE TABLE tenants (
  id INT PRIMARY KEY AUTO_INCREMENT,
  tenant_id INT NOT NULL,
  property_id INT NOT NULL,
  tenancy_start_date DATE NOT NULL,
  tenancy_end_date DATE NOT NULL,
  FOREIGN KEY (tenant_id) REFERENCES users(id),
  FOREIGN KEY (property_id) REFERENCES property(id)
);
INSERT INTO tenants (id, tenant_id, property_id, tenancy_start_date, tenancy_end_date) VALUES
(1, 5, 17, '2023-06-25', '2024-06-25'),
(2, 6, 18, '2023-07-15', '2024-07-15'),
(3, 7, 19, '2023-08-05', '2024-08-05'),
(4, 8, 20, '2023-09-10', '2024-09-10'),
(5, 9, 21, '2023-10-20', '2024-10-20'),
(6, 10, 22, '2023-11-01', '2024-11-01'),
(7, 11, 23, '2023-12-15', '2024-12-15'),
(8, 12, 24, '2024-01-20', '2025-01-20'),
(9, 13, 25, '2024-02-10', '2025-02-10'),
(10, 14, 26, '2024-03-25', '2025-03-25'),
(11, 15, 27, '2024-04-05', '2025-04-05'),
(12, 16, 28, '2024-05-15', '2025-05-15'),
(13, 17, 29, '2024-06-01', '2025-06-01'),
(14, 18, 30, '2023-06-30', '2024-06-30'),
(15, 19, 17, '2023-07-20', '2024-07-20'),
(16, 20, 18, '2023-08-10', '2024-08-10'),
(17, 21, 19, '2023-09-01', '2024-09-01'),
(18, 22, 20, '2023-10-15', '2024-10-15');
 


-- Insert dummy data for user_details
INSERT INTO user_details (user_id, first_name, middle_name, last_name, phone, address, age, sex, marital_status, employment_status, state, lgas, religion)
VALUES
(6, 'John', 'Michael', 'Doe', '08012345678', '123 Main St, City', 35, 'male', 'married', 'employed', 'Lagos', 'Ikeja', 'Christianity'),
(5, 'Jane', NULL, 'Smith', '08087654321', '456 Elm St, Town', 28, 'female', 'single', 'self-employed', 'Abuja', 'Gwagwalada', 'Islam'),
(4, 'Emmanuel', 'Chukwuka', 'Oraegbu', '08100253033', '39, Ohonre Street, off Adolor college road, ugbowo, Benin city', 32, 'male', 'single', 'employed', 'Delta', 'Oshimili North', 'Christianity'),
(7, 'Sarah', 'Elizabeth', 'Johnson', '08023456789', '789 Oak Ave, Village', 42, 'female', 'divorced', 'employed', 'Rivers', 'Port Harcourt', 'Christianity'),
(8, 'Michael', NULL, 'Brown', '08098765432', '321 Pine Rd, Suburb', 31, 'male', 'single', 'unemployed', 'Kano', 'Kano Municipal', 'Islam'),
(9, 'Emily', 'Grace', 'Wilson', '08034567890', '654 Birch Ln, City', 26, 'female', 'single', 'employed', 'Enugu', 'Enugu North', 'Christianity'),
(10, 'David', 'Alexander', 'Taylor', '08076543210', '987 Cedar Dr, Town', 39, 'male', 'married', 'self-employed', 'Oyo', 'Ibadan North', 'Christianity'),
(11, 'Olivia', NULL, 'Anderson', '08045678901', '135 Maple St, Village', 33, 'female', 'single', 'employed', 'Kaduna', 'Kaduna North', 'Islam'),
(12, 'Daniel', 'Joseph', 'Thomas', '08089012345', '246 Ash Ave, Suburb', 29, 'male', 'married', 'employed', 'Imo', 'Owerri Municipal', 'Christianity'),
(13, 'Sophia', 'Marie', 'Jackson', '08067890123', '369 Walnut Rd, City', 37, 'female', 'divorced', 'self-employed', 'Plateau', 'Jos North', 'Christianity'),
(14, 'William', 'James', 'Harris', '08056789012', '753 Spruce St, Town', 45, 'male', 'married', 'employed', 'Anambra', 'Onitsha North', 'Christianity'),
(15, 'Emma', NULL, 'Clark', '08078901234', '951 Fir Ave, Village', 24, 'female', 'single', 'unemployed', 'Sokoto', 'Sokoto North', 'Islam'),
(16, 'Christopher', 'Lee', 'Lewis', '08090123456', '159 Oak Rd, Suburb', 36, 'male', 'divorced', 'self-employed', 'Borno', 'Maiduguri', 'Christianity'),
(17, 'Ava', 'Rose', 'Walker', '07012345678', '753 Elm St, City', 30, 'female', 'single', 'employed', 'Edo', 'Benin City', 'Christianity'),
(18, 'James', NULL, 'Hall', '07023456789', '951 Pine Ave, Town', 41, 'male', 'married', 'employed', 'Kwara', 'Ilorin West', 'Islam'),
(19, 'Mia', 'Sophia', 'Allen', '07034567890', '357 Cedar Ln, Village', 27, 'female', 'single', 'self-employed', 'Osun', 'Osogbo', 'Christianity'),
(20, 'Benjamin', 'Thomas', 'Young', '07045678901', '852 Birch Rd, Suburb', 34, 'male', 'single', 'employed', 'Ondo', 'Akure South', 'Christianity'),
(21, 'Charlotte', NULL, 'King', '07056789012', '753 Maple Dr, City', 38, 'female', 'divorced', 'unemployed', 'Abia', 'Umuahia North', 'Christianity'),
(22, 'Ethan', 'Alexander', 'Wright', '07067890123', '951 Ash St, Town', 29, 'male', 'single', 'employed', 'Bauchi', 'Bauchi', 'Islam'),
(23, 'Amelia', 'Grace', 'Scott', '07078901234', '357 Walnut Ave, Village', 32, 'female', 'married', 'self-employed', 'Cross River', 'Calabar Municipal', 'Christianity'),
(24, 'Samuel', NULL, 'Adams', '07089012345', '852 Spruce Ln, Suburb', 43, 'male', 'divorced', 'employed', 'Adamawa', 'Yola North', 'Christianity'),
(25, 'Harper', 'Elizabeth', 'Baker', '07090123456', '753 Fir Rd, City', 25, 'female', 'single', 'unemployed', 'Katsina', 'Katsina', 'Islam'),
(26, 'Joseph', 'William', 'Gonzalez', '08001234567', '951 Oak Dr, Town', 37, 'male', 'married', 'employed', 'Akwa Ibom', 'Uyo', 'Christianity'),
(27, 'Evelyn', NULL, 'Nelson', '08012345678', '357 Elm St, Village', 31, 'female', 'single', 'self-employed', 'Ekiti', 'Ado-Ekiti', 'Christianity'),
(28, 'Alexander', 'James', 'Carter', '08023456789', '852 Pine Ave, Suburb', 40, 'male', 'divorced', 'employed', 'Niger', 'Minna', 'Islam'),
(29, 'Abigail', 'Marie', 'Mitchell', '08034567890', '753 Cedar Ln, City', 28, 'female', 'single', 'unemployed', 'Taraba', 'Jalingo', 'Christianity'),
(30, 'Christopher', NULL, 'Perez', '08045678901', '951 Birch Rd, Town', 35, 'male', 'married', 'self-employed', 'Zamfara', 'Gusau', 'Islam'),
(31, 'Elizabeth', 'Anne', 'Roberts', '08056789012', '357 Maple Dr, Village', 39, 'female', 'divorced', 'employed', 'Jigawa', 'Dutse', 'Islam'),
(32, 'Andrew', 'Thomas', 'Turner', '08067890123', '852 Ash St, Suburb', 33, 'male', 'single', 'unemployed', 'Kebbi', 'Birnin Kebbi', 'Islam'),
(33, 'Sofia', NULL, 'Phillips', '08078901234', '753 Walnut Ave, City', 26, 'female', 'married', 'employed', 'Kogi', 'Lokoja', 'Christianity'),
(34, 'Christopher', 'Lee', 'Campbell', '08089012345', '951 Spruce Ln, Town', 44, 'male', 'divorced', 'self-employed', 'Nasarawa', 'Lafia', 'Christianity');

