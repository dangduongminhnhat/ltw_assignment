# BTL_LTW

Đây là repository chính thức cho Bài tập lớn môn Lập trình Web.

**_(Cập nhật đầu tiên 26/04/2024: Setup các trang dành cho user)_**

**_(Cập nhật 27/04/2024: Cập nhật đầy đủ front-end dành cho seller, thêm database)_**

**_(Cập nhật 08/05/2024: Hoàn thành tất cả tính năng của trang Web - frontend + backend + database)_**

## Getting Start

### Installing

1. Clone the repository

- Vào thư mục `C:\xampp\htdocs\`, tạo folder tên `BTL`.
- Sau đó `cd BTL` và thực hiện lệnh sau:
  ```sh
  git init
  git remote add origin https://github.com/boochou/BTL_LTW.git
  git pull origin main
  ```

2. Chỉnh sửa

- Thực hiện đổi sang nhánh của mình và chỉnh sửa:
  - Ví dụ Châu sửa, thì nhập lệnh sau:
  ```sh
  git branch Chau
  git checkout Chau
  ```

3. Push lại code lên repository

- Thực hiện các lệnh sau để push:
  - Ví dụ Châu push, thì:
  ```sh
  git add .
  git commit -m "<content>"
  git push orgin Chau
  ```

## Khởi chạy web

1. Mở XAMPP (run as administrator), start Apache và MySQL.

2. Setup cơ sở dữ liệu MySQL, mọi người vào [database](https://github.com/boochou/BTL_LTW/tree/main/database) để lấy cơ sở dữ liệu mới nhất và import nó vào máy.

3. Vào trình duyệt web, nhập đường link `http://localhost/BTL/user/homepage` để bắt đầu sử dụng.

4. Khi đăng nhập, một số tài khoản hiện có là:

- email: unieat@gmail.com, password: Unieat@1234 (seller)
- email: minhnhat@gmail.com, password: Nhat@1234
- email: ngocyen@gmail.com, password: Yen@1234
- email: chouchou@gmail.com, password: Chau@1234
- email: nana@gmail.com, password: Anh@1234

## Một số thông tin về web

### Công nghệ được sử dụng

- Front-end:
  - HTML + CSS
  - Bootstrap 5
  - Javascript
  - jQuery
- Back-end:
  - Server code: PHP
  - Database: MySQL

### Các lưu ý

- Mọi người kéo về và đẩy lên như hướng dẫn để tránh mất code.

- Đổi port trong những connection tới database để chạy được ứng dụng.

Lời cuối, chúc mọi người một ngày tốt lành!
