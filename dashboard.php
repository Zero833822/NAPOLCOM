<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - EIMS</title>
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

        .top-header .user-info .name {
            font-weight: 600;
            color: #333;
        }

        .top-header .user-info .role {
            font-size: 12px;
            color: #888;
        }

        /* ===== STATS CARDS ===== */
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .stat-card .stat-icon {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .stat-card .stat-number {
            font-size: 28px;
            font-weight: 700;
            color: #0b4f8a;
        }

        .stat-card .stat-label {
            color: #888;
            font-size: 14px;
        }

        /* ===== TABS ===== */
        .tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .tab-btn {
            padding: 12px 25px;
            background: white;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            color: #666;
        }

        .tab-btn:hover {
            border-color: #0b4f8a;
            color: #0b4f8a;
        }

        .tab-btn.active {
            background: #0b4f8a;
            color: white;
            border-color: #0b4f8a;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ===== CARDS ===== */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
        }

        .card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .card h3 {
            color: #0b4f8a;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card h3 .badge-count {
            background: #0b4f8a;
            color: white;
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        /* ===== TABLE ===== */
        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            text-align: left;
            font-size: 12px;
            color: #888;
            padding-bottom: 8px;
            border-bottom: 2px solid #f0f0f0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        table td {
            padding: 12px 0;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
        }

        table tr:last-child td {
            border-bottom: none;
        }

        table tr:hover td {
            background: #f8f9fa;
        }

        .badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-admin {
            background: #ffebee;
            color: #c62828;
        }

        .badge-staff {
            background: #e3f2fd;
            color: #0b4f8a;
        }

        .badge-user {
            background: #f5f5f5;
            color: #666;
        }

        .badge-success {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .badge-warning {
            background: #fff3e0;
            color: #e65100;
        }

        /* ===== FILE UPLOAD ===== */
        .upload-area {
            border: 3px dashed #e0e0e0;
            border-radius: 15px;
            padding: 40px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            background: #fafafa;
            margin-bottom: 20px;
        }

        .upload-area:hover {
            border-color: #0b4f8a;
            background: #f0f4f9;
        }

        .upload-area.dragover {
            border-color: #0b4f8a;
            background: #e3f2fd;
            transform: scale(1.01);
        }

        .upload-area .upload-icon {
            font-size: 50px;
            margin-bottom: 15px;
        }

        .upload-area h4 {
            color: #333;
            margin-bottom: 5px;
        }

        .upload-area p {
            color: #888;
            font-size: 14px;
        }

        .upload-area .file-types {
            color: #aaa;
            font-size: 12px;
            margin-top: 10px;
        }

        /* File preview */
        .file-preview {
            display: none;
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            margin-top: 15px;
            align-items: center;
            gap: 15px;
        }

        .file-preview.show {
            display: flex;
        }

        .file-preview .file-icon {
            font-size: 30px;
        }

        .file-preview .file-info {
            flex: 1;
        }

        .file-preview .file-info .name {
            font-weight: 600;
            color: #333;
        }

        .file-preview .file-info .size {
            font-size: 12px;
            color: #888;
        }

        .file-preview .remove-file {
            background: #e53935;
            color: white;
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .file-preview .remove-file:hover {
            transform: scale(1.1);
        }

        /* Upload progress */
        .upload-progress {
            display: none;
            margin-top: 15px;
        }

        .upload-progress.show {
            display: block;
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: #e0e0e0;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-bar .fill {
            height: 100%;
            background: linear-gradient(90deg, #0b4f8a, #1a7fc4);
            width: 0%;
            transition: width 0.3s ease;
            border-radius: 4px;
        }

        .progress-text {
            font-size: 12px;
            color: #888;
            margin-top: 5px;
        }

        /* ===== FORM ELEMENTS ===== */
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
            padding: 6px 15px;
            font-size: 12px;
        }

        .btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none !important;
        }

        /* ===== MODAL ===== */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-overlay.show {
            display: flex;
            animation: fadeIn 0.3s ease;
        }

        .modal {
            background: white;
            border-radius: 20px;
            padding: 30px;
            max-width: 500px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-header h3 {
            color: #0b4f8a;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 28px;
            cursor: pointer;
            color: #888;
            transition: all 0.3s ease;
        }

        .modal-close:hover {
            color: #333;
            transform: rotate(90deg);
        }

        /* ===== TOAST NOTIFICATION ===== */
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
            animation: slideInRight 0.5s ease;
            min-width: 250px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .toast.success {
            background: #4caf50;
        }

        .toast.error {
            background: #e53935;
        }

        .toast.warning {
            background: #ff9800;
        }

        .toast.info {
            background: #0b4f8a;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(100px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* ===== SEARCH BAR ===== */
        .search-bar {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .search-bar input {
            flex: 1;
            min-width: 200px;
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .search-bar input:focus {
            border-color: #0b4f8a;
            outline: none;
            box-shadow: 0 0 0 4px rgba(11, 79, 138, 0.1);
        }

        .search-bar select {
            padding: 12px 16px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            background: white;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding: 20px 10px;
            }
            .sidebar .logo {
                font-size: 18px;
            }
            .sidebar .logo span {
                display: none;
            }
            .sidebar ul li a span {
                display: none;
            }
            .sidebar ul li a .icon {
                margin-right: 0;
                font-size: 24px;
            }
            .sidebar .logout span {
                display: none;
            }
            .main-content {
                margin-left: 70px;
                padding: 15px;
            }
            .top-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            .stats {
                grid-template-columns: 1fr 1fr;
            }
            .cards-grid {
                grid-template-columns: 1fr;
            }
            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }
            .modal {
                padding: 20px;
                width: 95%;
            }
            .search-bar {
                flex-direction: column;
            }
            .search-bar input,
            .search-bar select {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .stats {
                grid-template-columns: 1fr;
            }
            .top-header h1 {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- ===== SIDEBAR ===== -->
    <div class="sidebar">
        <div class="logo">EIMS<span>.</span></div>
        <ul>
            <li><a href="dashboard.php" class="active"><span class="icon">📊</span> <span>Dashboard</span></a></li>
            <li><a href="emp.php"><span class="icon">👥</span> <span>Employees</span></a></li>
            <li><a href="depart.php"><span class="icon">🏢</span> <span>Departments</span></a></li>
            <li><a href="report.php"><span class="icon">📋</span> <span>Reports</span></a></li>
            <li><a href="file.php"><span class="icon">📁</span> <span>Files</span></a></li>
            <li><a href="setting.php"><span class="icon">⚙️</span> <span>Settings</span></a></li>
        </ul>
        <div class="logout">
            <ul>
                <li><a href="login.php"><span class="icon">🚪</span> <span>Logout</span></a></li>
            </ul>
        </div>
    </div>

    <!-- ===== MAIN CONTENT ===== -->
    <div class="main-content">

        <!-- ===== TOP HEADER ===== -->
        <div class="top-header">
            <h1>👋 Welcome back, Juan!</h1>
            <div class="user-info">
                <div>
                    <div class="name">Juan Dela Cruz</div>
                    <div class="role">Administrator</div>
                </div>
                <div class="avatar">JD</div>
            </div>
        </div>

        <!-- ===== STATS ===== -->
        <div class="stats">
            <div class="stat-card">
                <div class="stat-icon">👥</div>
                <div class="stat-number">156</div>
                <div class="stat-label">Total Employees</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🏢</div>
                <div class="stat-number">12</div>
                <div class="stat-label">Departments</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">📁</div>
                <div class="stat-number">48</div>
                <div class="stat-label">Total Files</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">📈</div>
                <div class="stat-number">89%</div>
                <div class="stat-label">Attendance Rate</div>
            </div>
        </div>

        <!-- ===== TABS ===== -->
        <div class="tabs">
            <button class="tab-btn active" data-tab="employees">👥 Employees</button>
            <button class="tab-btn" data-tab="files">📁 File Management</button>
            <button class="tab-btn" data-tab="upload">📤 Upload</button>
        </div>

        <!-- ===== TAB 1: EMPLOYEES ===== -->
        <div class="tab-content active" id="tab-employees">
            <div class="card">
                <h3>📋 Employee List <span class="badge-count">156</span></h3>

                <!-- Search -->
                <div class="search-bar">
                    <input type="text" id="searchInput" placeholder="🔍 Search employees..." oninput="filterTable()">
                    <select id="deptFilter" onchange="filterTable()">
                        <option value="">All Departments</option>
                        <option value="IT">IT</option>
                        <option value="HR">HR</option>
                        <option value="Finance">Finance</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Operations">Operations</option>
                    </select>
                    <button class="btn btn-primary" onclick="openModal('addEmployeeModal')">➕ Add Employee</button>
                </div>

                <div class="table-wrapper">
                    <table id="employeeTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Position</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="employeeTableBody">
                            <!-- Sample Data -->
                            <tr>
                                <td>1</td>
                                <td><strong>Maria Santos</strong></td>
                                <td>IT</td>
                                <td>Software Developer</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <button class="btn btn-primary btn-sm" onclick="openModal('editEmployeeModal')">✏️</button>
                                    <button class="btn btn-danger btn-sm" onclick="confirmDelete('Maria Santos')">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><strong>John Reyes</strong></td>
                                <td>HR</td>
                                <td>HR Manager</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <button class="btn btn-primary btn-sm" onclick="openModal('editEmployeeModal')">✏️</button>
                                    <button class="btn btn-danger btn-sm" onclick="confirmDelete('John Reyes')">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><strong>Anna Cruz</strong></td>
                                <td>Finance</td>
                                <td>Accountant</td>
                                <td><span class="badge badge-warning">Pending</span></td>
                                <td>
                                    <button class="btn btn-primary btn-sm" onclick="openModal('editEmployeeModal')">✏️</button>
                                    <button class="btn btn-danger btn-sm" onclick="confirmDelete('Anna Cruz')">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><strong>Mike Tan</strong></td>
                                <td>Marketing</td>
                                <td>Marketing Specialist</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <button class="btn btn-primary btn-sm" onclick="openModal('editEmployeeModal')">✏️</button>
                                    <button class="btn btn-danger btn-sm" onclick="confirmDelete('Mike Tan')">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><strong>Sarah Lim</strong></td>
                                <td>Operations</td>
                                <td>Operations Manager</td>
                                <td><span class="badge badge-success">Active</span></td>
                                <td>
                                    <button class="btn btn-primary btn-sm" onclick="openModal('editEmployeeModal')">✏️</button>
                                    <button class="btn btn-danger btn-sm" onclick="confirmDelete('Sarah Lim')">🗑️</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div style="display:flex; justify-content:space-between; align-items:center; margin-top:15px; flex-wrap:wrap; gap:10px;">
                    <span style="color:#888; font-size:14px;">Showing 1-5 of 156 employees</span>
                    <div style="display:flex; gap:5px;">
                        <button class="btn btn-outline btn-sm">Previous</button>
                        <button class="btn btn-primary btn-sm">1</button>
                        <button class="btn btn-outline btn-sm">2</button>
                        <button class="btn btn-outline btn-sm">3</button>
                        <button class="btn btn-outline btn-sm">Next</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ===== TAB 2: FILE MANAGEMENT ===== -->
        <div class="tab-content" id="tab-files">
            <div class="card">
                <h3>📁 File Management <span class="badge-count">48</span></h3>

                <!-- File Search -->
                <div class="search-bar">
                    <input type="text" placeholder="🔍 Search files..." oninput="filterFiles()">
                    <select>
                        <option value="">All Types</option>
                        <option value="excel">Excel</option>
                        <option value="pdf">PDF</option>
                        <option value="csv">CSV</option>
                    </select>
                    <button class="btn btn-success" onclick="switchTab('upload')">📤 Upload New</button>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>File Name</th>
                                <th>Version</th>
                                <th>Uploaded By</th>
                                <th>Date</th>
                                <th>Size</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><strong>📊 employee_list_2026.xlsx</strong></td>
                                <td><span class="badge badge-staff">v3</span></td>
                                <td>Juan Dela Cruz</td>
                                <td>2026-07-04</td>
                                <td>2.4 MB</td>
                                <td>
                                    <button class="btn btn-success btn-sm">📥</button>
                                    <button class="btn btn-warning btn-sm">📝</button>
                                    <button class="btn btn-danger btn-sm">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>📄 employee_data_v2.csv</strong></td>
                                <td><span class="badge badge-staff">v2</span></td>
                                <td>Maria Santos</td>
                                <td>2026-07-03</td>
                                <td>1.8 MB</td>
                                <td>
                                    <button class="btn btn-success btn-sm">📥</button>
                                    <button class="btn btn-warning btn-sm">📝</button>
                                    <button class="btn btn-danger btn-sm">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>📑 employee_records_2026.pdf</strong></td>
                                <td><span class="badge badge-staff">v1</span></td>
                                <td>John Reyes</td>
                                <td>2026-07-02</td>
                                <td>5.2 MB</td>
                                <td>
                                    <button class="btn btn-success btn-sm">📥</button>
                                    <button class="btn btn-warning btn-sm">📝</button>
                                    <button class="btn btn-danger btn-sm">🗑️</button>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>📊 department_report.xlsx</strong></td>
                                <td><span class="badge badge-staff">v5</span></td>
                                <td>Anna Cruz</td>
                                <td>2026-07-01</td>
                                <td>3.1 MB</td>
                                <td>
                                    <button class="btn btn-success btn-sm">📥</button>
                                    <button class="btn btn-warning btn-sm">📝</button>
                                    <button class="btn btn-danger btn-sm">🗑️</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ===== TAB 3: UPLOAD ===== -->
        <div class="tab-content" id="tab-upload">
            <div class="cards-grid">
                <!-- Upload Card -->
                <div class="card">
                    <h3>📤 Upload Employee File</h3>
                    <p style="color:#888; font-size:14px; margin-bottom:20px;">
                        Upload employee data files. Supported: Excel, CSV, PDF (Max: 10MB)
                    </p>

                    <!-- Upload Area -->
                    <div class="upload-area" id="dropZone">
                        <div class="upload-icon">📁</div>
                        <h4>Drop your file here</h4>
                        <p>or click to browse</p>
                        <div class="file-types">Supported: .xlsx, .xls, .csv, .pdf</div>
                    </div>

                    <!-- File Preview -->
                    <div class="file-preview" id="filePreview">
                        <div class="file-icon">📄</div>
                        <div class="file-info">
                            <div class="name" id="fileName">file.xlsx</div>
                            <div class="size" id="fileSize">2.4 MB</div>
                        </div>
                        <button class="remove-file" onclick="removeFile()">✕</button>
                    </div>

                    <!-- Upload Progress -->
                    <div class="upload-progress" id="uploadProgress">
                        <div class="progress-bar">
                            <div class="fill" id="progressFill"></div>
                        </div>
                        <div class="progress-text" id="progressText">Uploading... 0%</div>
                    </div>

                    <!-- File Details Form -->
                    <div style="margin-top:20px;">
                        <div class="form-group">
                            <label>File Description</label>
                            <input type="text" id="fileDescription" placeholder="e.g., Employee List - July 2026">
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select>
                                <option>Employee Records</option>
                                <option>Department Reports</option>
                                <option>Attendance Data</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <button class="btn btn-success" style="width:100%;" onclick="simulateUpload()">
                            📤 Upload File
                        </button>
                    </div>
                </div>

                <!-- Recent Uploads -->
                <div class="card">
                    <h3>🕐 Recent Uploads</h3>
                    <div style="max-height:400px; overflow-y:auto;">
                        <div style="padding:12px; border-bottom:1px solid #f0f0f0; display:flex; justify-content:space-between; align-items:center;">
                            <div>
                                <div style="font-weight:600;">employee_list_2026.xlsx</div>
                                <div style="font-size:12px; color:#888;">Uploaded 2 hours ago • 2.4 MB</div>
                            </div>
                            <span class="badge badge-success">Complete</span>
                        </div>
                        <div style="padding:12px; border-bottom:1px solid #f0f0f0; display:flex; justify-content:space-between; align-items:center;">
                            <div>
                                <div style="font-weight:600;">employee_data_v2.csv</div>
                                <div style="font-size:12px; color:#888;">Uploaded yesterday • 1.8 MB</div>
                            </div>
                            <span class="badge badge-success">Complete</span>
                        </div>
                        <div style="padding:12px; border-bottom:1px solid #f0f0f0; display:flex; justify-content:space-between; align-items:center;">
                            <div>
                                <div style="font-weight:600;">employee_records.pdf</div>
                                <div style="font-size:12px; color:#888;">Uploaded 2 days ago • 5.2 MB</div>
                            </div>
                            <span class="badge badge-warning">Processing</span>
                        </div>
                        <div style="padding:12px; display:flex; justify-content:space-between; align-items:center;">
                            <div>
                                <div style="font-weight:600;">department_report.xlsx</div>
                                <div style="font-size:12px; color:#888;">Uploaded 3 days ago • 3.1 MB</div>
                            </div>
                            <span class="badge badge-success">Complete</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ===== MODALS ===== -->

    <!-- Add Employee Modal -->
    <div class="modal-overlay" id="addEmployeeModal">
        <div class="modal">
            <div class="modal-header">
                <h3>➕ Add New Employee</h3>
                <button class="modal-close" onclick="closeModal('addEmployeeModal')">×</button>
            </div>
            <form>
                <div class="form-row">
                    <div class="form-group">
                        <label>First Name <span style="color:#e53935;">*</span></label>
                        <input type="text" placeholder="First name">
                    </div>
                    <div class="form-group">
                        <label>Last Name <span style="color:#e53935;">*</span></label>
                        <input type="text" placeholder="Last name">
                    </div>
                </div>
                <div class="form-group">
                    <label>Email <span style="color:#e53935;">*</span></label>
                    <input type="email" placeholder="email@company.com">
                </div>
                <div class="form-group">
                    <label>Department <span style="color:#e53935;">*</span></label>
                    <select>
                        <option>IT</option>
                        <option>HR</option>
                        <option>Finance</option>
                        <option>Marketing</option>
                        <option>Operations</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Position <span style="color:#e53935;">*</span></label>
                    <input type="text" placeholder="Job position">
                </div>
                <div style="display:flex; gap:10px; margin-top:20px;">
                    <button type="submit" class="btn btn-success" style="flex:1;">💾 Save Employee</button>
                    <button type="button" class="btn btn-outline" onclick="closeModal('addEmployeeModal')">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Employee Modal -->
    <div class="modal-overlay" id="editEmployeeModal">
        <div class="modal">
            <div class="modal-header">
                <h3>✏️ Edit Employee</h3>
                <button class="modal-close" onclick="closeModal('editEmployeeModal')">×</button>
            </div>
            <form>
                <div class="form-row">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" value="Maria">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" value="Santos">
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" value="maria@company.com">
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <select>
                        <option selected>IT</option>
                        <option>HR</option>
                        <option>Finance</option>
                        <option>Marketing</option>
                        <option>Operations</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Position</label>
                    <input type="text" value="Software Developer">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select>
                        <option value="active" selected>Active</option>
                        <option value="inactive">Inactive</option>
                        <option value="pending">Pending</option>
                    </select>
                </div>
                <div style="display:flex; gap:10px; margin-top:20px;">
                    <button type="submit" class="btn btn-primary" style="flex:1;">💾 Update Employee</button>
                    <button type="button" class="btn btn-outline" onclick="closeModal('editEmployeeModal')">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ===== TOAST CONTAINER ===== -->
    <div class="toast-container" id="toastContainer"></div>

    <!-- ===== JAVASCRIPT ===== -->
    <script>
        // ===========================
        // 1. TABS
        // ===========================
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active from all tabs
                document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
                document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

                // Add active to clicked tab
                this.classList.add('active');
                const tabId = this.dataset.tab;
                document.getElementById('tab-' + tabId).classList.add('active');
            });
        });

        function switchTab(tabName) {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

            document.querySelector(`.tab-btn[data-tab="${tabName}"]`).classList.add('active');
            document.getElementById('tab-' + tabName).classList.add('active');
        }

        // ===========================
        // 2. MODALS
        // ===========================
        function openModal(id) {
            document.getElementById(id).classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove('show');
            document.body.style.overflow = 'auto';
        }

        // Close modal on overlay click
        document.querySelectorAll('.modal-overlay').forEach(overlay => {
            overlay.addEventListener('click', function(e) {
                if (e.target === this) {
                    this.classList.remove('show');
                    document.body.style.overflow = 'auto';
                }
            });
        });

        // ===========================
        // 3. FILE UPLOAD UI
        // ===========================
        const dropZone = document.getElementById('dropZone');
        const fileInput = document.createElement('input');
        fileInput.type = 'file';
        fileInput.accept = '.xlsx,.xls,.csv,.pdf';
        fileInput.style.display = 'none';
        document.body.appendChild(fileInput);

        // Click to upload
        dropZone.addEventListener('click', () => fileInput.click());

        // Drag and drop
        dropZone.addEventListener('dragover', (e) => {
            e.preventDefault();
            dropZone.classList.add('dragover');
        });

        dropZone.addEventListener('dragleave', () => {
            dropZone.classList.remove('dragover');
        });

        dropZone.addEventListener('drop', (e) => {
            e.preventDefault();
            dropZone.classList.remove('dragover');
            if (e.dataTransfer.files.length) {
                handleFile(e.dataTransfer.files[0]);
            }
        });

        fileInput.addEventListener('change', function() {
            if (this.files.length) {
                handleFile(this.files[0]);
            }
        });

        function handleFile(file) {
            const preview = document.getElementById('filePreview');
            document.getElementById('fileName').textContent = file.name;
            document.getElementById('fileSize').textContent = (file.size / 1024 / 1024).toFixed(2) + ' MB';
            preview.classList.add('show');
            dropZone.style.display = 'none';
        }

        function removeFile() {
            document.getElementById('filePreview').classList.remove('show');
            dropZone.style.display = 'block';
            fileInput.value = '';
        }

        // ===========================
        // 4. SIMULATE UPLOAD
        // ===========================
        function simulateUpload() {
            const filePreview = document.getElementById('filePreview');
            const progress = document.getElementById('uploadProgress');
            const progressFill = document.getElementById('progressFill');
            const progressText = document.getElementById('progressText');
            const uploadBtn = document.querySelector('.btn-success');

            if (!filePreview.classList.contains('show')) {
                showToast('Please select a file first!', 'warning');
                return;
            }

            // Disable button
            uploadBtn.disabled = true;
            uploadBtn.textContent = '⏳ Uploading...';

            // Show progress
            progress.classList.add('show');
            let progressValue = 0;

            const interval = setInterval(() => {
                progressValue += Math.random() * 10 + 5;
                if (progressValue >= 100) {
                    progressValue = 100;
                    clearInterval(interval);

                    // Upload complete
                    setTimeout(() => {
                        showToast('✅ File uploaded successfully!', 'success');
                        progress.classList.remove('show');
                        removeFile();
                        uploadBtn.disabled = false;
                        uploadBtn.textContent = '📤 Upload File';
                    }, 500);
                }
                progressFill.style.width = progressValue + '%';
                progressText.textContent = 'Uploading... ' + Math.round(progressValue) + '%';
            }, 200);
        }

        // ===========================
        // 5. TOAST NOTIFICATIONS
        // ===========================
        function showToast(message, type = 'info') {
            const container = document.getElementById('toastContainer');
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;

            const icons = {
                success: '✅',
                error: '❌',
                warning: '⚠️',
                info: 'ℹ️'
            };

            toast.innerHTML = `${icons[type] || 'ℹ️'} ${message}`;
            container.appendChild(toast);

            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(100px)';
                setTimeout(() => toast.remove(), 500);
            }, 4000);
        }

        // ===========================
        // 6. SEARCH/FILTER
        // ===========================
        function filterTable() {
            const input = document.getElementById('searchInput');
            const filter = input.value.toLowerCase();
            const deptFilter = document.getElementById('deptFilter').value;
            const rows = document.querySelectorAll('#employeeTableBody tr');

            rows.forEach(row => {
                const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const dept = row.querySelector('td:nth-child(3)').textContent;

                const nameMatch = name.includes(filter);
                const deptMatch = deptFilter === '' || dept === deptFilter;

                row.style.display = nameMatch && deptMatch ? '' : 'none';
            });
        }

        // ===========================
        // 7. CONFIRM DELETE
        // ===========================
        function confirmDelete(name) {
            if (confirm(`Are you sure you want to delete "${name}"?`)) {
                showToast(`🗑️ "${name}" has been deleted!`, 'error');
            }
        }

        // ===========================
        // 8. KEYBOARD SHORTCUTS
        // ===========================
        document.addEventListener('keydown', function(e) {
            // Escape to close modals
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal-overlay.show').forEach(modal => {
                    modal.classList.remove('show');
                    document.body.style.overflow = 'auto';
                });
            }
        });

        // ===========================
        // 9. INITIALIZE
        // ===========================
        console.log('✅ EIMS Dashboard UI Loaded');
        showToast('👋 Welcome to EIMS Dashboard!', 'info');
    </script>

</body>
</html>