--How the user will leave feedback (comments, likes, dislikes) about the book?
insert into comments select request->text from dual 
where (select * from comments where book_id = request->id);
