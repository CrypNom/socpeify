CREATE DATABASE IF NOT EXISTS scopeify_inc CHARACTER SET utf8mb4; USE scopeify_inc;
CREATE TABLE users(id INT AUTO_INCREMENT PRIMARY KEY,username VARCHAR(60) UNIQUE NOT NULL,password_hash VARCHAR(255) NOT NULL,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP);
CREATE TABLE projects(id INT AUTO_INCREMENT PRIMARY KEY,title VARCHAR(150) NOT NULL,category VARCHAR(40) NOT NULL,description TEXT,technologies VARCHAR(200),image VARCHAR(255),url VARCHAR(255),created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,INDEX(category));
CREATE TABLE services(id INT AUTO_INCREMENT PRIMARY KEY,title VARCHAR(120) NOT NULL,description TEXT,features VARCHAR(255),active TINYINT DEFAULT 1,sort INT DEFAULT 0);
CREATE TABLE messages(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(120),email VARCHAR(190),phone VARCHAR(40),business VARCHAR(120),service VARCHAR(120),budget VARCHAR(60),message TEXT,is_read TINYINT DEFAULT 0,created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,INDEX(is_read));
CREATE TABLE testimonials(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(120),quote TEXT,active TINYINT DEFAULT 1);
CREATE TABLE pricing(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(60),audience VARCHAR(160),price_label VARCHAR(60),sort INT DEFAULT 0);
CREATE TABLE settings(k VARCHAR(60) PRIMARY KEY,v TEXT);
INSERT INTO services(title,description,features,sort) VALUES
('Business Websites','Modern websites for local businesses and companies.','Responsive, SEO-ready, contact forms',1),
('E-Commerce Websites','Online stores with catalogs, carts and checkout-ready architecture.','Catalog, cart, order management',2),
('Portfolio Websites','Professional personal and creative portfolios.','Galleries, case studies',3),
('Landing Pages','High-converting pages for campaigns and products.','Fast, focused, trackable',4),
('Website Redesign','Turn an outdated site into a modern experience.','Audit, new design, migration',5),
('Custom Web Applications','Custom PHP systems and business applications.','Dashboards, user accounts, APIs',6);
INSERT INTO projects(title,category,description,technologies) VALUES
('Demo E-Commerce Store','E-Commerce','Sample project. Replace in the database.','PHP, MySQL, JS'),
('Demo Restaurant Website','Business','Sample project. Replace in the database.','PHP, CSS'),
('Demo Portfolio','Portfolio','Sample project. Replace in the database.','HTML, CSS, JS'),
('Demo SaaS Landing Page','Landing Pages','Sample project. Replace in the database.','HTML, CSS, JS');
INSERT INTO pricing(name,audience,price_label,sort) VALUES('STARTER','For small businesses.','Request a quote',1),('PROFESSIONAL','For growing businesses.','Request a quote',2),('PREMIUM','For advanced functionality.','Request a quote',3);
INSERT INTO testimonials(name,quote,active) VALUES('Demo client','Demo testimonial. Replace with a real one.',1);
INSERT INTO users(username,password_hash) VALUES('admin','$2y$10$rLvZmAyIXmSUmRVhhB6Ghe21dk2w/sztyXgt7Y/L6pztDZg.z7BKi');
