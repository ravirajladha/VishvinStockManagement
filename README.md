# Vishvin Stock Management System

## Introduction
The Vishvin Stock Management System is a Laravel-based web application designed to manage and verify electricity meter inventory for Karnataka’s household implementation, aligning with smart metering initiatives like the Smart Meter National Programme (SMNP). It tracks meter stocks across multiple levels (warehouse, installation) for stakeholders including Admins, Project Heads, Inventory Managers, Contractors, Quality Control (QC), HESCOM officials, and Billing Meter Reading (BMR) personnel. Developed at Vishvin Technologies, this project showcases my expertise in building scalable inventory systems, supporting Karnataka’s electricity infrastructure, and complements my portfolio projects like `DigitalDoctorClinic` and `TagNCash`.

## Technologies
- **Backend**: Laravel, PHP
- **Database**: MySQL
- **Frontend**: Blade templates, Bootstrap, HTML, CSS, JavaScript
- **Tools**: Git, GitHub, Postman, Asana, Slack
- **Infrastructure**: AWS, Personal Server (demo hosting)

## Features
- **Inventory Tracking**: Manages inward/outward meter movements, box assignments, and lot creation for efficient stock control.
- **Quality Verification**: Supports QC and HESCOM verification of meter stocks and installations, ensuring compliance.
- **Role-Based Access**: Tailored dashboards for Admins, Project Heads, Inventory Managers, Contractors, QC, HESCOM, and BMR personnel.
- **Reporting**: Generates Annexure reports (1, 3, 4) and BMR reports for stock and installation status.
- **Consumer Management**: Handles consumer data and bulk uploads for meter assignments.
- **Error Handling**: Tracks and resolves issues in meter deployment with detailed error reports.
- **Stock Allocation**: Assigns meters to warehouses and installations, with serial number tracking.

## Contributions
- Designed and developed the **stock management system**, enabling precise tracking of electricity meters for Karnataka households.
- Implemented **role-based access controls**, supporting multiple stakeholders with secure, scalable architecture.
- Built **reporting features** (Annexure, BMR) for inventory and quality verification, enhancing transparency.
- Integrated **consumer data management**, streamlining meter assignments.
- Conducted research to optimize performance, ensuring reliable stock allocation and verification.
- Managed tasks via **Asana** and collaborated on **Slack**, delivering a robust solution.

## Prerequisites
- PHP >= 8.0
- Composer
- MySQL
- Node.js & NPM

## Installation
1. **Clone the Repository**:
   ```bash
   git clone https://github.com/ravirajladha/VishvinStockManagement.git
   cd VishvinStockManagement
   ```
   On Windows:
   ```powershell
   git clone https://github.com/ravirajladha/VishvinStockManagement.git
   cd VishvinStockManagement
   ```
2. **Install Dependencies**:
   ```bash
   composer install
   npm install
   ```
3. **Configure Environment**:
   - Copy `.env.example` to `.env`:
     ```bash
     copy .env.example .env
     ```
   - Update `.env` with database settings:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=vishvin_stock
     DB_USERNAME=root
     DB_PASSWORD=
     ```
4. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```
5. **Run Migrations**:
   ```bash
   php artisan migrate
   ```
6. **Seed the Database** (optional):
   ```bash
   php artisan db:seed
   ```
   Populates sample users and inventory data.
7. **Link Storage**:
   ```bash
   php artisan storage:link
   ```
8. **Compile Frontend Assets**:
   ```bash
   npm run dev
   ```
9. **Start the Server**:
   ```bash
   php artisan serve
   ```
   Access at `http://localhost:8000`.

## Using .gitignore
- The `.gitignore` file excludes sensitive files (e.g., `.env`, logs, uploads).
- Apply it:
  ```bash
  git add .gitignore
  git commit -m "Add .gitignore"
  ```
  On Windows:
  ```powershell
  git add .gitignore
  git commit -m "Add .gitignore"
  ```
- Remove tracked sensitive files:
  ```bash
  git rm --cached .env
  git rm --cached storage/app/public/*.jpg
  git commit -m "Remove sensitive files"
  ```

<!-- ## Demo
Explore the Vishvin Stock Management System’s features through a demo series: [Vishvin Stock Management Demo Series](https://www.youtube.com/playlist?list=YOUR_PLAYLIST_ID)  
Videos cover:
1. Electricity meter stock tracking and allocation
2. Role-based dashboards for Admins, QC, and HESCOM
3. Quality verification and reporting (Annexure, BMR)
4. Consumer data and installation management -->

<!-- Demo: [https://vishvinstock.ravirajladha.com](https://vishvinstock.ravirajladha.com) -->

## Testing
- Run Laravel tests:
  ```bash
  php artisan test
  ```
- Use Postman to test API endpoints (e.g., `/api/inventory`, `/api/reports`).
- Manually test stock allocation, QC verification, and report generation.

## License
This project is licensed under the **MIT License**. See the [LICENSE](LICENSE) file for details, which permits use, modification, and distribution of the code, provided the copyright notice and permission notice are included.

## Contact
For questions or feedback, reach out to [Ravi Raj Ladha](mailto:ravirajladha@gmail.com).