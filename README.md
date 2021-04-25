# Digital Worm

## [Project Final Video](https://youtu.be/eAm_wgLPEDg)

## [Project Final Report](https://github.com/29DigitSoftware/DigitalWorm/blob/main/ProjectFinalReport.pdf)

## [Phase 7](https://github.com/29DigitSoftware/DigitalWorm/tree/main/%20Phase%207)

## Phase 6

link to working website
https://digitalworm.prosthesis.kz/
- Register to read the book, manipulate library

Admin panel
http://digitalworm.prosthesis.kz/admins
you can use 
email: a@a.com, 
password: a

Epub reader was taken from 
https://github.com/FannieShi/vue-reader

## ER diagram
ER Diagram is known as Entity-Relationship Diagram, it is used to analyze to the structure of the Database. It shows relationships between entities and their attributes. An ER Model provides a means of communication.
- The system keeps track of the staff with a single point authentication system comprising login and password.
- Staff maintains the book catalog  Book title, price, category(novel, general, story), edition, author Number and details.
- A publisher has publisher Id, Year when the book was published, and name of the book.
- Readers are registered with their  email, name (first name, last name), communication address. 

## 15 Questions that the project answers:

1. How can a publisher see the sales volume of their book?

2. How can a publisher protect books from piracy?

3. How the publisher can add and update data about authors?

4. How can a publisher publish or update books by certain authors or authors?

5. How to offer interesting, necessary books to the user-offer based on the test results?

6. How to show,  create and edit tests?

7. How can a publisher group books by specific genres, topics, and display them in the catalog?

8. How will the user save books in their library and continue reading from where they left off?

9. How the user can search for books by author, by genre, by keywords in the catalog, in their library, and in a separate section?

10. How the user will leave feedback (comments, likes, dislikes) about the book?

11. How to provide the user with an alternative, convenient online reader?

12. How can the publisher introduce the user to the services and tariffs? 

13. How the user pays for the service and at what rate (for a month, for six months, for a year)?

14. How can the user get acquainted with the author and see his other works?

15. How the user register or log in? 

![alt text](https://github.com/29DigitSoftware/DigitalWorm/blob/main/29Digit-UseCase-UML.png.)

### [Tables structures](https://github.com/29DigitSoftware/DigitalWorm/blob/main/Database%20Schema)

### [Link to data(csv)](https://github.com/29DigitSoftware/DigitalWorm/tree/main/data(csv))

## Programming language and DBMS

Vue js, Laravel, and MySQL is a time-proven combination and these technologies are easy to start and use. That's enough for our project

## Web reader.

**Description**:
	Web application for secure access to book library by subscription. Alongside with decent user experience, the service provides additional functionality such as:
- online book reader.
- searching books by keywords, topics, authors.
- leaving comments, book review etc.

Book Recommendation System according to test results by different topics. 

For security reasons, web and native applications prevent users from accessing books and sharing it with others.

**Team**:
 - Bekzat Yernat.
 - Namazbayev Almas
 - Beisen Berik

## Web application in details:
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

7. **Authors**.

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
