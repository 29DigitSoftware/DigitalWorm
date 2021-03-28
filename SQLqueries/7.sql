--How can a publisher group books by specific genres, topics, and display them in the catalog?
SELECT * FROM books where id in (select book_id from book_section where section_id = request->id) 
and where id in (select book_id from book_user where user_id in (select id from users)) 
