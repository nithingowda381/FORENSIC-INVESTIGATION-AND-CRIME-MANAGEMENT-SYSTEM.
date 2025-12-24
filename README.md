# 🔬 Forensic Investigation and Crime Management System

<div align="center">

![License](https://img.shields.io/badge/license-MIT-blue.svg)
![PHP Version](https://img.shields.io/badge/PHP-7.x%2B-purple.svg)
![MySQL](https://img.shields.io/badge/MySQL-5.x%2B-orange. svg)
![Status](https://img.shields.io/badge/status-active-success.svg)

A comprehensive web-based application designed to streamline forensic case management, evidence handling, and investigative processes. 

[Features](#features) • [Installation](#installation) • [Usage](#usage) • [Contributing](#contributing)

</div>

---

## 📋 Table of Contents

- [Overview](#overview)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [System Requirements](#system-requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Project Structure](#project-structure)
- [Security Considerations](#security-considerations)
- [Future Enhancements](#future-enhancements)
- [Contributing](#contributing)
- [License](#license)
- [Contact](#contact)
- [Acknowledgements](#acknowledgements)

---

## 🎯 Overview

The **Forensic Case Management System** is a web-based application designed to streamline the process of managing forensic cases, logs, and evidence. It provides a secure and user-friendly interface for administrators, forensic lab technicians, and officers to efficiently handle forensic investigations.

This system helps law enforcement agencies and forensic laboratories to:
- Maintain comprehensive case records
- Track evidence throughout the investigation lifecycle
- Manage user roles and permissions
- Generate reports and analytics
- Ensure data integrity and security

---

## ✨ Features

### 🔐 User Authentication & Authorization
- Secure login with MD5 hashed passwords
- Role-based access control (Admin, Technician, Officer)
- Session management and timeout
- Password recovery via email

### 📁 Case Management
- Create, update, and delete forensic cases
- Assign cases to specific users
- Track case status and progress
- Search and filter cases
- Case history and audit trail

### 📝 Log Management
- Record detailed logs for all case activities
- View chronological activity timelines
- Filter logs by date, user, and action type
- Export logs for reporting

### 🔍 Evidence Management
- Handle multiple types of evidence (physical, digital, biological)
- Attach evidence to specific cases
- Chain of custody tracking
- Evidence metadata and attributes
- Image upload and processing capabilities

### 👥 User & Role Management
- Administrator dashboard for user management
- Create and manage user accounts
- Assign and modify user roles
- View user activity logs

### 🔔 Notifications & Alerts
- Email notifications for critical actions
- System alerts for case updates
- Customizable notification preferences

### 🖼️ Image Processing
- Resize and crop forensic images
- Image comparison tools
- Secure image storage
- Thumbnail generation

---

## 🛠️ Technologies Used

| Technology | Purpose |
|------------|---------|
| **PHP 7.x+** | Server-side scripting and business logic |
| **MySQL 5.x+** | Relational database management |
| **Apache** | Web server |
| **HTML5** | Content structure |
| **CSS3 & Bootstrap** | Responsive UI design |
| **JavaScript** | Client-side interactivity |
| **MD5** | Password hashing (Note: Consider upgrading to bcrypt) |
| **PHPMailer** | Email notifications |

---

## 💻 System Requirements

### Server Requirements
- **Web Server**: Apache 2.4+ or Nginx
- **PHP**: Version 7.4 or higher
- **MySQL**:  Version 5.7 or higher (or MariaDB 10.2+)
- **Disk Space**:  Minimum 500MB (more for evidence storage)
- **RAM**: Minimum 2GB recommended

### Client Requirements
- Modern web browser (Chrome 90+, Firefox 88+, Safari 14+, Edge 90+)
- JavaScript enabled
- Minimum screen resolution: 1024x768

---

## 📦 Installation

### Prerequisites

Ensure you have the following installed: 
- Apache/Nginx web server
- PHP 7.4 or higher with extensions: 
  - `mysqli`
  - `gd` (for image processing)
  - `mbstring`
  - `openssl`
- MySQL 5.7 or higher
- Composer (optional, for dependency management)

### Step-by-Step Installation

1. **Clone the Repository**

```bash
git clone https://github.com/nithingowda381/FORENSIC-INVESTIGATION-AND-CRIME-MANAGEMENT-SYSTEM.. git
cd FORENSIC-INVESTIGATION-AND-CRIME-MANAGEMENT-SYSTEM. 
```

2. **Set Up the Database**

Create a new MySQL database: 

```bash
mysql -u root -p
```

```sql
CREATE DATABASE forensic_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'forensic_user'@'localhost' IDENTIFIED BY 'your_secure_password';
GRANT ALL PRIVILEGES ON forensic_db.* TO 'forensic_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

3. **Import Database Schema**

```bash
mysql -u forensic_user -p forensic_db < sql/schema.sql
```

4. **Configure the Application**

Copy the example configuration file and edit it: 

```bash
cp config.example.php config.php
nano config.php
```

Update the database credentials: 

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'forensic_user');
define('DB_PASS', 'your_secure_password');
define('DB_NAME', 'forensic_db');
```

5. **Set Directory Permissions**

```bash
chmod 755 -R . 
chmod 777 -R uploads/
chmod 777 -R logs/
```

6. **Configure Apache Virtual Host** (Optional)

Create a new virtual host configuration:

```apache
<VirtualHost *:80>
    ServerName forensic. local
    DocumentRoot /var/www/html/forensic
    
    <Directory /var/www/html/forensic>
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    
    ErrorLog ${APACHE_LOG_DIR}/forensic_error.log
    CustomLog ${APACHE_LOG_DIR}/forensic_access. log combined
</VirtualHost>
```

7. **Restart Apache**

```bash
sudo systemctl restart apache2
```

8. **Access the Application**

Open your web browser and navigate to:
```
http://localhost/forensic
```
or
```
http://forensic.local
```

### Default Login Credentials

```
Username: admin
Password: admin123
```

**⚠️ IMPORTANT:  Change the default password immediately after first login!**

---

## ⚙️ Configuration

### Email Configuration

Edit `config.php` to configure email notifications:

```php
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'your-email@gmail.com');
define('SMTP_PASS', 'your-app-password');
define('SMTP_FROM', 'noreply@forensic.local');
```

### File Upload Settings

Configure maximum file upload sizes in `php.ini`:

```ini
upload_max_filesize = 50M
post_max_size = 50M
max_execution_time = 300
```

---

## 📖 Usage

### For Administrators

1. **Dashboard Access**:  Login and access the admin dashboard
2. **User Management**:  Create and manage user accounts
3. **System Settings**: Configure system-wide settings
4. **Reports**: Generate and export system reports

### For Forensic Technicians

1. **Case Creation**: Create new forensic cases
2. **Evidence Upload**:  Attach and manage evidence
3. **Lab Analysis**: Record lab findings and results
4. **Report Generation**: Generate case reports

### For Officers

1. **Case Viewing**: View assigned cases
2. **Status Updates**: Update case progress
3. **Evidence Review**: Review collected evidence
4. **Collaboration**:  Communicate with lab technicians

---

## 📂 Project Structure

```
forensic/
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
├── includes/
│   ├── config.php
│   ├── functions.php
│   └── db. php
├── modules/
│   ├── auth/
│   ├── cases/
│   ├── evidence/
│   ├── logs/
│   └── users/
├── uploads/
│   ├── evidence/
│   └── images/
├── sql/
│   └── schema. sql
├── index.php
├── login.php
├── logout.php
└── README.md
```

---

## 🔒 Security Considerations

### Current Security Measures
- Password hashing (MD5)
- Session management
- SQL injection prevention (prepared statements)
- File upload validation
- Role-based access control

### Recommended Improvements
- ⚠️ **Upgrade to bcrypt/Argon2** for password hashing (MD5 is outdated)
- Implement CSRF protection tokens
- Add rate limiting for login attempts
- Enable HTTPS/SSL certificates
- Regular security audits
- Input sanitization and validation
- Implement two-factor authentication (2FA)

### Best Practices
- Keep PHP and MySQL updated
- Use strong passwords
- Regular database backups
- Monitor system logs
- Restrict file upload types
- Implement proper error handling

---

## 🚀 Future Enhancements

- [ ] Advanced search with filters and facets
- [ ] Real-time notifications using WebSockets
- [ ] Mobile application (iOS/Android)
- [ ] Integration with external forensic databases
- [ ] Advanced analytics and reporting dashboard
- [ ] API for third-party integrations
- [ ] Automated evidence analysis tools
- [ ] Blockchain for evidence integrity
- [ ] Multi-language support
- [ ] Cloud storage integration
- [ ] Advanced image comparison algorithms
- [ ] Export to PDF/Excel functionality

---

## 🤝 Contributing

We welcome contributions from the community! Here's how you can help:

### How to Contribute

1. **Fork the repository**
2. **Create a feature branch**
   ```bash
   git checkout -b feature/amazing-feature
   ```
3. **Commit your changes**
   ```bash
   git commit -m 'Add some amazing feature'
   ```
4. **Push to the branch**
   ```bash
   git push origin feature/amazing-feature
   ```
5. **Open a Pull Request**

### Contribution Guidelines

- Follow PSR-12 coding standards for PHP
- Write clear, descriptive commit messages
- Add comments to complex code sections
- Update documentation for new features
- Test thoroughly before submitting PR
- Ensure backward compatibility

### Code of Conduct

Please be respectful and professional in all interactions.  We are committed to providing a welcoming and inclusive environment for all contributors.

---

## 📄 License

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.

```
MIT License

Copyright (c) 2025 Nithin Gowda M S

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. 
```

---

## 📞 Contact

### Project Maintainer

**Nithin Gowda M S**
- GitHub: [@nithingowda381](https://github.com/nithingowda381)
- Email: nithingowda381@gmail.com

### Support

For bug reports and feature requests, please use the [GitHub Issues](https://github.com/nithingowda381/FORENSIC-INVESTIGATION-AND-CRIME-MANAGEMENT-SYSTEM./issues) page.

For general inquiries, email:  nithingowda381@gmail. com

---

## 🙏 Acknowledgements

### Contributors
- **Nithin Gowda M S** - Lead Developer

### Resources & Tools
- [Bootstrap](https://getbootstrap.com/) - Frontend framework
- [PHPMailer](https://github.com/PHPMailer/PHPMailer) - Email library
- [Font Awesome](https://fontawesome.com/) - Icon library
- [jQuery](https://jquery.com/) - JavaScript library

### Inspiration & Learning
- Online tutorials and documentation
- Open-source forensic tools
- Community forums and Stack Overflow
- Academic research on digital forensics

### Special Thanks
- Friends and family for their continuous support and encouragement
- The open-source community for valuable tools and resources
- Beta testers who provided feedback during development

---

<div align="center">

**⭐ If you find this project useful, please consider giving it a star!  ⭐**

Made with ❤️ by Nithin Gowda M S

</div>
