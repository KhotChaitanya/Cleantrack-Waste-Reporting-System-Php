# CleanTrack – Community Waste Reporting Dashboard

## Overview
CleanTrack is a lightweight web-based application that empowers citizens to report garbage and sanitation-related issues in their local areas.  
Administrators can monitor these reports and mark them as resolved. It’s a civic tech tool built using PHP, MySQL, HTML/CSS and WAMP/XAMPP stack.

## Features
- Submit waste issue with area, type and description
- Automatically generate report ID
- Admin dashboard to manage and resolve issues
- Public dashboard to view all reports
- Styled user interface and responsive design
- MySQL backend (via XAMPP or WAMP)

## Technologies Used
- PHP (Form handling, DB integration)
- HTML5 / CSS3 (UI and table formatting)
- MySQL (Data storage and queries)
- Local Hosting: WAMP/XAMPP stack
- No external frameworks used


## Output

### 1. Home Page (index.html)
User can fill out the form.  
![homepage](https://github.com/user-attachments/assets/911496e2-fb91-4c8e-94f1-dd1742752e10)

### 2. Report Submission (submit.php)
After submiting report a success message with a unique Report ID is displayed.
![Report_Submitted_Successfully(with ID)](https://github.com/user-attachments/assets/8e80d639-a3e0-4abd-bcac-6ab70bdae90f)

### 3. Admin Dashboard (admin.php)
Admin sees all reports and can mark them as Resolved.
![AdminDashboard](https://github.com/user-attachments/assets/68110263-f59a-46b5-b00b-be15064a9976)

### 4. Public Viewer (view_reports.php)
Anyone can see pending and resolved reports in a clean UI.  
![ViewReports](https://github.com/user-attachments/assets/94d1086e-ab53-400d-8989-0b113bfc36e3)

### 5. Database View (optional)
Screenshot of reports stored in phpMyAdmin .
![DataBase](https://github.com/user-attachments/assets/cb27af13-b636-436d-b080-8bafcfe3a2cf)

## Author
Chaitanya Khot

## License
This project is licensed under the MIT License.
