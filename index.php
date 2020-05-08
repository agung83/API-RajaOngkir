<!DOCTYPE html>
<html lang="en">

<head>

    <title>API-RajaOngkir</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>
    <section class="konten">
        <div class="container">
            <h1>CheckOut Produk</h1>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>

                    </tr>
                </thead>
                <tbody>



                    <tr>
                        <td>1</td>
                        <td>Smartphone a71</td>
                        <td>40000000</td>
                        <td>1</td>
                        <td>40000000</td>

                    </tr>


                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja</th>
                        <th>40000000</th>

                    </tr>

                </tfoot>
            </table>

            <form method="post">
                <h2>Alamat </h2>
                <div class="row">
                    <div class="col-md-4">
                        <label class="font-weight-bold">Provinsi</label>
                        <select class="form-control" name="nama_provinsi">

                        </select>
                    </div>


                    <div class="col-md-4">
                        <label class="font-weight-bold">Kota/Distrik</label>
                        <select class="form-control" name="nama_distrik">

                        </select>
                    </div>

                    <div class=" col-md-4">
                        <label class="font-weight-bold">Kurir</label>
                        <select class="form-control" name="id_ongkir">

                        </select>
                    </div>



                </div>
                <div class="form-group mt-5">
                    <label class="font-weight-bold">Jalan</label>
                    <textarea class="form-control" name="alamat_pengiriman"></textarea>
                </div>
                <button class="btn btn-primary" name="checkout">Checkout</button>
            </form>
            <script>
                $(document).ready(function() {
                    $.ajax({
                        type: 'post',
                        url: 'Data_API-RajaOngkir/data_provinsi.php',
                        success: function(hasil_provinsi) {
                            $('[name = "nama_provinsi"]').html(hasil_provinsi);

                        }
                    });

                    $("select[name = nama_provinsi]").on("change", function() {
                        //mengambil id provinsi dari atrribut bid'ah atau atribut yg kita buat sendiri, dengan fungsi attr('nama atribut bid'ah') dan simpan dalam var id_provinsi_terpilih
                        var id_provinsi_terpilih = $("option:selected", this).attr('id_provinsi');
                        //gunakan ajax untuk mengambil data distrik
                        $.ajax({
                            type: 'post',
                            url: 'Data_API-RajaOngkir/data_distrik.php',
                            //kirimkan method post ke data distrik agar data_distrik tau id mana yg akan di tampilkan, contoh nama post = id_provinsi yg di bawah, antarkan ke data_distrik.php
                            data: 'id_provinsi=' + id_provinsi_terpilih,
                            success: function(hasil_distrik) {
                                $("select[name=nama_distrik]").html(hasil_distrik);
                            }
                        })


                    })

                });
            </script>
            <script src="assets/js/jquery.min.js"></script>


        </div>


    </section>
</body>

</html>