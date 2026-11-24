<?php

/**
 * @var array $tags
 * @var object $book
 */

?>

<div class="pb-4">

                    <?php foreach ($book->tags as $tag): ?>
                    <span
                        class="bg-gray-500 text-white px-3 py-1 rounded-full text-sm font-semibold mr-2">
                    <?php echo $tag->name; ?>
                    </span>
                    <?php endforeach; ?>
                    
                </div>