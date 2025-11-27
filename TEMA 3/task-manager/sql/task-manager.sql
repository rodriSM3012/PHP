CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL, -- nombre de la tarea  
    description TEXT, -- descripción de la tarea  
    status INT -- estado de la tarea (0 si esta sin completar y 1 si esta completa)
);