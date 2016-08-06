Sales Chain Management
===================


### Sales Chain Management  

- **Basic Requirement:** a luxurious cosmetics company wants to create hierarchical sales system for direct online sales without agents
- **Membership registration:** some key user information.  Only registered member can use the site.  There are four levels of members:  Platinum, Gold, Silver, and Bronze.  Membership has to be approved manually
- **Shopping cart:**  online users are able to search different products within different categories.  Different level of member see different prices.


Diagram
------------

![Diagram](https://raw.githubusercontent.com/mustafawm/saleschain/master/SalesChainManagement.png)


## Demo:
https://saleschainmng.herokuapp.com/
> Users must be approved to be able to perform searching/purchasing actions.
 


## Getting Started:
 **`.env`:**
 
APP_KEY=key (generate one `php artisan key:generate` )
DB_HOST=_DB-IP-Address_
DB_PORT=_PORT#_
DB_DATABASE=_DB-NAME_
DB_USERNAME=_DB-USER_
DB_PASSWORD=_DB-PASSWORD_

----
## System design
**Models:**

- **Category** 
- **Item** 
- **Order**
- **User**  


**Controllers:**

- **AdminController** 
- **CategoriesController** 
- **HomeController**
- **OrdersController** 

**Middlewares:**

- **Auth** 
- **Approved** 
- **Admin**

----

> **NOTICE:** no charging is implemented yet. 


## LICENSE
**GPL**