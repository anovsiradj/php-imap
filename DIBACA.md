[Kam, Jan 19 2017 14:59:38]

[Demo Screenshot](http://i.imgur.com/6Id7GUQ.gifv)

# Cara Instalasi

1. Enable PHP IMAP

2. ACTIVATE GMAIL IMAP:
gmail.com > Settings > Forwarding and POP/IMAP > IMAP Access > Enabled

3. Access for less secure apps > Turn On
https://support.google.com/accounts/answer/6010255
https://www.google.com/settings/security/lesssecureapps
(Hanya-jika websitenya tidak menggunakan HTTPS)

---

Buat file `config.php` yang berisi usr/pwd gmail anda.
Juga path untuk file cache.

Contoh:

```
return (usr > usr@gmail, pwd > pwd@gmail, cache > cache/emailku.txt)
```

Dan jangan lupa, sebelum mengambil email,
di `main.php` atur `is_dev` menjadi `true`.

Setelah berasil, kembalikan `is_dev` menjadi `false` lagi.

# Tentang

Dibuat oleh anovsiradj (Mayendra Costanov) <anov.siradj22@gmail.com>.
Berawal dari permintaan Okto di Kerja3.

# Lisensi

Anda berhak menggunakan skrip ini di proyek anda, personal maupun komersial.
Dengan syarat, tidak mengakui kalau skrip ini dibuat oleh/adalah milik anda.
