CREATE TABLE product(
	name VARCHAR(100),
	price VARCHAR(100),
	quantity INT
);

CREATE TABLE password(
	users VARCHAR(100),
	password VARCHAR(100)
);


INSERT INTO product VALUES('water','10', 200);
INSERT INTO product VALUES('chips','20', 300);
INSERT INTO password VALUES('john','woohoopassword1');
INSERT INTO password VALUES('peter','mycoolpassword2');

-- SQL INJECTIONS EXAMPLE
--	' UNION(SELECT *, 3 FROM password);--
--	' UNION(SELECT TABLE_NAME, TABLE_SCHEMA,3 FROM information_schema.tables);--