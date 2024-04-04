<?php

// Nama: [Putri Ayu Ningtias]
// NIM: [21552011381]

// Definisi kelas Book untuk merepresentasikan buku
class Book {
    // Properti yang melindungi informasi buku
    protected $title; // Judul buku
    protected $author; // Penulis buku
    protected $year; // Tahun terbit buku
    protected $status; // Status ketersediaan buku

    // Konstruktor untuk inisialisasi objek buku dengan informasi yang diberikan
    public function __construct($title, $author, $year) {
        $this->title = $title;
        $this->author = $author;
        $this->year = $year;
        $this->status = 'available'; // Set status awal buku menjadi tersedia
    }

    // Metode getter untuk mendapatkan judul buku
    public function getTitle() {
        return $this->title;
    }

    // Metode getter untuk mendapatkan penulis buku
    public function getAuthor() {
        return $this->author;
    }

    // Metode getter untuk mendapatkan tahun terbit buku
    public function getYear() {
        return $this->year;
    }

    // Metode getter untuk mendapatkan status ketersediaan buku
    public function getStatus() {
        return $this->status;
    }

    // Metode setter untuk mengatur status ketersediaan buku
    public function setStatus($status) {
        $this->status = $status;
    }
}

// Definisi kelas Library untuk merepresentasikan perpustakaan
class Library {
    protected $books = []; // Array untuk menyimpan daftar buku di perpustakaan

    // Metode untuk menambahkan buku ke dalam perpustakaan
    public function addBook(Book $book) {
        $this->books[] = $book;
    }

    // Metode untuk meminjam buku dari perpustakaan
    public function borrowBook($title) {
        foreach ($this->books as $book) {
            if ($book->getTitle() == $title && $book->getStatus() == 'available') {
                $book->setStatus('borrowed');
                return true; // Kembalikan true jika buku berhasil dipinjam
            }
        }
        return false; // Kembalikan false jika buku tidak ditemukan atau tidak tersedia
    }

    // Metode untuk mengembalikan buku yang dipinjam ke perpustakaan
    public function returnBook($title) {
        foreach ($this->books as $book) {
            if ($book->getTitle() == $title && $book->getStatus() == 'borrowed') {
                $book->setStatus('available');
                return true; // Kembalikan true jika buku berhasil dikembalikan
            }
        }
        return false; // Kembalikan false jika buku tidak ditemukan atau sudah tersedia
    }

    // Metode untuk mencetak daftar buku yang tersedia di perpustakaan
    public function printAvailableBooks() {
        echo "Available Books:\n";
        foreach ($this->books as $book) {
            if ($book->getStatus() == 'available') {
                echo "- {$book->getTitle()} by {$book->getAuthor()} ({$book->getYear()})\n";
            }
        }
    }
}

// Pengujian (testing) kode
$library = new Library(); // Membuat objek perpustakaan

// Membuat objek buku dengan informasi yang diberikan
$book1 = new Book('Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling', 1997);
$book2 = new Book('Harry Potter and the Chamber of Secrets', 'J.K. Rowling', 1998);
$book3 = new Book('Harry Potter and the Prisoner of Azkaban', 'J.K. Rowling', 1999);

// Menambahkan buku-buku ke dalam perpustakaan
$library->addBook($book1);
$library->addBook($book2);
$library->addBook($book3);

// Menampilkan daftar buku yang tersedia di perpustakaan
$library->printAvailableBooks();

// Meminjam salah satu buku
$library->borrowBook('Harry Potter and the Chamber of Secrets');
$library->printAvailableBooks();

// Mengembalikan buku yang dipinjam
$library->returnBook('Harry Potter and the Chamber of Secrets');
$library->printAvailableBooks();

?>
