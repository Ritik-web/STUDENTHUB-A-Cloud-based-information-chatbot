<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* General styling for the body */
        body {
            background-image: url('photoo2.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Header styling for profile options */
     
        /* Styling for the login container */
        .container {
            background-color: #87CEEB;
            max-width: 700px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 220px;
            height: 320px;
            position: relative;
        }

        /* Styling for the heading */
        h2 {
            color: #333;
        }

        /* Styling for the form */
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Styling for input and select elements */
        input, select {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            width: 175px;
            margin-left: 8px;
        }

        /* Styling for select element */
        select {
            width: 200px;
        }

        /* Styling for the submit button */
        input[type="submit"] {
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            padding: 10px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-top: 6px;
            margin-left: 10px;
            width: 197px;
        }

        /* Styling for the submit button on hover */
        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Styling for the back to home link */
        a {
            color: #333;
            text-decoration: none;
            display: block;
            margin-top: 10px;
        }

        /* Styling for the back to home link on hover */
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Profile options header -->
    

    <!-- Login container -->
    <div class="container">
        <!-- Login heading -->
        <h2>Login</h2>
        
        <!-- Login form -->
        <form action="process_login.php" method="post">
            <!-- User Type selection -->
            <select name="userType" required>
                <option value="admin">Admin</option>
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select>

            <!-- Email and Password input fields -->
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>

            <!-- Login button -->
            <input type="submit" value="Login">
        </form>

        <!-- Back to home link -->
        <a href="../index.html">Back to Home</a>
    </div>

    <!-- JavaScript for profile options event handling -->

</body>
</html>
