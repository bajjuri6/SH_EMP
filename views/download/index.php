<?php require 'views/header.php'; ?>

            <div class="span7 left-cntnt">
                <div id="myCarousel" class="carousel slide">
                    <div class="carousel-inner">
                        <div class="active item">
                            <img src="/images/item1.jpg" alt="Slide1" />
                        </div>
                        <div class="item">
                            <img src="/images/item2.jpg" alt="Slide2" />
                        </div>
                        <div class="item">
                            <img src="/images/item3.jpg" alt="Slide3" />
                        </div>
                    </div>
                    <a class="carousel-control left " href="#myCarousel" data-slide="prev">
                        <i class="icon-chevron-left-sign"></i></a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">
                        <i class="icon-chevron-right-sign"></i>
                    </a>

                </div>
            </div>
            <div class="span5 overflow">
            <div class="tbl-hdr"><h2>Download Payslips</h2></div>
            <table border="2" class="table table-hover table-condensed table-bordered">
                <tr><th>Payslip</th>
                    <th>Get</th>
                </tr>
                <?php $row = $this->get_slips; ?>
                <?php for ($i = 0; $i < sizeof($row); $i++) { ?>
                    <tr><td align="center"><?php echo $row[$i]['slip']; ?></td>
                        <td class='dwnld'><a href="/download/down_slips/<?php echo $row[$i]['slip']; ?>"><i class="icon-download"></i></a></td>
                    </tr>
                <?php } ?>
            </table>
            </div>
        </div>
    </div>
</div>
    <?php require 'views/footer.php'; ?>