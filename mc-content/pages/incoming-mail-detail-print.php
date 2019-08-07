<?php
     $maildetail = $_GET['mail-print'];
     $query = "SELECT * FROM tb_mail_in WHERE id_mail_in = '$maildetail'";
     $result = $fungsi->execute($query);
     $row = mysqli_fetch_array($result);

     if($leader){
        echo "<script>window.location.href = 'index.php?page=404'</script>";
     }
?>

    <script type="text/javascript">
        window.onload = function() {
            window.print();
            window.close();
        }
    </script>

    <style>
        .mc-navbar, .mc-footer {
            display: none;
        }
    </style>



    <div class="incoming-mail-detail-print">
        <div class="mc-container">
            <div class="heading-title">
                <h1>Incoming Mail Detail</h1>
            </div>

            <div class="mail-detail-section">
                <div class="mail-detail-content">
                    <ul class="detail">
                        <li>
                            <h3>Mail from:</h3>
                            <p>
                                <?php echo $row['mail_from']; ?>
                            </p>
                        </li>
                        <li>
                            <h3>Mail code:</h3>
                            <p>
                                <?php echo $row['mail_code'];  ?>
                            </p>
                        </li>
                        <li>
                            <?php
                                $dateIncoming = $widget->date($row['incoming_at']);
                            ?>
                                <h3>Date of incoming mail:</h3>
                                <p>
                                    <?php echo $dateIncoming;  ?>
                                </p>
                        </li>

                        <li>
                            <?php
                                $dateCreated = $widget->date($row['mail_date']);
                            ?>
                                <h3>Date of mail created:</h3>
                                <p>
                                    <?php echo $dateCreated;  ?>
                                </p>
                        </li>
                        <li>
                            <h3>Subject:</h3>
                            <p>
                                <?php echo $row['mail_subject'];  ?>
                            </p>
                        </li>
                        <li>
                            <h3>Mail type:</h3>
                            <?php 
                                if($row['id_mail_type'] == 1){
                                    $type = "Invitation";
                                } else if($row['id_mail_type'] == 2){
                                    $type = "Official";
                                }
                            ?>
                            <p>
                                <?php echo $type;  ?>
                            </p>
                        </li>
                        <li>
                            <h3>Short description:</h3>
                            <p>
                                <?php echo $row['mail_description'];  ?>
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
   