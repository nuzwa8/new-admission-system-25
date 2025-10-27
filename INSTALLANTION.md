
**INSTALLATION.md**
```markdown
# 🔧 Installation & Setup Guide
## Baba Academy Admission System

### Prerequisites

Before installing the Academy Admission System, ensure you have:

- **Web Server**: Apache 2.4+ or Nginx 1.18+
- **PHP Version**: 7.4 or higher
- **Database**: MySQL 5.7+ or MariaDB 10.3+
- **File Upload**: PHP file_uploads enabled
- **Permissions**: Write access to uploads directory

### Step-by-Step Installation

#### Step 1: Database Setup
1. Open phpMyAdmin (http://localhost/phpmyadmin)
2. Click "New" to create a new database
3. Name: `academy_admission`
4. Select "utf8_general_ci" collation
5. Click "Create"
6. Go to "Import" tab
7. Choose `database/setup.sql` file
8. Click "Go" to import

#### Step 2: Configure Database Connection
Edit `includes/config.php`:

```php
<?php
define('DB_HOST', 'localhost');        // Your database host
define('DB_USER', 'root');             // Your database username  
define('DB_PASS', '');                 // Your database password
define('DB_NAME', 'academy_admission'); // Database name
?>
