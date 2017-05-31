USE `Project-Sierra`;
INSERT INTO `group` (`group_name`) VALUES ('Dozenten');
INSERT INTO `group` (`group_name`) VALUES ('IFZ-626-016');

INSERT INTO `user` (`last_name`, `first_name`, `email`, `is_admin`, `fk_group_id`) VALUES ('Walker', 'Paul', 'test@test.com', 0, 1);
INSERT INTO `user` (`last_name`, `first_name`, `email`, `is_admin`, `fk_group_id`) VALUES ('Gutmann', 'Heinrich', 'test@test.com', 0, 2);
INSERT INTO `user` (`user_id`, `last_name`, `first_name`, `password`, `email`, `is_admin`, `fk_group_id`) VALUES
  (5, 'Doe', 'John', '$2a$14$XUulUYkomhL0eu.ERfxWTeFBLUGxRxZNmh2mX4t09/byBAkvAQ5hi', 'john.doe@example.com', 0, 2);


INSERT INTO `modul` (`modul_name`, `modul_number`) VALUES ('Software mit agilen Methoden', '426');
INSERT INTO `modul` (`modul_name`, `modul_number`) VALUES ('Steuerungsaufgaben bearbeiten', '121');

INSERT INTO `user_modul` (`lb`, `zp1`, `zp2`, `mj`, `percentage_lb`, `percentage_zp1`, `percentage_zp2`, `percentage_mj`, `fk_user_id`, `fk_modul_id`) VALUES (5.3, 3.5, 4.4, 6.0 , 50, 15, 15, 20, 2, 1);
INSERT INTO `user_modul` (`lb`, `zp1`, `zp2`, `mj`, `percentage_lb`, `percentage_zp1`, `percentage_zp2`, `percentage_mj`, `fk_user_id`, `fk_modul_id`) VALUES (3.9, 5.2, 4.2, 4.1 , 25, 25, 45, 5, 5, 1);
INSERT INTO `user_modul` (`lb`, `zp1`, `zp2`, `mj`, `percentage_lb`, `percentage_zp1`, `percentage_zp2`, `percentage_mj`, `fk_user_id`, `fk_modul_id`) VALUES (2.9, 5.6, 4.3, 5.5 , 30, 20, 30, 20, 5, 2);

INSERT INTO `message` (`message_text`, `fk_user_id_from`, `fk_user_id_to`) values ('Hello World', 1, 2);

