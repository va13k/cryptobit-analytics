# cryptobit-analytics

**cryptobit-analytics** is a commercial web project developed in 2021 by me and my younger brother, [@Levelion](https://github.com/Levelion), for a team of cryptocurrency analysts. The platform was designed to assist in investigating illegal activities, audits, and consulting for companies and individuals.

## Features
- Cryptocurrency transaction tracking
- Audit and reporting system
- Secure authentication system
- Dashboard with analytical insights

---

## Prerequisites
Before setting up the project, make sure you have the following installed:
- PHP (>=7.4 recommended) → [Installation Guide](https://www.php.net/manual/en/install.php)
- Composer → [Download Composer](https://getcomposer.org/download/)
- MAMP (or XAMPP for Windows users) → [Download MAMP](https://www.mamp.info/en/)
- A web server (Apache, Nginx, or built-in PHP server)
- MySQL (included with MAMP/XAMPP)

---

## Installation
### 1. Clone the Repository
Run the following command in your terminal:
```sh
git clone https://github.com/<YOUR_GITHUB_USERNAME>/cryptobitanalytics.git
cd cryptobitanalytics
```
If you are using **MAMP**, place the project in the `htdocs` directory:
```sh
mv cryptobitanalytics /Applications/MAMP/htdocs/
```

---

### 2. Install Dependencies
Navigate to the project directory and install dependencies:
```sh
cd path/to/cryptobitanalytics
composer install
```

---

## Database Setup
### 1. Start MAMP and Create a Database
1. Open **MAMP** and start the servers.
2. Navigate to **phpMyAdmin**:  
   👉 [http://localhost:8888/phpMyAdmin](http://localhost:8888/phpMyAdmin)
3. Create a new database named:  
   ```
   cryptobitanalytics
   ```
4. Import the database:
   - Click **Import** in phpMyAdmin.
   - Select `cryptobitanalytics.sql` from the project root folder.
   - Click **Go**.

---

### 2. Configure Environment Variables
Update your `.env` file with the correct database credentials:

```ini
DB_HOST=localhost
DB_NAME=cryptobitanalytics
DB_USER=root
DB_PASS=root
```
> **Note:** If your database username/password differs, adjust accordingly.

---

## Running the Project
To start the application, open the project in a browser:
```
http://localhost:8888/cryptobitanalytics/
```
If using PHP's built-in server:
```sh
php -S localhost:8000 -t public
```

---

## Troubleshooting
### 🔹 "Access denied for user 'root'@'localhost'"
- Ensure your MySQL credentials match those in the `.env` file.
- Try changing the password in phpMyAdmin.

### 🔹 "Database not found" Error
- Double-check that the database `cryptobitanalytics` exists in phpMyAdmin.
- Ensure it was properly imported from `cryptobitanalytics.sql`.

---

## License
This project is licensed under the [MIT License](LICENSE).

---

## Contact
For inquiries, reach out to me on GitHub: [@va13k](https://github.com/va13k)
Or write me an [email](valevytskyi@gmail.com)
