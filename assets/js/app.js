// ===== Hamburger menu =====
function initNavToggle() {
    const toggleBtn = document.getElementById("nav-toggle-btn");
    const nav = document.querySelector("header nav");

    if (!toggleBtn || !nav) return;

    toggleBtn.addEventListener("click", function () {
        nav.classList.toggle("nav-open");
    });
}


// ===== Filter pencarian tabel =====
function initTableFilter() {
    const input = document.getElementById("search-input");
    const table = document.querySelector(".table-responsive table");

    if (!input || !table) return;

    input.addEventListener("keyup", function () {
        const keyword = input.value.toLowerCase();
        const rows = table.querySelectorAll("tbody tr");

        rows.forEach(function (row) {
            const teks = row.textContent.toLowerCase();

            row.style.display = teks.includes(keyword)
                ? ""
                : "none";
        });
    });
}


// ===== Validasi form =====
function tampilkanError(input, pesan) {
    hapusError(input);

    const span = document.createElement("span");

    span.className = "error";
    span.textContent = pesan;

    input.insertAdjacentElement("afterend", span);
}


function hapusError(input) {
    const next = input.nextElementSibling;

    if (
        next &&
        next.classList.contains("error")
    ) {
        next.remove();
    }
}


function initValidasiForm() {
    const form = document.getElementById("form-tambah");

    if (!form) return;

    form.addEventListener("submit", function (e) {

        let valid = true;

        const nama = form.querySelector(
            "[name='nama_layanan'], [name='nama']"
        );

        if (
            nama &&
            nama.value.trim() === ""
        ) {
            tampilkanError(
                nama,
                "Nama wajib diisi."
            );

            valid = false;

        } else if (nama) {

            hapusError(nama);
        }


        const noIdentitas = form.querySelector(
            "[name='no_pelanggan'], [name='no_karyawan']"
        );

        if (
            noIdentitas &&
            noIdentitas.value.trim() === ""
        ) {
            tampilkanError(
                noIdentitas,
                "Nomor wajib diisi."
            );

            valid = false;

        } else if (noIdentitas) {

            hapusError(noIdentitas);
        }


        const harga = form.querySelector(
            "[name='harga']"
        );

        if (harga) {

            const nilai = parseInt(
                harga.value,
                10
            );

            if (
                isNaN(nilai) ||
                nilai < 0
            ) {
                tampilkanError(
                    harga,
                    "Harga tidak boleh negatif."
                );

                valid = false;

            } else {

                hapusError(harga);
            }
        }


        const durasi = form.querySelector(
            "[name='durasi']"
        );

        if (durasi) {

            const nilai = parseInt(
                durasi.value,
                10
            );

            if (
                isNaN(nilai) ||
                nilai < 1
            ) {
                tampilkanError(
                    durasi,
                    "Durasi harus lebih dari 0 menit."
                );

                valid = false;

            } else {

                hapusError(durasi);
            }
        }


        if (!valid) {
            e.preventDefault();
        }

    });
}


document.addEventListener(
    "DOMContentLoaded",
    function () {

        initNavToggle();
        initTableFilter();
        initValidasiForm();

    }
);