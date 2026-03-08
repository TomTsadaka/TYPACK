# Connecting a Frontend to the TYPACK API

This backend (Laravel) exposes a REST API for a storefront or any frontend app.

## API base URL

- **Production (Vercel):** `https://typack.vercel.app`
- **Local:** `http://localhost:10000`

Use this as the base for all API requests, e.g. `https://typack.vercel.app/api/auth/login`.

## CORS

The backend allows requests from:

- `https://dream-pack-store.vercel.app` (storefront)
- `https://typack.vercel.app` (same-origin)
- `http://localhost:3000` (local frontend dev)

To add or change origins, set **CORS_ORIGINS** in the backend environment (comma-separated):

```env
CORS_ORIGINS=https://your-store.vercel.app,https://typack.vercel.app,http://localhost:3000
```

On **Vercel**, add `CORS_ORIGINS` in Project → Settings → Environment Variables.

## Auth (storefront users)

1. **Register:** `POST /api/auth/register` with `name`, `email`, `password`, `password_confirmation`.
2. **Login:** `POST /api/auth/login` with `email`, `password`. Response includes `token` (Sanctum).
3. **Authenticated requests:** send header `Authorization: Bearer <token>`.
4. **User:** `GET /api/auth/user` (with token).

## Main API endpoints

| Method | Endpoint | Auth | Description |
|--------|----------|------|-------------|
| GET | `/api/settings` | No | Site settings |
| GET | `/api/banners` | No | Banners |
| GET | `/api/categories` | No | Categories |
| GET | `/api/products` | No | Products (list) |
| GET | `/api/products/featured` | No | Featured products |
| GET | `/api/products/{slug}` | No | Product by slug |
| GET | `/api/search?q=` | No | Search |
| POST | `/api/auth/register` | No | Register |
| POST | `/api/auth/login` | No | Login |
| GET | `/api/auth/user` | Yes | Current user |
| POST | `/api/orders` | Yes | Create order |
| GET | `/api/orders` | Yes | My orders |

Use **Accept: application/json** and **Content-Type: application/json** for JSON.

## Frontend env example

In your frontend (e.g. Next.js / Vite), set the API base URL:

```env
# .env.local or .env
NEXT_PUBLIC_API_URL=https://typack.vercel.app
# or
VITE_API_URL=https://typack.vercel.app
```

Then call `fetch(\`${process.env.NEXT_PUBLIC_API_URL}/api/products\`)` (or your env var).

## Optional: same repo frontend

If you add a frontend app in this repo (e.g. `frontend/` with Next.js or Vite):

1. Deploy it to Vercel (or elsewhere) and add that deployment URL to **CORS_ORIGINS** on this backend.
2. Point its API base URL to this backend (e.g. `https://typack.vercel.app` in production).
