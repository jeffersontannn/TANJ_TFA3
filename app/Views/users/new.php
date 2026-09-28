<!DOCTYPE html>
<html>
<head>
    <title>Add User - TANJ</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            color: #2c3e50;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header .logo {
            font-size: 26px;
            font-weight: 700;
            margin: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .header .logo span {
            -webkit-text-fill-color: #3498db;
            background: none;
            -webkit-background-clip: unset;
        }

        .header .nav {
            display: flex;
            gap: 25px;
        }

        .header .nav a {
            color: #2c3e50;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            opacity: 0.8;
            transition: all 0.3s ease;
            position: relative;
        }

        .header .nav a:hover {
            opacity: 1;
            color: #667eea;
        }

        .header .nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: width 0.3s ease;
        }

        .header .nav a:hover::after {
            width: 100%;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 50px 20px;
            flex: 1;
            width: 100%;
        }

        .form-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 50px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            animation: slideUp 0.6s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-card h1 {
            font-size: 32px;
            color: #2c3e50;
            margin-bottom: 10px;
            text-align: center;
            font-weight: 700;
        }

        .form-card .subtitle {
            text-align: center;
            color: #666;
            margin-bottom: 35px;
            font-size: 14px;
        }

        .form-card .icon {
            text-align: center;
            font-size: 60px;
            margin-bottom: 20px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            color: #2c3e50;
            font-weight: 600;
            font-size: 14px;
        }

        .form-group input[type="text"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            box-sizing: border-box;
            transition: all 0.3s ease;
            font-family: 'Inter', Arial, Helvetica, sans-serif;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
        }

        .form-group input[type="file"] {
            padding: 10px;
            cursor: pointer;
        }

        .form-group input[type="file"]::file-selector-button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            cursor: pointer;
            margin-right: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .form-group input[type="file"]::file-selector-button:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 10px rgba(102, 126, 234, 0.3);
        }

        .form-group .char-count {
            position: absolute;
            right: 0;
            top: 0;
            font-size: 12px;
            color: #999;
        }

        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 16px 32px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            width: 100%;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn-secondary {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
            margin-top: 15px;
        }

        .btn-secondary:hover {
            background: #f8f9ff;
        }

        .back-link {
            text-align: center;
            margin-top: 25px;
        }

        .success-message {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(17, 153, 142, 0.3);
            display: flex;
            align-items: center;
            gap: 10px;
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .success-message::before {
            content: '✓';
            font-size: 20px;
            font-weight: bold;
        }

        .error-message {
            background: linear-gradient(135deg, #eb3349 0%, #f45c43 100%);
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px rgba(235, 51, 73, 0.3);
            animation: shake 0.5s ease;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .error-message p {
            margin: 5px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .error-message p::before {
            content: '⚠';
            font-size: 16px;
        }

        .footer {
            text-align: center;
            padding: 25px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            color: #2c3e50;
            width: 100%;
            box-sizing: border-box;
            margin-top: auto;
            font-size: 14px;
        }

        .progress-bar {
            width: 100%;
            height: 4px;
            background: #e0e0e0;
            border-radius: 2px;
            margin-top: 10px;
            overflow: hidden;
        }

        .progress-bar .progress {
            height: 100%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            width: 0%;
            transition: width 0.3s ease;
        }

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
                gap: 15px;
                padding: 15px 20px;
            }
            .form-card {
                padding: 30px 20px;
            }
            .form-card h1 {
                font-size: 24px;
            }
            .form-card .icon {
                font-size: 50px;
            }
        }
    </style>
</head>
<body>

<div class="header">
    <div class="logo">
        TANJ <span>User Management</span>
    </div>
    <div class="nav">
        <a href="<?= base_url('/') ?>">Home</a>
        <a href="<?= base_url('users') ?>">Users</a>
    </div>
</div>

<div class="container">
    <div class="form-card">
        <div class="icon">👤</div>
        <h1>Add New User</h1>
        <p class="subtitle">Fill in the details below to create a new user account</p>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="success-message">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="error-message">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('users/create') ?>" method="post" enctype="multipart/form-data" id="userForm">

            <div class="form-group">
                <label for="username">Username <span class="char-count">3-50 chars</span></label>
                <input type="text" id="username" name="username" required placeholder="Enter username" maxlength="50">
                <div class="progress-bar">
                    <div class="progress" id="usernameProgress"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="full_name">Full Name <span class="char-count">2-100 chars</span></label>
                <input type="text" id="full_name" name="full_name" required placeholder="Enter full name" maxlength="100">
                <div class="progress-bar">
                    <div class="progress" id="nameProgress"></div>
                </div>
            </div>

            <div class="form-group">
                <label for="avatar">Profile Avatar</label>
                <input type="file" id="avatar" name="avatar" accept=".jpg,.jpeg,.png">
                <small style="color: #666; font-size: 12px; margin-top: 5px; display: block;">Optional: Upload a profile picture (JPG, PNG)</small>
            </div>

            <button type="submit" class="btn">Create User Account</button>

        </form>

        <div class="back-link">
            <a href="<?= base_url('users') ?>" class="btn btn-secondary">Back to Users</a>
        </div>
    </div>
</div>

<div class="footer">
    © Jefferson Tan - TANJ User Management System
</div>

<script>
    // Character count and progress bar functionality
    document.getElementById('username').addEventListener('input', function() {
        const length = this.value.length;
        const progress = (length / 50) * 100;
        document.getElementById('usernameProgress').style.width = progress + '%';
    });

    document.getElementById('full_name').addEventListener('input', function() {
        const length = this.value.length;
        const progress = (length / 100) * 100;
        document.getElementById('nameProgress').style.width = progress + '%';
    });

    // Form validation animation
    document.getElementById('userForm').addEventListener('submit', function(e) {
        const username = document.getElementById('username').value;
        const fullName = document.getElementById('full_name').value;

        if (username.length < 3) {
            e.preventDefault();
            alert('Username must be at least 3 characters long');
            document.getElementById('username').focus();
        }

        if (fullName.length < 2) {
            e.preventDefault();
            alert('Full name must be at least 2 characters long');
            document.getElementById('full_name').focus();
        }
    });
</script>

</body>
</html>