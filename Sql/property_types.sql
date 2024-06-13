CREATE TABLE property_type (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(50) NOT NULL,
    description VARCHAR(255)
);

-- Insert property types
INSERT INTO property_type (type, description) VALUES
    ('Detached House', 'A single-family residential building that is not connected to any other building'),
    ('Semi-Detached House', 'A pair of houses built side by side and connected by a shared wall'),
    ('Terraced House', 'A row of houses where each house shares walls with the adjacent houses'),
    ('Flat/Apartment', 'A self-contained residential unit in a building with multiple units'),
    ('Condominium', 'A privately owned individual unit in a multi-unit residential complex'),
    ('Bungalow', 'A single-story residential building, typically with a sloping roof'),
    ('Duplex', 'A residential building divided into two separate living units, often stacked vertically'),
    ('Mansion', 'A large and impressive residential building'),
    ('Townhouse', 'A multi-story residential building that shares walls with adjacent units'),
    ('Apartment Complex/Multifamily Housing', 'A building or group of buildings containing multiple residential units, often with shared amenities'),
    ('Cottage/Cabin', 'A small, cozy residential building, typically in a rural or vacation setting'),
    ('Villa', 'A large, luxurious detached or semi-detached residential building, often with multiple floors and amenities'),
    ('Mobile Home/Trailer Home', 'A prefabricated residential structure that can be transported and installed on a site'),
    ('Dormitory/Student Housing', 'Residential buildings designed for students, often with shared common areas and facilities'),
    ('Retirement Community/Assisted Living', 'Residential facilities designed for elderly individuals, often providing additional care and support services'),
    ('Co-op/Co-operative Housing', 'A residential building or complex where residents own shares in the cooperative that owns the property'),
    ('Loft', 'A residential unit, typically in a former industrial or commercial building, with an open floor plan and high ceilings'),
    ('Penthouse', 'A luxurious residential unit located on the top floor of a high-rise building, often with exclusive amenities and views'),
    ('Studio Apartment', 'A small, self-contained residential unit with a combined living and sleeping area'),
    ('Bedsitter', 'A single room with a combined living and sleeping area, often with a small kitchen or kitchenette'),
    ('Land', 'Vacant land or plot'),
    ('Hotel', 'A building providing lodging and other services for travelers and tourists'),
    ('Shop', 'A building or portion of a building used for retail or commercial purposes'),
    ('Warehouse', 'A large building used for storage and distribution of goods'),
    ('Office', 'A building or portion of a building used for commercial or professional activities'),
    ('Shortlet', 'A residential property rented for a short period, typically less than six months');