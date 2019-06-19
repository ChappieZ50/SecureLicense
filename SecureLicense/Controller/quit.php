<?php
session_destroy();
header("Location:".CURRENT."/login/");
exit;