SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `tuna` ;
CREATE SCHEMA IF NOT EXISTS `tuna` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `tuna` ;

-- -----------------------------------------------------
-- Table `tuna`.`entity_types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`entity_types` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`entity_types` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `parent_id` INT NULL ,
  `entity_type_name` VARCHAR(50) NOT NULL ,
  `entity_type_description` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_entity_types_entity_types` (`parent_id` ASC) ,
  CONSTRAINT `fk_entity_types_entity_types`
    FOREIGN KEY (`parent_id` )
    REFERENCES `tuna`.`entity_types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`entities`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`entities` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`entities` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `entity_type_id` INT NOT NULL ,
  `entity_name` VARCHAR(100) NOT NULL ,
  `entity_real_name` VARCHAR(100) NOT NULL ,
  `entity_birth_date` DATE NULL ,
  `entity_cnpj_cpf` VARCHAR(14) NULL ,
  `entity_inscr_est_rg` VARCHAR(20) NULL ,
  `entity_inscr_munic` VARCHAR(20) NULL ,
  `entity_adress` VARCHAR(200) NULL ,
  `entity_neighborhood` VARCHAR(100) NULL ,
  `entity_city` VARCHAR(100) NULL ,
  `entity_email` VARCHAR(100) NULL ,
  `entity_postal_code` VARCHAR(8) NULL ,
  `entity_state_province` VARCHAR(2) NULL ,
  `entity_ordinary_fone` VARCHAR(20) NULL ,
  `entity_ordinary_fone_extension` VARCHAR(20) NULL ,
  `entity_mobile_fone` VARCHAR(20) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_entities_entity_types` (`entity_type_id` ASC) ,
  CONSTRAINT `fk_entities_entity_types`
    FOREIGN KEY (`entity_type_id` )
    REFERENCES `tuna`.`entity_types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`entity_technicians`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`entity_technicians` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`entity_technicians` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `entity_id` INT(11) NOT NULL ,
  `entity_technician_enabled` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `entity_id_UNIQUE` (`entity_id` ASC) ,
  INDEX `fk_entity_technicians_entities` (`entity_id` ASC) ,
  CONSTRAINT `fk_entity_technicians_entities`
    FOREIGN KEY (`entity_id` )
    REFERENCES `tuna`.`entities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `tuna`.`service_order_types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`service_order_types` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`service_order_types` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `parent_id` INT NULL ,
  `service_order_type_name` VARCHAR(50) NOT NULL ,
  `service_order_type_description` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_service_order_types_service_order_types` (`parent_id` ASC) ,
  CONSTRAINT `fk_service_order_types_service_order_types`
    FOREIGN KEY (`parent_id` )
    REFERENCES `tuna`.`service_order_types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`enterprises`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`enterprises` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`enterprises` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `entity_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_enterprises_entities` (`entity_id` ASC) ,
  UNIQUE INDEX `entity_id_UNIQUE` (`entity_id` ASC) ,
  CONSTRAINT `fk_enterprises_entities`
    FOREIGN KEY (`entity_id` )
    REFERENCES `tuna`.`entities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`users` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `entity_id` INT(11) NULL DEFAULT NULL ,
  `user_login` VARCHAR(50) NOT NULL ,
  `user_password` CHAR(50) NOT NULL ,
  `user_enabled` TINYINT(1) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `user_name_UNIQUE` (`user_login` ASC) ,
  UNIQUE INDEX `entity_id_UNIQUE` (`entity_id` ASC) ,
  INDEX `fk_users_entities` (`entity_id` ASC) ,
  CONSTRAINT `fk_users_entities`
    FOREIGN KEY (`entity_id` )
    REFERENCES `tuna`.`entities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `tuna`.`entity_groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`entity_groups` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`entity_groups` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `parent_id` INT NULL ,
  `entity_group_name` VARCHAR(50) NOT NULL ,
  `entity_group_description` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_entity_groups_entity_groups` (`parent_id` ASC) ,
  CONSTRAINT `fk_entity_groups_entity_groups`
    FOREIGN KEY (`parent_id` )
    REFERENCES `tuna`.`entity_groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`service_order_priorities`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`service_order_priorities` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`service_order_priorities` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `service_order_priority_name` VARCHAR(50) NOT NULL ,
  `service_order_priority_description` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`service_order_evaluations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`service_order_evaluations` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`service_order_evaluations` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `service_order_evaluation_name` VARCHAR(50) NOT NULL ,
  `service_order_evaluation_description` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`service_orders`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`service_orders` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`service_orders` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `enterprise_id` INT NOT NULL ,
  `entity_group_id` INT NOT NULL ,
  `entity_id` INT NOT NULL ,
  `service_order_priority_id` INT NOT NULL ,
  `service_order_type_id` INT NOT NULL ,
  `service_order_warranty` TINYINT(1)  NOT NULL ,
  `service_order_warranty_description` VARCHAR(500) NULL ,
  `service_order_opening_date` DATETIME NOT NULL ,
  `service_order_opening_description` VARCHAR(500) NOT NULL ,
  `service_order_opening_observation` VARCHAR(500) NULL ,
  `service_order_opening_user_id` INT NOT NULL ,
  `entity_technician_id` INT NULL ,
  `service_order_routing_date` DATETIME NULL ,
  `service_order_routing_user_id` INT NULL ,
  `service_order_evaluation_date` DATETIME NULL ,
  `service_order_evaluation_id` INT NULL ,
  `service_order_evaluation_entity_group_id` INT NULL ,
  `service_order_evaluation_entity_id` INT NULL ,
  `service_order_evaluation_description` VARCHAR(500) NULL ,
  `service_order_evaluation_user_id` INT NULL ,
  `service_order_cancellation_date` DATETIME NULL ,
  `service_order_cancellation_description` VARCHAR(500) NULL ,
  `service_order_cancellation_user_id` INT NULL ,
  `service_order_close_date` DATETIME NULL ,
  `service_order_close_description` VARCHAR(500) NULL ,
  `service_order_close_user_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_service_orders_entities` (`entity_id` ASC) ,
  INDEX `fk_service_orders_entity_technicians` (`entity_technician_id` ASC) ,
  INDEX `fk_service_orders_service_order_types` (`service_order_type_id` ASC) ,
  INDEX `fk_service_orders_enterprises` (`enterprise_id` ASC) ,
  INDEX `fk_service_orders_users_opening` (`service_order_opening_user_id` ASC) ,
  INDEX `fk_service_orders_users_routing` (`service_order_routing_user_id` ASC) ,
  INDEX `fk_service_orders_users_cancellation` (`service_order_cancellation_user_id` ASC) ,
  INDEX `fk_service_orders_users_close` (`service_order_close_user_id` ASC) ,
  INDEX `fk_service_orders_entity_groups` (`entity_group_id` ASC) ,
  INDEX `fk_service_orders_service_order_priorities` (`service_order_priority_id` ASC) ,
  INDEX `fk_service_orders_service_order_evaluations` (`service_order_evaluation_id` ASC) ,
  INDEX `fk_service_orders_entities_evaluation` (`service_order_evaluation_entity_id` ASC) ,
  INDEX `fk_service_orders_users_evaluation` (`service_order_evaluation_user_id` ASC) ,
  INDEX `fk_service_orders_entity_groups_evaluation` (`service_order_evaluation_entity_group_id` ASC) ,
  CONSTRAINT `fk_service_orders_entities`
    FOREIGN KEY (`entity_id` )
    REFERENCES `tuna`.`entities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_orders_entity_technicians`
    FOREIGN KEY (`entity_technician_id` )
    REFERENCES `tuna`.`entity_technicians` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_orders_service_order_types`
    FOREIGN KEY (`service_order_type_id` )
    REFERENCES `tuna`.`service_order_types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_orders_enterprises`
    FOREIGN KEY (`enterprise_id` )
    REFERENCES `tuna`.`enterprises` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_orders_users_opening`
    FOREIGN KEY (`service_order_opening_user_id` )
    REFERENCES `tuna`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_orders_users_routing`
    FOREIGN KEY (`service_order_routing_user_id` )
    REFERENCES `tuna`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_orders_users_cancellation`
    FOREIGN KEY (`service_order_cancellation_user_id` )
    REFERENCES `tuna`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_orders_users_close`
    FOREIGN KEY (`service_order_close_user_id` )
    REFERENCES `tuna`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_orders_entity_groups`
    FOREIGN KEY (`entity_group_id` )
    REFERENCES `tuna`.`entity_groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_orders_service_order_priorities`
    FOREIGN KEY (`service_order_priority_id` )
    REFERENCES `tuna`.`service_order_priorities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_orders_service_order_evaluations`
    FOREIGN KEY (`service_order_evaluation_id` )
    REFERENCES `tuna`.`service_order_evaluations` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_orders_entities_evaluation`
    FOREIGN KEY (`service_order_evaluation_entity_id` )
    REFERENCES `tuna`.`entities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_orders_users_evaluation`
    FOREIGN KEY (`service_order_evaluation_user_id` )
    REFERENCES `tuna`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_orders_entity_groups_evaluation`
    FOREIGN KEY (`service_order_evaluation_entity_group_id` )
    REFERENCES `tuna`.`entity_groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`product_types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`product_types` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`product_types` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `parent_id` INT NULL ,
  `product_type_name` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_product_types_product_types` (`parent_id` ASC) ,
  CONSTRAINT `fk_product_types_product_types`
    FOREIGN KEY (`parent_id` )
    REFERENCES `tuna`.`product_types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`product_brands`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`product_brands` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`product_brands` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `product_brand_name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`products` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `product_type_id` INT NOT NULL ,
  `product_brand_id` INT NOT NULL ,
  `product_name` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_products_product_types` (`product_type_id` ASC) ,
  INDEX `fk_products_product_brands` (`product_brand_id` ASC) ,
  CONSTRAINT `fk_products_product_types`
    FOREIGN KEY (`product_type_id` )
    REFERENCES `tuna`.`product_types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_products_product_brands`
    FOREIGN KEY (`product_brand_id` )
    REFERENCES `tuna`.`product_brands` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`service_order_step_types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`service_order_step_types` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`service_order_step_types` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `parent_id` INT NULL ,
  `service_order_step_type_name` VARCHAR(50) NOT NULL ,
  `service_order_step_type_description` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_service_order_step_types_service_order_step_types` (`parent_id` ASC) ,
  CONSTRAINT `fk_service_order_step_types_service_order_step_types`
    FOREIGN KEY (`parent_id` )
    REFERENCES `tuna`.`service_order_step_types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`service_order_steps`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`service_order_steps` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`service_order_steps` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `service_order_id` INT NOT NULL ,
  `entity_technician_id` INT NOT NULL ,
  `service_order_step_type_id` INT NOT NULL ,
  `service_order_step_opening_date` DATETIME NOT NULL ,
  `service_order_step_opening_description` VARCHAR(500) NOT NULL ,
  `service_order_step_opening_user_id` INT NOT NULL ,
  `service_order_step_close_date` DATETIME NULL ,
  `service_order_step_close_description` VARCHAR(500) NULL ,
  `service_order_step_close_user_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_service_order_steps_service_orders` (`service_order_id` ASC) ,
  INDEX `fk_service_order_steps_entity_technicians` (`entity_technician_id` ASC) ,
  INDEX `fk_service_order_steps_service_order_step_types` (`service_order_step_type_id` ASC) ,
  INDEX `fk_service_order_steps_users_opening` (`service_order_step_opening_user_id` ASC) ,
  INDEX `fk_service_order_steps_users_close` (`service_order_step_close_user_id` ASC) ,
  CONSTRAINT `fk_service_order_steps_service_orders`
    FOREIGN KEY (`service_order_id` )
    REFERENCES `tuna`.`service_orders` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_order_steps_entity_technicians`
    FOREIGN KEY (`entity_technician_id` )
    REFERENCES `tuna`.`entity_technicians` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_order_steps_service_order_step_types`
    FOREIGN KEY (`service_order_step_type_id` )
    REFERENCES `tuna`.`service_order_step_types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_order_steps_users_opening`
    FOREIGN KEY (`service_order_step_opening_user_id` )
    REFERENCES `tuna`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_order_steps_users_close`
    FOREIGN KEY (`service_order_step_close_user_id` )
    REFERENCES `tuna`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`stocks`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`stocks` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`stocks` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `stock_name` VARCHAR(50) NOT NULL ,
  `stock_description` VARCHAR(200) NOT NULL ,
  `stock_enabled` TINYINT(1)  NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`measure_units`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`measure_units` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`measure_units` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `measure_unit_name` VARCHAR(50) NOT NULL ,
  `measure_unit_abbreviation` VARCHAR(10) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `measure_unit_abbreviation_UNIQUE` (`measure_unit_abbreviation` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`stock_moviment_operations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`stock_moviment_operations` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`stock_moviment_operations` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `stock_moviment_operation_name` VARCHAR(50) NOT NULL ,
  `stock_moviment_operation_description` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`stock_moviment_types`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`stock_moviment_types` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`stock_moviment_types` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `stock_moviment_operation_id` INT NOT NULL ,
  `stock_moviment_type_name` VARCHAR(50) NOT NULL ,
  `stock_moviment_type_description` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_stock_moviment_types_stock_moviment_operations` (`stock_moviment_operation_id` ASC) ,
  CONSTRAINT `fk_stock_moviment_types_stock_moviment_operations`
    FOREIGN KEY (`stock_moviment_operation_id` )
    REFERENCES `tuna`.`stock_moviment_operations` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`stock_moviments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`stock_moviments` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`stock_moviments` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `enterprise_id` INT NOT NULL ,
  `stock_id` INT NOT NULL ,
  `stock_moviment_type_id` INT NOT NULL ,
  `user_id` INT NOT NULL ,
  `stock_moviment_date` DATETIME NOT NULL ,
  `stock_moviment_description` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_stock_moviments_stocks` (`stock_id` ASC) ,
  INDEX `fk_stock_moviments_stock_moviment_types` (`stock_moviment_type_id` ASC) ,
  INDEX `fk_stock_moviments_users` (`user_id` ASC) ,
  INDEX `fk_stock_moviments_enterprises` (`enterprise_id` ASC) ,
  CONSTRAINT `fk_stock_moviments_stocks`
    FOREIGN KEY (`stock_id` )
    REFERENCES `tuna`.`stocks` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_stock_moviments_stock_moviment_types`
    FOREIGN KEY (`stock_moviment_type_id` )
    REFERENCES `tuna`.`stock_moviment_types` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_stock_moviments_users`
    FOREIGN KEY (`user_id` )
    REFERENCES `tuna`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_stock_moviments_enterprises`
    FOREIGN KEY (`enterprise_id` )
    REFERENCES `tuna`.`enterprises` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`stock_moviment_items`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`stock_moviment_items` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`stock_moviment_items` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `stock_moviment_id` INT NOT NULL ,
  `product_id` INT NOT NULL ,
  `measure_unit_id` INT NOT NULL ,
  `stock_moviment_item_amount` DECIMAL(18,8) NOT NULL ,
  `stock_moviment_item_serial_number` VARCHAR(50) NULL ,
  `stock_moviment_item_description` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_stock_moviment_items_products` (`product_id` ASC) ,
  INDEX `fk_stock_moviment_items_measure_units` (`measure_unit_id` ASC) ,
  INDEX `fk_stock_moviment_items_stock_moviments` (`stock_moviment_id` ASC) ,
  CONSTRAINT `fk_stock_moviment_items_products`
    FOREIGN KEY (`product_id` )
    REFERENCES `tuna`.`products` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_stock_moviment_items_measure_units`
    FOREIGN KEY (`measure_unit_id` )
    REFERENCES `tuna`.`measure_units` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_stock_moviment_items_stock_moviments`
    FOREIGN KEY (`stock_moviment_id` )
    REFERENCES `tuna`.`stock_moviments` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`enterprises_stocks`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`enterprises_stocks` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`enterprises_stocks` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `enterprise_id` INT NOT NULL ,
  `stock_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_enterprises_stocks_stocks` (`stock_id` ASC) ,
  INDEX `fk_enterprises_stocks_enterprises` (`enterprise_id` ASC) ,
  UNIQUE INDEX `enterprise_id_stock_id_UNIQUE` (`stock_id` ASC, `enterprise_id` ASC) ,
  CONSTRAINT `fk_enterprises_stocks_stocks`
    FOREIGN KEY (`stock_id` )
    REFERENCES `tuna`.`stocks` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_enterprises_stocks_enterprises`
    FOREIGN KEY (`enterprise_id` )
    REFERENCES `tuna`.`enterprises` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`entities_entity_groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`entities_entity_groups` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`entities_entity_groups` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `entity_id` INT NOT NULL ,
  `entity_group_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_entities_entity_groups_entities` (`entity_id` ASC) ,
  INDEX `fk_entities_entity_groups_entity_groups` (`entity_group_id` ASC) ,
  UNIQUE INDEX `entity_id_entity_group_id_UNIQUE` (`entity_id` ASC, `entity_group_id` ASC) ,
  CONSTRAINT `fk_entities_entity_groups_entities`
    FOREIGN KEY (`entity_id` )
    REFERENCES `tuna`.`entities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_entities_entity_groups_entity_groups`
    FOREIGN KEY (`entity_group_id` )
    REFERENCES `tuna`.`entity_groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`systems`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`systems` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`systems` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `system_name` VARCHAR(50) NOT NULL ,
  `system_description` VARCHAR(100) NOT NULL ,
  `system_enabled` TINYINT(1)  NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `system_name_UNIQUE` (`system_name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`system_versions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`system_versions` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`system_versions` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `system_id` INT NOT NULL ,
  `system_version_number` VARCHAR(10) NOT NULL ,
  `system_version_name` VARCHAR(50) NULL ,
  `system_version_description` VARCHAR(100) NULL ,
  `system_version_enabled` TINYINT(1)  NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_system_versions_systems` (`system_id` ASC) ,
  CONSTRAINT `fk_system_versions_systems`
    FOREIGN KEY (`system_id` )
    REFERENCES `tuna`.`systems` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`system_version_definitions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`system_version_definitions` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`system_version_definitions` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `system_version_id` INT NOT NULL ,
  `enterprise_id` INT NOT NULL ,
  `system_definition_input_stock_moviment_operation_id` INT NULL ,
  `system_definition_output_stock_moviment_operation_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_system_version_definitions_enterprises` (`enterprise_id` ASC) ,
  INDEX `fk_system_version_definitions_stock_moviment_operations_input` (`system_definition_input_stock_moviment_operation_id` ASC) ,
  INDEX `fk_system_version_definitions_stock_moviment_operations_output` (`system_definition_output_stock_moviment_operation_id` ASC) ,
  UNIQUE INDEX `system_id_enterprise_id_UNIQUE` (`enterprise_id` ASC, `system_version_id` ASC) ,
  INDEX `fk_system_version_definitions_system_versions` (`system_version_id` ASC) ,
  CONSTRAINT `fk_system_version_definitions_enterprises`
    FOREIGN KEY (`enterprise_id` )
    REFERENCES `tuna`.`enterprises` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_system_version_definitions_stock_moviment_operations_input`
    FOREIGN KEY (`system_definition_input_stock_moviment_operation_id` )
    REFERENCES `tuna`.`stock_moviment_operations` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_system_version_definitions_stock_moviment_operations_output`
    FOREIGN KEY (`system_definition_output_stock_moviment_operation_id` )
    REFERENCES `tuna`.`stock_moviment_operations` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_system_version_definitions_system_versions`
    FOREIGN KEY (`system_version_id` )
    REFERENCES `tuna`.`system_versions` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`service_order_products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`service_order_products` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`service_order_products` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `service_order_id` INT(11) NOT NULL ,
  `product_id` INT(11) NOT NULL ,
  `measure_unit_id` INT(11) NOT NULL ,
  `service_order_product_amount` DECIMAL(18,8) NOT NULL ,
  `service_order_product_serial_number` VARCHAR(50) NULL DEFAULT NULL ,
  `service_order_product_description` VARCHAR(100) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_service_order_products_products` (`product_id` ASC) ,
  INDEX `fk_service_order_products_measure_units` (`measure_unit_id` ASC) ,
  INDEX `fk_service_order_products_service_orders` (`service_order_id` ASC) ,
  CONSTRAINT `fk_service_order_products_service_orders`
    FOREIGN KEY (`service_order_id` )
    REFERENCES `tuna`.`service_orders` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_order_products_products`
    FOREIGN KEY (`product_id` )
    REFERENCES `tuna`.`products` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_order_products_measure_units`
    FOREIGN KEY (`measure_unit_id` )
    REFERENCES `tuna`.`measure_units` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `tuna`.`system_versions_enterprises`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`system_versions_enterprises` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`system_versions_enterprises` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `system_version_id` INT(11) NOT NULL ,
  `enterprise_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `system_id_enterprise_id_UNIQUE` (`enterprise_id` ASC, `system_version_id` ASC) ,
  INDEX `fk_system_versions_enterprises_enterprises` (`enterprise_id` ASC) ,
  INDEX `fk_system_versions_enterprises_system_versions` (`system_version_id` ASC) ,
  CONSTRAINT `fk_system_versions_enterprises_enterprises`
    FOREIGN KEY (`enterprise_id` )
    REFERENCES `tuna`.`enterprises` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_system_versions_enterprises_system_versions`
    FOREIGN KEY (`system_version_id` )
    REFERENCES `tuna`.`system_versions` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `tuna`.`entity_products`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`entity_products` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`entity_products` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `entity_id` INT NOT NULL ,
  `product_id` INT NOT NULL ,
  `measure_unit_id` INT NOT NULL ,
  `entity_product_amount` DECIMAL(18,8) NOT NULL ,
  `entity_product_serial_number` VARCHAR(50) NULL ,
  `entity_product_description` VARCHAR(100) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_entity_products_products` (`product_id` ASC) ,
  INDEX `fk_entity_products_measure_units` (`measure_unit_id` ASC) ,
  INDEX `fk_entity_products_entities` (`entity_id` ASC) ,
  CONSTRAINT `fk_entity_products_entities`
    FOREIGN KEY (`entity_id` )
    REFERENCES `tuna`.`entities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_entity_products_products`
    FOREIGN KEY (`product_id` )
    REFERENCES `tuna`.`products` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_entity_products_measure_units`
    FOREIGN KEY (`measure_unit_id` )
    REFERENCES `tuna`.`measure_units` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`service_orders_stock_moviments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`service_orders_stock_moviments` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`service_orders_stock_moviments` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `service_order_id` INT(11) NOT NULL ,
  `stock_moviment_id` INT(11) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `stock_moviment_id_UNIQUE` (`stock_moviment_id` ASC) ,
  INDEX `fk_service_orders_stock_moviments_stock_moviments` (`stock_moviment_id` ASC) ,
  INDEX `fk_service_orders_stock_moviments_service_orders` (`service_order_id` ASC) ,
  CONSTRAINT `fk_service_orders_stock_moviments_service_orders`
    FOREIGN KEY (`service_order_id` )
    REFERENCES `tuna`.`service_orders` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_service_orders_stock_moviments_stock_moviments`
    FOREIGN KEY (`stock_moviment_id` )
    REFERENCES `tuna`.`stock_moviments` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `tuna`.`entity_contacts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`entity_contacts` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`entity_contacts` (
  `id` INT NOT NULL ,
  `entity_id` INT NOT NULL ,
  `entity_contact_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_entity_contacts_entities1` (`entity_id` ASC) ,
  INDEX `fk_entity_contacts_entities2` (`entity_contact_id` ASC) ,
  CONSTRAINT `fk_entity_contacts_entities1`
    FOREIGN KEY (`entity_id` )
    REFERENCES `tuna`.`entities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_entity_contacts_entities2`
    FOREIGN KEY (`entity_contact_id` )
    REFERENCES `tuna`.`entities` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`acos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`acos` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`acos` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `parent_id` INT(10) NULL DEFAULT NULL ,
  `model` VARCHAR(255) NULL DEFAULT NULL ,
  `foreign_key` INT(10) NULL DEFAULT NULL ,
  `alias` VARCHAR(255) NULL DEFAULT NULL ,
  `lft` INT(10) NULL DEFAULT NULL ,
  `rght` INT(10) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `tuna`.`aros_acos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`aros_acos` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`aros_acos` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `aro_id` INT(10) NOT NULL ,
  `aco_id` INT(10) NOT NULL ,
  `_create` VARCHAR(2) NOT NULL DEFAULT '0' ,
  `_read` VARCHAR(2) NOT NULL DEFAULT '0' ,
  `_update` VARCHAR(2) NOT NULL DEFAULT '0' ,
  `_delete` VARCHAR(2) NOT NULL DEFAULT '0' ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `ARO_ACO_KEY` (`aro_id` ASC, `aco_id` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `tuna`.`aros`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`aros` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`aros` (
  `id` INT(10) NOT NULL AUTO_INCREMENT ,
  `parent_id` INT(10) NULL DEFAULT NULL ,
  `model` VARCHAR(255) NULL DEFAULT NULL ,
  `foreign_key` INT(10) NULL DEFAULT NULL ,
  `alias` VARCHAR(255) NULL DEFAULT NULL ,
  `lft` INT(10) NULL DEFAULT NULL ,
  `rght` INT(10) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `tuna`.`groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`groups` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`groups` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `group_name` VARCHAR(50) NOT NULL ,
  `group_description` VARCHAR(200) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `group_name_UNIQUE` (`group_name` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tuna`.`users_groups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tuna`.`users_groups` ;

CREATE  TABLE IF NOT EXISTS `tuna`.`users_groups` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `group_id` INT NOT NULL ,
  INDEX `fk_users_groups_groups` (`group_id` ASC) ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `user_id_group_id_UNIQUE` (`user_id` ASC, `group_id` ASC) ,
  INDEX `fk_users_groups_users` (`user_id` ASC) ,
  CONSTRAINT `fk_users_groups_users`
    FOREIGN KEY (`user_id` )
    REFERENCES `tuna`.`users` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_groups`
    FOREIGN KEY (`group_id` )
    REFERENCES `tuna`.`groups` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- function fn_entity_group_structure
-- -----------------------------------------------------

USE `tuna`;
DROP function IF EXISTS `tuna`.`fn_entity_group_structure`;

DELIMITER $$
USE `tuna`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `fn_entity_group_structure`(p_id INT) RETURNS varchar(500) CHARSET latin1
    DETERMINISTIC
BEGIN
  DECLARE v_parent_id INT;
  DECLARE v_name VARCHAR(50);
  DECLARE v_structure VARCHAR(500);
  
  SELECT
    parent_id,
    entity_group_name
  INTO
    v_parent_id,
    v_structure
  FROM
    entity_groups
  WHERE
    id = p_id;
    
  WHILE (!ISNULL(v_parent_id)) DO
    SELECT
      parent_id,
      entity_group_name
    INTO
      v_parent_id,
      v_name
    FROM
      entity_groups
    WHERE
      id = v_parent_id;
      
    SET v_structure = CONCAT(v_name, ' >> ', v_structure);
  END WHILE;
  
  RETURN v_structure;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- function fn_entity_type_structure
-- -----------------------------------------------------

USE `tuna`;
DROP function IF EXISTS `tuna`.`fn_entity_type_structure`;

DELIMITER $$
USE `tuna`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `fn_entity_type_structure`(p_id INT) RETURNS varchar(500) CHARSET latin1
    DETERMINISTIC
BEGIN
  DECLARE v_parent_id INT;
  DECLARE v_name VARCHAR(50);
  DECLARE v_structure VARCHAR(500);
  
  SELECT
    parent_id,
    entity_type_name
  INTO
    v_parent_id,
    v_structure
  FROM
    entity_types
  WHERE
    id = p_id;
    
  WHILE (!ISNULL(v_parent_id)) DO
    SELECT
      parent_id,
      entity_type_name
    INTO
      v_parent_id,
      v_name
    FROM
      entity_types
    WHERE
      id = v_parent_id;
      
    SET v_structure = CONCAT(v_name, ' >> ', v_structure);
  END WHILE;
  
  RETURN v_structure;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- function fn_product_type_structure
-- -----------------------------------------------------

USE `tuna`;
DROP function IF EXISTS `tuna`.`fn_product_type_structure`;

DELIMITER $$
USE `tuna`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `fn_product_type_structure`(p_id INT) RETURNS varchar(500) CHARSET latin1
    DETERMINISTIC
BEGIN
  DECLARE v_parent_id INT;
  DECLARE v_name VARCHAR(50);
  DECLARE v_structure VARCHAR(500);
  
  SELECT
    parent_id,
    product_type_name
  INTO
    v_parent_id,
    v_structure
  FROM
    product_types
  WHERE
    id = p_id;
    
  WHILE (!ISNULL(v_parent_id)) DO
    SELECT
      parent_id,
      product_type_name
    INTO
      v_parent_id,
      v_name
    FROM
      product_types
    WHERE
      id = v_parent_id;
      
    SET v_structure = CONCAT(v_name, ' >> ', v_structure);
  END WHILE;
  
  RETURN v_structure;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- function fn_service_order_step_type_structure
-- -----------------------------------------------------

USE `tuna`;
DROP function IF EXISTS `tuna`.`fn_service_order_step_type_structure`;

DELIMITER $$
USE `tuna`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `fn_service_order_step_type_structure`(p_id INT) RETURNS varchar(500) CHARSET latin1
    DETERMINISTIC
BEGIN
  DECLARE v_parent_id INT;
  DECLARE v_name VARCHAR(50);
  DECLARE v_structure VARCHAR(500);
  
  SELECT
    parent_id,
    service_order_step_type_name
  INTO
    v_parent_id,
    v_structure
  FROM
    service_order_step_types
  WHERE
    id = p_id;
    
  WHILE (!ISNULL(v_parent_id)) DO
    SELECT
      parent_id,
      service_order_step_type_name
    INTO
      v_parent_id,
      v_name
    FROM
      service_order_step_types
    WHERE
      id = v_parent_id;
      
    SET v_structure = CONCAT(v_name, ' >> ', v_structure);
  END WHILE;
  
  RETURN v_structure;
END$$

DELIMITER ;

-- -----------------------------------------------------
-- function fn_service_order_type_structure
-- -----------------------------------------------------

USE `tuna`;
DROP function IF EXISTS `tuna`.`fn_service_order_type_structure`;

DELIMITER $$
USE `tuna`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `fn_service_order_type_structure`(p_id INT) RETURNS varchar(500) CHARSET latin1
    DETERMINISTIC
BEGIN
  DECLARE v_parent_id INT;
  DECLARE v_name VARCHAR(50);
  DECLARE v_structure VARCHAR(500);
  
  SELECT
    parent_id,
    service_order_type_name
  INTO
    v_parent_id,
    v_structure
  FROM
    service_order_types
  WHERE
    id = p_id;
    
  WHILE (!ISNULL(v_parent_id)) DO
    SELECT
      parent_id,
      service_order_type_name
    INTO
      v_parent_id,
      v_name
    FROM
      service_order_types
    WHERE
      id = v_parent_id;
      
    SET v_structure = CONCAT(v_name, ' >> ', v_structure);
  END WHILE;
  
  RETURN v_structure;
END$$

DELIMITER ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
