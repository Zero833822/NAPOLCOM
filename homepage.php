<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Employee Information Management System</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:#f4f6f9;
}

header{
    background:#0b4f8a;
    color:#fff;
    padding:15px 50px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

header h2{
    font-size:24px;
}

nav a{
    color:#fff;
    text-decoration:none;
    margin-left:20px;
    font-weight:bold;
}

.hero{
    height:80vh;
    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
    background:linear-gradient(rgba(0,0,0,.55),rgba(0,0,0,.55)),
    url("https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=1600&q=80");
    background-size:cover;
    background-position:center;
    color:white;
}

.hero h1{
    font-size:50px;
}

.hero p{
    margin:20px 0;
    font-size:18px;
}

.btn{
    display:inline-block;
    background:#ffc107;
    color:#000;
    padding:12px 25px;
    border-radius:5px;
    text-decoration:none;
    font-weight:bold;
}

.features{
    width:90%;
    margin:60px auto;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
}

.card{
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.1);
}

.card h3{
    color:#0b4f8a;
    margin-bottom:15px;
}

footer{
    background:#0b4f8a;
    color:white;
    text-align:center;
    padding:20px;
}
</style>

</head>

<body>

<header>
    <img src="mhbp151.png">

    <nav>
        <a href="#">Home</a>
        <a href="#">Employees</a>
        <a href="#">Departments</a>
        <a href="#">Reports</a>
        <a href="#">Login</a>
    </nav>
</header>

<section class="hero">

<div>

<h1>Welcome to EIMS</h1>

<p>
Manage employee records quickly, securely, and efficiently.
</p>

<a href="login.php" class="btn">Login</a>

</div>

</section>

<section class="features">

<div class="card">
<h3>Employee Records</h3>
<p>Store and manage employee information securely.</p>
</div>

<div class="card">
<h3>Departments</h3>
<p>Organize employees by department and position.</p>
</div>

<div class="card">
<h3>Reports</h3>
<p>Generate employee and department reports.</p>
</div>

<div class="card">
<h3>User Accounts</h3>
<p>Administrator and staff login with role management.</p>
</div>

</section>

<footer>
<p>&copy; 2026 Employee Information Management System</p>
</footer>

</body>
</html>
