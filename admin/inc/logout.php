<?php
session_start();
require("../inc/db.php");
session_destroy();
echo"<script>window.location='../?logout=1';</script>";
