
# **Robot Control and Command Monitoring Interface**

This project integrates two key functionalities:

1. **Robot Control Interface**: A web-based platform for issuing movement commands to a robot, with each command stored in a database for tracking.
2. **Robot Command Monitoring Interface**: A web-based platform for displaying the last five commands issued to the robot, with the most recent command distinctly highlighted for quick recognition.

## **Key Features**

- **Interactive Control Panel**: A user-friendly interface allows the operator to send commands such as "Forward," "Backward," "Left," "Right," and "Stop" to the robot.
- **Command Logging**: Every command issued is logged in a MySQL database, creating a record that can be reviewed or analyzed later.
- **Command History Visualization**: The most recent five commands are displayed, with the latest command visually distinguished by a unique color and an arrow marker.
- **Responsive Design**: The interfaces are optimized for various screen sizes, ensuring accessibility across different devices.

## **Project Directory Structure**

```bash
robot_control/
├── index.html               # Web interface for issuing robot commands (Task 1)
├── send_command.php         # PHP script to process and log commands (Task 1)
├── show_data.html           # Web interface for displaying command history (Task 2)
├── get_last_five_values.php # PHP script to retrieve command history (Task 2)
└── README.md                # Project documentation
```

## **Installation and Setup**

### **1. System Requirements**

- **XAMPP** (or any other LAMP/WAMP stack) to provide Apache and MySQL services.
- Familiarity with HTML, CSS, JavaScript, and PHP is recommended.

### **2. Database Configuration**

1. Launch **phpMyAdmin** or your preferred MySQL management tool.
2. Create a new database named `robot_control`.
3. Run the following SQL script to create the `robot_commands` table:

```sql
CREATE TABLE `robot_commands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `command` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);
```

**Visual Example of the Database Structure:**

![Database Structure](./screenshots/Commands-on-Database.PNG)

### **3. Project Deployment**

1. Clone or download the project files to your local web server’s root directory (e.g., `C:/xampp/htdocs/robot_control/`).

2. Ensure all project files (`index.html`, `send_command.php`, `show_data.html`, `get_last_five_values.php`) are correctly placed within the `robot_control` directory.

3. Start your Apache and MySQL services using XAMPP or your server management tool.

## **Task 1: Robot Control Interface**

### **1. Accessing the Control Interface**

1. Open your web browser.
2. Navigate to the control panel using the following URL:
   ```
   http://localhost/robot_control/index.html
   ```
3. Use the interface buttons to issue commands to the robot.

**Screenshot of the Control Interface:**

![Control Interface](./screenshots/Interface-Robot-Commands.PNG)

### **2. Technical Overview**

- **index.html**: The user interface for sending commands to the robot. It features buttons for each direction and provides feedback on command execution.
- **send_command.php**: This backend script captures the command from the interface, logs it into the `robot_commands` table, and returns a status message to the user.

### **3. Customization Options**

- **Adding Commands**: Extend the interface by modifying `index.html` to include additional command buttons.
- **Enhancing Database Logging**: Modify the `robot_commands` table schema to store additional information, such as user IDs or command parameters.

## **Task 2: Robot Command Monitoring Interface**

### **1. Accessing the Monitoring Interface**

1. Open your web browser.
2. Navigate to the monitoring interface using the following URL:
   ```
   http://localhost/robot_control/show_data.html
   ```
3. The interface will display the last five commands issued to the robot, with the most recent command highlighted for easy identification.

**Screenshot of the Monitoring Interface:**

![Command Monitoring Interface](./screenshots/Show-Last-Commands-Page.PNG)

### **2. Technical Overview**

- **show_data.html**: This web page displays the last five commands issued to the robot, with the most recent command highlighted by an arrow and unique color.
- **get_last_five_values.php**: The backend PHP script retrieves the last five commands from the `robot_commands` table and provides this data to the frontend as a JSON response.

### **3. Customization Options**

- **Adjusting Command Display**: By default, the interface shows the last five commands. To alter this number, modify the `LIMIT` clause in `get_last_five_values.php` and adjust the HTML accordingly.
- **Styling Enhancements**: Modify the CSS in `show_data.html` to customize the appearance of the highlighted command or to add additional visual effects.

## **Common Troubleshooting**

- **404 Errors**: Ensure that all files are correctly placed in the `htdocs` directory and that URLs are correctly entered.
- **Data Not Displaying**: If no commands are displayed, verify that the `robot_commands` table contains data. You can test by manually inserting entries via phpMyAdmin or using the control interface from Task 1.
- **Database Connection Issues**: Check the database connection details in `send_command.php` and `get_last_five_values.php` to ensure they are correct. Confirm that the MySQL service is running.

## **Future Enhancements**

- **Command Analytics**: Develop a dashboard to analyze command usage patterns and performance metrics.
- **User Authentication**: Introduce user authentication to manage access to the command interfaces.
- **Full Integration**: Combine the control and monitoring interfaces into a single, unified command center for streamlined operation.

## **License**

This project is distributed under the MIT License. You are free to use, modify, and distribute this software in your own projects.

