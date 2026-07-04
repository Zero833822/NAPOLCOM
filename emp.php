<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management - EIMS</title>
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

        /* ===== EMPLOYEE TABLE ===== */
        .card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .card h3 {
            color: #0b4f8a;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card h3 .badge-count {
            background: #0b4f8a;
            color: white;
            padding: 2px 12px;
            border-radius: 20px;
            font-size: 12px;
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

        .btn-sm {
            padding: 6px 12px;
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
            padding: 12px 10px;
            border-bottom: 2px solid #f0f0f0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        table td {
            padding: 12px 10px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
        }

        table tr:hover td {
            background: #f8f9fa;
        }

        table tr:last-child td {
            border-bottom: none;
        }

        /* ===== BADGES ===== */
        .badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-active {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .badge-inactive {
            background: #ffebee;
            color: #c62828;
        }

        .badge-pending {
            background: #fff3e0;
            color: #e65100;
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
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
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
        .form-group select {
            width: 100%;
            padding: 12px 14px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #0b4f8a;
            outline: none;
            box-shadow: 0 0 0 4px rgba(11, 79, 138, 0.1);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
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
        }

        @media (max-width: 480px) {
            .search-bar { flex-direction: column; }
            .search-bar input, .search-bar select { width: 100%; }
        }
    </style>
</head>
<body>

    <!-- ===== SIDEBAR ===== -->
    <div class="sidebar">
        <div class="logo">EIMS<span>.</span></div>
        <ul>
            <li><a href="dashboard.php"><span class="icon">📊</span> <span>Dashboard</span></a></li>
            <li><a href="emp.php" class="active"><span class="icon">👥</span> <span>Employees</span></a></li>
            <li><a href="depart.php"><span class="icon">🏢</span> <span>Departments</span></a></li>
            <li><a href="#"><span class="icon">📋</span> <span>Reports</span></a></li>
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

        <!-- TOP HEADER -->
        <div class="top-header">
            <h1>👥 Employee Management</h1>
            <div class="user-info">
                <div>
                    <div style="font-weight:600;">Juan Dela Cruz</div>
                    <div style="font-size:12px; color:#888;">Administrator</div>
                </div>
                <div class="avatar">JD</div>
            </div>
        </div>

        <!-- EMPLOYEE CARD -->
        <div class="card">
            <h3>
                📋 Employee List
                <span class="badge-count" id="employeeCount">0</span>
            </h3>

            <!-- SEARCH & FILTER -->
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="🔍 Search employees..." oninput="filterEmployees()">
                <select id="deptFilter" onchange="filterEmployees()">
                    <option value="">All Departments</option>
                    <option value="IT">IT</option>
                    <option value="HR">HR</option>
                    <option value="Finance">Finance</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Operations">Operations</option>
                </select>
                <button class="btn btn-primary" onclick="openModal('addModal')">➕ Add Employee</button>
            </div>

            <!-- TABLE -->
            <div class="table-wrapper">
                <table>
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
                        <!-- Dynamic rows from JavaScript -->
                    </tbody>
                </table>
            </div>

            <!-- PAGINATION -->
            <div style="display:flex; justify-content:space-between; align-items:center; margin-top:20px; flex-wrap:wrap; gap:10px;">
                <span style="color:#888; font-size:14px;" id="paginationInfo">Showing 0 of 0 employees</span>
                <div style="display:flex; gap:5px;" id="paginationButtons"></div>
            </div>
        </div>

    </div>

    <!-- ===== ADD EMPLOYEE MODAL ===== -->
    <div class="modal-overlay" id="addModal">
        <div class="modal">
            <div class="modal-header">
                <h3>➕ Add New Employee</h3>
                <button class="modal-close" onclick="closeModal('addModal')">×</button>
            </div>
            <form onsubmit="addEmployee(event)">
                <div class="form-row">
                    <div class="form-group">
                        <label>First Name <span style="color:red;">*</span></label>
                        <input type="text" id="firstName" placeholder="First name" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name <span style="color:red;">*</span></label>
                        <input type="text" id="lastName" placeholder="Last name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Email <span style="color:red;">*</span></label>
                    <input type="email" id="email" placeholder="email@company.com" required>
                </div>
                <div class="form-group">
                    <label>Department <span style="color:red;">*</span></label>
                    <select id="department" required>
                        <option value="">Select Department</option>
                        <option value="IT">IT</option>
                        <option value="HR">HR</option>
                        <option value="Finance">Finance</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Operations">Operations</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Position <span style="color:red;">*</span></label>
                    <input type="text" id="position" placeholder="Job position" required>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select id="status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                        <option value="Pending">Pending</option>
                    </select>
                </div>
                <div style="display:flex; gap:10px; margin-top:20px;">
                    <button type="submit" class="btn btn-success" style="flex:1;">💾 Save Employee</button>
                    <button type="button" class="btn btn-danger" onclick="closeModal('addModal')">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ===== EDIT EMPLOYEE MODAL ===== -->
    <div class="modal-overlay" id="editModal">
        <div class="modal">
            <div class="modal-header">
                <h3>✏️ Edit Employee</h3>
                <button class="modal-close" onclick="closeModal('editModal')">×</button>
            </div>
            <form onsubmit="updateEmployee(event)">
                <input type="hidden" id="editId">
                <div class="form-row">
                    <div class="form-group">
                        <label>First Name <span style="color:red;">*</span></label>
                        <input type="text" id="editFirstName" placeholder="First name" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name <span style="color:red;">*</span></label>
                        <input type="text" id="editLastName" placeholder="Last name" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Email <span style="color:red;">*</span></label>
                    <input type="email" id="editEmail" placeholder="email@company.com" required>
                </div>
                <div class="form-group">
                    <label>Department <span style="color:red;">*</span></label>
                    <select id="editDepartment" required>
                        <option value="IT">IT</option>
                        <option value="HR">HR</option>
                        <option value="Finance">Finance</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Operations">Operations</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Position <span style="color:red;">*</span></label>
                    <input type="text" id="editPosition" placeholder="Job position" required>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select id="editStatus">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                        <option value="Pending">Pending</option>
                    </select>
                </div>
                <div style="display:flex; gap:10px; margin-top:20px;">
                    <button type="submit" class="btn btn-primary" style="flex:1;">💾 Update Employee</button>
                    <button type="button" class="btn btn-danger" onclick="closeModal('editModal')">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ===== TOAST CONTAINER ===== -->
    <div class="toast-container" id="toastContainer"></div>

    <!-- ===== JAVASCRIPT ===== -->
    <script>
        // ===========================
        // EMPLOYEE DATA (Sample)
        // ===========================
        let employees = [
            { id: 1, firstName: 'Maria', lastName: 'Santos', email: 'maria@company.com', department: 'IT', position: 'Software Developer', status: 'Active' },
            { id: 2, firstName: 'John', lastName: 'Reyes', email: 'john@company.com', department: 'HR', position: 'HR Manager', status: 'Active' },
            { id: 3, firstName: 'Anna', lastName: 'Cruz', email: 'anna@company.com', department: 'Finance', position: 'Accountant', status: 'Pending' },
            { id: 4, firstName: 'Mike', lastName: 'Tan', email: 'mike@company.com', department: 'Marketing', position: 'Marketing Specialist', status: 'Active' },
            { id: 5, firstName: 'Sarah', lastName: 'Lim', email: 'sarah@company.com', department: 'Operations', position: 'Operations Manager', status: 'Active' },
            { id: 6, firstName: 'David', lastName: 'Garcia', email: 'david@company.com', department: 'IT', position: 'System Administrator', status: 'Active' },
            { id: 7, firstName: 'Lisa', lastName: 'Fernandez', email: 'lisa@company.com', department: 'HR', position: 'Recruiter', status: 'Inactive' },
            { id: 8, firstName: 'Mark', lastName: 'Aquino', email: 'mark@company.com', department: 'Finance', position: 'Financial Analyst', status: 'Active' },
        ];

        let nextId = 9;
        let currentPage = 1;
        const itemsPerPage = 5;

        // ===========================
        // RENDER EMPLOYEES
        // ===========================
        function renderEmployees() {
            const search = document.getElementById('searchInput').value.toLowerCase();
            const dept = document.getElementById('deptFilter').value;

            // Filter
            let filtered = employees.filter(emp => {
                const fullName = (emp.firstName + ' ' + emp.lastName).toLowerCase();
                const matchName = fullName.includes(search);
                const matchDept = dept === '' || emp.department === dept;
                return matchName && matchDept;
            });

            // Update count
            document.getElementById('employeeCount').textContent = filtered.length;

            // Pagination
            const totalPages = Math.ceil(filtered.length / itemsPerPage);
            const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const pageItems = filtered.slice(start, end);

            // Render table
            const tbody = document.getElementById('employeeTableBody');
            if (pageItems.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="6" style="text-align:center; padding:40px; color:#888;">
                            📭 No employees found
                        </td>
                    </tr>
                `;
            } else {
                tbody.innerHTML = pageItems.map((emp, index) => `
                    <tr>
                        <td>${start + index + 1}</td>
                        <td><strong>${emp.firstName} ${emp.lastName}</strong></td>
                        <td>${emp.department}</td>
                        <td>${emp.position}</td>
                        <td><span class="badge badge-${emp.status.toLowerCase()}">${emp.status}</span></td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="editEmployee(${emp.id})">✏️</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteEmployee(${emp.id})">🗑️</button>
                        </td>
                    </tr>
                `).join('');
            }

            // Update pagination info
            document.getElementById('paginationInfo').textContent = 
                `Showing ${filtered.length > 0 ? start + 1 : 0}-${Math.min(end, filtered.length)} of ${filtered.length} employees`;

            // Render pagination buttons
            renderPagination(totalPages);
        }

        // ===========================
        // PAGINATION
        // ===========================
        function renderPagination(totalPages) {
            const container = document.getElementById('paginationButtons');
            if (totalPages <= 1) {
                container.innerHTML = '';
                return;
            }

            let html = '';
            for (let i = 1; i <= totalPages; i++) {
                html += `
                    <button class="btn ${i === currentPage ? 'btn-primary' : 'btn-outline'}" 
                            style="padding:8px 15px; font-size:13px;"
                            onclick="goToPage(${i})">
                        ${i}
                    </button>
                `;
            }
            container.innerHTML = html;
        }

        function goToPage(page) {
            currentPage = page;
            renderEmployees();
        }

        // ===========================
        // FILTER EMPLOYEES
        // ===========================
        function filterEmployees() {
            currentPage = 1;
            renderEmployees();
        }

        // ===========================
        // ADD EMPLOYEE
        // ===========================
        function addEmployee(event) {
            event.preventDefault();

            const newEmp = {
                id: nextId++,
                firstName: document.getElementById('firstName').value,
                lastName: document.getElementById('lastName').value,
                email: document.getElementById('email').value,
                department: document.getElementById('department').value,
                position: document.getElementById('position').value,
                status: document.getElementById('status').value
            };

            employees.push(newEmp);
            closeModal('addModal');
            document.getElementById('addModal').querySelector('form').reset();
            renderEmployees();
            showToast(`✅ ${newEmp.firstName} ${newEmp.lastName} added successfully!`, 'success');
        }

        // ===========================
        // EDIT EMPLOYEE
        // ===========================
        function editEmployee(id) {
            const emp = employees.find(e => e.id === id);
            if (!emp) return;

            document.getElementById('editId').value = emp.id;
            document.getElementById('editFirstName').value = emp.firstName;
            document.getElementById('editLastName').value = emp.lastName;
            document.getElementById('editEmail').value = emp.email;
            document.getElementById('editDepartment').value = emp.department;
            document.getElementById('editPosition').value = emp.position;
            document.getElementById('editStatus').value = emp.status;

            openModal('editModal');
        }

        // ===========================
        // UPDATE EMPLOYEE
        // ===========================
        function updateEmployee(event) {
            event.preventDefault();

            const id = parseInt(document.getElementById('editId').value);
            const emp = employees.find(e => e.id === id);
            if (!emp) return;

            emp.firstName = document.getElementById('editFirstName').value;
            emp.lastName = document.getElementById('editLastName').value;
            emp.email = document.getElementById('editEmail').value;
            emp.department = document.getElementById('editDepartment').value;
            emp.position = document.getElementById('editPosition').value;
            emp.status = document.getElementById('editStatus').value;

            closeModal('editModal');
            renderEmployees();
            showToast(`✅ ${emp.firstName} ${emp.lastName} updated successfully!`, 'success');
        }

        // ===========================
        // DELETE EMPLOYEE
        // ===========================
        function deleteEmployee(id) {
            const emp = employees.find(e => e.id === id);
            if (!emp) return;

            if (confirm(`Are you sure you want to delete "${emp.firstName} ${emp.lastName}"?`)) {
                employees = employees.filter(e => e.id !== id);
                renderEmployees();
                showToast(`🗑️ ${emp.firstName} ${emp.lastName} deleted!`, 'error');
            }
        }

        // ===========================
        // MODAL FUNCTIONS
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
        // TOAST NOTIFICATIONS
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
        // KEYBOARD SHORTCUTS
        // ===========================
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                document.querySelectorAll('.modal-overlay.show').forEach(modal => {
                    modal.classList.remove('show');
                    document.body.style.overflow = 'auto';
                });
            }
        });

        // ===========================
        // INITIALIZE
        // ===========================
        renderEmployees();
        showToast('👋 Welcome to Employee Management!', 'info');
    </script>

</body>
</html>