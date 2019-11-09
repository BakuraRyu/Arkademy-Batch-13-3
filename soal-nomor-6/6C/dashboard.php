<?php
require_once ("config/config.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="assets/fa/css/all.css">
    

    <title>Arkademy Bootcamp</title>
  </head>
  <body>
      
    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light shadow bg-white rounded">
        <a class="navbar-brand" href="#" >
            <img src="assets/img/logo-arka.png" width="80" class="d-inline-block align-top" alt="">
            
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <span class="navbar-brand mb-0 h1 font-weight-bold"><span style="color: #ff8fb2">ARKADEMY</span> COFFEE SHOP</span>
            
            <ul class="navbar-nav mr-auto">
            </ul>

            <span class="navbar-text">
            <!-- <a data-toggle="modal" data-target="#addModal" href="add.php" style="width: 8rem; color: white;" class="btn btn-primary custom-btn shadow rounded">ADD</a> -->
                <button type="button" class="btn btn-primary custom-btn shadow rounded" style="width: 8rem;" data-toggle="modal" data-target="#addModal">
                ADD
                </button>
            </span>
        </div>
      
    </nav>
    
    <div class="row h-100 justify-content-center align-items-center"> 
        <div class="col-md-8"> 
            <div class="card shadow rounded" style="margin-top:80px; margin-bottom:40px">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th style="width: 5%;">No</th>
                                <th>Cashier</th>
                                <th>Product</th>
                                <th style="width: 10%;">Category</th>
                                <th style="width: 15%;">Price</th>
                                <th style="width: 20%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no = 1;
                        $sql_p = mysqli_query($con, "SELECT * FROM product a
                                                    INNER JOIN cashier b ON a.id_cashier = b.id_cashier
                                                    INNER JOIN category c ON a.id_category = c.id_category ") or die (mysqli_eror($con));
                        while ($data = mysqli_fetch_assoc($sql_p)) { ?>    
                            <tr>
                                <td class=" text-center"><?=$no++?></td>
                                <td><?=ucfirst($data['name_cashier'])?></td>
                                <td><?=ucfirst($data['name_product'])?></td>
                                <td><?=ucfirst($data['name_category'])?></td>
                                <td class=" text-center"><?=rupiah($data['price'])?></td>
                                <td class=" text-center">
                                    <a href="#edit_modal" data-toggle="modal" data-id="<?=$data['id_product']; ?>" style="color: rgb(142, 218, 28);" class="font-weight-bold">Edit</a> 
                                    | <a href="#" iduser="<?=$data['id_product']?>" namauser="<?=$data['name_cashier']?>" style="color: red;" class="font-weight-bold btnhapus">Delete</a>
                                </td>
                            </tr>
                           
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>    
    </div>        

    <!-- Modal edit -->
    <div class="modal fade" id="edit_modal" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <div class="hasil-data"></div>
                            <!-- content is here  -->
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>


    <!-- Modal Add -->
    <div class="modal bs-example-modal-lg fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- Content Will show Here -->
                <div class="modal-header">
                    <h5 class="modal-title">Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <form id="formadd" method='post'>
                                <div class="form-group">
                                    <input type="hidden" name="saveadd">
                                    <select name="cashier" id="cashier" class="form-control" required="true">
                                        <option value="">-Select Cashier-</option>
                                        <?php
                                        $sql_cs = mysqli_query ($con, "SELECT * FROM cashier") or die (mysqli_error($con));
                                        while ($data_cs = mysqli_fetch_assoc($sql_cs)) {
                                            echo '<option value="'.$data_cs['id_cashier'].'">'.$data_cs['name_cashier'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select name="category" id="category" class="form-control" required="true">
                                        <option value="">-Select Category-</option>
                                        <?php
                                        $sql_pd = mysqli_query ($con, "SELECT * FROM category") or die (mysqli_error($con));
                                        while ($data_pd = mysqli_fetch_assoc($sql_pd)) {
                                            echo '<option value="'.$data_pd['id_category'].'">'.$data_pd['name_category'].'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="product" id="product" placeholder="Product" class="form-control" required="true">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="price" id="price" placeholder="Price" class="form-control" required="true">
                                </div>
                                <div class="form-group float-right">
                                    <input type="submit" id="saveadd" name="saveadd" value="ADD" class="btn btn-primary custom-btn">
                                </div>   
                            </form>         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

      


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="assets/js/jquery-3.4.1.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>


    <script>
    /* format Rupiah in textbox */
    let rupiah = document.getElementById("price");
    rupiah.addEventListener("keyup", function(e) {
    // tambahkan 'Rp.' pada saat form di ketik
    // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
    rupiah.value = formatRupiah(this.value, "Rp. ");
    });

    function formatRupiah(angka, prefix) {
    let number_string = angka.replace(/[^,\d]/g, "").toString(),
        split = number_string.split(","),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // tambah titik 
    if (ribuan) {
        separator = sisa ? "." : "";
        rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }


    // Submit
    $("form").on("submit", (function(e) {
        e.preventDefault();
 
        var formData = $('#formadd').serialize() //serialize data from form
        $.ajax({ 
            type: "POST",  
            url: "proses.php",   
            // cache: false,
            data : formData,
            dataType: 'json',
        }).done(function(response) {  

            // Clear form after submit
            // $("form")[0].reset();

            // Return value response submit
            console.log(response);
            const txtValue = response.message;
            if(response ["value"] == 1) {
                Swal.fire({
                    title: 'Berhasil!',
                    text: '' + txtValue,
                    type: 'success',
                    showCancelButton: false,
                    allowOutsideClick: false,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.value) {
                        document.location.reload();
                    }
                })
            } else {
                Swal.fire({
                type: 'error',
                title: 'Error',
                text: 'Something went wrong!'
            });
            }           

        })  
    }));
            


    // Edit
    $(document).ready(function(){
        $('#edit_modal').on('show.bs.modal', function (e) {
            var idx = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'dtldata.php',
                data :  'idx='+ idx,
                success : function(data){
                $('.hasil-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
    

    // Delete
    $(document).on( "click",".btnhapus", function() {
        var userid = $(this).attr("iduser");
        var usernama = $(this).attr("namauser");
        Swal.fire({   
            title: "Yakin menghapus data " +usernama+" ID #"+userid+" ?",     
            type: "warning",   
            showCancelButton: true,   
            confirmButtonColor: "#dc3545",   
            confirmButtonText: "Delete",   
            // closeOnConfirm: false 
        }).then((result) => {
            if (result.value) {
                
                $.ajax({ 
                type: "POST",  
                url: "del.php",  
                data: 'id='+userid, 
                cache: false,
                dataType: 'json', 
                }).done(function(response) {  
                    
                    if(response["value"] == 1) {
                        Swal.fire({
                            title: "Data " +usernama+" ID <span style=\'color: #ff8fb2;\'> #"+userid+"</span>",
                            text: "Berhasil Dihapus!" ,
                            type: 'success',
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok'
                        }).then((result) => {
                            if (result.value) {
                            document.location.reload();
                            }
                        })
                    } else {
                        swal.fire("Gagal!", "Gagal menghapus data!", "error");
                    }             
                });  
            }
        });  
    });

  

    </script>
  </body>
</html>