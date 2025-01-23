CREATE TABLE User (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE Mode (
    id_mode INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255) NOT NULL
);

CREATE TABLE Regime (
    id_regime INT AUTO_INCREMENT PRIMARY KEY,
    description VARCHAR(255) NOT NULL
);

CREATE TABLE Contract (
    id_contract INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    id_mode INT,
    id_regime INT,
    start_date DATE NOT NULL,
    end_date DATE NOT NULL,
    FOREIGN KEY (id_user) REFERENCES User(id_user),
    FOREIGN KEY (id_mode) REFERENCES Mode(id_mode),
    FOREIGN KEY (id_regime) REFERENCES Regime(id_regime)
);

CREATE TABLE File (
    id_file INT AUTO_INCREMENT PRIMARY KEY,
    id_contract INT,
    name_file VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_date DATETIME NOT NULL,
    FOREIGN KEY (id_contract) REFERENCES Contract(id_contract) ON DELETE CASCADE
);
