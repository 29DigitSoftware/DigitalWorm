-- How can a publisher see the sales volume of their book?
select count(user_id) from book_user where book_id = request->id; 
