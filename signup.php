<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            background-image: url('photoo2.jpg'); /* Replace with your image path */
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #87CEEB; /* Sky blue color */
            max-width: 700px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
           
        }

        h2 {
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        input, select {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            
            margin-left: 8px;
        }

        select {
            width: 200px;
        }

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

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        a {
            color: #333;
            text-decoration: none;
            display: block;
            margin-top: 10px;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Sign Up</h2>
    
    <form action="process_signup.php" method="post">
        <!-- User Type -->
        
        <select name="userType" required>
            <!-- Remove admin option -->
            <option value="" selected disabled>Select</option>
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
        </select><br>

        <!-- Name, Email, Phone, Password, Confirm Password -->
        <input type="text" name="name" placeholder="Name" required><br>

       
        <input type="email" name="email" placeholder="Email" required><br>

        
        <input type="phone" name="phone" placeholder="Phone" required><br>

        
        <input type="password" name="password" placeholder="Password" required><br>

        
        <input type="password" name="confirmPassword" placeholder="Confirm Password" required><br>

        <!-- Signup Button -->
        <input type="submit" value="Sign Up">

        <!-- Back to Home link -->
        <a href="../index.html">Back to Home</a>
    </form>
</body>
</html>
