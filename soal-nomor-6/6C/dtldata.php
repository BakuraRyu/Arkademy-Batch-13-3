<?php
require_once "config/config.php";

    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $sql = mysqli_query($con, "SELECT * FROM product WHERE id_product = $id");
        while ($result = mysqli_fetch_array($sql)){
        ?>
        <form id="formedit" method="post">
            <div class="form-group">
                <input type="hidden" name="id" value="<?=$id?>">
                <select name="cashier" id="cashier" class="form-control" required>
                <?php
                $sql_csr = mysqli_query ($con, "SELECT * FROM cashier") or die (mysqli_error($con));
                while ($data_csr = mysqli_fetch_assoc($sql_csr)) {
                    if ($data_csr['id_cashier'] ==  $result['id_cashier']) {
                        echo '<option selected value="'.$data_csr['id_cashier'].'">'.$data_csr['name_cashier'].'</option>';
                    } else {
                        echo '<option value="'.$data_csr['id_cashier'].'">'.$data_csr['name_cashier'].'</option>';
                    }
                }
                ?>
                </select>
            </div>
            <div class="form-group">
                <select name="category" id="category" class="form-control" required>
                    <?php
                    $sql_ctg = mysqli_query ($con, "SELECT * FROM category") or die (mysqli_error($con));
                    while ($data_ctg = mysqli_fetch_assoc($sql_ctg)) {
                        if ($data_ctg['id_category'] ==  $result['id_category']) {
                            echo '<option selected value="'.$data_ctg['id_category'].'">'.$data_ctg['name_category'].'</option>';
                        } else {
                            echo '<option value="'.$data_ctg['id_category'].'">'.$data_ctg['name_category'].'</option>';
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="product" id="product" value="<?=$result['name_product']?>" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="price" id="price" value="<?=$result['price']?>" class="form-control" required>
            </div>
                <input type="submit" id="saveedit" name="saveedit" value="EDIT" class="btn btn-primary custom-btn float-right">
        </form>     

        <?php
        } 
    }
    ?>

<script>

// Edit
$("form").on("submit", (function(e) {
    e.preventDefault();

    var formData = $('#formedit').serialize() //serialize data from form
    $.ajax({ 
        type: "POST",  
        url: "update.php",   
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
            icon: 'error',
            title: 'Oops...',
            text: 'Something went wrong!'
        });
        }           

    })  
}));



</script>
