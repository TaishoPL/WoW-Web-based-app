CREATE TABLE auctions (
    auc int(15),
    item int(15),
    owner varchar(22),
    buyout int(15),
    quantity int(15), 
    PRIMARY KEY (auc)
);

CREATE TABLE status (
    realm varchar(21)

);

INSERT INTO status
VALUES (123);

