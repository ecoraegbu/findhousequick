CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT,
  email TEXT NOT NULL,
  password TEXT NOT NULL,
  salt TEXT NOT NULL,
  name TEXT NOT NULL,
  joined DATETIME NOT NULL,
  role TEXT NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE user_details (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INTEGER NOT NULL,
    phone VARCHAR(255),
    address VARCHAR(255),
    age INTEGER,
    sex ENUM('male', 'female'),
    marital_status ENUM('single', 'married', 'divorced'),
    height FLOAT,
    employment_status ENUM('employed', 'unemployed', 'self-employed'),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE products (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id VARCHAR(255) NOT NULL UNIQUE,
    product_name VARCHAR(255) NOT NULL,
    price FLOAT NOT NULL,
    product_description TEXT,
    product_image VARCHAR(255)
);

CREATE TABLE orders (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INTEGER NOT NULL,
    product_id INTEGER NOT NULL,
    quantity INTEGER NOT NULL,
    total_amount FLOAT NOT NULL,
    ordered_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE available_products (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_id INTEGER NOT NULL,
    quantity INTEGER NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE TABLE feedback (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id INTEGER NOT NULL,
    order_id INTEGER NOT NULL,
    rating INTEGER NOT NULL,
    comments TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (order_id) REFERENCES orders(id)
)