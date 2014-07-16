CMS (Complaint Management System)
===

This is the repository for reporting bugs and for development of the CMS Framework. 


### Installing at a local server:


> 1. Copy all the files to the root directory of your local server.

> 2. Upload the cms.sql to MYSQL using PHPMYADMIN, default configuration is:
          Host: localhost
          User: root
          Pass: 
          Db: cms
> If these differ in your machine, then you will have to update the new details at:
          admin/core/control/all_connect.php
          admin/core/control/conn.php
          user/core/control/all_connect.php
          user/core/control/conn.php
