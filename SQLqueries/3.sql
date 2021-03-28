--How the publisher can add and update data about authors?
INSERT INTO authors(name,surname,title,img) VALUES (value1, value2, value3, value4);
UPDATE authors SET name = new-value1, surname = new-value2, title = new-value3, img = new-value4
WHERE id = author_id; 
--author_id = request -> id
