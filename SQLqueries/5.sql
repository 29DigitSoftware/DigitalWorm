select * from books where id in (select book_id from book_section where section_id in select section_id from offers where level = (select progress from test_user))
