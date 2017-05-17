use Project-Sierra;
Insert into Groups(Groupname) values ('Dozenten');
Insert into Groups(Groupname) values ('IFZ-626-016');

Insert into User(`name`, firstname, `password`, email, is_admin, fk_id_group) values ('Walker', 'Paul', 'fastnfurious', 'test@test.com', 0, 1);
Insert into User(`name`, firstname, `password`, email, is_admin, fk_id_group) values ('Gutmann', 'Heinrich', 'justanypw', 'test@test.com', 0, 2);
Insert into User(`name`, firstname, `password`, email, is_admin, fk_id_group) values ('sierra', 'sierra', 'sierra', 'sierra@sierra.com', 1, 1);

Insert into Messages(`message_text`, fk_id_user_from, fk_id_user_to) values ('Hello World', 1, 2 );
Insert into Modul(modulname, modulnummer) values ('Software mit agilen Methoden', '426' );
Insert into User_Modul(lb, zp1, zp2, mj, percentage_lb, percentage_zp1, percentage_zp2, percentage_mj, fk_id_user, fk_id_modul) values (5.3, 3.5, 4.4, 6.0 , 50, 15, 15, 20, 2, 1);
