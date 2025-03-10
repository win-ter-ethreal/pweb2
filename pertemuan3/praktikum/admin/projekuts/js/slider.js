document.addEventListener("DOMContentLoaded", function () {
    let currentSlide = 0; // Indeks slide pertama
    const slides = document.querySelectorAll(".slide");

    // Debug: Periksa jumlah slide
    console.log("Jumlah slide ditemukan:", slides.length);

    // Fungsi untuk mengganti slide
    function changeSlide() {
        // Debug: Slide aktif sebelum diubah
        console.log("Slide aktif saat ini:", currentSlide);

        // Hilangkan class active dari slide saat ini
        slides[currentSlide].classList.remove("active");

        // Perbarui indeks slide aktif
        currentSlide = (currentSlide + 1) % slides.length;

        // Tambahkan class active ke slide berikutnya
        slides[currentSlide].classList.add("active");

        // Debug: Slide aktif setelah diubah
        console.log("Slide aktif berikutnya:", currentSlide);
    }

    // Ubah slide setiap 5 detik
    setInterval(changeSlide, 5000);
});
