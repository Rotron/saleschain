Sales Chain System
===================


### Sales Chain Management  

- **Basic Requirement: ** a luxurious cosmetics company wants to create hierarchical sales system for direct online sales without agents
- **Membership registration:** some key user information.  Only registered member can use the site.  There are four levels of members:  Platinum, Gold, Silver, and Bronze.  Membership has to be approved manually
- **Shopping cart:**  online users are able to search different products within different categories.  Different level of member see different prices.


Diagram
------------

![Diagram](https://raw.githubusercontent.com/mustafawm/saleschain/master/SalesChainManagement.png)



# Solution included the following:

> **`.env`:**
> 
APP_KEY=key (generate one `php artisan key:generate` )

DB_HOST=_DB-IP-Address_

DB_PORT=_PORT#_

DB_DATABASE=_DB-NAME_

DB_USERNAME=_DB-USER_

DB_PASSWORD=_DB-PASSWORD_

----

 **Models:**

 - **Category** 
 - **Item** 
 - **Order**
 - **User**  

--------

 **Controllers:**

 - **AdminController** 
 - **CategoriesController** 
 - **HomeController**
 - **OrdersController** 

--------

 **MiddleWares:**

 - **Auth** 
 - **Approved** 
 - **Admin**

----

 > **Technologies used:**

> - Laravel (_obviously_).
> - MySQL
> - VueJS.
> - jQuery
> - Bootstrap (BootSwatch)


---
 > **NOTICE:**
 > No **charging** is implemented yet. 
