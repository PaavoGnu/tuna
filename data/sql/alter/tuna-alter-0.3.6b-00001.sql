ALTER TABLE `stock_moviments` DROP FOREIGN KEY `fk_stock_moviments_stock_moviment_types`;
ALTER TABLE `stock_moviments` DROP INDEX `fk_stock_moviments_stock_moviment_types`;
ALTER TABLE `stock_moviments` DROP `stock_moviment_type_id`;

ALTER TABLE `stock_moviment_items` ADD `stock_moviment_type_id` INT NOT NULL AFTER `stock_moviment_id;
ALTER TABLE `stock_moviment_items` ADD INDEX ( `stock_moviment_type_id` );
ALTER TABLE `stock_moviment_items` ADD FOREIGN KEY ( `stock_moviment_type_id` ) REFERENCES `tuna_unisanta`.`stock_moviment_types` (`id` ) ON DELETE NO ACTION ON UPDATE NO ACTION ;