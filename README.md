# TP WEB
Cette branche contient la version de Hugo , pour celle de Mael et Alban voir la branche [master](https://github.com/AlbanWaxin/Web/)

# Setup
0. Lancer Docker (_optional_)
   ```
   $ docker compose up
   ```
1. Pour pouvoir utiliser le site internet , vous aurez besoin de d'une [base donnée](/src/app/config/config.php) avec les tables suivantes :
    - doctor
    - patient
2. Créer un patient via `/doctors/register`


### Table doctor
```sql
CREATE TABLE doctor (
  id INTEGER AUTO_INCREMENT PRIMARY KEY,
  name TEXT,
  email TEXT,
  password TEXT,
  specialist ENUM('General', 'Pediatric', 'Cardiology', 'Neurology', 'Oncology'),
  gender CHAR(1),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

### Table Patient
```sql
CREATE TABLE patient (
  id INT AUTO_INCREMENT PRIMARY KEY,
  doctor_id INT,
  name VARCHAR(255),
  email VARCHAR(255),
  phone VARCHAR(20),
  health_condition TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

