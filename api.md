# Dokumentasi REST API - app-perpustakaan

Base URL: `http://127.0.0.1:8000/api`

Header wajib di semua request: `Accept: application/json`

Catatan: seluruh endpoint bersifat publik (tanpa autentikasi) pada pertemuan ini.

## Ringkasan Endpoint

| Method | URL | Body (jika ada) | Status Code | Contoh Response |
|---|---|---|---|---|
| GET | `/api/books` | - | 200 | Lihat 1 |
| GET | `/api/books/{id}` | - | 200, 404 | Lihat 2 |
| POST | `/api/books` | judul, penulis, penerbit, tahun_terbit, stok, category_id | 201, 422 | Lihat 3 |
| PUT | `/api/books/{id}` | sama seperti POST /api/books (semua field wajib) | 200, 404, 422 | Lihat 4 |
| DELETE | `/api/books/{id}` | - | 200, 404 | Lihat 5 |
| GET | `/api/members` | - | 200 | Lihat 6 |
| GET | `/api/members/{id}` | - | 200, 404 | Lihat 7 |
| GET | `/api/loans` | - | 200 | Lihat 8 |
| POST | `/api/loans` | member_id, user_id, tanggal_pinjam, tanggal_kembali, book_ids | 201, 422 | Lihat 9 |
| PUT | `/api/loans/{id}/kembalikan` | - | 200, 404 | Lihat 10 |
| GET | `/api/stats` | - | 200 | Lihat 11 |

## Detail Response

### 1. GET /api/books

Query opsional: `?judul=` (pencarian sebagian) dan `?category_id=` (pencocokan persis).

**Sukses (200):**
```json
{
    "data": [
        {
            "id": 2,
            "judul": "Detektif Conan Vol. 1",
            "penulis": "Gosho Aoyama",
            "penerbit": "Elex Media Komputindo",
            "tahun_terbit": 2000,
            "isbn": null,
            "stok": 3,
            "sampul": null,
            "category": {
                "id": 2,
                "nama_kategori": "Komik"
            },
            "created_at": "2026-09-30T10:36:33.000000Z",
            "updated_at": "2026-09-30T10:36:33.000000Z"
        },
        {
            "id": 3,
            "judul": "Sejarah Singkat Waktu",
            "penulis": "Stephen Hawking",
            "penerbit": "Gramedia Pustaka Utama",
            "tahun_terbit": 2018,
            "isbn": null,
            "stok": 2,
            "sampul": null,
            "category": {
                "id": 3,
                "nama_kategori": "Sains"
            },
            "created_at": "2026-09-30T10:36:33.000000Z",
            "updated_at": "2026-09-30T10:36:33.000000Z"
        },
        {
            "id": 4,
            "judul": "Sapiens",
            "penulis": "Yuval Noah Harari",
            "penerbit": "KPG",
            "tahun_terbit": 2017,
            "isbn": null,
            "stok": 4,
            "sampul": null,
            "category": {
                "id": 4,
                "nama_kategori": "Sejarah"
            },
            "created_at": "2026-09-30T10:36:33.000000Z",
            "updated_at": "2026-09-30T10:36:33.000000Z"
        },
        {
            "id": 5,
            "judul": "Clean Code",
            "penulis": "Robert C. Martin",
            "penerbit": "Prentice Hall",
            "tahun_terbit": 2008,
            "isbn": null,
            "stok": 2,
            "sampul": null,
            "category": {
                "id": 5,
                "nama_kategori": "Teknologi"
            },
            "created_at": "2026-09-30T10:36:33.000000Z",
            "updated_at": "2026-09-30T10:36:33.000000Z"
        },
        {
            "id": 6,
            "judul": "Habibie & Ainun",
            "penulis": "B.J. Habibie",
            "penerbit": "THC Mandiri",
            "tahun_terbit": 2010,
            "isbn": null,
            "stok": 3,
            "sampul": null,
            "category": {
                "id": 6,
                "nama_kategori": "Biografi"
            },
            "created_at": "2026-09-30T10:36:33.000000Z",
            "updated_at": "2026-09-30T10:36:33.000000Z"
        },
        {
            "id": 7,
            "judul": "Atomic Habits",
            "penulis": "James Clear",
            "penerbit": "Gramedia Pustaka Utama",
            "tahun_terbit": 2019,
            "isbn": null,
            "stok": 5,
            "sampul": null,
            "category": {
                "id": 7,
                "nama_kategori": "Psikologi"
            },
            "created_at": "2026-09-30T10:36:33.000000Z",
            "updated_at": "2026-09-30T10:36:33.000000Z"
        },
        {
            "id": 8,
            "judul": "Rich Dad Poor Dad",
            "penulis": "Robert Kiyosaki",
            "penerbit": "Gramedia Pustaka Utama",
            "tahun_terbit": 2011,
            "isbn": null,
            "stok": 3,
            "sampul": null,
            "category": {
                "id": 8,
                "nama_kategori": "Bisnis"
            },
            "created_at": "2026-09-30T10:36:33.000000Z",
            "updated_at": "2026-09-30T10:36:33.000000Z"
        },
        {
            "id": 9,
            "judul": "Membumikan Al-Quran",
            "penulis": "Quraish Shihab",
            "penerbit": "Mizan",
            "tahun_terbit": 2007,
            "isbn": null,
            "stok": 2,
            "sampul": null,
            "category": {
                "id": 9,
                "nama_kategori": "Agama"
            },
            "created_at": "2026-09-30T10:36:33.000000Z",
            "updated_at": "2026-09-30T10:36:33.000000Z"
        },
        {
            "id": 10,
            "judul": "Pendidikan Kaum Tertindas",
            "penulis": "Paulo Freire",
            "penerbit": "LP3ES",
            "tahun_terbit": 2008,
            "isbn": null,
            "stok": 2,
            "sampul": null,
            "category": {
                "id": 10,
                "nama_kategori": "Pendidikan"
            },
            "created_at": "2026-09-30T10:36:33.000000Z",
            "updated_at": "2026-09-30T10:36:33.000000Z"
        },
        {
            "id": 1,
            "judul": "Bumi Manusia",
            "penulis": "Pramoedya Ananta Toer",
            "penerbit": "Hasta Mitra",
            "tahun_terbit": 1980,
            "isbn": null,
            "stok": 10,
            "sampul": null,
            "category": {
                "id": 1,
                "nama_kategori": "Novel"
            },
            "created_at": "2026-09-30T10:36:33.000000Z",
            "updated_at": "2026-11-02T06:04:49.000000Z"
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/books?page=1",
        "last": "http://127.0.0.1:8000/api/books?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "page": null,
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/books?page=1",
                "label": "1",
                "page": 1,
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "page": null,
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/books",
        "per_page": 10,
        "to": 10,
        "total": 10
    }
}
```

