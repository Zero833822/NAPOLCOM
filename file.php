<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Management - EIMS</title>
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

        .badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
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

        .badge-info {
            background: #e3f2fd;
            color: #0b4f8a;
        }

        /* ===== UPLOAD AREA ===== */
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
        }

        .upload-area .upload-icon {
            font-size: 50px;
            margin-bottom: 15px;
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
            <li><a href="emp.php"><span class="icon">👥</span> <span>Employees</span></a></li>
            <li><a href="depart.php"><span class="icon">🏢</span> <span>Departments</span></a></li>
            <li><a href="report.php"><span class="icon">📋</span> <span>Reports</span></a></li>
            <li><a href="file.php" class="active"><span class="icon">📁</span> <span>Files</span></a></li>
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
            <h1>📁 File Management</h1>
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
            <button class="btn btn-primary" onclick="showTab('files')">📂 All Files</button>
            <button class="btn btn-outline" onclick="showTab('upload')">📤 Upload</button>
            <button class="btn btn-outline" onclick="showTab('versions')">🔄 Versions</button>
        </div>

        <!-- TAB 1: ALL FILES -->
        <div id="tab-files">
            <div class="card">
                <h3>
                    📂 All Files
                    <span class="badge-count" id="fileCount">0</span>
                </h3>

                <div class="search-bar">
                    <input type="text" id="fileSearch" placeholder="🔍 Search files..." oninput="filterFiles()">
                    <select id="fileTypeFilter" onchange="filterFiles()">
                        <option value="">All Types</option>
                        <option value="Excel">📊 Excel</option>
                        <option value="PDF">📄 PDF</option>
                        <option value="CSV">📋 CSV</option>
                        <option value="Word">📝 Word</option>
                        <option value="Image">🖼️ Image</option>
                    </select>
                    <button class="btn btn-success" onclick="showTab('upload')">📤 Upload New</button>
                </div>

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>File Name</th>
                                <th>Type</th>
                                <th>Version</th>
                                <th>Uploaded By</th>
                                <th>Date</th>
                                <th>Size</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="fileTableBody">
                            <!-- Dynamic -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- TAB 2: UPLOAD -->
        <div id="tab-upload" style="display:none;">
            <div class="card">
                <h3>📤 Upload File</h3>
                
                <div class="upload-area" id="dropZone">
                    <div class="upload-icon">📁</div>
                    <h4>Drop your file here</h4>
                    <p>or click to browse</p>
                    <div class="file-types">Supported: .xlsx, .xls, .csv, .pdf, .doc, .docx (Max: 10MB)</div>
                </div>

                <div class="file-preview" id="filePreview">
                    <div class="file-icon">📄</div>
                    <div class="file-info">
                        <div class="name" id="fileName">file.xlsx</div>
                        <div class="size" id="fileSize">2.4 MB</div>
                    </div>
                    <button class="remove-file" onclick="removeFile()">✕</button>
                </div>

                <div class="upload-progress" id="uploadProgress">
                    <div class="progress-bar">
                        <div class="fill" id="progressFill"></div>
                    </div>
                    <div class="progress-text" id="progressText">Uploading... 0%</div>
                </div>

                <div style="margin-top:20px;">
                    <div class="form-group">
                        <label>File Description</label>
                        <input type="text" id="fileDesc" placeholder="e.g., Employee List - July 2026">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select id="fileCategory">
                            <option>Employee Records</option>
                            <option>Department Reports</option>
                            <option>Attendance Data</option>
                            <option>Financial Reports</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <button class="btn btn-success" style="width:100%;" onclick="simulateUpload()">
                        📤 Upload File
                    </button>
                </div>
            </div>
        </div>

        <!-- TAB 3: VERSIONS -->
        <div id="tab-versions" style="display:none;">
            <div class="card">
                <h3>🔄 File Versions</h3>
                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>File Name</th>
                                <th>Version</th>
                                <th>Uploaded</th>
                                <th>Size</th>
                                <th>Changes</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="versionTableBody">
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
        // FILE DATA
        // ===========================
        let files = [
            { id: 1, name: 'employee_list_2026.xlsx', type: 'Excel', version: 3, uploadedBy: 'Juan Dela Cruz', date: '2026-07-04 14:30', size: '2.4 MB', category: 'Employee Records' },
            { id: 2, name: 'employee_data_v2.csv', type: 'CSV', version: 2, uploadedBy: 'Maria Santos', date: '2026-07-03 10:15', size: '1.8 MB', category: 'Employee Records' },
            { id: 3, name: 'employee_records.pdf', type: 'PDF', version: 1, uploadedBy: 'John Reyes', date: '2026-07-02 08:45', size: '5.2 MB', category: 'Department Reports' },
            { id: 4, name: 'department_report.xlsx', type: 'Excel', version: 5, uploadedBy: 'Anna Cruz', date: '2026-07-01 16:20', size: '3.1 MB', category: 'Financial Reports' },
            { id: 5, name: 'attendance_july.xlsx', type: 'Excel', version: 1, uploadedBy: 'Mike Tan', date: '2026-06-30 12:00', size: '1.2 MB', category: 'Attendance Data' },
            { id: 6, name: 'company_policy.docx', type: 'Word', version: 4, uploadedBy: 'Sarah Lim', date: '2026-06-29 09:30', size: '0.8 MB', category: 'Other' },
        ];

        let nextFileId = 7;

        // Versions data
        const versions = [
            { file: 'employee_list.xlsx', version: 'v3', date: '2026-07-04', size: '2.4 MB', changes: 'Added new employees' },
            { file: 'employee_list.xlsx', version: 'v2', date: '2026-06-28', size: '2.1 MB', changes: 'Updated department info' },
            { file: 'employee_list.xlsx', version: 'v1', date: '2026-06-15', size: '1.8 MB', changes: 'Initial upload' },
            { file: 'department_report.xlsx', version: 'v5', date: '2026-07-01', size: '3.1 MB', changes: 'Added Q2 data' },
            { file: 'department_report.xlsx', version: 'v4', date: '2026-06-20', size: '2.8 MB', changes: 'Fixed formatting' },
            { file: 'company_policy.docx', version: 'v4', date: '2026-06-29', size: '0.8 MB', changes: 'Added new policies' },
        ];

        // ===========================
        // RENDER FILES
        // ===========================
        function renderFiles() {
            const search = document.getElementById('fileSearch').value.toLowerCase();
            const typeFilter = document.getElementById('fileTypeFilter').value;

            let filtered = files.filter(f => {
                const matchName = f.name.toLowerCase().includes(search);
                const matchType = typeFilter === '' || f.type === typeFilter;
                return matchName && matchType;
            });

            document.getElementById('fileCount').textContent = filtered.length;

            const tbody = document.getElementById('fileTableBody');
            if (filtered.length === 0) {
                tbody.innerHTML = `
                    <tr>
                        <td colspan="7" style="text-align:center; padding:40px; color:#888;">
                            📭 No files found
                        </td>
                    </tr>
                `;
                return;
            }

            tbody.innerHTML = filtered.map(f => `
                <tr>
                    <td><strong>${getFileIcon(f.type)} ${f.name}</strong></td>
                    <td><span class="badge badge-info">${f.type}</span></td>
                    <td><span class="badge badge-success">v${f.version}</span></td>
                    <td>${f.uploadedBy}</td>
                    <td>${f.date}</td>
                    <td>${f.size}</td>
                    <td>
                        <button class="btn btn-success btn-sm">📥</button>
                        <button class="btn btn-warning btn-sm">✏️</button>
                        <button class="btn btn-danger btn-sm" onclick="deleteFile(${f.id})">🗑️</button>
                    </td>
                </tr>
            `).join('');
        }

        function getFileIcon(type) {
            const icons = {
                'Excel': '📊',
                'PDF': '📄',
                'CSV': '📋',
                'Word': '📝',
                'Image': '🖼️'
            };
            return icons[type] || '📁';
        }

        // ===========================
        // RENDER VERSIONS
        // ===========================
        function renderVersions() {
            const tbody = document.getElementById('versionTableBody');
            tbody.innerHTML = versions.map(v => `
                <tr>
                    <td><strong>${v.file}</strong></td>
                    <td><span class="badge badge-success">${v.version}</span></td>
                    <td>${v.date}</td>
                    <td>${v.size}</td>
                    <td>${v.changes}</td>
                    <td>
                        <button class="btn btn-success btn-sm">📥</button>
                        <button class="btn btn-primary btn-sm">↩️ Restore</button>
                    </td>
                </tr>
            `).join('');
        }

        // ===========================
        // FILTER FILES
        // ===========================
        function filterFiles() {
            renderFiles();
        }

        // ===========================
        // DELETE FILE
        // ===========================
        function deleteFile(id) {
            const file = files.find(f => f.id === id);
            if (!file) return;

            if (confirm(`Delete "${file.name}"?`)) {
                files = files.filter(f => f.id !== id);
                renderFiles();
                showToast(`🗑️ ${file.name} deleted!`, 'error');
            }
        }

        // ===========================
        // TABS
        // ===========================
        function showTab(tab) {
            document.querySelectorAll('[id^="tab-"]').forEach(el => el.style.display = 'none');
            document.getElementById('tab-' + tab).style.display = 'block';
            
            // Update button styles
            document.querySelectorAll('.btn-primary, .btn-outline').forEach(b => {
                if (b.textContent.includes('All Files')) b.className = 'btn btn-outline';
                if (b.textContent.includes('Upload')) b.className = 'btn btn-outline';
                if (b.textContent.includes('Versions')) b.className = 'btn btn-outline';
            });
            
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(b => {
                if (b.textContent.includes('All Files') && tab === 'files') b.className = 'btn btn-primary';
                if (b.textContent.includes('Upload') && tab === 'upload') b.className = 'btn btn-primary';
                if (b.textContent.includes('Versions') && tab === 'versions') b.className = 'btn btn-primary';
            });

            if (tab === 'versions') renderVersions();
        }

        // ===========================
        // FILE UPLOAD UI
        // ===========================
        const dropZone = document.getElementById('dropZone');
        const fileInput = document.createElement('input');
        fileInput.type = 'file';
        fileInput.accept = '.xlsx,.xls,.csv,.pdf,.doc,.docx';
        fileInput.style.display = 'none';
        document.body.appendChild(fileInput);

        dropZone.addEventListener('click', () => fileInput.click());

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
        // SIMULATE UPLOAD
        // ===========================
        function simulateUpload() {
            const preview = document.getElementById('filePreview');
            const progress = document.getElementById('uploadProgress');
            const fill = document.getElementById('progressFill');
            const text = document.getElementById('progressText');
            const btn = document.querySelector('.btn-success');

            if (!preview.classList.contains('show')) {
                showToast('Please select a file first!', 'warning');
                return;
            }

            btn.disabled = true;
            btn.textContent = '⏳ Uploading...';
            progress.classList.add('show');

            let value = 0;
            const interval = setInterval(() => {
                value += Math.random() * 10 + 5;
                if (value >= 100) {
                    value = 100;
                    clearInterval(interval);

                    // Add to files list
                    const name = document.getElementById('fileName').textContent;
                    const ext = name.split('.').pop().toUpperCase();
                    const typeMap = { 'XLSX': 'Excel', 'XLS': 'Excel', 'CSV': 'CSV', 'PDF': 'PDF', 'DOC': 'Word', 'DOCX': 'Word' };
                    
                    files.push({
                        id: nextFileId++,
                        name: name,
                        type: typeMap[ext] || 'Other',
                        version: 1,
                        uploadedBy: 'Juan Dela Cruz',
                        date: new Date().toLocaleString(),
                        size: document.getElementById('fileSize').textContent,
                        category: document.getElementById('fileCategory').value
                    });

                    setTimeout(() => {
                        showToast('✅ File uploaded successfully!', 'success');
                        progress.classList.remove('show');
                        removeFile();
                        btn.disabled = false;
                        btn.textContent = '📤 Upload File';
                        renderFiles();
                        showTab('files');
                    }, 500);
                }
                fill.style.width = value + '%';
                text.textContent = 'Uploading... ' + Math.round(value) + '%';
            }, 200);
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
        renderFiles();
        showToast('📁 Welcome to File Management!', 'info');
    </script>

</body>
</html>