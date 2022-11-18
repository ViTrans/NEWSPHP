 <div class="pagination mt-2">
     <ul>
         <?php if ($current_page > 1) : $prev_page = $current_page - 1; ?>
             <li><a href="?page=danhsachbaiviet&p=<?= $prev_page ?>">
                     <i class="fa-solid fa-arrow-left"></i>
                 </a></li>
         <?php endif; ?>
         <?php for ($num = 1; $num <= $toTalPages; $num++) : ?>

             <?php if ($current_page == $num) : ?>
                 <li><a class="active-link" href="?page=danhsachbaiviet&p=<?= $num ?>"><?= $num ?></a></li>
             <?php else : ?>
                 <li><a href="?page=danhsachbaiviet&p=<?= $num ?>"><?= $num ?></a></li>
             <?php endif; ?>

         <?php endfor; ?>
         <?php if ($current_page < $toTalPages) : $prev_page = $current_page + 1; ?>
             <li><a href="?page=danhsachbaiviet&p=<?= $prev_page ?>">
                     <i class="fa-solid fa-arrow-right"></i>
                 </a></li>
         <?php endif; ?>
     </ul>
 </div>