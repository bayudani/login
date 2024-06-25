<!DOCTYPE html>
<html>

<head>
    <title>MEMBUAT GRAFIK DARI DATABASE MYSQL DENGAN PHP DAN CHART.JS</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
</head>

<body>
    <style type="text/css">
        body {
            font-family: roboto;
        }

        table {
            margin: 0px auto;
        }
    </style>
    <center>
        <h1>GRAFIK DATA MAHASISWA</h1> <br />
    </center>
    <?php
    include '../koneksi.php';
    ?>
    <div style="width: 800px;margin: 0px auto;">
        <canvas id="myChart"></canvas>
    </div>
    <br />
    <br />
    <?php
    $no = 1;
    $data = mysqli_query($koneksi, "select * from mahasiswa");
    ?>
    </tbody>
    </table>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Rekayasa Perangkat Lunak", "Teknik Mesin", "Administrasi Negara"],
                datasets: [{
                    label: '',
                    data: [
                        <?php
                        $jumlah_rpl = mysqli_query($koneksi, "select * from mahasiswa where prodi='Rekayasa Perangkat Lunak'");
                        echo mysqli_num_rows($jumlah_rpl);
                        ?>,
                        <?php
                        $jumlah_mesin = mysqli_query($koneksi, "select * from mahasiswa where prodi='Teknik Mesin'");
                        echo mysqli_num_rows($jumlah_mesin);
                        ?>,
                        <?php
                        $jumlah_adm = mysqli_query($koneksi, "select * from mahasiswa where prodi='Administrasi Negara'");
                        echo mysqli_num_rows($jumlah_adm);
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>