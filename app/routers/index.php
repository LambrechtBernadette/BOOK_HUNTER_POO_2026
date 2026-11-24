<?php

namespace Routers;

use \App\Controllers;

if (isset($_GET['authors'])):

    include_once '../app/routers/authors.php';

elseif (isset($_GET['books'])):

    include_once '../app/routers/books.php';
        

else:

Controllers\PagesController::homeAction();


endif;