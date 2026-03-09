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

### 2. Set APP_KEY, APP_URL, and ASSET_URL

In the **typack** web service → **Environment**, set these (required for the app to start and for health checks to pass):

1. **APP_KEY** – Laravel’s encryption key. On your **local machine** in the project folder run:
   ```bash
   php artisan key:generate --show
   ```
   Copy the output (e.g. `base64:xxxxxxxx...`) and in Render set **APP_KEY** to that value.  
   *(Render’s auto-generated key is not in the right format and causes “Unsupported cipher or incorrect key length”.)*

2. **APP_URL** – Your service URL, e.g. `https://typack-xxxx.onrender.com` (from the service’s **Settings** or top of the page).

3. **ASSET_URL** – Same as **APP_URL**.

4. Save. Render will redeploy. The next deploy should pass the health check once APP_KEY is valid.

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
