## About Application
The Customer Management system is a comprehensive application that enables efficient management of customer data through full CRUD (Create, Read, Update, Delete) functionalities. It features managing customer information ensuring a smooth and responsive user experience.

The frontend of the Customer Management application leverages modern web development tools, including Vite, Tailwind CSS, and DaisyUI. Vite acts as the build tool for the application, providing fast and efficient asset compilation. With its optimized development environment, Vite offers instant hot module replacement (HMR), allowing developers to see changes in real time without refreshing the browser. This speed and efficiency enhance productivity and streamline the development workflow.

Tailwind CSS serves as the foundation for the application’s user interface. This utility-first CSS framework allows for rapid and flexible design with minimal custom CSS. By using predefined utility classes, Tailwind promotes consistency and maintainability across the application. This approach ensures that layouts and components are highly customizable, responsive, and aligned with modern design trends, enabling developers to create visually appealing and cohesive interfaces while keeping the CSS codebase clean and manageable.

To facilitate component-based design, the application integrates DaisyUI, a Tailwind CSS plugin that provides a rich set of pre-designed UI components. DaisyUI simplifies the creation of beautiful and functional components, such as buttons, cards, and modals, which can be easily customized using Tailwind's utility classes. Additionally, the application utilizes Toastr for displaying real-time notifications and alerts, enhancing the user experience with timely feedback on actions such as customer creation, updates, or deletions.

## Features
Backend: Laravel 11 (PHP framework) Frontend: Vite (build tool), Tailwind CSS (CSS framework), DaisyUI (component library) Authentication: Laravel Breeze

## Setup Instructions
Ensure the following are installed on your machine:

PHP 8.0+
Composer
MySQL

## Installation Steps

Clone the Repository https://github.com/SivarajVijithan452/crud_task.git

Open your terminal and run the following command to clone the repository:

git clone 

## Install Backend Dependencies

composer install

## Install Frontend Dependencies

npm install

Open the .env file in a text editor and configure the following settings:

Database Connection: Update DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD to match your database setup. 

## Run the following command to start the backend server:

php artisan serve

## Start the Frontend Development Server

Open another terminal window and start the frontend server:

npm run dev

This will start the Vite development server