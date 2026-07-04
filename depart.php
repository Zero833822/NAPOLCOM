<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department Management - EIMS</title>
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

        /* ===== DEPARTMENT CARDS GRID ===== */
        .dept-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-top: 10px;
        }

        .dept-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            border-left: 5px solid #0b4f8a;
            transition: all 0.3s ease;
            position: relative;
        }

        .dept-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .dept-card .dept-icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .dept-card .dept-name {
            font-size: 20px;
            font-weight: 700;
            color: #0b4f8a;
        }

        .dept-card .dept-code {
            font-size: 12px;
            color: #888;
            margin-top: 3px;
        }

        .dept-card .dept-info {
            margin: 10px 0;
            color: #555;
            font-size: 14px;
        }

        .dept-card .dept-info span {
            display: block;
            margin: 3px 0;
        }

        .dept-card .dept-actions {
            display: flex;
            gap: 8px;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #f0f0f0;
        }

        .dept-card .dept-employees {
            display: inline-block;
            background: #e3f2fd;
            color: #0b4f8a;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .dept-color-1 { border-left-color: #e53935; }
        .dept-color-2 { border-left-color: #ff9800; }
        .dept-color-3 { border-left-color: #ffc107; }
        .dept-color-4 { border-left-color: #4caf50; }
        .dept-color-5 { border-left-color: #0b4f8a; }
        .dept-color-6 { border-left-color: #9c27b0; }

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

        .form-group textarea {
            resize: vertical;
            min-height: 80px;
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

        /* ===== EMPTY STATE ===== */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #888;
        }

        .empty-state .empty-icon {
            font-size: 60px;
            margin-bottom: 15px;
        }

        .empty-state h4 {
            color: #333;
            margin-bottom: 8px;
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
            .dept-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 480px) {
            .search-bar { flex-direction: column; }
            .search-bar input { width: 100%; }
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
            <li><a href="depart.php" class="active"><span class="icon">🏢</span> <span>Departments</span></a></li>
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

        <!-- TOP HEADER -->
        <div class="top-header">
            <h1>🏢 Department Management</h1>
            <div class="user-info">
                <div>
                    <div style="font-weight:600;">Juan Dela Cruz</div>
                    <div style="font-size:12px; color:#888;">Administrator</div>
                </div>
                <div class="avatar">JD</div>
            </div>
        </div>

        <!-- DEPARTMENT CARD -->
        <div class="card">
            <h3>
                📋 Department List
                <span class="badge-count" id="deptCount">0</span>
            </h3>

            <!-- SEARCH & ACTIONS -->
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="🔍 Search departments..." oninput="filterDepartments()">
                <button class="btn btn-primary" onclick="openModal('addModal')">➕ Add Department</button>
            </div>

            <!-- DEPARTMENT GRID -->
            <div class="dept-grid" id="deptGrid">
                <!-- Dynamic from JavaScript -->
            </div>
        </div>

    </div>

    <!-- ===== ADD DEPARTMENT MODAL ===== -->
    <div class="modal-overlay" id="addModal">
        <div class="modal">
            <div class="modal-header">
                <h3>➕ Add New Department</h3>
                <button class="modal-close" onclick="closeModal('addModal')">×</button>
            </div>
            <form onsubmit="addDepartment(event)">
                <div class="form-group">
                    <label>Department Name <span style="color:red;">*</span></label>
                    <input type="text" id="deptName" placeholder="e.g., Information Technology" required>
                </div>
                <div class="form-group">
                    <label>Department Code <span style="color:red;">*</span></label>
                    <input type="text" id="deptCode" placeholder="e.g., IT" required>
                </div>
                <div class="form-group">
                    <label>Head of Department</label>
                    <input type="text" id="deptHead" placeholder="e.g., Maria Santos">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea id="deptDesc" placeholder="Brief description of the department"></textarea>
                </div>
                <div class="form-group">
                    <label>Color Theme</label>
                    <select id="deptColor">
                        <option value="dept-color-1">🔴 Red</option>
                        <option value="dept-color-2">🟠 Orange</option>
                        <option value="dept-color-3">🟡 Yellow</option>
                        <option value="dept-color-4">🟢 Green</option>
                        <option value="dept-color-5" selected>🔵 Blue</option>
                        <option value="dept-color-6">🟣 Purple</option>
                    </select>
                </div>
                <div style="display:flex; gap:10px; margin-top:20px;">
                    <button type="submit" class="btn btn-success" style="flex:1;">💾 Save Department</button>
                    <button type="button" class="btn btn-danger" onclick="closeModal('addModal')">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <!-- ===== EDIT DEPARTMENT MODAL ===== -->
    <div class="modal-overlay" id="editModal">
        <div class="modal">
            <div class="modal-header">
                <h3>✏️ Edit Department</h3>
                <button class="modal-close" onclick="closeModal('editModal')">×</button>
            </div>
            <form onsubmit="updateDepartment(event)">
                <input type="hidden" id="editDeptId">
                <div class="form-group">
                    <label>Department Name <span style="color:red;">*</span></label>
                    <input type="text" id="editDeptName" placeholder="Department name" required>
                </div>
                <div class="form-group">
                    <label>Department Code <span style="color:red;">*</span></label>
                    <input type="text" id="editDeptCode" placeholder="Department code" required>
                </div>
                <div class="form-group">
                    <label>Head of Department</label>
                    <input type="text" id="editDeptHead" placeholder="Head of department">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea id="editDeptDesc" placeholder="Department description"></textarea>
                </div>
                <div class="form-group">
                    <label>Color Theme</label>
                    <select id="editDeptColor">
                        <option value="dept-color-1">🔴 Red</option>
                        <option value="dept-color-2">🟠 Orange</option>
                        <option value="dept-color-3">🟡 Yellow</option>
                        <option value="dept-color-4">🟢 Green</option>
                        <option value="dept-color-5">🔵 Blue</option>
                        <option value="dept-color-6">🟣 Purple</option>
                    </select>
                </div>
                <div style="display:flex; gap:10px; margin-top:20px;">
                    <button type="submit" class="btn btn-primary" style="flex:1;">💾 Update Department</button>
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
        // DEPARTMENT DATA
        // ===========================
        let departments = [
            { 
                id: 1, 
                name: 'Information Technology', 
                code: 'IT', 
                head: 'Maria Santos', 
                description: 'Handles all technology infrastructure and software development',
                color: 'dept-color-1',
                employees: 25
            },
            { 
                id: 2, 
                name: 'Human Resources', 
                code: 'HR', 
                head: 'John Reyes', 
                description: 'Manages employee relations, hiring, and benefits',
                color: 'dept-color-2',
                employees: 18
            },
            { 
                id: 3, 
                name: 'Finance', 
                code: 'FIN', 
                head: 'Anna Cruz', 
                description: 'Handles budgeting, accounting, and financial reporting',
                color: 'dept-color-3',
                employees: 15
            },
            { 
                id: 4, 
                name: 'Marketing', 
                code: 'MKT', 
                head: 'Mike Tan', 
                description: 'Manages brand awareness, advertising, and promotions',
                color: 'dept-color-4',
                employees: 12
            },
            { 
                id: 5, 
                name: 'Operations', 
                code: 'OPS', 
                head: 'Sarah Lim', 
                description: 'Oversees daily operations and process optimization',
                color: 'dept-color-5',
                employees: 20
            },
            { 
                id: 6, 
                name: 'Research & Development', 
                code: 'R&D', 
                head: 'David Garcia', 
                description: 'Innovates new products and improves existing ones',
                color: 'dept-color-6',
                employees: 8
            }
        ];

        let nextDeptId = 7;

        // Department icons
        const deptIcons = {
            'Information Technology': '💻',
            'Human Resources': '👔',
            'Finance': '💰',
            'Marketing': '📢',
            'Operations': '⚙️',
            'Research & Development': '🔬'
        };

        function getDeptIcon(name) {
            return deptIcons[name] || '🏢';
        }

        // ===========================
        // RENDER DEPARTMENTS
        // ===========================
        function renderDepartments() {
            const search = document.getElementById('searchInput').value.toLowerCase();
            
            let filtered = departments.filter(dept => {
                const matchName = dept.name.toLowerCase().includes(search);
                const matchCode = dept.code.toLowerCase().includes(search);
                return matchName || matchCode;
            });

            document.getElementById('deptCount').textContent = filtered.length;

            const grid = document.getElementById('deptGrid');
            
            if (filtered.length === 0) {
                grid.innerHTML = `
                    <div class="empty-state" style="grid-column: 1 / -1;">
                        <div class="empty-icon">🏢</div>
                        <h4>No Departments Found</h4>
                        <p style="color:#888;">Click "Add Department" to create one</p>
                    </div>
                `;
                return;
            }

            grid.innerHTML = filtered.map(dept => `
                <div class="dept-card ${dept.color}">
                    <div class="dept-icon">${getDeptIcon(dept.name)}</div>
                    <div class="dept-name">${dept.name}</div>
                    <div class="dept-code">${dept.code}</div>
                    <div class="dept-info">
                        <span>👤 Head: ${dept.head || 'Not assigned'}</span>
                        <span>📝 ${dept.description || 'No description'}</span>
                        <span class="dept-employees">👥 ${dept.employees || 0} employees</span>
                    </div>
                    <div class="dept-actions">
                        <button class="btn btn-warning btn-sm" onclick="editDepartment(${dept.id})">✏️ Edit</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteDepartment(${dept.id})">🗑️ Delete</button>
                        <button class="btn btn-primary btn-sm" onclick="viewDepartment(${dept.id})">👁️ View</button>
                    </div>
                </div>
            `).join('');
        }

        // ===========================
        // FILTER DEPARTMENTS
        // ===========================
        function filterDepartments() {
            renderDepartments();
        }

        // ===========================
        // ADD DEPARTMENT
        // ===========================
        function addDepartment(event) {
            event.preventDefault();

            const newDept = {
                id: nextDeptId++,
                name: document.getElementById('deptName').value,
                code: document.getElementById('deptCode').value.toUpperCase(),
                head: document.getElementById('deptHead').value || 'Not assigned',
                description: document.getElementById('deptDesc').value || 'No description',
                color: document.getElementById('deptColor').value,
                employees: 0
            };

            departments.push(newDept);
            closeModal('addModal');
            document.getElementById('addModal').querySelector('form').reset();
            renderDepartments();
            showToast(`✅ ${newDept.name} department added successfully!`, 'success');
        }

        // ===========================
        // EDIT DEPARTMENT
        // ===========================
        function editDepartment(id) {
            const dept = departments.find(d => d.id === id);
            if (!dept) return;

            document.getElementById('editDeptId').value = dept.id;
            document.getElementById('editDeptName').value = dept.name;
            document.getElementById('editDeptCode').value = dept.code;
            document.getElementById('editDeptHead').value = dept.head === 'Not assigned' ? '' : dept.head;
            document.getElementById('editDeptDesc').value = dept.description === 'No description' ? '' : dept.description;
            document.getElementById('editDeptColor').value = dept.color;

            openModal('editModal');
        }

        // ===========================
        // UPDATE DEPARTMENT
        // ===========================
        function updateDepartment(event) {
            event.preventDefault();

            const id = parseInt(document.getElementById('editDeptId').value);
            const dept = departments.find(d => d.id === id);
            if (!dept) return;

            dept.name = document.getElementById('editDeptName').value;
            dept.code = document.getElementById('editDeptCode').value.toUpperCase();
            dept.head = document.getElementById('editDeptHead').value || 'Not assigned';
            dept.description = document.getElementById('editDeptDesc').value || 'No description';
            dept.color = document.getElementById('editDeptColor').value;

            closeModal('editModal');
            renderDepartments();
            showToast(`✅ ${dept.name} department updated successfully!`, 'success');
        }

        // ===========================
        // DELETE DEPARTMENT
        // ===========================
        function deleteDepartment(id) {
            const dept = departments.find(d => d.id === id);
            if (!dept) return;

            if (confirm(`Are you sure you want to delete "${dept.name}" department?`)) {
                departments = departments.filter(d => d.id !== id);
                renderDepartments();
                showToast(`🗑️ ${dept.name} department deleted!`, 'error');
            }
        }

        // ===========================
        // VIEW DEPARTMENT
        // ===========================
        function viewDepartment(id) {
            const dept = departments.find(d => d.id === id);
            if (!dept) return;

            showToast(`
                📋 ${dept.name}
                Code: ${dept.code}
                Head: ${dept.head}
                Employees: ${dept.employees || 0}
                Description: ${dept.description}
            `, 'info');
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
        renderDepartments();
        showToast('🏢 Welcome to Department Management!', 'info');
    </script>

</body>
</html>