## Why create this tool
This tool is created to manage internal documentations for our team. Originally, we used a shared drive to store our docs. However, as time passed, some of teammates lost the path, some of them created new dictories to store their own docs. We ended up having some many different versions of docs. With this tool, we can easily mantain our docs, and store them into a centeral place.

I also built a sql convetor in this tool which will automatically convert the sql code from one format to the other format which can be readed in our testing tool. It can also convert the sql code back to the format that our production environment can read. Before I created this, for a 150 lines of sql code, we had to spend at least 15 min to manually type in the table prefixes, additional joins and replaced variables. With this tool, it cut the time from 15 min to 5 seconds.

At last, I integrated the phpFAQ module to this tool to serve as our knowledge base. With it, we have a centeral place to share our knowledge for issues that we encountered.

## Run it in your local workstation
if you want to run this tool in your local workstation, please follow the following instruction:
- install XAMPP with Apache and MySQL server
- run the Apache and MySQL
- clone down this repository into root directory of XAMPP. Normally, C:\xampp\htdocs\
- load index.php in your web brower

## File Manager
1. Once you load index.php in your brower, you should Doc Manager section pops up in the center area of the page, and the tool utility side bar.

<img src="https://raw.githubusercontent.com/jeffreychen2016/Handy-Tools-For-My-Work/master/imgs/imgs_for_readme/1.png" alt="alt text" width="865" height="595">

2. You can add new a directory by clicking "Add" button in "Directories" box.

<img src="https://raw.githubusercontent.com/jeffreychen2016/Handy-Tools-For-My-Work/master/imgs/imgs_for_readme/2.png" alt="alt text" width="865" height="595">

3. Once a new directory is seccussfully added, you can see the directory name appears on top navbar, the file upload drop-down and the directories box.

<img src="https://raw.githubusercontent.com/jeffreychen2016/Handy-Tools-For-My-Work/master/imgs/imgs_for_readme/3.png" alt="alt text" width="865" height="595">

4. You can now select a file to upload to the directory you just added.

<img src="https://raw.githubusercontent.com/jeffreychen2016/Handy-Tools-For-My-Work/master/imgs/imgs_for_readme/4.png" alt="alt text" width="865" height="595">

5. After you seccessfully upload a file, the file will be availible for for view in the navbar, and availible for "Download", "Edit" (rename) and "Delete" from files box.

<img src="https://raw.githubusercontent.com/jeffreychen2016/Handy-Tools-For-My-Work/master/imgs/imgs_for_readme/5.png" alt="alt text" width="865" height="595">

6. You can view the file in browser if it is in PDF.

<img src="https://raw.githubusercontent.com/jeffreychen2016/Handy-Tools-For-My-Work/master/imgs/imgs_for_readme/6.png" alt="alt text" width="865" height="595">

## SQL Convertor
1. By clicking on "SQL Convertor" on the left sidebar, an empty textarea will open up. I pre-populate a piece of sql code for demo purpose. You can see the "FROM" and "JOIN" section does not come with base_ and tenant_id join.

<img src="https://raw.githubusercontent.com/jeffreychen2016/Handy-Tools-For-My-Work/master/imgs/imgs_for_readme/7.png" alt="alt text" width="865" height="595">

2. Click "Convert->SQLyog" button to append base_ to all table names, add tenant_id join on all each join and replace variables with whatever you input.

<img src="https://raw.githubusercontent.com/jeffreychen2016/Handy-Tools-For-My-Work/master/imgs/imgs_for_readme/8.png" alt="alt text" width="865" height="595">

3. Click "Reverse->ET" to remove all base_, additional tenant_id join and put variables back to the sql script.

<img src="https://raw.githubusercontent.com/jeffreychen2016/Handy-Tools-For-My-Work/master/imgs/imgs_for_readme/9.png" alt="alt text" width="865" height="595">

## php MyFAQ -- (For running this in your local, please read this doc:https://www.phpmyfaq.de/docs/2.9)

1. Click "F.A.Q" button on the left sidebar to open up FAQ page. You can search for issue keywords.

<img src="https://raw.githubusercontent.com/jeffreychen2016/Handy-Tools-For-My-Work/master/imgs/imgs_for_readme/10.png" alt="alt text" width="865" height="595">

2. Hit enter to pull up all issues that related to your search.

<img src="https://raw.githubusercontent.com/jeffreychen2016/Handy-Tools-For-My-Work/master/imgs/imgs_for_readme/11.png" alt="alt text" width="865" height="595">

3. Click on an issue you want to read in details.

<img src="https://raw.githubusercontent.com/jeffreychen2016/Handy-Tools-For-My-Work/master/imgs/imgs_for_readme/12.png" alt="alt text" width="865" height="595">

## Authors
[Jeffrey Chen](https://github.com/jeffreychen2016)

