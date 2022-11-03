<?php if($_REQUEST['send'] == 1){?>
<p style="color:#fff; font-weight:bold">Thank You!<br><br>Your submission has been received.<br>We will contact you shortly.</p>
<?php }elseif($_REQUEST['send'] == 2){?>
<p style="color:#FF0000; font-weight:bold">Please enter a valid email address.</p>
<?php }elseif($_REQUEST['send'] == 3){?>
<p style="color:#FF0000; font-weight:bold">Sorry, The security code is not correct!</p>
<?php }else{?>
<p style="color:#FF0000; font-weight:bold">Sorry, there was an unexpected error!<br />Please try again later.</p>
<?php }?>
                     