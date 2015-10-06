CREATE TABLE Pictures 
(
P_id INT,
filename VARCHAR(255) NOT NULL,
extention VARCHAR(255) NOT NULL,
PRIMARY KEY (P_id)
);


CREATE TABLE Album
(
A_id INT NOT NULL AUTO_INCREMENT,
Album_name VARCHAR(255) NOT NULL,
PRIMARY KEY (A_id)
);


CREATE TABLE Meta
(
M_id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY (M_id)
);


CREATE TABLE has_album
(
A_id INT REFERENCES Album(A_id),
P_id INT REFERENCES Picture(P_id),
CONSTRAINT has_album_pkey PRIMARY KEY (A_id, P_id)
);


CREATE TABLE has_meta
(
M_id INT REFERENCES Meta(M_id),
P_id INT REFERENCES Pictures(P_id),
CONSTRAINT has_meta_pkey PRIMARY KEY (M_id, P_id)
);


