CREATE TABLE pictures
(
picture_id INT AUTO_INCREMENT,
filename VARCHAR(255) NOT NULL,
extension VARCHAR(255) NOT NULL,
path VARCHAR(255) NOT NULL,
place VARCHAR(255) NOT NULL,
upload_date DATETIME NOT NULL,
PRIMARY KEY (picture_id)
);

CREATE TABLE album
(
album_id INT NOT NULL AUTO_INCREMENT,
album_name VARCHAR(255) NOT NULL,
PRIMARY KEY (album_id)
);

CREATE TABLE meta
(
meta_id INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY (meta_id)
);

CREATE TABLE has_album
(
album_id INT REFERENCES Album(picture_id),
picture_id INT REFERENCES Picture(picture_id),
CONSTRAINT has_album_pkey PRIMARY KEY (album_id, picture_id)
);

CREATE TABLE has_meta
(
meta_id INT REFERENCES Meta(meta_id),
picture_id INT REFERENCES Pictures(picture_id),
CONSTRAINT has_meta_pkey PRIMARY KEY (meta_id, picture_id)
);

CREATE TABLE Tags
(
tags_id INT AUTO_INCREMENT,
tags VARCHAR(255),
PRIMARY KEY (tags_id)
);

CREATE TABLE has_tags
(
tags_id INT REFERENCES Tags(tags_id),
picture_id INT REFERENCES Pictures(picture_id),
CONSTRAINT has_tags_pkey PRIMARY KEY (tags_id, picture_id)
);