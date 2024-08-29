# Company Management System

## PHP and MySQL installation:
```bash
sudo apt install php mysql-server php-mysql
```

## MySQL database initializing
1. Run MySQL service:
    ```bash
    sudo service mysql start
    sudo mysql -u root
    ```
2. Create database:
   ```sql
   CREATE DATABASE VMSystem;
   EXIT;
   ```
3. Import SQL file into database:
   ```bash
   sudo mysql -u root VMSystem < database/VMSystem.sql
   ```