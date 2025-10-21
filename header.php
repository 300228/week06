<?php
// week03/header.php
function nav_active($file) {
    $current = basename($_SERVER['PHP_SELF']);
    return $current === $file ? ' active' : '';
}
?>
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 導覽列範例</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar {
            padding-left: 2rem;
            padding-right: 2rem;
        }
        .navbar-nav .nav-item {
            margin-left: 1rem;
            margin-right: 1rem;
        }
        .navbar-nav .nav-link {
            font-size: 1.25rem;
            transition: color 0.2s, background-color 0.2s;
        }
        .navbar-nav .nav-link.active {
            background-color: #20c997;  /* 主題色塊 */
            color: #fff !important;
            font-weight: bold;
            border-radius: 0.25rem;
            padding: 0.5rem 1.5rem;
        }
    </style>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    
</head>
<body>
    <!-- 導覽列開始 -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">活動報名系統</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="切換導航">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link<?php echo nav_active('index.php'); ?>" href="index.php">首頁</a>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (!isset($_SESSION)) {
                            session_start();
                        }
                        $isLogin = isset($_SESSION['account']);
                        $current = basename($_SERVER['PHP_SELF']);
                        $statusActive = (nav_active('status.php') || nav_active('statu_process.php')) ? ' active' : '';
                        $conferenceActive = (nav_active('conference.php') || nav_active('conference_process.php')) ? ' active' : '';
                        ?>
                        <a class="nav-link<?php echo $statusActive; ?>" href="<?php echo $isLogin ? 'status.php' : ('login.php?from=status.php'); ?>">迎新茶會</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?php echo $conferenceActive; ?>" href="<?php echo $isLogin ? 'conference.php' : ('login.php?from=conference.php'); ?>">資管一日營</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link<?php echo nav_active('job.php'); ?>" href="job.php">求才資訊</a>
                    
                    </li>
                    <li class="nav-item">
                        <?php if ($isLogin): ?>
                            <a class="nav-link" href="logout.php">登出</a>
                        <?php else: ?>
                            <a class="nav-link<?php echo nav_active('login.php'); ?>" href="login.php">登入</a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- 導覽列結束 -->