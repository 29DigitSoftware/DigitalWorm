insert into comments select request->text from dual 
where (select * from comments where book_id = request->id);