### 2. GET /api/books/{id}

**Sukses (200):**
```json
{
    "data": {
        "id": 1,
        "judul": "Bumi Manusia",
        "penulis": "Pramoedya Ananta Toer",
        "penerbit": "Hasta Mitra",
        "tahun_terbit": 1980,
        "isbn": null,
        "stok": 10,
        "sampul": null,
        "category": {
            "id": 1,
            "nama_kategori": "Novel"
        },
        "created_at": "2026-09-30T10:36:33.000000Z",
        "updated_at": "2026-11-02T06:04:49.000000Z"
    }
}
```

**Gagal, id tidak ada (404)**, contoh `GET /api/books/999`:
```json
{
    "message": "No query results for model [App\\Models\\Book] 999",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
    "line": 668,
    "trace": [
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
            "line": 616,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 182,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 50,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 137,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 821,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 800,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 764,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 753,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 200,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 180,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 51,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 109,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\HandleCors.php",
            "line": 74,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\HandleCors",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\TrustProxies.php",
            "line": 58,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks.php",
            "line": 22,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePathEncoding.php",
            "line": 26,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\ValidatePathEncoding",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 137,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 175,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 144,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php",
            "line": 1220,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\public\\index.php",
            "line": 20,
            "function": "handleRequest",
            "class": "Illuminate\\Foundation\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\server.php",
            "line": 23,
            "function": "require_once"
        }
    ]
}
```

### 3. POST /api/books

**Body:**
```json
{
  "judul": "Bumi Manusia",
  "penulis": "Pramoedya Ananta Toer",
  "penerbit": "Hasta Mitra",
  "tahun_terbit": 1980,
  "stok": 3,
  "category_id": 1
}
```

**Sukses (201):**
```json
{
    "data": {
        "id": 12,
        "judul": "Bumi Manusia",
        "penulis": "Pramoedya Ananta Toer",
        "penerbit": "Hasta Mitra",
        "tahun_terbit": 1980,
        "isbn": null,
        "stok": 3,
        "sampul": null,
        "category": {
            "id": 1,
            "nama_kategori": "Novel"
        },
        "created_at": "2026-11-02T06:28:14.000000Z",
        "updated_at": "2026-11-02T06:28:14.000000Z"
    }
}
```

