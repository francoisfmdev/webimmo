CREATE TABLE messages (
    id INT(11) NOT NULL AUTO_INCREMENT,
    mail VARCHAR(255) NOT NULL,
    identite VARCHAR(255) NOT NULL,
    autorisation TINYINT(1) NOT NULL,
    message TEXT NOT NULL,
    property_id INT(11) NOT NULL DEFAULT 0,
    send_at DATETIME NOT NULL,

    PRIMARY KEY (id),

    CONSTRAINT fk_messages_property
        FOREIGN KEY (property_id)
        REFERENCES property(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
)
ENGINE=InnoDB;