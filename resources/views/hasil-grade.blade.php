<!DOCTYPE html>
<html>
<head>
    <title>Hasil Grade</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
      <div class="container">
        <h2>Tabel Nilai</h2>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nilai Quis</th>
                    <th>Nilai Tugas</th>
                    <th>Nilai Absensi</th>
                    <th>Nilai Praktek</th>
                    <th>Nilai UAS</th>
                    <th>Nilai Rata Rata</th>
                    <th>Final Grade</th>
                </tr>
            </thead>
            <tbody>
            @foreach($grades as $data)
                <tr>
                    <td>{{ $data['nama'] }}</td>
                    <td>{{ $data['quiz'] }}</td>
                    <td>{{ $data['assignment'] }}</td>
                    <td>{{ $data['attendance'] }}</td>
                    <td>{{ $data['practice'] }}</td>
                    <td>{{ $data['final_exam'] }}</td>
                    <td>{{ $data['nilai'] }}</td>
                    <td><b>{{ $data['grade'] }}</b></td>
                </tr>
        @endforeach
            </tbody>
        </table>

        <h3>Grafik Grade Mahasiswa</h3>
    <div style="height: auto;">
        <canvas id="barChart"></canvas>
    </div>

    <h3>Grafik Nilai Mahasiswa</h3>
    <div style="height: 450px;">
      <canvas id="gradeChart" style="height: 200px;"></canvas>
    </div>

    

    </div>

    <script>
        var gradeData = @json($grades);

        var labels = gradeData.map(data => data.nama);
        var data = gradeData.map(data => data.nilai);

        var ctx = document.getElementById('gradeChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nilai Mahasiswa',
                    data: data,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0,
                        stepSize: 10
                    }
                }
            }
        });
    </script>
    <script>
        const grades = {!! json_encode($grades) !!};

        // Membuat array untuk menyimpan nilai rata-rata dan grade
        const rataRata = grades.map(grade => grade.rata_rata);
        const gradeLabels = grades.map(grade => grade.grade);

        // Membuat objek Chart untuk line chart
        new Chart(document.getElementById('lineChart'), {
            type: 'line',
            data: {
                labels: gradeLabels,
                datasets: [{
                    label: 'Rata-rata Nilai',
                    data: rataRata,
                    fill: false,
                    borderColor: 'blue',
                    tension: 0.1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Menghitung jumlah Grade
        const gradeCounts = {
            A: 0,
            B: 0,
            C: 0,
            D: 0,
            E: 0
        };

        for (const grade of gradeLabels) {
            gradeCounts[grade]++;
        }

        // Mengubah objek menjadi array untuk diagram batang
        const gradeValues = Object.values(gradeCounts);
        const gradeKeys = Object.keys(gradeCounts);

        // Membuat objek Chart untuk bar chart
        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: gradeKeys,
                datasets: [{
                    label: 'Jumlah Mahasiswa',
                    data: gradeValues,
                    backgroundColor: [
                        'green',
                        'yellow',
                        'orange',
                        'red',
                        'gray'
                    ]
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</body>
</html>