**Gagal, body kosong (422):**
```json
{
    "message": "Judul buku wajib diisi. (and 5 more errors)",
    "errors": {
        "judul": [
            "Judul buku wajib diisi."
        ],
        "penulis": [
            "Nama penulis wajib diisi."
        ],
        "penerbit": [
            "Nama penerbit wajib diisi."
        ],
        "tahun_terbit": [
            "Tahun terbit wajib diisi."
        ],
        "stok": [
            "Stok wajib diisi."
        ],
        "category_id": [
            "Kategori wajib dipilih."
        ]
    }
}
```

### 4. PUT /api/books/{id}

**Body:** (semua field wajib dikirim)
```json
{
  "judul": "Bumi Manusia",
  "penulis": "Pramoedya Ananta Toer",
  "penerbit": "Hasta Mitra",
  "tahun_terbit": 1980,
  "stok": 10,
  "category_id": 1
}
```

**Sukses (200):**
```json
{
    "data": {
        "id": 12,
        "judul": "Bumi Manusia",
        "penulis": "Pramoedya Ananta Toer",
        "penerbit": "Hasta Mitra",
        "tahun_terbit": 1980,
        "isbn": null,
        "stok": 10,
        "sampul": null,
        "category": {
            "id": 1,
            "nama_kategori": "Novel"
        },
        "created_at": "2026-11-02T06:28:14.000000Z",
        "updated_at": "2026-11-02T06:29:03.000000Z"
    }
}
```

**Gagal, data tidak valid (422):**
```json
{
    "message": "The judul field is required. (and 5 more errors)",
    "errors": {
        "judul": [
            "The judul field is required."
        ],
        "penulis": [
            "The penulis field is required."
        ],
        "penerbit": [
            "The penerbit field is required."
        ],
        "tahun_terbit": [
            "The tahun terbit field is required."
        ],
        "stok": [
            "The stok field is required."
        ],
        "category_id": [
            "The category id field is required."
        ]
    }
}
```

### 5. DELETE /api/books/{id}

**Sukses (200):**
```json
{
    "message": "Buku berhasil dihapus."
}
```

**Gagal, id tidak ada (404):**
```json
{
    "message": "No query results for model [App\\Models\\Book] 13",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
    "line": 668,
    "trace": [
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
            "line": 616,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 182,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 50,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 137,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 821,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 800,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 764,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 753,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 200,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 180,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 51,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 109,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\HandleCors.php",
            "line": 74,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\HandleCors",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\TrustProxies.php",
            "line": 58,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks.php",
            "line": 22,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePathEncoding.php",
            "line": 26,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\ValidatePathEncoding",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 137,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 175,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 144,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php",
            "line": 1220,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\public\\index.php",
            "line": 20,
            "function": "handleRequest",
            "class": "Illuminate\\Foundation\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\server.php",
            "line": 23,
            "function": "require_once"
        }
    ]
}
```

Catatan: buku yang sudah tercatat di peminjaman (`loan_items`) tidak bisa dihapus karena terikat foreign key (database menolak dengan error 500).

### 6. GET /api/members

**Sukses (200):**
```json
{
    "data": [
        {
            "id": 1,
            "nama": "Budi Santoso",
            "nim": "3124600001",
            "email": "budi@student.test",
            "nomor_telepon": "081234567890",
            "alamat": "Jl. Raya Keputih No. 1, Surabaya",
            "status": "aktif",
            "created_at": "2026-10-01T05:43:49.000000Z",
            "updated_at": "2026-10-01T05:43:49.000000Z"
        },
        {
            "id": 2,
            "nama": "Siti Aminah",
            "nim": "3124600002",
            "email": "siti@student.test",
            "nomor_telepon": "081298765432",
            "alamat": "Jl. Gebang Putih No. 5, Surabaya",
            "status": "aktif",
            "created_at": "2026-10-01T05:43:49.000000Z",
            "updated_at": "2026-10-01T05:43:49.000000Z"
        },
        {
            "id": 3,
            "nama": "Andi Pratama",
            "nim": "3124600003",
            "email": "andi@student.test",
            "nomor_telepon": "081355511122",
            "alamat": "Jl. Menur No. 10, Surabaya",
            "status": "nonaktif",
            "created_at": "2026-10-01T05:43:50.000000Z",
            "updated_at": "2026-10-01T05:43:50.000000Z"
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/members?page=1",
        "last": "http://127.0.0.1:8000/api/members?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "page": null,
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/members?page=1",
                "label": "1",
                "page": 1,
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "page": null,
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/members",
        "per_page": 10,
        "to": 3,
        "total": 3
    }
}
```

