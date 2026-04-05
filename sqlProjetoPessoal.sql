CREATE DATABASE IF NOT EXISTS projetoCronograma;
USE projetoCronograma;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE materias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    id_usuario INT NOT NULL,

    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
    ON DELETE CASCADE
);

CREATE TABLE dificuldades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    nivel TINYINT NOT NULL,

    UNIQUE (nivel)
);

CREATE TABLE provas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_materia INT NOT NULL,
    data_prova DATE NOT NULL,
    id_dificuldade INT NOT NULL,

    FOREIGN KEY (id_materia) REFERENCES materias(id)
    ON DELETE CASCADE,

    FOREIGN KEY (id_dificuldade) REFERENCES dificuldades(id)
);

CREATE TABLE disponibilidade (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    dia_semana TINYINT NOT NULL, -- 0 = domingo, 6 = sábado
    hora_inicio TIME NOT NULL,
    hora_fim TIME NOT NULL,

    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
    ON DELETE CASCADE
);

CREATE TABLE cronograma (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_materia INT NOT NULL,
    data DATE NOT NULL,
    horas_planejadas DECIMAL(4,2) NOT NULL,
    concluido BOOLEAN DEFAULT FALSE,

    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
    ON DELETE CASCADE,

    FOREIGN KEY (id_materia) REFERENCES materias(id)
    ON DELETE CASCADE
);

CREATE TABLE sessoes_estudo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_materia INT NOT NULL,
    data_inicio DATETIME NOT NULL,
    data_fim DATETIME,
    duracao INT, -- em minutos
    status ENUM('em_andamento', 'concluido', 'cancelado') DEFAULT 'em_andamento',

    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
    ON DELETE CASCADE,

    FOREIGN KEY (id_materia) REFERENCES materias(id)
    ON DELETE CASCADE
);

INSERT INTO dificuldades (nome, nivel) VALUES
('Fácil', 1),
('Médio', 2),
('Difícil', 3);



