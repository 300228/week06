<?php
include 'header.php';
require_once 'db.php'; // 連線資料庫

try {
    // 從資料庫撈出所有活動資料
    $sql = "SELECT * FROM event";
    $result = mysqli_query($conn, $sql);
?>
    <div class="container my-5">
        <div class="row mb-4">
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="col-md-6 mb-4">
                    <div class="card h-100 bg-white text-dark">
                        <div class="card-body d-flex flex-column">
                            <h3 class="card-title"><?= htmlspecialchars($row['name']); ?></h3>
                            <p class="card-text">
                                <?= htmlspecialchars($row['description']); ?>
                            </p>
                            
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>

<?php
    mysqli_close($conn);
} catch (Exception $e) {
    echo "<p class='text-danger text-center'>無法載入活動資料：" . htmlspecialchars($e->getMessage()) . "</p>";
}
include('footer.php');
?>
