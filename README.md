# 📋 CandidatureTracker

> A Laravel web application for structured, personalised job application tracking.

---

## Table of Contents

- [About the Project](#about-the-project)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Project Structure](#project-structure)
- [Database](#database)
- [Getting Started](#getting-started)
- [Available Commands](#available-commands)
- [Routes](#routes)
- [User Stories](#user-stories)
- [Testing](#testing)
- [Git Strategy](#git-strategy)
- [Security](#security)
- [Author](#author)

---

## About the Project

Managing a job search across dozens of companies quickly becomes overwhelming when handled informally through notes or spreadsheets. **CandidatureTracker** solves this by centralising every application, interview, and follow-up in one private, structured web application.

Each user has their own dashboard. Every application is tracked with its status, priority, and history of interviews. Files like CVs and cover letters can be attached directly. Completed processes are archived rather than deleted — and can be restored at any time.

---

## Features

| # | Feature | Description |
|---|---------|-------------|
| US1 | Authentication | Register, log in, log out via Laravel Breeze |
| US2 | Applications list | View all active applications with key info at a glance |
| US3 | Create application | Save company, position, URL, status, priority, notes, date, file |
| US4 | Application detail | Full detail view with all linked interviews |
| US5 | Edit application | Update any field including replacing the attached file |
| US6 | Archive | Soft-delete an application — removes from list without destroying data |
| US7 | Archive page | Dedicated page listing all archived applications |
| US8 | Restore | Restore an archived application back to the active list |
| US9 | Filters | Filter the list by status and/or priority |
| US10 | Add interview | Attach an interview (type, date, notes, result) to an application |
| US11 | Edit / Delete interview | Update or remove an interview |
| Bonus | File storage | Upload CV or cover letter — stored locally, downloadable, auto-deleted |
| Bonus | PEST tests | Automated tests covering auth, CRUD, policies (403), soft delete cycle |

---

## Tech Stack

| Layer | Technology |
|-------|------------|
| Framework | Laravel 11 |
| Authentication | Laravel Breeze (Blade stack) |
| Frontend | Blade + Tailwind CSS |
| Database | MySQL 8 |
| Testing | PEST PHP |
| Debug (N+1) | Laravel Debugbar (dev only) |
| File Storage | Laravel Storage — `local` disk |
| Soft Deletes | Laravel `SoftDeletes` trait |

---

## Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── ApplicationController.php   # index, create, store, show, edit,
│   │   │                               # update, destroy, archive, restore, download
│   │   └── InterviewController.php     # create, store, edit, update, destroy
│   ├── Requests/
│   │   ├── StoreApplicationRequest.php
│   │   ├── UpdateApplicationRequest.php
│   │   ├── StoreInterviewRequest.php
│   │   └── UpdateInterviewRequest.php
│   └── Policies/
│       ├── ApplicationPolicy.php       # view, update, delete, restore
│       └── InterviewPolicy.php         # update, delete
├── Models/
│   ├── Application.php                 # SoftDeletes, accessors, relations, boot hook
│   └── Interview.php                   # accessors, relations
└── Providers/
    └── AuthServiceProvider.php         # policy registration

database/
├── migrations/
│   ├── ..._create_applications_table.php
│   └── ..._create_interviews_table.php
└── factories/
    ├── ApplicationFactory.php
    └── InterviewFactory.php

resources/views/
├── layouts/
│   └── app.blade.php                   # master layout, nav, flash messages
├── applications/
│   ├── index.blade.php                 # list + filter form
│   ├── create.blade.php                # new application form
│   ├── edit.blade.php                  # edit form (pre-filled)
│   ├── show.blade.php                  # detail + interviews
│   └── archive.blade.php              # archived applications
└── interviews/
    ├── create.blade.php                # add interview form
    └── edit.blade.php                  # edit interview form

routes/
└── web.php                             # all named routes, auth middleware

tests/
└── Feature/
    ├── AuthTest.php
    ├── ApplicationTest.php
    └── InterviewTest.php
```

---

## Database

### Entity Relationship

```
users           applications          interviews
─────────       ────────────          ──────────
id         1──N id                1──N id
name            user_id (FK)           application_id (FK)
email           company                type (enum)
password        position               scheduled_at
...             url                    notes
                status (enum)          result (enum)
                priority (enum)        created_at
                notes                  updated_at
                file_path
                applied_at
                deleted_at   ← SoftDeletes
                timestamps
```

### Application statuses

| Key | Label |
|-----|-------|
| `applied` | Application sent |
| `phone_screen` | Phone screen |
| `interview` | Interview |
| `technical_test` | Technical test |
| `offer` | Offer received |
| `rejected` | Rejected |
| `accepted` | Accepted |

### Application priorities

| Key | Label |
|-----|-------|
| `low` | Low |
| `medium` | Medium |
| `high` | High |

### Interview types

`phone` · `video` · `onsite` · `technical` · `hr`

### Interview results

`pending` · `passed` · `failed` · `cancelled`

---

## Getting Started

### Prerequisites

- PHP >= 8.2
- Composer
- Node.js >= 18 + npm
- MySQL 8

### Installation

```bash
# 1. Clone the repository
git clone https://github.com/your-username/CandidatureTracker.git
cd CandidatureTracker

# 2. Install PHP dependencies
composer install

# 3. Install JS dependencies and build assets
npm install && npm run dev

# 4. Environment setup
cp .env.example .env
php artisan key:generate
```

### Configure the database

Open `.env` and set your database credentials:

```env
DB_DATABASE=candidature_tracker
DB_USERNAME=root
DB_PASSWORD=your_password
```

### Run migrations

```bash
php artisan migrate
```

### Install Breeze (authentication)

```bash
composer require laravel/breeze --dev
php artisan breeze:install blade
npm install && npm run dev
php artisan migrate
```

### Install Debugbar (dev — N+1 detection)

```bash
composer require barryvdh/laravel-debugbar --dev
php artisan vendor:publish --provider="Barryvdh\Debugbar\ServiceProvider"
```

### Start the development server

```bash
# Terminal 1
php artisan serve

# Terminal 2
npm run dev
```

Open [http://127.0.0.1:8000](http://127.0.0.1:8000) in your browser.

---

## Available Commands

```bash
# Run all tests
php artisan test

# Run a specific test file
php artisan test --filter AuthTest
php artisan test --filter ApplicationTest
php artisan test --filter InterviewTest

# Run tests with coverage report
php artisan test --coverage

# List all named routes
php artisan route:list

# Create the storage symlink (for public file access)
php artisan storage:link

# Clear all caches
php artisan optimize:clear
```

---

## Routes

### Authentication

| Method | URI | Name |
|--------|-----|------|
| GET | `/register` | `register` |
| POST | `/register` | `register.store` |
| GET | `/login` | `login` |
| POST | `/login` | `login.store` |
| POST | `/logout` | `logout` |

### Applications *(auth middleware)*

| Method | URI | Name | Description |
|--------|-----|------|-------------|
| GET | `/applications` | `applications.index` | List + filters |
| GET | `/applications/archive` | `applications.archive` | ⚠ Declared **before** resource |
| PATCH | `/applications/{id}/restore` | `applications.restore` | Restore soft-deleted |
| GET | `/applications/create` | `applications.create` | Create form |
| POST | `/applications` | `applications.store` | Save new |
| GET | `/applications/{application}` | `applications.show` | Detail page |
| GET | `/applications/{application}/edit` | `applications.edit` | Edit form |
| PUT | `/applications/{application}` | `applications.update` | Save edits |
| DELETE | `/applications/{application}` | `applications.destroy` | Soft delete |
| GET | `/applications/{application}/download` | `applications.download` | Download file |

### Interviews *(auth middleware)*

| Method | URI | Name |
|--------|-----|------|
| GET | `/applications/{application}/interviews/create` | `interviews.create` |
| POST | `/applications/{application}/interviews` | `interviews.store` |
| GET | `/interviews/{interview}/edit` | `interviews.edit` |
| PUT | `/interviews/{interview}` | `interviews.update` |
| DELETE | `/interviews/{interview}` | `interviews.destroy` |

> ⚠ **Critical:** the `archive` and `restore` routes must be declared **before** `Route::resource('applications', ...)` in `web.php` — otherwise Laravel treats the string `"archive"` as the `{application}` parameter and throws a 404.

---

## User Stories

```
US1  ─ Sign up / Log in / Log out
US2  ─ View all active applications
US3  ─ Create a new application
US4  ─ View full application details
US5  ─ Edit an application
US6  ─ Archive a completed application (Soft Delete)
US7  ─ View archived applications
US8  ─ Restore an archived application
US9  ─ Filter by status and/or priority
US10 ─ Add an interview to an application
US11 ─ Edit or delete an interview
```

---

## Testing

Tests are written with **PEST PHP** and cover three areas:

### AuthTest
- Register with valid data
- Registration fails — password mismatch
- Registration fails — duplicate email
- Login with correct credentials
- Login fails with wrong password
- Logout
- Unauthenticated user redirected to `/login`

### ApplicationTest
- User sees only their own applications
- Valid creation saves to database
- Invalid creation returns 422
- Invalid URL returns validation error
- Application is soft-deleted (archived)
- Archived app disappears from index
- Archived app can be restored
- User B gets **403** on User A's application (view, edit, update, archive, restore)
- File is stored on disk after upload

### InterviewTest
- User can add an interview to their application
- Creation fails with missing fields
- User can update their own interview
- User can delete their own interview
- User B gets **403** on User A's interview (edit, update, delete)

```bash
# Run all tests
php artisan test
```

All tests should pass with a clean database (`php artisan migrate:fresh` before running if needed).

---

## Git Strategy

```
main
 └── develop
      ├── feature/auth                 US1 — Breeze setup
      ├── feature/applications-crud    US2 → US5
      ├── feature/archive              US6, US7, US8
      ├── feature/filters              US9
      ├── feature/interviews           US10, US11
      ├── feature/file-storage         Bonus — file upload
      └── feature/tests                Bonus — PEST tests
```

**Commit convention:** `feat(scope): description` · `fix` · `test` · `refactor` · `docs` · `chore`

**Workflow:** `feature/*` → PR → `develop` → PR → `main`

---

## Security

| Rule | Implementation |
|------|----------------|
| All routes protected | `auth` middleware on every route |
| Resource ownership | `ApplicationPolicy` + `InterviewPolicy` — returns 403 if user does not own the resource |
| Form validation | All validation in `FormRequest` classes — no `$request->validate()` in controllers |
| Mass assignment protection | `$fillable` defined on every model |
| CSRF protection | `@csrf` on every form |
| No N+1 queries | All relationships eager-loaded with `with()` — verified with Debugbar |
| Soft deletes | Applications archived with `SoftDeletes` — never hard-deleted by the user |
| File deletion | Attached file auto-deleted from disk on model force-delete via `booted()` hook |

---

## Author

**Your Name**
- GitHub: [@your-username](https://github.com/your-username)
- Email: your@email.com

---

> Built as part of a Laravel development project — week-long sprint, 11 user stories, 19 Jira tasks, 30 files, 20+ PEST tests.