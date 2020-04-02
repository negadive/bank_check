<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"-->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<title>Bank Checker</title>
<?php
include 'koneksi.php';
include 'func.php';

echo "<td colspan='3'height='330' width='100%'>
<table border='0' width='100%'><td align='center'>Bank Checker</td><tr></table>";
?>
<style>
    * {
        font-family: GulimChe, serif;

    }
    /* The Modal (background)
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }
    */

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 20%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
    table, th, td, tr {
        padding : 0px 2.5px 0px 0px;
    }
    td {
        padding-bottom : 3.5px;
    }
</style>

<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("zxc");
    var span = document.getElementsByClassName("close")[0];
    function closex() {
        document.getElementById('myModal').style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    //$(document).ready(function()//When the dom is ready
    function asd(id)
    {
        var username = $("#nick").val();//Get the value in the username textbox
        $.ajax({  //Make the Ajax Request
            type: "GET",
            url: "getitem.php",  //file name
            data: "iduserr="+ username + "&iditem="+id,  //data
            success: function(server_response){
            document.getElementById('myModal').style.display = "block";
            var att = $("#item").attr("data-content");
            $("#item_info").html(server_response);
            }
        });
    };
</script>

<form action='' method='POST'>
    <center>Pengecekan Bank dari ID User : <br><input type=text name=nick>
    <input type='submit' value='Go!' class='buttonbig' name='hehe'></center>
</form>

<?php
if ($_POST){
    $nick=$_POST['nick'];

    $querycekinven = mysqli_query($con, "SELECT * from store where user_id='$nick'");
    if(mysqli_num_rows($querycekinven) > 0){
        echo "<center><font color=#ff0000 size=4><b id='iduser'>".$nick."</b></font></center>";
        ?>
        <div style="position:absolute; left:38%; " >
            <img src="bg_store.jpg" width="312px" height="603.6px" style="border-radius: 5px; z-index:-1;"/>
            <?php
            echo "<table border='0' style='position: absolute;left: 0px; top: 42px;
                z-index: 2; border-spacing: 3px; padding:0px; font-size: 15px;'>";
            $row = mysqli_fetch_array($querycekinven);

            $i = 0;
            for($y=0;$y<10;$y++){
                echo "<tr align='center'>";

                for($x=0;$x<8;$x++){
                    $it="it".$i;
                    $io="io".$i;
                    $ioo="ioo".$i;

                    if($row[$it]=="0"){
                        //$color="background='item.png'";
                        echo "<td height='34' width='33'><!--b><small>$i</small></b--></td>";
                    }else{
                        //$color="bgcolor=red";
                        echo "<td height='34' width='33' >
                                <b><small>
                                    <img id='item' title='$i' style='width:32px;height:32px;' onmouseover='asd($i)' alt='".$i."' src='ico/".get_of($row[$it],'ico').".png'>
                            </td>";
                    }
                    $i++;
                }
                echo "</tr>";
            }
            ?>
            <input type='hidden' name='nick' id='nick' value='<?php echo $nick;?>'>
            <input type='hidden' name='edited' value='true'>
            <!--td height="2" colspan="4"><input type="submit" value="Edit Bank!" class="button" style="margin-left: auto; padding: 10px; margin-top: 10px; margin-right: auto; text-align: center; position: relative;"></td-->
            </table>
            <div style='font-family: GulimChe, serif; position:absolute; left:23%; top:504px;'><?php echo $row['negel'] ?><br></div>
            <div style='font-family: GulimChe, serif; position:absolute; left:23%; top:534px;'><?php echo $row['segel'] ?></div>

        </div>

        <div id="myModal" class="modal">
            <div class="modal-content">
                <span onclick="closex()" class="close">&times;</span>
                <div id="item_info">
                </div>
            </div>
        </div>
        <?php
    }
    else
    echo "<center><font color=#ff0000 size=4><b id='iduser'>ID `".$nick."` tidak ditemukan</b></font></center>";
}
?>
