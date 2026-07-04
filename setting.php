<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - EIMS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: #f4f6f9;
            display: flex;
            min-height: 100vh;
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 250px;
            background: #0b4f8a;
            color: white;
            padding: 30px 20px;
            position: fixed;
            height: 100%;
            transition: all 0.3s ease;
            overflow-y: auto;
            z-index: 100;
        }

        .sidebar .logo {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar .logo span {
            color: #ffc107;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 5px;
        }

        .sidebar ul li a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            padding: 12px 15px;
            display: flex;
            align-items: center;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .sidebar ul li a:hover {
            background: rgba(255,255,255,0.1);
            color: white;
        }

        .sidebar ul li a.active {
            background: rgba(255,255,255,0.15);
            color: white;
            border-left: 4px solid #ffc107;
        }

        .sidebar ul li a .icon {
            margin-right: 12px;
            font-size: 20px;
            width: 24px;
        }

        .sidebar .logout {
            position: absolute;
            bottom: 30px;
            width: calc(100% - 40px);
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 15px;
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            margin-left: 250px;
            flex: 1;
            padding: 30px;
        }

        /* ===== TOP HEADER ===== */
        .top-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            background: white;
            padding: 20px 30px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            flex-wrap: wrap;
            gap: 15px;
        }

        .top-header h1 {
            color: #0b4f8a;
            font-size: 24px;
        }

        .top-header .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .top-header .user-info .avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #0b4f8a;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 20px;
            font-weight: 700;
        }

        /* ===== CARD ===== */
        .card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 20px;
        }

        .card h3 {
            color: #0b4f8a;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        /* ===== BUTTONS ===== */
        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        .btn-primary {
            background: #0b4f8a;
            color: white;
        }

        .btn-primary:hover {
            background: #1a7fc4;
        }

        .btn-success {
            background: #4caf50;
            color: white;
        }

        .btn-success:hover {
            background: #43a047;
        }

        .btn-danger {
            background: #e53935;
            color: white;
        }

        .btn-danger:hover {
            background: #c62828;
        }

        .btn-warning {
            background: #ffc107;
            color: #000;
        }

        .btn-warning:hover {
            background: #ffb300;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid #0b4f8a;
            color: #0b4f8a;
        }

        .btn-outline:hover {
            background: #0b4f8a;
            color: white;
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 12px;
        }

        /* ===== FORM ===== */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px 14px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #0b4f8a;
            outline: none;
            box-shadow: 0 0 0 4px rgba(11, 79, 138, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        /* ===== TOGGLE SWITCH ===== */
        .toggle-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .toggle-group:last-child {
            border-bottom: none;
        }

        .toggle-group .toggle-info {
            flex: 1;
        }

        .toggle-group .toggle-info h4 {
            font-size: 14px;
            color: #333;
        }

        .toggle-group .toggle-info p {
            font-size: 12px;
            color: #888;
        }

        .switch {
            position: relative;
            width: 50px;
            height: 28px;
            background: #ccc;
            border-radius: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            flex-shrink: 0;
        }

        .switch.active {
            background: #4caf50;
        }

        .switch .slider {
            position: absolute;
            top: 3px;
            left: 3px;
            width: 22px;
            height: 22px;
            background: white;
            border-radius: 50%;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .switch.active .slider {
            left: 25px;
        }

        /* ===== STATS ===== */
        .settings-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .stat-box {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
        }

        .stat-box .number {
            font-size: 24px;
            font-weight: 700;
            color: #0b4f8a;
        }

        .stat-box .label {
            font-size: 12px;
            color: #888;
        }

        /* ===== TOAST ===== */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 2000;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .toast {
            padding: 15px 25px;
            border-radius: 10px;
            color: white;
            font-weight: 600;
            animation: slideIn 0.5s ease;
            min-width: 250px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        .toast.success { background: #4caf50; }
        .toast.error { background: #e53935; }
        .toast.warning { background: #ff9800; }
        .toast.info { background: #0b4f8a; }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(100px); }
            to { opacity: 1; transform: translateX(0); }
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 20px 10px;
            }
            .sidebar .logo span { display: none; }
            .sidebar ul li a span { display: none; }
            .sidebar ul li a .icon { margin-right: 0; font-size: 24px; }
            .sidebar .logout span { display: none; }
            .main-content { margin-left: 70px; padding: 15px; }
            .top-header { flex-direction: column; align-items: flex-start; }
            .form-row { grid-template-columns: 1fr; }
            .settings-stats { grid-template-columns: 1fr 1fr; }
        }
    </style>
</head>
<body>

    <!-- ===== SIDEBAR ===== -->
    <div class="sidebar">
        <div class="logo">EIMS<span>.</span></div>
        <ul>
            <li><a href="dashboard.php"><span class="icon">📊</span> <span>Dashboard</span></a></li>
            <li><a href="emp.php"><span class="icon">👥</span> <span>Employees</span></a></li>
            <li><a href="depart.php"><span class="icon">🏢</span> <span>Departments</span></a></li>
            <li><a href="report.php"><span class="icon">📋</span> <span>Reports</span></a></li>
            <li><a href="file.php"><span class="icon">📁</span> <span>Files</span></a></li>
            <li><a href="setting.php" class="active"><span class="icon">⚙️</span> <span>Settings</span></a></li>
        </ul>
        <div class="logout">
            <ul>
                <li><a href="login.php"><span class="icon">🚪</span> <span>Logout</span></a></li>
            </ul>
        </div>
    </div>

    <!-- ===== MAIN CONTENT ===== -->
    <div class="main-content">

        <!-- TOP HEADER -->
        <div class="top-header">
            <h1>⚙️ System Settings</h1>
            <div class="user-info">
                <div>
                    <div style="font-weight:600;">Juan Dela Cruz</div>
                    <div style="font-size:12px; color:#888;">Administrator</div>
                </div>
                <div class="avatar">JD</div>
            </div>
        </div>

        <!-- TABS -->
        <div style="display:flex; gap:10px; margin-bottom:20px; flex-wrap:wrap;">
            <button class="btn btn-primary" onclick="showSettingsTab('general')">⚙️ General</button>
            <button class="btn btn-outline" onclick="showSettingsTab('security')">🔐 Security</button>
            <button class="btn btn-outline" onclick="showSettingsTab('backup')">💾 Backup</button>
            <button class="btn btn-outline" onclick="showSettingsTab('system')">🖥️ System</button>
        </div>

        <!-- TAB: GENERAL -->
        <div id="settings-general">
            <div class="card">
                <h3>⚙️ General Settings</h3>
                <form onsubmit="saveSettings(event)">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" value="Employee Information Management System">
                        </div>
                        <div class="form-group">
                            <label>Company Email</label>
                            <input type="email" value="admin@eims.com">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" value="+63 (2) 8123-4567">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" value="123 Main St, Manila, Philippines">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Time Zone</label>
                        <select>
                            <option>Asia/Manila (UTC +8)</option>
                            <option>Asia/Singapore (UTC +8)</option>
                            <option>Asia/Tokyo (UTC +9)</option>
                            <option>America/New_York (UTC -5)</option>
                            <option>Europe/London (UTC +0)</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">💾 Save General Settings</button>
                </form>
            </div>

            <div class="card">
                <h3>🎨 Appearance</h3>
                <div class="form-row">
                    <div class="form-group">
                        <label>Theme</label>
                        <select>
                            <option selected>Light</option>
                            <option>Dark</option>
                            <option>System Default</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Primary Color</label>
                        <input type="color" value="#0b4f8a">
                    </div>
                </div>
            </div>
        </div>

        <!-- TAB: SECURITY -->
        <div id="settings-security" style="display:none;">
            <div class="card">
                <h3>🔐 Security Settings</h3>

                <div class="toggle-group">
                    <div class="toggle-info">
                        <h4>Two-Factor Authentication</h4>
                        <p>Require 2FA for all admin accounts</p>
                    </div>
                    <div class="switch" onclick="toggleSwitch(this)">
                        <div class="slider"></div>
                    </div>
                </div>

                <div class="toggle-group">
                    <div class="toggle-info">
                        <h4>Session Timeout</h4>
                        <p>Auto-logout after 30 minutes of inactivity</p>
                    </div>
                    <div class="switch active" onclick="toggleSwitch(this)">
                        <div class="slider"></div>
                    </div>
                </div>

                <div class="toggle-group">
                    <div class="toggle-info">
                        <h4>Login Attempts</h4>
                        <p>Lock account after 5 failed login attempts</p>
                    </div>
                    <div class="switch active" onclick="toggleSwitch(this)">
                        <div class="slider"></div>
                    </div>
                </div>

                <div style="margin-top:20px;">
                    <button class="btn btn-primary" onclick="changePassword()">🔄 Change Password</button>
                    <button class="btn btn-danger" onclick="showToast('All sessions cleared!', 'warning')">🚪 Clear All Sessions</button>
                </div>
            </div>
        </div>

        <!-- TAB: BACKUP -->
        <div id="settings-backup" style="display:none;">
            <div class="card">
                <h3>💾 Backup Settings</h3>

                <div class="settings-stats">
                    <div class="stat-box">
                        <div class="number">12</div>
                        <div class="label">Total Backups</div>
                    </div>
                    <div class="stat-box">
                        <div class="number">2.4 GB</div>
                        <div class="label">Total Size</div>
                    </div>
                    <div class="stat-box">
                        <div class="number">Today</div>
                        <div class="label">Last Backup</div>
                    </div>
                </div>

                <div class="toggle-group">
                    <div class="toggle-info">
                        <h4>Automatic Backup</h4>
                        <p>Backup database every 6 hours</p>
                    </div>
                    <div class="switch active" onclick="toggleSwitch(this)">
                        <div class="slider"></div>
                    </div>
                </div>

                <div class="toggle-group">
                    <div class="toggle-info">
                        <h4>Backup to Cloud</h4>
                        <p>Store backups in Google Drive/AWS S3</p>
                    </div>
                    <div class="switch" onclick="toggleSwitch(this)">
                        <div class="slider"></div>
                    </div>
                </div>

                <div style="margin-top:20px; display:flex; gap:10px; flex-wrap:wrap;">
                    <button class="btn btn-success" onclick="createBackup()">💾 Create Backup Now</button>
                    <button class="btn btn-primary" onclick="showToast('📥 Downloading backup...', 'info')">📥 Download Backup</button>
                    <button class="btn btn-warning" onclick="showToast('🔄 Restoring from backup...', 'warning')">🔄 Restore Backup</button>
                </div>
            </div>
        </div>

        <!-- TAB: SYSTEM -->
        <div id="settings-system" style="display:none;">
            <div class="card">
                <h3>🖥️ System Information</h3>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:15px; margin-bottom:20px;">
                    <div><strong>Version:</strong> EIMS v2.0.1</div>
                    <div><strong>PHP Version:</strong> 8.2.0</div>
                    <div><strong>Database:</strong> MySQL 8.0</div>
                    <div><strong>Server:</strong> Apache 2.4</div>
                    <div><strong>Environment:</strong> Production</div>
                    <div><strong>Last Updated:</strong> 2026-07-04</div>
                </div>

                <div class="toggle-group">
                    <div class="toggle-info">
                        <h4>Maintenance Mode</h4>
                        <p>Put the system in maintenance mode for updates</p>
                    </div>
                    <div class="switch" onclick="toggleSwitch(this)">
                        <div class="slider"></div>
                    </div>
                </div>

                <div style="margin-top:20px; display:flex; gap:10px; flex-wrap:wrap;">
                    <button class="btn btn-warning" onclick="showToast('🔄 System cache cleared!', 'success')">🗑️ Clear Cache</button>
                    <button class="btn btn-danger" onclick="showToast('🔄 System restarted!', 'warning')">🔄 Restart System</button>
                    <button class="btn btn-outline" onclick="showToast('📊 System diagnostic started...', 'info')">🔍 Run Diagnostic</button>
                </div>
            </div>
        </div>

    </div>

    <!-- ===== TOAST ===== -->
    <div class="toast-container" id="toastContainer"></div>

    <!-- ===== JAVASCRIPT ===== -->
    <script>
        // ===========================
        // SETTINGS TABS
        // ===========================
        function showSettingsTab(tab) {
            document.querySelectorAll('[id^="settings-"]').forEach(el => el.style.display = 'none');
            document.getElementById('settings-' + tab).style.display = 'block';
            
            document.querySelectorAll('.btn-primary, .btn-outline').forEach(b => b.className = 'btn btn-outline');
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(b => {
                if (b.textContent.includes('General') && tab === 'general') b.className = 'btn btn-primary';
                if (b.textContent.includes('Security') && tab === 'security') b.className = 'btn btn-primary';
                if (b.textContent.includes('Backup') && tab === 'backup') b.className = 'btn btn-primary';
                if (b.textContent.includes('System') && tab === 'system') b.className = 'btn btn-primary';
            });
        }

        // ===========================
        // TOGGLE SWITCH
        // ===========================
        function toggleSwitch(el) {
            el.classList.toggle('active');
            const isOn = el.classList.contains('active');
            showToast(isOn ? '✅ Enabled' : '❌ Disabled', isOn ? 'success' : 'error');
        }

        // ===========================
        // CHANGE PASSWORD
        // ===========================
        function changePassword() {
            const newPass = prompt('Enter new password:');
            if (newPass && newPass.length >= 8) {
                showToast('✅ Password updated successfully!', 'success');
            } else if (newPass) {
                showToast('❌ Password must be at least 8 characters', 'error');
            }
        }

        // ===========================
        // CREATE BACKUP
        // ===========================
        function createBackup() {
            const btn = event.target;
            btn.textContent = '⏳ Creating...';
            btn.disabled = true;
            
            setTimeout(() => {
                showToast('✅ Backup created successfully!', 'success');
                btn.textContent = '💾 Create Backup Now';
                btn.disabled = false;
            }, 3000);
        }

        // ===========================
        // SAVE SETTINGS
        // ===========================
        function saveSettings(event) {
            event.preventDefault();
            showToast('✅ Settings saved successfully!', 'success');
        }

        // ===========================
        // TOAST
        // ===========================
        function showToast(message, type = 'info') {
            const container = document.getElementById('toastContainer');
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            const icons = { success: '✅', error: '❌', warning: '⚠️', info: 'ℹ️' };
            toast.innerHTML = `${icons[type] || 'ℹ️'} ${message}`;
            container.appendChild(toast);

            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(100px)';
                setTimeout(() => toast.remove(), 500);
            }, 4000);
        }

        // ===========================
        // INITIALIZE
        // ===========================
        showToast('⚙️ Welcome to Settings!', 'info');
    </script>

</body>
</html>