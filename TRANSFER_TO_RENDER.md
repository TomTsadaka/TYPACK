# How to Transfer Everything to Render

Use this when moving your TYPACK backend from Vercel (or anywhere else) to Render. Your repo is already set up for Render; you only need to connect it and set a few values.

---

## 1. Create a Render account and connect GitHub

1. Go to **[render.com](https://render.com)** and sign up (or log in).
2. In the dashboard, go to **Account Settings** → **Connect account** and connect your **GitHub** account.
3. Grant Render access to the repo that contains TYPACK (e.g. **TomTsadaka/TYPACK** or your fork).

---

## 2. Deploy with the Blueprint (one click)

1. In Render, click **New +** → **Blueprint**.
2. Select the **TYPACK** repository (the one with `render.yaml` in the root).
3. Click **Apply**.

Render will read `render.yaml` and create:

- **PostgreSQL database:** `typack-db` (free tier, Oregon).
- **Web service:** `typack` (Docker build from your `Dockerfile`).

The first deploy will run automatically. Migrations run on every deploy via the container’s entrypoint, so the database will be set up.

---

## 3. Set APP_URL and ASSET_URL

1. In the Render dashboard, open the **typack** **web service** (not the database).
2. Go to **Environment**.
3. Set these (replace with your real URL from the service’s **Settings** or the top of the page):
   - **APP_URL** = `https://typack-XXXX.onrender.com` (your actual service URL).
   - **ASSET_URL** = same as APP_URL, e.g. `https://typack-XXXX.onrender.com`.
4. Click **Save Changes**. Render will redeploy with the new env.

---

## 4. Create an admin user (first time only)

The database is empty after the first deploy. To log in at `/admin/login`:

**Option A – Shell (recommended)**  
1. Open the **typack** service → **Shell** tab.  
2. Run:
   ```bash
   php artisan db:seed --class=AdminOnlySeeder --force
   ```
   That creates only admin user(s). For a full seed (all seeders), use `php artisan db:seed --force`.

**Option B – Env var for one deploy**  
1. In **Environment**, add: **SEED_ADMIN_ONLY** = `true` (admin only) or **SEED_ADMIN** = `true` (full seed).  
2. Trigger a **Manual Deploy**.  
3. After deploy, remove the variable or set it to `false` and redeploy (so you don’t re-seed on every deploy).

Then log in at:

- **URL:** `https://typack-XXXX.onrender.com/admin/login`
- Use the credentials from your seeder (e.g. from RENDER_SETUP.md) and **change the password** after first login.

---

## 5. (Optional) Data on Vercel

- If the site on **Vercel** was using **in-memory SQLite**, there is **no data to move**; the Render DB starts fresh.
- If you had already connected **Supabase** (or another DB) to Vercel and have real data, you’d need to **export from that DB** and **import into Render’s PostgreSQL** (e.g. `pg_dump` / `pg_restore` or your provider’s export). For a new shop, usually you just start fresh on Render.

---

## 6. (Optional) Custom domain

1. In the **typack** service → **Settings** → **Custom Domains**, add your domain (e.g. `api.yourshop.com`).
2. Follow Render’s DNS instructions (CNAME or A record).
3. In **Environment**, set **APP_URL** and **ASSET_URL** to that domain (e.g. `https://api.yourshop.com`).
4. Save and redeploy.

---

## 7. What to do with Vercel

- You can **leave the Vercel project as is** and only use Render for the live shop (e.g. point your frontend or domain to Render).
- Or **delete the Vercel project** (or disconnect the repo) so you don’t accidentally use the old backend.
- If your **frontend** (e.g. storefront) was calling `typack.vercel.app`, update its **API base URL** to your new Render URL: `https://typack-XXXX.onrender.com`.

---

## 8. Frontend / CORS

If a separate frontend (e.g. on Vercel) calls this API:

1. In the **typack** service on Render → **Environment**, add or set **CORS_ORIGINS** to your frontend origin(s), e.g.  
   `https://your-store.vercel.app,https://typack-XXXX.onrender.com`
2. Redeploy so the backend allows requests from that origin.

---

## Quick checklist

- [ ] Render account + GitHub connected  
- [ ] New → Blueprint → select TYPACK repo → Apply  
- [ ] Set **APP_URL** and **ASSET_URL** on the **typack** web service  
- [ ] Run admin seeder (Shell or SEED_ADMIN) and log in at `/admin/login`  
- [ ] (Optional) Custom domain and CORS for frontend  
- [ ] Point your shop/frontend to the Render URL and (optional) turn off or remove Vercel

After this, “everything” (app + database) runs on Render; no need to keep Vercel for the backend unless you want to.
