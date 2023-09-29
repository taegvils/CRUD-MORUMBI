CREATE TABLE idolo (
    id int AUTO_INCREMENT NOT NULL,
    nomeIdolo VARCHAR(70) NOT NULL,
    CONSTRAINT pk_idolo PRIMARY KEY (id)
);

CREATE TABLE tours (
    id int AUTO_INCREMENT NOT NULL,
    tipoTour VARCHAR(70) NOT NULL,
    dataTour DATE NOT NULL,
    CONSTRAINT pk_tours PRIMARY KEY (id)
);

CREATE TABLE vendas (
    id int AUTO_INCREMENT NOT NULL,
    nomeVisitante VARCHAR(70) NOT NULL,
    cpf CHAR(11),
    id_idolo INT NOT NULL,
    id_tours INT NOT NULL,
    CONSTRAINT pk_vendas PRIMARY KEY (id),
    CONSTRAINT fk_idolo FOREIGN KEY (id_idolo) REFERENCES idolo (id),
    CONSTRAINT fk_tours FOREIGN KEY (id_tours) REFERENCES tours (id)
);