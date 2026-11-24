<?php

/**
 * @var \App\Modesl\Author $author
 */

?>
  
  <?php foreach($author->books as $book): ?>

                <li>
                  <a
                    href="books/<?php echo $book->id; ?>/<?php echo \Core\Helpers::slugify($book->title) ; ?>.html"
                    class="hover:text-red-500 underline font-medium"
                    ><?php echo $book->title ; ?></a
                  >
                </li>
                <?php endforeach; ?>