SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

ALTER TABLE `tuna`.`service_order_steps` DROP FOREIGN KEY `fk_service_order_steps_users_opening` , DROP FOREIGN KEY `fk_service_order_steps_entity_technicians` ;

ALTER TABLE `tuna`.`service_order_steps` 
  ADD CONSTRAINT `fk_service_order_steps_users_opening`
  FOREIGN KEY (`service_order_step_opening_user_id` )
  REFERENCES `tuna`.`users` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION, 
  ADD CONSTRAINT `fk_service_order_steps_entity_technicians`
  FOREIGN KEY (`entity_technician_id` )
  REFERENCES `tuna`.`entity_technicians` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `tuna`.`stock_moviments` DROP FOREIGN KEY `fk_stock_moviments_enterprises` ;

ALTER TABLE `tuna`.`stock_moviments` 
  ADD CONSTRAINT `fk_stock_moviments_enterprises`
  FOREIGN KEY (`enterprise_id` )
  REFERENCES `tuna`.`enterprises` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

ALTER TABLE `tuna`.`users` ADD COLUMN `group_id` INT(11) NOT NULL  AFTER `id` , 
  ADD CONSTRAINT `fk_users_groups`
  FOREIGN KEY (`group_id` )
  REFERENCES `tuna`.`groups` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION
, ADD INDEX `fk_users_groups` (`group_id` ASC) ;

ALTER TABLE `tuna`.`entity_products` DROP FOREIGN KEY `fk_entity_products_measure_units` ;

ALTER TABLE `tuna`.`entity_products` 
  ADD CONSTRAINT `fk_entity_products_measure_units`
  FOREIGN KEY (`measure_unit_id` )
  REFERENCES `tuna`.`measure_units` (`id` )
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

DROP TABLE IF EXISTS `tuna`.`users_groups` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
