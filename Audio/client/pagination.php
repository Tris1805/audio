<ul class="pagination">
    <?php

        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i != $cur_page) {
                ?>
                <li class=""><a href="#product-list" data-page="<?= $i ?>"> <?= $i ?></a></li>
            <?php } else { ?>
                <li class=""><a href="#product-list" data-page="<?= $i ?>" class="active"> <?= $i ?></a></li>

            <?php } ?>
        <?php }
    ?>
</ul>