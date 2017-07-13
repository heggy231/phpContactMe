<?php

$title = "Thank you";
include 'header.php';

if (isset($_GET['confirmMsg'])) {
    echo $_GET['confirmMsg'];
} else {
    echo 'Hmm, Something went wrong.  Please contact Heggy.';
}
?>
<!--end tag for div class intro from current pg story.php-->
</div>
<!--end tag for div class row from header.php-->
</div>

<?php
include 'footer.php'; 
?>
</body>
</html>