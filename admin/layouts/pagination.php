<?php if ($toTalPages > 1) : ?>
    <div class="pagination mt-2">
        <ul>
            <?php if ($current_page > 1) : $prev_page = $current_page - 1; ?>
                <li><a href="?page=<?= $_GET['page'] ?>&p=<?= $prev_page ?>">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a></li>
            <?php endif; ?>

            <?php for ($num = 1; $num <= $toTalPages; $num++) : ?>

                <?php if ($current_page == $num) : ?>
                    <li><a class="active-link" href="?page=<?= $_GET['page'] ?>&p=<?= $num ?>"><?= $num ?></a></li>
                <?php else : ?>
                    <?php
                    if ($num > $current_page -  3 && $num < $current_page + 3) : ?>
                        <li><a href="?page=<?= $_GET['page'] ?>&p=<?= $num ?>"><?= $num ?></a></li>
                    <?php endif; ?>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($current_page < $toTalPages) : $prev_page = $current_page + 1; ?>
                <li><a href="?page=<?= $_GET['page'] ?>&p=<?= $prev_page ?>">
                        <i class="fa-solid fa-arrow-right"></i>
                    </a></li>
            <?php endif; ?>
        </ul>
    </div>
<?php endif ?>