# Digital Worm

### Web reader.

**Description**:
	Web application for secure access to book library by subscription. Alongside with decent user experience, the service provides additional functionality such as:
-online book reader.
-searching books by keywords, topics, authors.

Book Recommendation System according to test results by different topics. 

For security reasons, web and native applications prevent users from accessing books and sharing it with others.

**Team**:
 - Bekzat Yernat.
 - Namazbayev Almas
 - Beisen Berik

### Web application in details:
1. **Landing page**.

Contains information about description, functions, advantages and comparison of subscription plans, payment methods. Main goal is to sell users the service.

2. **Authorization**.

The user will be asked to sign in to get results of tests and access recommendations, read a demo version of the book. 

The one time (universal) authorization either from native application or web application should be discussed*. 

3. **User profile**.

The page contains information about users' subscription plan, bookshelf containing information about books in progress, test results and recommendations, search history.

4. **Main page**.

The main page contains book categories, genres, authors, tests, news and recommendations from publishers.

5. **Book categories**.

Page contains concise information about books grouped by the same genre or topic. Pagination.

6. **Information about book**.

Page contains full information about the book such as description, authors, statistics, users comments, annotations and based on subscription users can read either a demo or full version of the book. 

7.**Authors**.

Page contains concise information about authors and their work. Also searching by author's name, specialty or even book is possible.

8. **Information about the author**.

Page contains full information about the author and lists his books.

9. **Test**.

Test with different types of questions. According to the results of the test should be given a collection of recommended books for further reading.

10. **Online book reader**.

The online reader is based on an open source project from github. The reader accepts files in .epub format. The component decrypts encrypted files received from the server. Has enough functionality for comfort reading such as: 
- customizing workplace: fonts, background
- chapters
- bookmarking pages
- highlighting text

11. **Parsing, encrypting, decrypting system**.

The system that encrypts all text in an epub file and stores it in the database. The system also provides basic information about book description, authors and publisher.
