# Hosting This App Online

This backend is set up to deploy on **Render**. Below are the steps and alternatives.

---

## Option 1: Render (recommended – already configured)

### 1. Push your code to GitHub

```bash
git add .
git commit -m "Prepare for deployment"
git push origin main
```

### 2. Create a Render account and connect the repo

- Go to [render.com](https://render.com) and sign up.
- **Dashboard** → **New** → **Web Service**.
- Connect your GitHub and select the `dream-pack-store-be` repository.
- Use these settings:

| Setting | Value |
|--------|--------|
| **Name** | `dream-pack-store-be` (or any name) |
| **Region** | Choose closest to you |
| **Branch** | `main` |
| **Runtime** | **PHP** (not Docker, unless you use the Docker path below) |
| **Build Command** | `bash scripts/deploy.sh` |
| **Start Command** | `bash scripts/start.sh` |
| **Plan** | Free or Starter |

### 3. Add a PostgreSQL database

- **Dashboard** → **New** → **PostgreSQL**.
- Create a database (e.g. name: `dream-pack-db`).
- After creation, open the database and copy the **Internal** connection details (host, port, database name, user, password).

### 4. Set environment variables on the Web Service

In your **Web Service** → **Environment**:

**Required:**

| Key | Value |
|-----|--------|
| `APP_KEY` | Generate: run `php artisan key:generate --show` locally and paste the value |
| `APP_ENV` | `production` |
| `APP_DEBUG` | `false` |
| `APP_URL` | `https://YOUR-SERVICE-NAME.onrender.com` (use the URL Render gives you) |
| `ASSET_URL` | Same as `APP_URL` |
| `DB_CONNECTION` | `pgsql` |
| `DB_HOST` | From Render Postgres **Internal** connection (e.g. `dpg-xxx`) |
| `DB_PORT` | From Postgres (usually `5432`) |
| `DB_DATABASE` | From Postgres |
| `DB_USERNAME` | From Postgres |
| `DB_PASSWORD` | From Postgres |

**Recommended (already in config):**

| Key | Value |
|-----|--------|
| `CACHE_STORE` | `file` |
| `SESSION_DRIVER` | `file` |
| `QUEUE_CONNECTION` | `sync` |
| `SESSION_SECURE_COOKIE` | `true` |
| `SESSION_ENCRYPT` | `true` |

### 5. Link the database to the Web Service

- In the **Web Service** → **Environment**, use the **Internal** Postgres host/port/database/user/password (not External) so the app can reach the DB inside Render’s network.
- Or use Render’s **“Connect”** on the Postgres service to add the env vars to your Web Service automatically.

### 6. Deploy

- Click **Create Web Service** (or **Manual Deploy** if it already exists).
- Wait for the build and start. Your app will be at `https://YOUR-SERVICE-NAME.onrender.com`.
- Admin: `https://YOUR-SERVICE-NAME.onrender.com/admin/login`  
  (Create an admin user via a one-off run of your seed, or use a DB seed on first deploy if you add it to the build.)

### 7. (Optional) Seed admin user on first deploy

If your build runs migrations but not seeders, run the seeder once via Render **Shell** (if available) or add a one-time seed step to your deploy script.

---

## Option 2: Render with Docker

The repo has a `render.yaml` that uses Docker and can use Render Postgres + Redis.

- **New** → **Blueprint**; connect the repo and use the root that contains `render.yaml`.
- Ensure `render.yaml` points to the correct Dockerfile and that any referenced Postgres/Redis are created and linked (e.g. `RENDER_POSTGRES_DB_HOST` etc., or link the services in the Render UI so the env vars are set).

---

## Option 3: Other platforms

- **Railway** – Connect repo, add Postgres, set env vars, use build command `bash scripts/deploy.sh` and start command `bash scripts/start.sh` (and set `PORT`).
- **Fly.io** – Use a Dockerfile and `fly launch`; add a Postgres app and set `DATABASE_URL` or `DB_*` env vars.
- **DigitalOcean App Platform** – Connect repo, add a Postgres DB, set env vars, and use the same build/start commands.
- **VPS (e.g. DigitalOcean Droplet, Linode)** – Install PHP, Composer, Node, Nginx, and Postgres; clone repo, run `scripts/deploy.sh`, and point Nginx at `public/`.

---

## After going live

1. **APP_URL / ASSET_URL** – Must be your real HTTPS URL so assets and redirects work.
2. **Admin user** – Seed or create one (e.g. `AdminSeeder` or first user as superadmin).
3. **HTTPS** – Render (and most hosts above) provide HTTPS; the app is already set up for it (e.g. `TrustProxies`, `SESSION_SECURE_COOKIE`).
4. **Health check** – Use `/health` for monitoring if your host supports a health path.

For more detail on this app’s production config, see `DEPLOYMENT.md` and `.env.production.example`.