### 7. GET /api/members/{id}

**Sukses (200):**
```json
{
    "data": {
        "id": 1,
        "nama": "Budi Santoso",
        "nim": "3124600001",
        "email": "budi@student.test",
        "nomor_telepon": "081234567890",
        "alamat": "Jl. Raya Keputih No. 1, Surabaya",
        "status": "aktif",
        "created_at": "2026-10-01T05:43:49.000000Z",
        "updated_at": "2026-10-01T05:43:49.000000Z"
    }
}
```

**Gagal, id tidak ada (404):**
```json
{
    "message": "No query results for model [App\\Models\\Member] 999",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
    "line": 668,
    "trace": [
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
            "line": 616,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 182,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 50,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 137,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 821,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 800,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 764,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 753,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 200,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 180,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 51,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 109,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\HandleCors.php",
            "line": 74,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\HandleCors",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\TrustProxies.php",
            "line": 58,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks.php",
            "line": 22,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePathEncoding.php",
            "line": 26,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\ValidatePathEncoding",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 137,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 175,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 144,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php",
            "line": 1220,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\public\\index.php",
            "line": 20,
            "function": "handleRequest",
            "class": "Illuminate\\Foundation\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\server.php",
            "line": 23,
            "function": "require_once"
        }
    ]
}
```

### 8. GET /api/loans

**Sukses (200):**
```json
{
    "data": [
        {
            "id": 2,
            "member": {
                "id": 1,
                "nama": "Budi Santoso"
            },
            "petugas": {
                "id": 1,
                "name": "Petugas Satu"
            },
            "tanggal_pinjam": "2026-10-01",
            "tanggal_kembali": "2026-10-07",
            "tanggal_dikembalikan": "2026-10-01",
            "status": "dikembalikan",
            "books": [
                {
                    "id": 1,
                    "judul": "Bumi Manusia"
                }
            ]
        },
        {
            "id": 4,
            "member": {
                "id": 1,
                "nama": "Budi Santoso"
            },
            "petugas": {
                "id": 1,
                "name": "Petugas Satu"
            },
            "tanggal_pinjam": "2026-10-01",
            "tanggal_kembali": "2026-10-07",
            "tanggal_dikembalikan": null,
            "status": "terlambat",
            "books": [
                {
                    "id": 1,
                    "judul": "Bumi Manusia"
                }
            ]
        },
        {
            "id": 5,
            "member": {
                "id": 1,
                "nama": "Budi Santoso"
            },
            "petugas": {
                "id": 3,
                "name": "Petugas Satu"
            },
            "tanggal_pinjam": "2026-10-10",
            "tanggal_kembali": "2026-10-11",
            "tanggal_dikembalikan": null,
            "status": "dipinjam",
            "books": [
                {
                    "id": 1,
                    "judul": "Bumi Manusia"
                }
            ]
        },
        {
            "id": 3,
            "member": {
                "id": 1,
                "nama": "Budi Santoso"
            },
            "petugas": {
                "id": 1,
                "name": "Petugas Satu"
            },
            "tanggal_pinjam": "2026-10-01",
            "tanggal_kembali": "2026-10-07",
            "tanggal_dikembalikan": "2026-11-02",
            "status": "dikembalikan",
            "books": [
                {
                    "id": 1,
                    "judul": "Bumi Manusia"
                }
            ]
        },
        {
            "id": 6,
            "member": {
                "id": 1,
                "nama": "Budi Santoso"
            },
            "petugas": {
                "id": 1,
                "name": "Petugas Satu"
            },
            "tanggal_pinjam": "2026-11-02",
            "tanggal_kembali": "2026-11-09",
            "tanggal_dikembalikan": "2026-11-02",
            "status": "dikembalikan",
            "books": [
                {
                    "id": 1,
                    "judul": "Bumi Manusia"
                },
                {
                    "id": 2,
                    "judul": "Detektif Conan Vol. 1"
                }
            ]
        }
    ],
    "links": {
        "first": "http://127.0.0.1:8000/api/loans?page=1",
        "last": "http://127.0.0.1:8000/api/loans?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "links": [
            {
                "url": null,
                "label": "&laquo; Previous",
                "page": null,
                "active": false
            },
            {
                "url": "http://127.0.0.1:8000/api/loans?page=1",
                "label": "1",
                "page": 1,
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "page": null,
                "active": false
            }
        ],
        "path": "http://127.0.0.1:8000/api/loans",
        "per_page": 10,
        "to": 5,
        "total": 5
    }
}
```

