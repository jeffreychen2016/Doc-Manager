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
