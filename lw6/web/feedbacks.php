<?php
require_once '../src/common.inc.php';
(getRequestMethod() === 'POST') ? feedbacksListPage() : feedbackRequestPage();