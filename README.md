# 📘 TeacherStudentFeedbackSystem

The **TeacherStudentFeedbackSystem** is a web-based feedback management platform that replaces the traditional paper-based feedback process with a **fast, secure, and analytics-driven online system**. It enables students to provide structured feedback for faculty, while teachers and administrators can view detailed reports, insights, and performance trends.

This system helps educational institutions enhance academic quality, transparency, and teacher performance evaluation.

---

## 📚 Table of Contents

* [About the Project](#about-the-project)
* [Key Features](#key-features)
* [Modules](#modules)
* [Tech Stack](#tech-stack)
* [Screenshots](#screenshots)
* [File Overview](#file-overview)
* [Installation Guide](#installation-guide)
* [Database Setup](#database-setup)
* [How to Use](#how-to-use)
* [Future Enhancements](#future-enhancements)
* [License](#license)
* [Author](#author)

---

## 📖 About the Project

The **TeacherStudentFeedbackSystem** digitizes the entire academic feedback cycle. Students can log in and submit feedback, teachers can review their performance reports, and admins can manage faculty, subjects, student lists, and analyze institution-wide insights.

The project is built with **PHP** and uses **MySQL** as the backend database.

---

## ⭐ Key Features

### 🎓 Student Features

* Login authentication
* Provide feedback for assigned faculty
* Feedback submission lock
* Clean and interactive UI

### 👨‍🏫 Teacher Features

* View student feedback
* Analyze performance trends
* Download or view reports

### 🛠️ Admin Features

* Add/manage faculty
* Add/manage students
* Assign subjects and faculty
* View all feedback
* Delete entries if required
* Change admin password

### 📊 Feedback Features

* Rating-based scoring
* Text feedback support
* Organized, structured responses

---

## 🧩 Modules

| Module              | Description                                      |
| ------------------- | ------------------------------------------------ |
| **Student Module**  | Submit feedback, view subjects, secure login     |
| **Teacher Module**  | View feedback reports, analyze scores            |
| **Admin Module**    | Manage users, feedback, faculty, and settings    |
| **Feedback Engine** | Handles form submission, validation, and storage |

---

## 🛠️ Tech Stack

| Component            | Technology            |
| -------------------- | --------------------- |
| **Frontend**         | HTML, CSS, JavaScript |
| **Backend**          | PHP                   |
| **Database**         | MySQL                 |
| **Server**           | Apache / XAMPP / WAMP |
| **Language Support** | PHP 7+                |

---

## 📂 File Overview

Below is a description of the important project files the user uploaded:

| File Name             | Description                             |
| --------------------- | --------------------------------------- |
| **index.php**         | Login page for admin/student/teacher    |
| **home.php**          | Admin dashboard                         |
| **feedback.php**      | Student feedback form                   |
| **feeds_2.php**       | Backend logic for storing feedback      |
| **manageFaculty.php** | Admin module to manage faculty          |
| **changePass.php**    | Admin password change functionality     |
| **logout.php**        | Session destroy script                  |
| **exit.php**          | Redirect/exit handler                   |
| **delete.php**        | Delete faculty/student/feedback entries |
| **configASL.php**     | Database configuration file             |

---

## ⚙️ Installation Guide

### **1. Download or Clone the Repository**

```bash
git clone https://github.com/your-username/TeacherStudentFeedbackSystem.git
```

### **2. Move the Project to Server Directory**

For XAMPP:

```
C:/xampp/htdocs/TeacherStudentFeedbackSystem
```

### **3. Configure Database**

* Open `phpMyAdmin`
* Create a database (example):

```
teacher_feedback
```

* Import the database SQL file:

```
database.sql (if provided)
```

### **4. Update Database Credentials**

Open:

```
configASL.php
```

Modify:

```php
$server="localhost";
$username="root";
$password="";
$dbname="teacher_feedback";
```

### **5. Start Apache & MySQL**

Open XAMPP → Start both services.

### **6. Run the Project**

Open browser:

```
http://localhost/TeacherStudentFeedbackSystem/
```

---

## 📝 Database Setup

### Suggestive Tables (If SQL not provided)

#### `students`

```
id | name | roll | year | department | password
```

#### `faculty`

```
id | name | department | subject | email | password
```

#### `feedback`

```
id | student_id | faculty_id | rating1 | rating2 | rating3 | comments
```

#### `admin`

```
id | username | password
```

If you want, I can generate a **complete SQL schema** for your project.

---

## 🚀 How to Use

### **Student**

1. Log in using assigned credentials
2. Select faculty/subject
3. Submit ratings + comments
4. Submit feedback (locked afterward)

### **Admin**

1. Log in via `index.php`
2. Access dashboard (`home.php`)
3. Manage faculty & students
4. View/delete feedback
5. Change password

### **Teacher**

1. Log in with faculty credentials
2. View feedback
3. Analyze performance

---

## 🔮 Future Enhancements

* Graph-based feedback analytics
* AI-based sentiment analysis
* Teacher performance scoring
* Anonymous feedback mode
* Mobile app version
* Email notifications

---

## 📜 License

This project is released under the **MIT License**.

---

## 👨‍💻 Author

**TeacherStudentFeedbackSystem**
Created with ❤️ for academic institutions.
If you want me to generate:

* SQL file
* Admin dashboard UI
* Improved feedback form
* Modern Bootstrap version

Just tell me!
