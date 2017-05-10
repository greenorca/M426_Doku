use project-sierra;
Insert into groups(Groupname) values ('Dozenten');
Insert into groups(Groupname) values ('IFZ-626-016');

Insert into user(`name`, firstname, `password`, email, fk_id_group) values ('Walker', 'Paul', 'fastnfurious', 1);
Insert into user(`name`, firstname, `password`, email, fk_id_group) values ('Gutmann', 'Heinrich', 'justanypw', 2);
Insert into user(`name`, firstname, `password`, email, fk_id_group) values ('sierra', 'sierra', 'sierra', 1);

Insert into messages(`message_text`, fk_id_user_from, fk_id_user_to) values ('Hello World', 1, 2 );
Insert into modul(modulname, modulnummer) values ('Software mit agilen Methoden', '426' );
Insert into user_modul(lb, zp1, zp2, mj, fk_id_user, fk_id_modul) values (5.3, 3.5, 4.4, 6.0 , 2, 1);
