--How to offer interesting, necessary books to the user-offer based on the test results?
select * from books where id in (select book_id from book_section where section_id in select section_id from offers where level = (select progress from test_user))
