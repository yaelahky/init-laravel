<!DOCTYPE html>
<html>
<head>
    <title>Input Nilai Mahasiswa</title>
</head>
<body>
    <h1>Input Nilai Mahasiswa</h1>

    <form method="POST" action="/hitung-grade">
        @csrf

        <div id="mahasiswa-container">
            <div class="mahasiswa">
                <h3>Mahasiswa 1</h3>
                <div>
                    <label for="nama_1">Nama Mahasiswa:</label>
                    <input type="text" name="mahasiswa[1][nama]" id="nama_1" required>
                </div>
                <div>
                    <label for="quiz_1">Nilai Quis:</label>
                    <input type="number" name="mahasiswa[1][quiz]" id="quiz_1" required>
                </div>
                <div>
                    <label for="assignment_1">Nilai Tugas:</label>
                    <input type="number" name="mahasiswa[1][assignment]" id="assignment_1" required>
                </div>
                <div>
                    <label for="attendance_1">Nilai Absensi:</label>
                    <input type="number" name="mahasiswa[1][attendance]" id="attendance_1" required>
                </div>
                <div>
                    <label for="practice_1">Nilai Praktek:</label>
                    <input type="number" name="mahasiswa[1][practice]" id="practice_1" required>
                </div>
                <div>
                    <label for="final_exam_1">Nilai UAS:</label>
                    <input type="number" name="mahasiswa[1][final_exam]" id="final_exam_1" required>
                </div>
            </div>
        </div>

        <button type="button" onclick="tambahSiswa()">Tambah Siswa Lain</button>
        <button type="submit">Hitung Nilai</button>
    </form>

    <script>
        let counter = 1;

        function tambahSiswa() {
            counter++;

            const container = document.getElementById('mahasiswa-container');
            const mahasiswaDiv = document.createElement('div');
            mahasiswaDiv.classList.add('mahasiswa');
            mahasiswaDiv.innerHTML = `
                <h3>Mahasiswa ${counter}</h3>
                <div>
                    <label for="nama_${counter}">Nama Mahasiswa:</label>
                    <input type="text" name="mahasiswa[${counter}][nama]" id="nama_${counter}" required>
                </div>
                <div>
                    <label for="quiz_${counter}">Nilai Quis:</label>
                    <input type="number" name="mahasiswa[${counter}][quiz]" id="quiz_${counter}" required>
                </div>
                <div>
                    <label for="assignment_${counter}">Nilai Tugas:</label>
                    <input type="number" name="mahasiswa[${counter}][assignment]" id="assignment_${counter}" required>
                </div>
                <div>
                    <label for="attendance_${counter}">Nilai Absensi:</label>
                    <input type="number" name="mahasiswa[${counter}][attendance]" id="attendance_${counter}" required>
                </div>
                <div>
                    <label for="practice_${counter}">Nilai Praktek:</label>
                    <input type="number" name="mahasiswa[${counter}][practice]" id="practice_${counter}" required>
                </div>
                <div>
                    <label for="final_exam_${counter}">Nilai UAS:</label>
                    <input type="number" name="mahasiswa[${counter}][final_exam]" id="final_exam_${counter}" required>
                </div>
            `;

            container.appendChild(mahasiswaDiv);
        }
    </script>
</body>
</html>
