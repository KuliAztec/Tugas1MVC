# NIM Digit Terakhir 6: Aplikasi Forum Diskusi

## Instruksi
Buat aplikasi forum diskusi yang memungkinkan pengguna untuk membuat topik dan berkomentar. Gunakan PHP OOP dan PHP PDO untuk mengelola data topik dan komentar. Implementasikan jQuery untuk interaksi pengguna dan DataTables untuk menampilkan daftar topik.

## Struktur Tabel
### Tabel topics:
- id
- title
- created_at
- user_id

### Tabel comments:
- id
- topic_id
- user_id
- content
- created_at

### Tabel votes:
- id
- comment_id
- user_id
- vote_type

## Struktur Folder
```
Tugas1MVC/
|
├── config/
│   └── database.php
├── controllers/
│   ├── CommentController.php
│   ├── TopicController.php
|   └── VoteController.php
├── models/
│   ├── Comment.php
|   ├── Topic.php
│   └── Vote.php
├── repositories/
│   ├── CommentRepository.php
|   ├── TopicRepository.php
│   └── VoteRepository.php
├── services/
│   └── ForumService.php
├── views/
│   ├── comments/
│   |   └── edit.php
│   └── topics/
│       ├── create.php
│       ├── edit.php
│       ├── index.php
│       └── view.php
└── index.php