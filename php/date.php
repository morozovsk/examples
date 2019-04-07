<?php
date("Y-m-d H:i:s"); // 2001-03-10 17:16:18 (MySQL DATETIME format)
$date = date('Y-m-d H:i:s', strtotime("2018-03-01T11:05:10Z"));
date('c');//'2018-03-01T14:35:13+00:00'
