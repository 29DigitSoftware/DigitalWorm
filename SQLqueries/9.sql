select * from books where id in (select book_id from author_book where author_id =request->id)
select * from books where id in (select book_id from book_section where section_id = request->id)
SELECT * FROM books  where title like '%request->title%' or description like '%request->description%'
SELECT * FROM books  where title like '%request->title%' or description like '%request->description%' and where id in (select book_id from book_user where user_id in (select id from users)) 
