# How to Connect a Database

This Laravel app supports **PostgreSQL** (recommended), **MySQL/MariaDB**, and **SQLite**. Use the steps below for local development and for production (Vercel or Render).

---

## 1. Local development (Docker)

If you use the project’s Docker setup, a PostgreSQL database is already defined in `docker-compose.yml`.

1. **Start the stack** (app + DB):
   ```bash
   docker compose up -d
   ```
2. **Copy env and set DB** (if you haven’t already):
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
3. **In `.env`, keep or set:**
   ```env
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5433
   DB_DATABASE=laravel
   DB_USERNAME=laravel
   DB_PASSWORD=secret
   ```
   These match the PostgreSQL service in Docker (port `5433` on the host).
4. **Run migrations:**
   ```bash
   docker compose exec app php artisan migrate
   ```
   Or if you run PHP on the host: `php artisan migrate` (with the same `.env`).

You’re connected. Use the app at `http://localhost:10000` (or the port in `APP_URL`).

---

## 2. Local development (no Docker)

Use a PostgreSQL or MySQL server installed on your machine (e.g. [PostgreSQL](https://www.postgresql.org/download/) or [MySQL](https://dev.mysql.com/downloads/)).

1. **Create a database** (e.g. name: `typack` or `laravel`).
2. **Copy env:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
3. **Edit `.env`:**

   **PostgreSQL:**
   ```env
   DB_CONNECTION=pgsql
   DB_HOST=127.0.0.1
   DB_PORT=5432
   DB_DATABASE=typack
   DB_USERNAME=postgres
   DB_PASSWORD=your_password
   ```

   **MySQL:**
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=typack
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```
4. **Migrate:**
   ```bash
   php artisan migrate
   ```

---

## 3. Production: Vercel

On Vercel the app currently defaults to **SQLite in-memory** (no persistent data). To have a real database:

1. **Create a hosted database** (pick one):
   - [Neon](https://neon.tech) (PostgreSQL, free tier)
   - [Supabase](https://supabase.com) (PostgreSQL)
   - [Railway](https://railway.app) (PostgreSQL or MySQL)
   - [PlanetScale](https://planetscale.com) (MySQL)

2. **Get the connection details** from the provider’s dashboard:
   - **PostgreSQL:** host, port, database name, user, password, and often a **connection string** (e.g. `postgres://user:pass@host:5432/dbname?sslmode=require`).
   - **MySQL:** host, port, database, user, password, and often a URL like `mysql://user:pass@host:3306/dbname`.

3. **In Vercel:** Project → **Settings** → **Environment Variables**. Add:

   **Option A – Single URL (easiest if your provider gives one):**
   ```env
   DB_CONNECTION=pgsql
   DB_URL=postgres://user:password@host:5432/database?sslmode=require
   ```
   (Laravel uses `DB_URL` for the connection; you can leave other `DB_*` vars unset or set them as well.)

   **Option B – Separate vars (PostgreSQL):**
   ```env
   DB_CONNECTION=pgsql
   DB_HOST=your-db-host.neon.tech
   DB_PORT=5432
   DB_DATABASE=your_db_name
   DB_USERNAME=your_user
   DB_PASSWORD=your_password
   DB_SSLMODE=require
   ```

   For **MySQL** use `DB_CONNECTION=mysql` and the host/port/database/user/password from your provider.

4. **Redeploy** the project in Vercel so the new env vars are used.

5. **Run migrations** against the production DB (one-time). Options:
   - **From your machine:** set the same `DB_*` or `DB_URL` in a temporary `.env.production` and run:
     ```bash
     php artisan migrate --env=production
     ```
     (or use `--force` if you use the default env.)
   - Or use the provider’s “Run SQL” / console and run the migration SQL, or a **CI job** that runs `php artisan migrate` with production env.

After that, the app on Vercel will use the external database instead of in-memory SQLite.

---

## 4. Production: Render

If you deploy with the **Render Blueprint** (`render.yaml`), a PostgreSQL database is created and linked to the web service.

1. **Deploy** from the repo (Blueprint or “New → Web Service” + “New PostgreSQL”).
2. In the **web service** on Render, open **Environment** and ensure:
   - `DB_URL` or the individual `DB_*` variables are set (Render often sets `DB_URL` from the linked PostgreSQL).
3. **Set explicitly** if needed:
   ```env
   DB_CONNECTION=pgsql
   DB_URL=postgres://user:password@host/database?sslmode=require
   ```
   (Use the **Internal Database URL** from the Render PostgreSQL service.)
4. **Run migrations** once (Render “Shell” or one-off job):
   ```bash
   php artisan migrate --force
   ```

See `RENDER_SETUP.md` in this repo for full Render steps.

---

## 5. Summary of env vars

| Variable          | Description                    | Example / note                          |
|-------------------|--------------------------------|-----------------------------------------|
| `DB_CONNECTION`   | Driver: `pgsql`, `mysql`, `sqlite` | `pgsql`                             |
| `DB_URL`          | Full connection URL (overrides host/port/db/user/pass when set) | `postgres://…` or `mysql://…` |
| `DB_HOST`         | Database host                  | `127.0.0.1` or provider host            |
| `DB_PORT`         | Port                           | `5432` (PostgreSQL), `3306` (MySQL)     |
| `DB_DATABASE`     | Database name                  | `laravel` / `typack`                    |
| `DB_USERNAME`     | Username                       | e.g. `postgres`                         |
| `DB_PASSWORD`     | Password                       | Your DB password                        |
| `DB_SSLMODE`      | PostgreSQL SSL                 | `require` for hosted Postgres            |

- **Local (Docker):** use `DB_HOST=127.0.0.1`, `DB_PORT=5433`, and the credentials from `docker-compose.yml` (see section 1).
- **Production:** prefer `DB_URL` if your provider gives it; otherwise set `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, and for PostgreSQL `DB_SSLMODE=require`.

After changing any `DB_*` or `DB_URL`, run `php artisan migrate` (or `migrate --force` in production) so the schema is created/updated.
