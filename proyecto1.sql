CREATE DATABASE BK_AW

USE BK_AW

CREATE TABLE product(
	id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(50) NOT NULL,
	price int NOT NULL,
	description varchar(200),
	image varchar(200),
	idProvider int NOT NULL
)

DROP TABLE PRODUCT
SELECT * FROM PRODUCT
delete from product where id = 4 or id =5 or id = 6 or id = 7 or id = 8 or id = 9 or id = 10

INSERT INTO product (name, price, description, image, idProvider) 
VALUES
(
	'SENNHEISER MK4 DIGITAL',
	 135000,
	 'El micrófono MK 4 digital combina la alta resolución sonora de un verdadero micrófono condensador con la simplicidad y fineza de las soluciones digitales.',
	 'public/imgs/T1p1.jpg',
	 1
), (
	'AUDIO-TECHNICA ATH-M40X',
	 60000,
	 'Los  ATH-M40x incorporan una sintonización plana para ofrecer una monitorización de audio increíblemente precisa en un amplio rango de frecuencias.',
	 'public/imgs/T1p2.jpg',
	 1
), (
	'AUDIO-TECHNICA ATH-M50X',
	 95000,
	 'Los auriculares ATH-M50x ofrecen la misma calidad de sonido, pero además disponen ahora de un cable desconectable.',
	 'public/imgs/T1p3.jpg',
	 1
),
(
	'SENNHEISER PXC 550 WIRELESS',
	 100000,
	 'Nada se compara con la experiencia de viajar con los audífonos PXC 550 Inalámbricos.',
	 'public/imgs/T1p6.jpg',
	 1
), (
	'SENNHEISER HANDMIC DIGITAL',
	 30000,
	 'Un micrófono de mano dinámico y resistente con un armazón completamente de metal.',
	 'public/imgs/T1p5.jpg',
	 1
), (
	'SENNHEISER RS120 II - INALAMBRICO',
	 86000,
	 'Escucha tu música favorita de manera inalámbrica hasta a 90 metros de distancia',
	 'public/imgs/T1p3.jpg',
	 1
)

CREATE PROCEDURE sp_getProducts()
	SELECT * FROM product


DROP PROCEDURE sp_registerProduct

DELIMITER $$ 
CREATE PROCEDURE sp_registerProduct(nameP varchar(50), priceP int , descriptionP varchar(200), path varchar(200))
	BEGIN
    DECLARE EXIT HANDLER FOR SQLEXCEPTION 
	BEGIN
    
		SELECT '0' as result, 'SQLEXCEPTION' as err;
		ROLLBACK;
	END;

	DECLARE EXIT HANDLER FOR NOT FOUND 
	BEGIN
		SELECT '0' as result, 'NOT FOUND' as err;
		ROLLBACK;
	END;

	DECLARE EXIT HANDLER FOR SQLWARNING 
	BEGIN
		SELECT '0' as result, 'SQLWARNING' as err;
		ROLLBACK;
	END;
	START TRANSACTION; 
    
     IF EXISTS(SELECT * FROM product WHERE name = nameP or description = descriptionP) THEN
        SELECT 1 AS resultado;
       
    ELSE
        INSERT INTO product (name, price, description, image, idProvider) 
		values(nameP, priceP, descriptionP, path, 1);   
        SELECT 0 AS resultado;
    END IF;
    COMMIT;
   END
   
   
   
   DELIMITER $$ 
CREATE PROCEDURE sp_updateProduct(idA int, nameP varchar(50), priceP int , descriptionP varchar(200))	
BEGIN
 DECLARE EXIT HANDLER FOR SQLEXCEPTION 
	BEGIN
		SELECT '0' as result, 'SQLEXCEPTION' as err;
		ROLLBACK;
	END;

	DECLARE EXIT HANDLER FOR NOT FOUND 
	BEGIN
		SELECT '0' as result, 'NOT FOUND' as err;
		ROLLBACK;
	END;

	DECLARE EXIT HANDLER FOR SQLWARNING 
	BEGIN
		SELECT '0' as result, 'SQLWARNING' as err;
		ROLLBACK;
	END;
    START TRANSACTION; 
	UPDATE product
    SET name = nameP,
    price = priceP,
    description = descriptionP
    WHERE id = idA;    
	COMMIT;
END

 DELIMITER $$ 
CREATE PROCEDURE sp_deleteProduct(idP int)	
BEGIN
 DECLARE EXIT HANDLER FOR SQLEXCEPTION 
	BEGIN
		SELECT '0' as result, 'SQLEXCEPTION' as err;
		ROLLBACK;
	END;

	DECLARE EXIT HANDLER FOR NOT FOUND 
	BEGIN
		SELECT '0' as result, 'NOT FOUND' as err;
		ROLLBACK;
	END;

	DECLARE EXIT HANDLER FOR SQLWARNING 
	BEGIN
		SELECT '0' as result, 'SQLWARNING' as err;
		ROLLBACK;
	END;
    START TRANSACTION; 
	DELETE FROM product WHERE id = idP;    
	COMMIT;
END

