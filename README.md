## Credits:
1. Coding: Fork from [Final-automatics-attendance-system-with-opencv_html_webpage_and-python](https://github.com/harishkumawat2610/Final-automatics-attendance-system-with-opencv_html_webpage_and-python)
2. GUI Python tkinter:  
  2.1. Design App with [Figma](https://www.figma.com)  
  2.2. Convert figma to python tkinter by [Tkinter Designer](https://github.com/ParthJadhav/Tkinter-Designer/blob/master/docs/instructions.md#getting-started-2)  
3. Face detection and recognition by:  
  3.1. [opencv-contrib-python](https://pypi.org/project/opencv-contrib-python/)  
  3.2. [face_recognition](https://github.com/ageitgey/face_recognition)  
4. Web Front:   
  4.1. [Apache](https://httpd.apache.org/): Web Server   
  4.2. [php](https://www.php.net/): Scripting web development for searching and rendering queries  
  4.3. Database:    
    * [MySQL](https://www.mysql.com): Database  
    * [PyMySQL](https://pypi.org/project/PyMySQL/): Connection by Python  
5. Modify by [ricardofc](https://github.com/ricardofc/)

## Optional: Procedure to customize GUI
1. Create account figma  
2. Duplicate GUI design: [APP-RolAdmin-IES](https://www.figma.com/community/file/1052732489281648788)  
3. Modificate GUI  
4. Convert figma design to tkinter code by [Tkinter-Designer](https://github.com/ParthJadhav/Tkinter-Designer/blob/master/docs/instructions.md#Using-Tkinter-Designer)  
5. Download code gui.py, by example to /tmp/coding  
6. Download made in the folder /tmp/coding/build/  
7. Coding /tmp/coding/build/gui.py (In this app Face-Recognition-APP-IES/gui.py)

## Coding gui.py
1. Create python virtual environment:  
  `$ python3 -m venv Face-Recognition-APP-IES`  
2. Activate virtual environment:  
  `$ cd Face-Recognition-APP-IES && source bin/activate`  
  NOTE - Deactivate virtual environment: `(Face-Recognition-APP-IES) Face-Recognition-APP-IES$ deactivate`  
3. Install requeriments:  
  `$ pip3 install -r requeriments.txt`  

## Database:
1. Verify MySQL is started:  
  `$ nc -vz localhost 3306`  

2. Verify(create) access user with grants on MySQL:  
  `$ mysql -uroot -p`  

3. Create database:  
  `$ cd create-database`  
  `$ python3 Database.py #Modify parameters before executing. This parameters will be configured in gui.py for connectivity.`  
  `$ python3 table.py #Modify parameters before executing.`     

## Web  
1. Modify parameters in web/database.php file before copying the web folder  
2. Copy the web folder to the Web Server DocumentRoot  
3. Query APP visible in Web Server, for example: http://IP:port/web/index.php  

## Execute:  
  `$ python3 gui.py`  
