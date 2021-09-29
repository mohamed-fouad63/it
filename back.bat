@echo off
For /f "tokens=2-4 delims=/ " %%a in ('date /t') do (set mydate=%%c-%%a-%%b)
For /f "tokens=1-2 delims=/:" %%a in ("%TIME%") do (set mytime=%%a%%b)

SET backupdir=C:\xampp\htdocs\backup
SET mysqluername=root
SET mysqlpassword=12345678
SET database=post

C:\xampp\mysql\bin\mysqldump.exe -uroot -p12345678  --all-databases > %backupdir%\%database%_%mydate%.sql