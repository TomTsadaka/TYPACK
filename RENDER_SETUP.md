# Deploy TYPACK to Render (one-time setup)

Your repo has a **Blueprint** (`render.yaml`). Use it to create the app and database in one go.

## Steps

### 1. Connect the Blueprint

1. Go to **[dashboard.render.com](https://dashboard.render.com)** and log in.
2. Click **New** → **Blueprint**.
3. Connect your **GitHub** account if needed, then select the **TYPACK** repository.
4. Click **Apply**.

Render will create:

- A **PostgreSQL** database: `typack-db`
- A **Web Service**: `typack` (Docker build from your Dockerfile)

### 2. Set APP_URL and ASSET_URL

Render will ask for two values (they were set to “prompt in Dashboard”):

1. Open the **typack** web service.
2. Go to **Environment**.
3. Set **APP_URL** to your service URL, e.g. `https://typack-xxxx.onrender.com` (see the service’s **Settings** or the top of the page for the exact URL).
4. Set **ASSET_URL** to the same value as **APP_URL**.
5. Save. Render will redeploy.

### 3. Create an admin user (first time only)

The database starts empty. To log in at `/admin/login` you need an admin user.

**Option A – Render Shell (if available)**  
Open the **typack** service → **Shell** and run:

```bash
php artisan db:seed --class=AdminSeeder --force
```

**Option B – One-off deploy with seed**  
Temporarily add to the web service’s **Environment**:

- `SEED_ADMIN` = `true`

Trigger a **Manual Deploy**. After the deploy finishes and you’ve confirmed the admin user exists, remove `SEED_ADMIN` (or set it to `false`) and redeploy so you don’t re-seed on every deploy.

Then use:

- **URL:** `https://your-typack-url.onrender.com/admin/login`
- **Email:** `superadmin@dreampack.com`
- **Password:** `superadmin123`

(Change the password after first login.)

### 4. Later: custom domain (optional)

In the **typack** service → **Settings** → **Custom Domains**, add your domain and follow Render’s DNS instructions. Then set **APP_URL** and **ASSET_URL** to that domain.

---

**Summary:** New → Blueprint → select TYPACK repo → Apply → set APP_URL and ASSET_URL on the `typack` service → seed admin (Shell or SEED_ADMIN) → log in at `/admin/login`.