### 9. POST /api/loans

**Body:**
```json
{
  "member_id": 1,
  "user_id": 1,
  "tanggal_pinjam": "2026-11-02",
  "tanggal_kembali": "2026-11-09",
  "book_ids": [1, 2]
}
```

**Sukses (201):**
```json
{
    "data": {
        "id": 7,
        "member": {
            "id": 1,
            "nama": "Budi Santoso"
        },
        "petugas": {
            "id": 1,
            "name": "Petugas Satu"
        },
        "tanggal_pinjam": "2026-11-02",
        "tanggal_kembali": "2026-11-09",
        "tanggal_dikembalikan": null,
        "status": "dipinjam",
        "books": [
            {
                "id": 1,
                "judul": "Bumi Manusia"
            },
            {
                "id": 2,
                "judul": "Detektif Conan Vol. 1"
            }
        ]
    }
}
```

**Gagal, body kosong (422):**
```json
{
    "message": "Anggota wajib dipilih. (and 4 more errors)",
    "errors": {
        "member_id": [
            "Anggota wajib dipilih."
        ],
        "user_id": [
            "Petugas (user_id) wajib diisi."
        ],
        "tanggal_pinjam": [
            "Tanggal pinjam wajib diisi."
        ],
        "tanggal_kembali": [
            "Tanggal kembali wajib diisi."
        ],
        "book_ids": [
            "Pilih minimal satu buku."
        ]
    }
}
```

### 10. PUT /api/loans/{id}/kembalikan

Tanpa body.

**Sukses (200):**
```json
{
    "data": {
        "id": 7,
        "member": {
            "id": 1,
            "nama": "Budi Santoso"
        },
        "petugas": {
            "id": 1,
            "name": "Petugas Satu"
        },
        "tanggal_pinjam": "2026-11-02",
        "tanggal_kembali": "2026-11-09",
        "tanggal_dikembalikan": "2026-11-02",
        "status": "dikembalikan",
        "books": [
            {
                "id": 1,
                "judul": "Bumi Manusia"
            },
            {
                "id": 2,
                "judul": "Detektif Conan Vol. 1"
            }
        ]
    }
}
```

**Gagal, id tidak ada (404):**
```json
{
    "message": "No query results for model [App\\Models\\Loan] 8",
    "exception": "Symfony\\Component\\HttpKernel\\Exception\\NotFoundHttpException",
    "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
    "line": 668,
    "trace": [
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Exceptions\\Handler.php",
            "line": 616,
            "function": "prepareException",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Pipeline.php",
            "line": 51,
            "function": "render",
            "class": "Illuminate\\Foundation\\Exceptions\\Handler",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 182,
            "function": "handleException",
            "class": "Illuminate\\Routing\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 50,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 137,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 821,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 800,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 764,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 753,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 200,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 180,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull.php",
            "line": 31,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ConvertEmptyStringsToNull",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TrimStrings.php",
            "line": 51,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TrimStrings",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 109,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\HandleCors.php",
            "line": 74,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\HandleCors",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\TrustProxies.php",
            "line": 58,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\TrustProxies",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks.php",
            "line": 22,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\InvokeDeferredCallbacks",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Http\\Middleware\\ValidatePathEncoding.php",
            "line": 26,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 219,
            "function": "handle",
            "class": "Illuminate\\Http\\Middleware\\ValidatePathEncoding",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 137,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 175,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 144,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Application.php",
            "line": 1220,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\public\\index.php",
            "line": 20,
            "function": "handleRequest",
            "class": "Illuminate\\Foundation\\Application",
            "type": "->"
        },
        {
            "file": "C:\\Users\\ARIFKY\\app-perpustakaan\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\resources\\server.php",
            "line": 23,
            "function": "require_once"
        }
    ]
}
```

### 11. GET /api/stats

**Sukses (200):**
```json
{
  "total_buku": 10,
  "total_anggota": 3,
  "peminjaman_aktif": 1
}
```