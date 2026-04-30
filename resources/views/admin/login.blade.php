<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
</head>
<body style="
    margin:0;
    font-family:Arial, sans-serif;
    background:#f0f2f5;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
">

    <form method="POST" action="/admin/login" style="
        background:white;
        padding:30px;
        border-radius:10px;
        width:350px;
        box-shadow:0 5px 15px rgba(0,0,0,0.1);
    ">
        @csrf

        <h2 style="
            text-align:center;
            margin-bottom:20px;
            color:#333;
        ">
            Login Admin
        </h2>

        @if(session('error'))
            <p style="
                color:red;
                margin-bottom:15px;
                font-size:14px;
            ">
                {{ session('error') }}
            </p>
        @endif

        <!-- Username -->
        <label style="display:block; margin-bottom:5px;">Username</label>
        <input type="text" name="username" required style="
            width:100%;
            padding:10px;
            margin-bottom:15px;
            border:1px solid #ccc;
            border-radius:5px;
            box-sizing:border-box;
        ">

        <!-- Password -->
        <label style="display:block; margin-bottom:5px;">Password</label>
        <div style="position:relative;">
            <input type="password" id="password" name="password" required style="
                width:100%;
                padding:10px;
                border:1px solid #ccc;
                border-radius:5px;
                box-sizing:border-box;
            ">

            <!-- Eye Icon -->
            <span onclick="togglePassword()" style="
                position:absolute;
                right:10px;
                top:50%;
                transform:translateY(-50%);
                cursor:pointer;
                user-select:none;
                font-size:18px;
            ">
                👁️
            </span>
        </div>

        <!-- Button -->
        <button type="submit" style="
            margin-top:20px;
            width:100%;
            padding:12px;
            background:#2563eb;
            color:white;
            border:none;
            border-radius:5px;
            font-weight:bold;
            cursor:pointer;
            transition:0.2s;
        "
        onmouseover="this.style.background='#1d4ed8'"
        onmouseout="this.style.background='#2563eb'"
        >
            Login
        </button>

    </form>

<script>
function togglePassword() {
    const pass = document.getElementById('password');
    pass.type = pass.type === 'password' ? 'text' : 'password';
}
</script>

</body>
</html>