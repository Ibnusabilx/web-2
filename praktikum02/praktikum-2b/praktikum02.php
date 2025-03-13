<!DOCTYPE html>
<html>
<head>
    <title>Form Nilai Siswa</title>
</head>
<body>
    <form method="POST" action="">
        <label>Nama Lengkap:</label>
        <input type="text" name="nama" required><br>
        
        <label>Mata Kuliah:</label>
        <input type="text" name="matkul" required><br>
        
        <label>Nilai UTS:</label>
        <input type="number" name="nilai_uts" required><br>
        
        <label>Nilai UAS:</label>
        <input type="number" name="nilai_uas" required><br>
        
        <label>Nilai Tugas Praktikum:</label>
        <input type="number" name="nilai_tugas" required><br>
        
        <button type="submit" name="proses" value="Submit">Simpan</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama_siswa = $_POST['nama'];
        $mata_kuliah = $_POST['matkul'];
        $nilai_uts = $_POST['nilai_uts'];
        $nilai_uas = $_POST['nilai_uas'];
        $nilai_tugas = $_POST['nilai_tugas'];
        
        // Perhitungan nilai akhir dengan bobot yang ditentukan
        $nilai_akhir = ($nilai_uts * 0.3) + ($nilai_uas * 0.35) + ($nilai_tugas * 0.35);
        
        // Menentukan kelulusan
        $status = ($nilai_akhir > 55) ? "LULUS" : "TIDAK LULUS";
        
        // Menentukan grade berdasarkan rentang nilai
        if ($nilai_akhir >= 85 && $nilai_akhir <= 100) {
            $grade = "A";
        } elseif ($nilai_akhir >= 70 && $nilai_akhir <= 84) {
            $grade = "B";
        } elseif ($nilai_akhir >= 56 && $nilai_akhir <= 69) {
            $grade = "C";
        } elseif ($nilai_akhir >= 36 && $nilai_akhir <= 55) {
            $grade = "D";
        } elseif ($nilai_akhir >= 0 && $nilai_akhir <= 35) {
            $grade = "E";
        } else {
            $grade = "I";
        }
        
        // Menentukan predikat berdasarkan grade dengan SWITCH
        switch ($grade) {
            case "A":
                $predikat = "Sangat Memuaskan";
                break;
            case "B":
                $predikat = "Memuaskan";
                break;
            case "C":
                $predikat = "Cukup";
                break;
            case "D":
                $predikat = "Kurang";
                break;
            case "E":
                $predikat = "Sangat Kurang";
                break;
            default:
                $predikat = "Tidak Ada";
        }
        
        echo "<h3>Hasil Penilaian</h3>";
        echo "Nama: $nama_siswa <br>";
        echo "Mata Kuliah: $mata_kuliah <br>";
        echo "Nilai UTS: $nilai_uts <br>";
        echo "Nilai UAS: $nilai_uas <br>";
        echo "Nilai Tugas: $nilai_tugas <br>";
        echo "Nilai Akhir: $nilai_akhir <br>";
        echo "Grade: $grade <br>";
        echo "Predikat: $predikat <br>";
        echo "Status: $status <br>";
    }
    ?>
</body>
</html>