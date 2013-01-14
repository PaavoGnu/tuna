SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';


DELIMITER $$
USE `tuna`$$
CREATE DEFINER=`root`@`localhost` FUNCTION `fn_service_order_step_count`(p_service_order_id INT, p_service_order_step_type_id INT) RETURNS int(11)
    DETERMINISTIC
BEGIN
  DECLARE v_count INT;
  
  SELECT
    COUNT(*)
  INTO
    v_count
  FROM
    service_order_steps
  WHERE
    service_order_id = p_service_order_id and
    service_order_step_type_id = p_service_order_step_type_id;
      
  RETURN v_count;
END$$

DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
