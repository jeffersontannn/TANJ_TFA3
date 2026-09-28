<!DOCTYPE html>
<html>
<head>
    <title>User Accounts - TANJ</title>
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 50px 20px;
            flex: 1;
            width: 100%;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .top-bar h1 {
            font-size: 32px;
            color: #2c3e50;
            font-weight: 700;
        }

        .stats {
            display: flex;
            gap: 20px;
            margin-top: 15px;
        }

        .stat {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .stat::before {
            content: '👤';
            font-size: 16px;
        }

        .search-bar {
            margin-bottom: 30px;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .search-bar input {
            width: 100%;
            padding: 15px 20px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            font-family: 'Inter', Arial, Helvetica, sans-serif;
            transition: all 0.3s ease;
        }

        .search-bar input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .search-bar input::placeholder {
            color: #999;
        }

        .btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 14px 28px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 10px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
        }

        .btn-secondary {
            background: white;
            color: #667eea;
            border: 2px solid #667eea;
        }

        .btn-secondary:hover {
            background: #f8f9ff;
        }

        .user-table {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        th {
            padding: 20px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 20px;
            border-bottom: 1px solid #eee;
            color: #2c3e50;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr {
            transition: all 0.3s ease;
            animation: fadeInUp 0.5s ease forwards;
            opacity: 0;
        }

        tr:hover {
            background: #f8f9ff;
            transform: scale(1.01);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.1);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #667eea;
            box-shadow: 0 4px 10px rgba(102, 126, 234, 0.3);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .avatar:hover {
            transform: scale(1.3);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.5);
            border-color: #764ba2;
        }

        .avatar-placeholder {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            font-weight: 700;
            border: 3px solid #667eea;
            box-shadow: 0 4px 10px rgba(102, 126, 234, 0.3);
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .avatar-placeholder:hover {
            transform: scale(1.3);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.5);
            border-color: #764ba2;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-info .username {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 4px;
        }

        .user-info .full-name {
            font-size: 13px;
            color: #666;
        }

        .user-info .username:hover {
            color: #667eea;
            cursor: pointer;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-active {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
        }

        .status-inactive {
            background: linear-gradient(135deg, #eb3349 0%, #f45c43 100%);
            color: white;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        .action-btn {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .action-btn.edit {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .action-btn.delete {
            background: linear-gradient(135deg, #eb3349 0%, #f45c43 100%);
            color: white;
        }

        .action-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .empty-state {
            text-align: center;
            padding: 80px 20px;
            color: #666;
        }

        .empty-state .icon {
            font-size: 80px;
            margin-bottom: 20px;
            opacity: 0.5;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .empty-state h3 {
            font-size: 28px;
            margin-bottom: 15px;
            color: #2c3e50;
            font-weight: 700;
        }

        .empty-state p {
            font-size: 16px;
            color: #666;
            margin-bottom: 30px;
        }

        .success-message {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
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

        .floating-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            font-size: 24px;
            cursor: pointer;
            box-shadow: 0 4px 20px rgba(102, 126, 234, 0.4);
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
        }

        .floating-btn:hover {
            transform: scale(1.1) rotate(90deg);
            box-shadow: 0 6px 25px rgba(102, 126, 234, 0.6);
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

        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                text-align: center;
                gap: 15px;
                padding: 15px 20px;
            }
            .top-bar {
                flex-direction: column;
                gap: 20px;
                text-align: center;
                padding: 20px;
            }
            .stats {
                flex-direction: column;
                gap: 10px;
            }
            table {
                font-size: 14px;
            }
            th, td {
                padding: 15px;
            }
            .top-bar h1 {
                font-size: 24px;
            }
            .floating-btn {
                bottom: 20px;
                right: 20px;
                width: 50px;
                height: 50px;
                font-size: 20px;
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
        <a href="<?= base_url('auth/login') ?>">Login</a>
    </div>
</div>

<div class="container">
    <div class="top-bar">
        <div>
            <h1>User Accounts</h1>
            <div class="stats">
                <div class="stat">Total Users: <?= count($users) ?></div>
            </div>
        </div>
        <a href="<?= base_url('users/new') ?>" class="btn">Add New User</a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="success-message">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <div class="search-bar">
        <input type="text" placeholder="🔍 Search users by name or username..." id="searchInput">
    </div>

    <div class="user-table">
        <?php if (empty($users)): ?>
            <div class="empty-state">
                <div class="icon">👥</div>
                <h3>No Users Found</h3>
                <p>Start by adding your first user account to get started.</p>
                <a href="<?= base_url('users/new') ?>" class="btn">Add Your First User</a>
            </div>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Avatar</th>
                        <th>User Information</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $index = 0;
                    foreach ($users as $user): 
                        $index++;
                    ?>
                        <tr style="animation-delay: <?= $index * 0.1 ?>s">
                            <td style="font-weight: 600; color: #667eea;">#<?= esc($user['id']) ?></td>
                            <td>
                                <?php if (!empty($user['avatar'])): ?>
                                    <img src="<?= base_url('uploads/avatars/' . $user['avatar']) ?>" class="avatar" alt="<?= esc($user['username']) ?>">
                                <?php else: ?>
                                    <div class="avatar-placeholder">
                                        <?= strtoupper(substr($user['username'], 0, 1)) ?>
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="user-info">
                                    <span class="username"><?= esc($user['username']) ?></span>
                                    <span class="full-name"><?= esc($user['full_name']) ?></span>
                                </div>
                            </td>
                            <td>
                                <span class="status-badge status-active">Active</span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <button class="action-btn edit" title="Edit User">✏️</button>
                                    <button class="action-btn delete" title="Delete User">🗑️</button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

<button class="floating-btn" onclick="window.location.href='<?= base_url('users/new') ?>'">+</button>

<div class="footer">
    © Jefferson Tan - TANJ User Management System
</div>

<script>
    // Search functionality
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('tbody tr');
        
        rows.forEach(row => {
            const username = row.querySelector('.username').textContent.toLowerCase();
            const fullName = row.querySelector('.full-name').textContent.toLowerCase();
            
            if (username.includes(searchValue) || fullName.includes(searchValue)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>

</body>
</html>