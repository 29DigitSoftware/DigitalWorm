--How will the user save books in their library and continue reading from where they left off?
update book_user set book_progress = ? where book_id = ? and user_id= ?
