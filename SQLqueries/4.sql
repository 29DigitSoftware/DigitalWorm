--How can a publisher publish or update books by certain authors or authors?
insert into books select request->title, request->description, request->img, from dual 
where (select book_id from author_book where author_id = request->author_id);

update books set title = new-value1 
and description = new-value2
and img = new-value3
where (select book_id from author_book where author_id = request->author_id);
