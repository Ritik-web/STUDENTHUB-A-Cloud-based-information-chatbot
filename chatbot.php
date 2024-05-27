<!DOCTYPE html>
<html>
<head>
    <title>Chatbot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #red;
            margin: 0;
            padding: 0;
            position: relative;
        }

        .header {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            position: absolute;
            top: 10px;
            right: 10px;
            width: 100%;
            max-height: 50px;
        }

        /* Profile logo styling */
        .profile-logo {
            cursor: pointer;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-left: 10px;
        }

        /* Profile options styling */
        .profile-options {
            display: none;
            position: absolute;
            top: 60px;
            right: 10px;
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            z-index: 1;
            animation: slideDown 0.5s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .profile-options a {
            display: block;
            margin-bottom: 8px;
            color: #333;
            text-decoration: none;
        }

        .profile-options a:hover {
            text-decoration: underline;
        }

        /* Feedback button styling */
        .feedback-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 15px;
            cursor: pointer;
            border-radius: 5px;
        }

        .container {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .left-container {
            margin-right: 20px;
        }

        .left-container img {
            width: 100px;
            height: auto;
        }

        .chat-container {
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            width: 30%;
            max-height: 400px;
            overflow-y: auto;
            margin: 10px;
            padding: 20px;
        }

        .chat {
            margin: 10px 0;
            padding: 10px;
            border-radius: 15px;
        }

        .user-message {
            background-color: #e1ffc7;
            align-self: flex-start;
        }

        .chatbot-message {
            background-color: #c3d6e8;
            align-self: flex-end;
        }

        .user-input {
            width: 90%;
            border: none;
            border-top: 1px solid #ccc;
            border-left: 2px;
            padding: 15px;
            font-size: 16px;
        }

        .send-button-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .send-button {
            flex-grow: 1;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 15px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="header">
        <!-- Profile logo with ID for event handling -->
        <img id="profileLogo" class="profile-logo" src="profilelogo.png" alt="Profile Logo">
        <!-- Profile options with ID for event handling -->
        <div class="profile-options" id="profileOptions">
            <a href="#">My Profile</a>
            <a href="#" id="signoutOption">Signout</a>
        </div>
    </div>

    <div class="container">
        <div class="left-container">
            <img src="chatbotimage.jpeg" alt="Image">
        </div>
        <div class="chat-container">
            <h1>Chatbot</h1>
            <div class="chat" id="chat">
                <div class="chatbot-message">Chatbot: Hello! How can I help you?</div>
            </div>
            <input type="text" class="user-input" id="user-input" placeholder="Type your message">
            <button class="send-button" id="send-button">Send</button>
        </div>
    </div>

    <!-- Feedback button -->
    <button class="feedback-button" onclick="window.location.href='feedback.php'">Feedback</button>


    <script>
        // Your JavaScript code here
        let questions = [];
        let responses = [];

        // Function to add a user message to the chat
        function addUserMessage(message) {
            addMessage(`You: ${message}`, "user-message");
        }

        // Function to add a chatbot message to the chat
        function addChatbotMessage(message) {
            addMessage(`Chatbot: ${message}`, "chatbot-message");
        }

        function addMessage(message, messageType) {
            const chat = document.getElementById("chat");
            const messageDiv = document.createElement("div");
            messageDiv.textContent = message;
            messageDiv.className = `chat ${messageType}`;
            chat.appendChild(messageDiv);
        }

        // Function to handle user input and chatbot response
        function handleUserInput() {
            const userInputElement = document.getElementById("user-input");
            const userMessage = userInputElement.value;
            if (userMessage.trim() === "") {
                return; // Ignore empty messages
            }

            addUserMessage(userMessage);
            userInputElement.value = "";

            // Replace this with your logic to get a chatbot response
            const chatbotResponse = getChatbotResponse(userMessage);
            addChatbotMessage(chatbotResponse);
        }

        // Function to get a chatbot response (replace with your logic)
        function getChatbotResponse(userMessage) {
            const lowerCaseMessage = userMessage.toLowerCase();

            // Matching user input with predefined questions
            if (lowerCaseMessage.includes("course")) {
                return "I am pursuing Bachelor of Engineering.";
            } else if (lowerCaseMessage.includes("department")) {
                return "My department is Computer Science Engineering.";
            } else if (lowerCaseMessage.includes("fee")) {
                return "The fee details are available on the college website.";
            } else if (lowerCaseMessage.includes("placement")) {
                return "For placement-related queries, please visit the placement cell.";
            } else if (lowerCaseMessage.includes("exam cell")) {
                return "The exam cell handles all exam-related matters. You can visit them in person.";
            } else if (lowerCaseMessage.includes("academics")) {
                return "For academic queries, you can start asking questions.";
            } else if (lowerCaseMessage.includes("admit card")) {
                return "Your end semester admit card will be released soon. Keep an eye on your messages for updates.";
            } else if (lowerCaseMessage.includes("operating system")) {
                return "To know the date of your Operating System exam, please update your profile section with your timetable details.";
            } else if (lowerCaseMessage.includes("erp issues")) {
                return "If you have ERP issues, please contact your year coordinator for assistance.";
            } else {
                return "I'm sorry, I couldn't understand your query. Could you please rephrase?";
            }
        }

        // Add a click event listener to the "Send" button
        document.getElementById("send-button").addEventListener("click", handleUserInput);

        // Add an Enter key event listener for the input field
        document.getElementById("user-input").addEventListener("keyup", (event) => {
            if (event.key === "Enter") {
                handleUserInput();
            }
        });

        document.addEventListener("DOMContentLoaded", function () {
            var profileOptions = document.getElementById('profileOptions');
            var profileLogo = document.getElementById('profileLogo');
            var signoutOption = document.getElementById('signoutOption');

            // Event handling for profile logo click
            profileLogo.addEventListener('click', function (e) {
                e.stopPropagation(); // Prevent the click event from propagating to the body
                profileOptions.style.display = (profileOptions.style.display === 'block') ? 'none' : 'block';
            });

            // Event handling for body click to close profile options
            document.body.addEventListener('click', function () {
                profileOptions.style.display = 'none';
            });

            // Event handling for profile options click to prevent closing
            profileOptions.addEventListener('click', function (e) {
                e.stopPropagation(); // Prevent the click event from propagating to the body
            });
            signoutOption.addEventListener('click', function () {
                // Redirect to login.php
                window.location.href = 'login.php';
            });
        });
    </script>
</body>
</html>