# Umrona backend test
Backend API dari test teknikal Umrona.
Dibuat dengan Laravel v10.
## Instalasi
1. Clone repositori.
2. Di direktori project, jalankan perintah berikut:
```bash 
composer install
```
3. Setting database di file `.env`
4. Lakukan migrasi sekalian dengan seed database:
```
php artisan migrate --seed
```
5. Jalankan aplikasi:
```
php artisan serve
```

## Endpoint API
| # | http method | endpoint            | query params      | payload                                                                                                | deskripsi                                                                    |
|---|-------------|---------------------|-------------------|--------------------------------------------------------------------------------------------------------|------------------------------------------------------------------------------|
| 1 | GET         | /api                | -                 | -                                                                                                      | tes api                                                                      |
| 2 | GET         | /api/posts          | page=n<br>count=n | -                                                                                                      | get post dengan paginasi halaman ke-[page] <br>dan [count]-post tiap halaman |
| 3 | GET         | /api/posts/{postId} | -                 | -                                                                                                      | get post dengan id yang diminta                                              |
| 4 | POST        | /api/posts          | -                 | {<br>	"title" : "judul post",<br>	"author_name": "penulis",<br>	"content" : "isi postingan"<br>}          | membuat postingan baru                                                       |
| 5 | PUT         | /api/posts/{postId} | -                 | {<br>	"title" : "judul post baru",<br>	"author_name": "penulis baru",<br>	"content" : "content baru"<br>} | mengedit postingan dengan id yang diminta                                    |
| 6 | DELETE      | /api/posts/{postId} | -                 | -                                                                                                      | menghapus postingan dengan id yang diminta                                   |
