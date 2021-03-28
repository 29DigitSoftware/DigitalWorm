--How the user pays for the service and at what rate (for a month, for six months, for a year)?
update users set tarif_id = ? WHERE id in (select book_id from book_user where user_id in (select id from users)) 
