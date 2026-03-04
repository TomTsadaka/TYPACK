# Deploying to Vercel

## Required: Set environment variables

In the [Vercel Dashboard](https://vercel.com) → your project → **Settings** → **Environment Variables**, add:

| Variable       | Value | Notes |
|----------------|--------|--------|
| **APP_KEY**    | (from `php artisan key:generate --show`) | **Required.** Without this the site will not load. |
| **APP_URL**    | `https://your-project.vercel.app` | Use your actual Vercel project URL. |

Optional (already have serverless-friendly defaults in `vercel.json`):

- `SESSION_DRIVER=cookie` (set in vercel.json)
- `CACHE_STORE=array` (set in vercel.json)
- `LOG_CHANNEL=stderr` (set in vercel.json)

## Database (optional)

Vercel is serverless; the filesystem is read-only and SQLite will not persist. For login/orders/products you need an external database:

- **Neon** (Postgres) or **Turso** (SQLite) – then set `DB_CONNECTION`, `DB_HOST`, etc. in Vercel env.

Without a database, the app may boot and show the login page, but login/register will fail.

## Deploy

- **From Git:** Push to your connected repo; Vercel deploys automatically.
- **From CLI:** `vercel --prod --archive=tgz --yes` (use `--archive=tgz` to avoid file limit when deploying with `vendor`).
