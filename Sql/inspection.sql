CREATE TABLE inspections (
    inspection_id INT AUTO_INCREMENT PRIMARY KEY,
    property_id INT NOT NULL,
    user_id INT NOT NULL,
    inspector_id INT NOT NULL,
    booking_date DATE NOT NULL,
    inspection_date DATE NOT NULL,
    inspection_time TIME NOT NULL,
    inspection_status ENUM('scheduled', 'confirmed', 'completed', 'canceled') DEFAULT 'scheduled',
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (property_id) REFERENCES property(id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (inspector_id) REFERENCES users(id)
);

INSERT INTO inspections (property_id, user_id, inspector_id, booking_date, inspection_date, inspection_time, inspection_status, notes)
VALUES
(17, 4, 4, '2024-06-12', '2024-06-19', '08:00:00', 'scheduled', 'Checking out an apartment for possible renting'),
(18, 5, 4, '2024-06-10', '2024-06-20', '09:00:00', 'confirmed', 'Inspection of apartment for rental consideration'),
(19, 6, 4, '2024-06-07', '2024-06-21', '10:00:00', 'completed', 'Viewing apartment for potential lease'),
(20, 7, 4, '2024-06-08', '2024-06-22', '11:00:00', 'canceled', 'Checking apartment for future rental'),
(21, 8, 4, '2024-06-09', '2024-06-23', '12:00:00', 'scheduled', 'Inspecting apartment for rental options'),
(22, 9, 4, '2024-06-10', '2024-06-24', '13:00:00', 'confirmed', 'Apartment inspection for possible lease'),
(23, 10, 4, '2024-06-11', '2024-06-25', '14:00:00', 'completed', 'Viewing apartment for rental potential'),
(24, 11, 4, '2024-06-12', '2024-06-26', '15:00:00', 'canceled', 'Inspection of apartment for leasing'),
(25, 12, 4, '2024-06-13', '2024-06-27', '16:00:00', 'scheduled', 'Checking apartment for rental possibilities'),
(26, 13, 4, '2024-06-14', '2024-06-28', '17:00:00', 'confirmed', 'Inspecting apartment for rental potential'),
(27, 14, 4, '2024-06-15', '2024-06-29', '08:00:00', 'completed', 'Viewing apartment for possible renting'),
(28, 15, 4, '2024-06-16', '2024-06-30', '09:00:00', 'canceled', 'Apartment inspection for potential lease');


-- Column Name	Data Type	Description
--inspection_id	INT (Primary Key)	Unique identifier for each inspection booking
--property_id	INT (Foreign Key)	Identifier linking to the property being inspected
--user_id	INT (Foreign Key)	Identifier linking to the user who booked the inspection
--inspector_id	INT (Foreign Key)	Identifier linking to the inspector assigned to the booking
--booking_date	DATE	Date when the booking was made
--inspection_date	DATE	Date scheduled for the inspection
--inspection_time	TIME	Time scheduled for the inspection
--status	VARCHAR(50)	Status of the inspection (e.g., scheduled, Confirmed, completed, canceled)
--notes	TEXT	Any additional notes or comments about the inspection
--created_at	TIMESTAMP	Timestamp when the booking was created
--updated_at	TIMESTAMP	Timestamp when the booking was last updated

--GETTING ALL INSPECTION BOOKINGS FOR A LANDLORD 
SELECT i.inspector_id, COUNT(*) AS total_bookings
FROM inspections i
JOIN properties p ON i.property_id = p.property_id
JOIN users u ON i.user_id = u.user_id
JOIN user_details ud ON u.user_id = ud.user_id
WHERE i.inspector_id = 4 -- Replace 4 with the specific inspector_id you are interested in
GROUP BY i.inspector_id;

--GETTING ALL BOOKINGS WITHIN A SPECIFIC DATE RANGE
SELECT *
FROM inspections i
JOIN properties p ON i.property_id = p.property_id
JOIN users u ON i.user_id = u.user_id
JOIN user_details ud ON u.user_id = ud.user_id
WHERE i.booking_date BETWEEN '2024-06-01' AND '2024-06-30';

--GETTING ALL INSPECTION BOOKINGS FOR A SPECIFIC PROPERTY
SELECT *
FROM inspections i
JOIN properties p ON i.property_id = p.property_id
JOIN users u ON i.user_id = u.user_id
JOIN user_details ud ON u.user_id = ud.user_id
WHERE i.property_id = 17;

--GETTING ALL BOOKINGS BY A SPECIFIC USER
SELECT *
FROM inspections i
JOIN properties p ON i.property_id = p.property_id
JOIN users u ON i.user_id = u.user_id
JOIN user_details ud ON u.user_id = ud.user_id
WHERE i.user_id = 4;

--GETTING THE NUMBER OF BOOKINGS PER INSPECTOR
SELECT i.inspector_id, COUNT(*) AS number_of_bookings
FROM inspections i
JOIN properties p ON i.property_id = p.property_id
JOIN users u ON i.user_id = u.user_id
JOIN user_details ud ON u.user_id = ud.user_id
GROUP BY i.inspector_id;

--GETTING ALL BOOKINGS WITH A SPECIFIC STATUS
SELECT *
FROM inspections i
JOIN properties p ON i.property_id = p.property_id
JOIN users u ON i.user_id = u.user_id
JOIN user_details ud ON u.user_id = ud.user_id
WHERE i.inspection_status = 'scheduled';

--GETTING ALL UPCOMING INSPECTIONS
SELECT *
FROM inspections i
JOIN properties p ON i.property_id = p.property_id
JOIN users u ON i.user_id = u.user_id
JOIN user_details ud ON u.user_id = ud.user_id
WHERE i.inspection_date >= CURDATE();

--GETTING ALL CANCELED INSPECTIONS
SELECT *
FROM inspections i
JOIN properties p ON i.property_id = p.property_id
JOIN users u ON i.user_id = u.user_id
JOIN user_details ud ON u.user_id = ud.user_id
WHERE i.inspection_status = 'canceled';


-- GETTING ALL COMPLETED INSPECTIONS
SELECT *
FROM inspections i
JOIN properties p ON i.property_id = p.property_id
JOIN users u ON i.user_id = u.user_id
JOIN user_details ud ON u.user_id = ud.user_id
WHERE i.inspection_status = 'completed';
