# TP WEB
Cette branche contient la version de Mael et Alban , pour celle de hugo voir la branche [Hugo](https://github.com/AlbanWaxin/Web/tree/Hugo)

# Setup

1. Pour pouvoir utiliser le site internet , vous aurez besoin de d'une [base donnée](/app/config/config.php) avec les tables suivantes :
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

