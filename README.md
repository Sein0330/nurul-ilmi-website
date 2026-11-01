# 🕌 Nurul Ilmi - Educational Portal & Learning Management System

A **production-grade** full-stack web application designed for **Bimbel (Bimbingan Belajar) Nurul Ilmi**. This platform automates the student registration process, manages multi-role users, and integrates seamlessly with external automation tools for real-time data syncing and email notifications.

Built from scratch to solve real-world operational needs, focusing on a **seamless SPA-like user experience** and **robust backend automation**.

---

## ✨ Key Features

*   **Multi-Role Authentication (RBAC):** Secure login system with distinct access levels: `Super Admin`, `Admin`, `Staff`, and `Student`.
*   **SPA-Like Navigation:** Utilizes Livewire's dynamic component rendering to switch between pages (Home, Programs, Mentors, Registration) without full page reloads.
*   **Interactive Registration Form:** A real-time validated form that allows students to enroll in specific programs and packages.
*   **Automated Workflow (n8n Integration):** When a student registers, the system triggers a webhook to an n8n instance, which automatically:
    *   Appends the registration data to **Google Sheets**.
    *   Sends a formatted **Email Notification** to the Admin.
*   **Email Verification:** Requires students to verify their email address before accessing the dashboard (using SMTP).
*   **Responsive Admin Dashboard:** Allows admins to view registration metrics, track pending enrollments, and manage student data.
*   **Cloudflare Tunnel Deployment:** Exposed securely to the public internet via Cloudflare Tunnels (running on a self-hosted WSL environment).

---

## 🛠️ Tech Stack

**Backend & Core:**
*   **Laravel 12.x** - PHP Framework
*   **Livewire 3** - Full-stack framework for dynamic, reactive UI
*   **Spatie Laravel-Permission** - Role and permission management
*   **SQLite** - Lightweight, file-based relational database

**Frontend:**
*   **Tailwind CSS** - Utility-first CSS framework (Custom "Young Brown" theme)
*   **Alpine.js** - Lightweight JavaScript for interactive elements
*   **Vite** - Frontend asset bundling

**Automation & External APIs:**
*   **n8n** (Self-hosted via Docker) - Workflow automation
*   **Google Sheets API** - Data replication and reporting
*   **Gmail API / SMTP** - Automated email dispatching

**Infrastructure:**
*   **WSL2 (Ubuntu)** - Development and hosting environment
*   **Cloudflare Tunnels** - Secure public routing
*   **Systemd** - Process management for 24/7 uptime

---

## 🚀 System Architecture Flow

1.  **User Registers:** Student creates an account on the landing page.
2.  **Email Verification:** Laravel sends a verification link via SMTP.
3.  **Form Submission:** Verified students fill out the enrollment form.
4.  **Database & Webhook:** Laravel saves the data to SQLite and simultaneously fires an HTTP POST request to the n8n webhook.
5.  **Automation:** n8n receives the payload, appends a row to the designated Google Spreadsheet, and triggers an email notification to the Admin.
6.  **Admin Action:** Admin logs into the dashboard to review and verify the registration.

---

## 💻 Local Development Setup

If you wish to run this project locally, follow these steps:

1. Clone the repository:
   ```bash
   git clone https://github.com/username/nurul-ilmi-portal.git
   cd nurul-ilmi-portal
2. Install PHP & Node dependencies:
	```bash
	composer install
	npm install
3. Copy the environment file and generate app key:
	```bash
	cp .env.example .env
	php artisan key:generate
4. Configure your .env (Database, Mail, and n8n Webhook URL).
5. Run migrations and seeders:
	```bash
	touch database/database.sqlite
	php artisan migrate --seed
6. Build assets and serve:
	```bash
	npm run build
	php artisan serve --port=8081

👨‍💻 Author
[Almaarij]

GitHub: @sein0103
LinkedIn: Yopi Alma Arij

Built with passion to modernize educational administration.
