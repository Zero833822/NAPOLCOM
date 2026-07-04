<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - EIMS</title>
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
            font-size: 18px;
        }

        .card h3 .badge-count {
            background: #0b4f8a;
            color: white;
            padding: 2px 12px;
            border-radius: 20px;
            font-size: 12px;
        }

        /* ===== BUTTONS ===== */
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
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

        /* ===== REPORT TABS ===== */
        .report-tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .report-tab {
            padding: 12px 25px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            background: white;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            color: #666;
        }

        .report-tab:hover {
            border-color: #0b4f8a;
            color: #0b4f8a;
        }

        .report-tab.active {
            background: #0b4f8a;
            color: white;
            border-color: #0b4f8a;
        }

        .report-tab .tab-icon {
            font-size: 16px;
            margin-right: 8px;
        }

        /* ===== REPORT FILTERS ===== */
        .report-filters {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 20px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 10px;
            align-items: flex-end;
        }

        .report-filters .filter-group {
            flex: 1;
            min-width: 140px;
        }

        .report-filters .filter-group label {
            display: block;
            font-size: 12px;
            font-weight: 600;
            color: #666;
            margin-bottom: 4px;
        }

        .report-filters .filter-group input,
        .report-filters .filter-group select {
            width: 100%;
            padding: 10px 12px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: white;
        }

        .report-filters .filter-group input:focus,
        .report-filters .filter-group select:focus {
            border-color: #0b4f8a;
            outline: none;
            box-shadow: 0 0 0 4px rgba(11, 79, 138, 0.1);
        }

        .report-filters .filter-actions {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        /* ===== STATS GRID ===== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .stat-box {
            background: #f8f9fa;
            padding: 18px 15px;
            border-radius: 10px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid #e8e8e8;
        }

        .stat-box:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .stat-box .stat-number {
            font-size: 26px;
            font-weight: 700;
            color: #0b4f8a;
        }

        .stat-box .stat-label {
            font-size: 12px;
            color: #888;
            margin-top: 4px;
        }

        .stat-box .stat-icon {
            font-size: 28px;
            display: block;
            margin-bottom: 6px;
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
            font-size: 11px;
            color: #888;
            padding: 10px 8px;
            border-bottom: 2px solid #f0f0f0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        table td {
            padding: 10px 8px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 13px;
        }

        table tr:hover td {
            background: #f8f9fa;
        }

        table tr:last-child td {
            border-bottom: none;
        }

        /* ===== BADGES ===== */
        .badge {
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
        }

        .badge-success {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .badge-warning {
            background: #fff3e0;
            color: #e65100;
        }

        .badge-danger {
            background: #ffebee;
            color: #c62828;
        }

        .badge-info {
            background: #e3f2fd;
            color: #0b4f8a;
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

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #888;
        }

        .empty-state .empty-icon {
            font-size: 48px;
            margin-bottom: 10px;
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
            .report-filters { flex-direction: column; }
            .report-filters .filter-group { width: 100%; }
            .stats-grid { grid-template-columns: 1fr 1fr; }
            .report-tabs { flex-direction: column; }
            .report-tab { text-align: center; }
        }

        @media (max-width: 480px) {
            .stats-grid { grid-template-columns: 1fr; }
            .report-filters .filter-actions { width: 100%; }
            .report-filters .filter-actions .btn { flex: 1; justify-content: center; }
        }
    </style>
</head>
<body>

    <!-- ===== SIDEBAR ===== -->
    <div class="sidebar">
        <div class="logo">EIMS<span>.</span></div>
        <ul>
            <li><a href="dashboard.html"><span class="icon">📊</span> <span>Dashboard</span></a></li>
            <li><a href="employees.html"><span class="icon">👥</span> <span>Employees</span></a></li>
            <li><a href="departments.html"><span class="icon">🏢</span> <span>Departments</span></a></li>
            <li><a href="#" class="active"><span class="icon">📋</span> <span>Reports</span></a></li>
            <li><a href="files.html"><span class="icon">📁</span> <span>Files</span></a></li>
            <li><a href="settings.html"><span class="icon">⚙️</span> <span>Settings</span></a></li>
        </ul>
        <div class="logout">
            <ul>
                <li><a href="login.html"><span class="icon">🚪</span> <span>Logout</span></a></li>
            </ul>
        </div>
    </div>

    <!-- ===== MAIN CONTENT ===== -->
    <div class="main-content">

        <!-- TOP HEADER -->
        <div class="top-header">
            <h1>📋 Reports & Analytics</h1>
            <div class="user-info">
                <div>
                    <div style="font-weight:600;">Juan Dela Cruz</div>
                    <div style="font-size:12px; color:#888;">Administrator</div>
                </div>
                <div class="avatar">JD</div>
            </div>
        </div>

        <!-- ===== REPORT TABS ===== -->
        <div class="report-tabs">
            <div class="report-tab active" onclick="showReport('employee')">
                <span class="tab-icon">👥</span> Employee
            </div>
            <div class="report-tab" onclick="showReport('department')">
                <span class="tab-icon">🏢</span> Department
            </div>
            <div class="report-tab" onclick="showReport('attendance')">
                <span class="tab-icon">📅</span> Attendance
            </div>
            <div class="report-tab" onclick="showReport('file')">
                <span class="tab-icon">📁</span> Files
            </div>
            <div class="report-tab" onclick="showReport('summary')">
                <span class="tab-icon">📊</span> Summary
            </div>
        </div>

        <!-- ===== TAB 1: EMPLOYEE REPORT ===== -->
        <div id="report-employee">
            <div class="card">
                <h3>👥 Employee Report</h3>

                <div class="report-filters">
                    <div class="filter-group">
                        <label>Department</label>
                        <select id="empDept">
                            <option value="">All</option>
                            <option value="IT">IT</option>
                            <option value="HR">HR</option>
                            <option value="Finance">Finance</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Operations">Operations</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>Status</label>
                        <select id="empStatus">
                            <option value="">All</option>
                            <option value="Active">Active</option>
                            <option value="Inactive">Inactive</option>
                            <option value="Pending">Pending</option>
                        </select>
                    </div>
                    <div class="filter-group" style="flex:0 0 auto;">
                        <div class="filter-actions">
                            <button class="btn btn-primary" onclick="generateEmployeeReport()">📊 Generate</button>
                            <button class="btn btn-success" onclick="exportReport('Employee')">📥 Export</button>
                        </div>
                    </div>
                </div>

                <div class="stats-grid" id="empStats">
                    <div class="stat-box">
                        <span class="stat-icon">👥</span>
                        <div class="stat-number" id="empTotal">0</div>
                        <div class="stat-label">Total Employees</div>
                    </div>
                    <div class="stat-box">
                        <span class="stat-icon">✅</span>
                        <div class="stat-number" id="empActive">0</div>
                        <div class="stat-label">Active</div>
                    </div>
                    <div class="stat-box">
                        <span class="stat-icon">⏳</span>
                        <div class="stat-number" id="empPending">0</div>
                        <div class="stat-label">Pending</div>
                    </div>
                    <div class="stat-box">
                        <span class="stat-icon">📉</span>
                        <div class="stat-number" id="empInactive">0</div>
                        <div class="stat-label">Inactive</div>
                    </div>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Department</th>
                                <th>Position</th>
                                <th>Email</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="empTableBody">
                            <!-- Dynamic -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ===== TAB 2: DEPARTMENT REPORT ===== -->
        <div id="report-department" style="display:none;">
            <div class="card">
                <h3>🏢 Department Report</h3>

                <div class="report-filters">
                    <div class="filter-group">
                        <label>Department</label>
                        <select id="deptSelect">
                            <option value="">All</option>
                            <option value="IT">IT</option>
                            <option value="HR">HR</option>
                            <option value="Finance">Finance</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Operations">Operations</option>
                        </select>
                    </div>
                    <div class="filter-group" style="flex:0 0 auto;">
                        <div class="filter-actions">
                            <button class="btn btn-primary" onclick="generateDepartmentReport()">📊 Generate</button>
                            <button class="btn btn-success" onclick="exportReport('Department')">📥 Export</button>
                        </div>
                    </div>
                </div>

                <div class="stats-grid" id="deptStats">
                    <div class="stat-box">
                        <span class="stat-icon">🏢</span>
                        <div class="stat-number" id="deptTotal">0</div>
                        <div class="stat-label">Total Departments</div>
                    </div>
                    <div class="stat-box">
                        <span class="stat-icon">👥</span>
                        <div class="stat-number" id="deptEmployees">0</div>
                        <div class="stat-label">Total Employees</div>
                    </div>
                    <div class="stat-box">
                        <span class="stat-icon">📊</span>
                        <div class="stat-number" id="deptAvg">0</div>
                        <div class="stat-label">Avg/Department</div>
                    </div>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Department</th>
                                <th>Code</th>
                                <th>Head</th>
                                <th>Employees</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="deptTableBody">
                            <!-- Dynamic -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ===== TAB 3: ATTENDANCE REPORT ===== -->
        <div id="report-attendance" style="display:none;">
            <div class="card">
                <h3>📅 Attendance Report</h3>

                <div class="report-filters">
                    <div class="filter-group">
                        <label>Month</label>
                        <select id="attMonth">
                            <option value="1">Jan</option><option value="2">Feb</option>
                            <option value="3">Mar</option><option value="4">Apr</option>
                            <option value="5">May</option><option value="6">Jun</option>
                            <option value="7" selected>Jul</option>
                            <option value="8">Aug</option><option value="9">Sep</option>
                            <option value="10">Oct</option><option value="11">Nov</option>
                            <option value="12">Dec</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>Year</label>
                        <select id="attYear">
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026" selected>2026</option>
                        </select>
                    </div>
                    <div class="filter-group" style="flex:0 0 auto;">
                        <div class="filter-actions">
                            <button class="btn btn-primary" onclick="generateAttendanceReport()">📊 Generate</button>
                            <button class="btn btn-success" onclick="exportReport('Attendance')">📥 Export</button>
                        </div>
                    </div>
                </div>

                <div class="stats-grid" id="attStats">
                    <div class="stat-box">
                        <span class="stat-icon">✅</span>
                        <div class="stat-number" id="attPresent">0</div>
                        <div class="stat-label">Present</div>
                    </div>
                    <div class="stat-box">
                        <span class="stat-icon">❌</span>
                        <div class="stat-number" id="attAbsent">0</div>
                        <div class="stat-label">Absent</div>
                    </div>
                    <div class="stat-box">
                        <span class="stat-icon">⏰</span>
                        <div class="stat-number" id="attLate">0</div>
                        <div class="stat-label">Late</div>
                    </div>
                    <div class="stat-box">
                        <span class="stat-icon">📊</span>
                        <div class="stat-number" id="attRate">0%</div>
                        <div class="stat-label">Rate</div>
                    </div>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Employee</th>
                                <th>Department</th>
                                <th>Present</th>
                                <th>Absent</th>
                                <th>Late</th>
                                <th>Rate</th>
                            </tr>
                        </thead>
                        <tbody id="attTableBody">
                            <!-- Dynamic -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ===== TAB 4: FILE REPORT ===== -->
        <div id="report-file" style="display:none;">
            <div class="card">
                <h3>📁 File Report</h3>

                <div class="report-filters">
                    <div class="filter-group">
                        <label>File Type</label>
                        <select id="fileType">
                            <option value="">All</option>
                            <option value="Excel">Excel</option>
                            <option value="PDF">PDF</option>
                            <option value="CSV">CSV</option>
                            <option value="Word">Word</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>Category</label>
                        <select id="fileCategory">
                            <option value="">All</option>
                            <option value="Employee Records">Employee Records</option>
                            <option value="Department Reports">Department Reports</option>
                            <option value="Attendance Data">Attendance Data</option>
                            <option value="Financial Reports">Financial Reports</option>
                        </select>
                    </div>
                    <div class="filter-group" style="flex:0 0 auto;">
                        <div class="filter-actions">
                            <button class="btn btn-primary" onclick="generateFileReport()">📊 Generate</button>
                            <button class="btn btn-success" onclick="exportReport('File')">📥 Export</button>
                        </div>
                    </div>
                </div>

                <div class="stats-grid" id="fileStats">
                    <div class="stat-box">
                        <span class="stat-icon">📁</span>
                        <div class="stat-number" id="fileTotal">0</div>
                        <div class="stat-label">Total Files</div>
                    </div>
                    <div class="stat-box">
                        <span class="stat-icon">📊</span>
                        <div class="stat-number" id="fileExcel">0</div>
                        <div class="stat-label">Excel</div>
                    </div>
                    <div class="stat-box">
                        <span class="stat-icon">📄</span>
                        <div class="stat-number" id="filePDF">0</div>
                        <div class="stat-label">PDF</div>
                    </div>
                    <div class="stat-box">
                        <span class="stat-icon">💾</span>
                        <div class="stat-number" id="fileSize">0 MB</div>
                        <div class="stat-label">Total Size</div>
                    </div>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>File Name</th>
                                <th>Type</th>
                                <th>Owner</th>
                                <th>Category</th>
                                <th>Size</th>
                            </tr>
                        </thead>
                        <tbody id="fileTableBody">
                            <!-- Dynamic -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- ===== TAB 5: SUMMARY REPORT ===== -->
        <div id="report-summary" style="display:none;">
            <div class="card">
                <h3>📊 Summary Report</h3>

                <div class="report-filters">
                    <div class="filter-group">
                        <label>Period</label>
                        <select id="sumPeriod">
                            <option value="monthly">Monthly</option>
                            <option value="quarterly">Quarterly</option>
                            <option value="yearly" selected>Yearly</option>
                        </select>
                    </div>
                    <div class="filter-group">
                        <label>Year</label>
                        <select id="sumYear">
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                            <option value="2026" selected>2026</option>
                        </select>
                    </div>
                    <div class="filter-group" style="flex:0 0 auto;">
                        <div class="filter-actions">
                            <button class="btn btn-primary" onclick="generateSummaryReport()">📊 Generate</button>
                            <button class="btn btn-success" onclick="exportReport('Summary')">📥 Export</button>
                        </div>
                    </div>
                </div>

                <div class="stats-grid" id="sumStats">
                    <div class="stat-box">
                        <span class="stat-icon">👥</span>
                        <div class="stat-number" id="sumEmployees">0</div>
                        <div class="stat-label">Total Employees</div>
                    </div>
                    <div class="stat-box">
                        <span class="stat-icon">🏢</span>
                        <div class="stat-number" id="sumDepartments">0</div>
                        <div class="stat-label">Total Departments</div>
                    </div>
                    <div class="stat-box">
                        <span class="stat-icon">📁</span>
                        <div class="stat-number" id="sumFiles">0</div>
                        <div class="stat-label">Total Files</div>
                    </div>
                    <div class="stat-box">
                        <span class="stat-icon">📊</span>
                        <div class="stat-number" id="sumAttendance">0%</div>
                        <div class="stat-label">Attendance Rate</div>
                    </div>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Metric</th>
                                <th>Value</th>
                                <th>Change</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="sumTableBody">
                            <!-- Dynamic -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- ===== TOAST ===== -->
    <div class="toast-container" id="toastContainer"></div>

    <!-- ===== JAVASCRIPT ===== -->
    <script>
        // ===========================
        // SAMPLE DATA
        // ===========================
        const empData = [
            { name: 'Maria Santos', dept: 'IT', position: 'Developer', email: 'maria@email.com', status: 'Active' },
            { name: 'John Reyes', dept: 'HR', position: 'HR Manager', email: 'john@email.com', status: 'Active' },
            { name: 'Anna Cruz', dept: 'Finance', position: 'Accountant', email: 'anna@email.com', status: 'Pending' },
            { name: 'Mike Tan', dept: 'Marketing', position: 'Specialist', email: 'mike@email.com', status: 'Active' },
            { name: 'Sarah Lim', dept: 'Operations', position: 'Manager', email: 'sarah@email.com', status: 'Active' },
            { name: 'David Garcia', dept: 'IT', position: 'Admin', email: 'david@email.com', status: 'Active' },
            { name: 'Lisa Fernandez', dept: 'HR', position: 'Recruiter', email: 'lisa@email.com', status: 'Inactive' },
            { name: 'Mark Aquino', dept: 'Finance', position: 'Analyst', email: 'mark@email.com', status: 'Active' },
        ];

        const deptData = [
            { name: 'IT', code: 'IT', head: 'Maria Santos', employees: 25, status: 'Active' },
            { name: 'HR', code: 'HR', head: 'John Reyes', employees: 18, status: 'Active' },
            { name: 'Finance', code: 'FIN', head: 'Anna Cruz', employees: 15, status: 'Active' },
            { name: 'Marketing', code: 'MKT', head: 'Mike Tan', employees: 12, status: 'Active' },
            { name: 'Operations', code: 'OPS', head: 'Sarah Lim', employees: 20, status: 'Active' },
        ];

        const attData = [
            { employee: 'Maria Santos', dept: 'IT', present: 20, absent: 2, late: 1, rate: 87 },
            { employee: 'John Reyes', dept: 'HR', present: 22, absent: 0, late: 1, rate: 96 },
            { employee: 'Anna Cruz', dept: 'Finance', present: 18, absent: 3, late: 2, rate: 78 },
            { employee: 'Mike Tan', dept: 'Marketing', present: 21, absent: 1, late: 1, rate: 91 },
            { employee: 'Sarah Lim', dept: 'Operations', present: 20, absent: 2, late: 1, rate: 87 },
            { employee: 'David Garcia', dept: 'IT', present: 23, absent: 0, late: 0, rate: 100 },
            { employee: 'Lisa Fernandez', dept: 'HR', present: 15, absent: 5, late: 3, rate: 65 },
            { employee: 'Mark Aquino', dept: 'Finance', present: 22, absent: 1, late: 0, rate: 96 },
        ];

        const fileData = [
            { name: 'employee_list.xlsx', type: 'Excel', owner: 'Juan', category: 'Employee Records', size: '2.4 MB' },
            { name: 'data.csv', type: 'CSV', owner: 'Maria', category: 'Employee Records', size: '1.8 MB' },
            { name: 'records.pdf', type: 'PDF', owner: 'John', category: 'Department Reports', size: '5.2 MB' },
            { name: 'report.xlsx', type: 'Excel', owner: 'Anna', category: 'Financial Reports', size: '3.1 MB' },
            { name: 'attendance.xlsx', type: 'Excel', owner: 'Mike', category: 'Attendance Data', size: '1.2 MB' },
            { name: 'policy.docx', type: 'Word', owner: 'Sarah', category: 'Other', size: '0.8 MB' },
        ];

        // ===========================
        // TAB SWITCH
        // ===========================
        function showReport(tab) {
            document.querySelectorAll('[id^="report-"]').forEach(el => el.style.display = 'none');
            document.getElementById('report-' + tab).style.display = 'block';
            
            document.querySelectorAll('.report-tab').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('.report-tab').forEach(el => {
                if (el.textContent.trim().toLowerCase().includes(tab)) {
                    el.classList.add('active');
                }
            });

            switch(tab) {
                case 'employee': generateEmployeeReport(); break;
                case 'department': generateDepartmentReport(); break;
                case 'attendance': generateAttendanceReport(); break;
                case 'file': generateFileReport(); break;
                case 'summary': generateSummaryReport(); break;
            }
        }

        // ===========================
        // EMPLOYEE REPORT