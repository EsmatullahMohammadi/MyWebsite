<footer class="bg-white py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0" style="color: blueviolet;">Note: My Personal Website in 2023</div></div>
                    <?php
                        require_once("Admine/database.php");
                        $sqll="SELECT * FROM changehome;";
                        $resss=mysqli_query($connect,$sqll);
                        while($roww=mysqli_fetch_assoc($resss)){
                            echo '
                        

                    <div class="col-auto">
                        <a class="small" style="text-decoration:none;" href="'.$roww['instagrame'].'"><img src="assets/Instagram.png" width="40px" alt="">Instagrame</a>
                        <span class="mx-1">&middot;</span>
                        <a class="small" style="text-decoration:none;" href="'.$roww['youtupe'].'"><img src="assets/YouTube.png" width="40px" alt="">YouTube</a>
                        <span class="mx-1">&middot;</span>
                        <a class="small" style="text-decoration:none;" href="'.$roww['facebook'].' "><img src="assets/FaceBook.png" width="40px" alt="">FaceBook</a>
                    </div>';}?>
                </div>
         </div>
</footer>