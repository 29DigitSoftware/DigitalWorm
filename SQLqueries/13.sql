update users set tarif_id = ? WHERE id in (select book_id from book_user where user_id in (select id from users)) 
