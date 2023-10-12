cara git clone branch = git clone -b my-branch https://github.com/Whyriez/rpb-gg.git


cara install :
- clone repo diatas
- buka terminal project dan berikan perintah composer install
- jalankan juga perintah npm install
- copy file .env.example ke .env dengan perintah = cp .env-example .env
- lakukan generate key dengan perintah = php artisan key:generate
- jalankan project dengan perintah = php artisan serve
- buka terminal baru juga dan jalankan perintah = npm run dev


cara commit ke branch :
- lakukan pindah branch dengan perintah : git checkout -b nama_branch
- jika perintah sebelumnya terdapat kata error exist maka ganti sebagai berikut : git checkout nama_branch

cara mendapatkan update terbaru dari project :
- lakukan pindah branch dan ketik perintah = git pull
